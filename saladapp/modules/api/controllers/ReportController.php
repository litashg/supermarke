<?php
namespace app\modules\api\controllers;


use app\models\Report;
use app\models\ReportOptionsValue;
use app\models\ReportTypeOption;
use dektrium\user\models\User;
use yii\data\ActiveDataProvider;
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;
use yii\web\Response;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
header('Access-Control-Allow-Methods: PUT,GET,HEAD,POST,PATCH,DELETE,OPTIONS');


class ReportController extends ActiveController
{

    public $modelClass = 'app\models\Report';


    public function actionAddReport()
    {
        $is_edit = false;
        $edit_report = new Report();
        $edit_option_value = new ReportOptionsValue();
        if (isset($_GET["report_id"])){
            $is_edit = true;
            $edit_report = Report::find()->where("id=".$_GET["report_id"])->one();
            $edit_report->status_id = 1;
            $edit_option_value = ReportOptionsValue::find()->where("report_id=".$_GET["report_id"])->one();
        }


       // $_POST["token"] = str_replace('"', '', $_POST["token"]);
        $cur_user = User::findOne(['auth_key' => $_POST["token"]]);


        if(isset($_POST["store_id"]))
        $store_id = intval($_POST["store_id"]);
        else{
            $store_id = 0;
        }


        //-------
        if (!$is_edit){
            $newReport = new Report();
            $newReport->type_id = intval($_POST["type_id"]);
        }
        else{
            $newReport = $edit_report;
        }

        $newReport->comment = json_encode($_POST)." --- ".$_POST["token"]." --- ".$cur_user->id;

        $newReport->user_id = $cur_user->id;
        $newReport->store_id = $store_id;
        $newReport->creation_date = date("Y-m-d H:i:s");
        $newReport->save(false);

        foreach($_POST as $key=>$value){
            if (($key == "type_id") || ($key == "store_id") || ($key == "token"))
                continue;

            if (!$is_edit){
                $new_value = new ReportOptionsValue();
            }
            else{
                $new_value = $edit_option_value;
            }

            $new_value->report_type_option_id = $key;
            $new_value->value = $value;
            $new_value->report_id = $newReport->id;
            $new_value->save(false);
        }
    }

    public function actionGetArchive($token){


        $cur_user = User::findOne(['auth_key' => $_GET["token"]]);

        //get all reports
        $all_reports = Report::find()->where("user_id=".$cur_user->id." AND type_id <> 1")->all();
        return $all_reports;
    }

    public function actionGetDeclineCount($token){


        $cur_user = User::findOne(['auth_key' => $_GET["token"]]);

        //get all reports
        $all_reports = Report::find()->where("user_id=".$cur_user->id." AND type_id <> 1")->all();

        $count = 0;

        foreach($all_reports as $report){
            if ($report->status_id == 3) $count++;
        }

        return $count;
    }


}