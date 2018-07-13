<?php
namespace app\modules\api\controllers;


use app\models\Report;
use app\models\ReportOptionsValue;
use app\models\ReportType;
use yii\data\ActiveDataProvider;
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;
use yii\web\Response;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
header('Access-Control-Allow-Methods: PUT,GET,HEAD,POST,PATCH,DELETE,OPTIONS');


class ReportTypeController extends ActiveController
{

    public $modelClass = 'app\models\ReportType';

    public function actionGetReportValue($report_id){

       $cur_report = Report::find()->where("id=".$report_id)->one();
       $report_value = ReportType::find()->where("id=".$cur_report->type_id)->one();

       foreach ($report_value->options as $option){
           //get value
           $option_value = ReportOptionsValue::find()->where("report_id=".$report_id." AND report_type_option_id=".$option->id)->one();
           if(isset($option_value))
           $option->value = $option_value->value;
       }

        return $report_value;

    }

}
