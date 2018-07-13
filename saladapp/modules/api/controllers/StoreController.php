<?php
namespace app\modules\api\controllers;


use app\models\Report;
use yii\data\ActiveDataProvider;
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;
use yii\web\Response;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
header('Access-Control-Allow-Methods: PUT,GET,HEAD,POST,PATCH,DELETE,OPTIONS');


class StoreController extends ActiveController
{

    public $modelClass = 'app\models\Store';

    public function actionGetArchive($store_id){

        //get all reports
        $all_reports = Report::find()->where("store_id=".$store_id)->all();
        return $all_reports;
    }

}