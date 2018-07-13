<?php

namespace app\controllers;

use app\models\Company;
use Yii;
use app\models\ReportCabinet;
use app\models\ReportCabinetSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ReportController implements the CRUD actions for Report model.
 */
class ReportCabinetController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Report models.
     * @return mixed
     */
//    public function actionIndex()
//    {
//        $searchModel = new ReportCabinetSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//
//        $dataProvider->pagination->pageSize=10;
//        return $this->render('index', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
//        ]);
//    }
    public function init()
    {
        $this->layout = 'cabinet';
    }
    /**
     * Displays a single Report model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

////        $comp = Company::getCompany();
//        $user       =   $this->findModel($id)->userinfo;
//        $type       =   $this->findModel($id)->typeinfo;
//        $store      =   $this->findModel($id)->storeinfo;

        return $this->render('view', [
            'model'     =>    $this->findModel($id),
            'store'     =>    $this->findModel($id)->storeinfo,
            'user'      =>    $this->findModel($id)->userinfo,
            'type'      =>    $this->findModel($id)->typeinfo,
            'reportopval'    =>    $this->findModel($id)->reportvalue
        ]);
    }


    /**
     * Finds the Report model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Report the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ReportCabinet::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
