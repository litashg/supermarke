<?php

namespace app\controllers;

use app\models\Company;
use app\models\ReportOptionType;
use app\models\ReportTypeOption;
use Yii;
use app\models\Report;
use app\models\ReportSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ReportController implements the CRUD actions for Report model.
 */
class ReportController extends Controller
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
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return (\Yii::$app->user->identity->getIsAdmin());
                        },
                    ],
                    [
                        'actions' => ['index','view'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return (\Yii::$app->user->identity->getIsMerchen());
                        },
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Report models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReportSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $dataProvider->pagination->pageSize=10;
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function init()
    {
        $this->layout = 'admin';
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
            'model'       =>    $this->findModel($id),
            'store'       =>    $this->findModel($id)->storeInfo,
            'user'        =>    $this->findModel($id)->userInfo,
            'type'        =>    $this->findModel($id)->typeInfo,
            'reportOpVal' =>    $this->findModel($id)->reportValue,
            'reportTypeOption' => ReportTypeOption::find()->where('report_type_id', $this->findModel($id)->type_id)->all(),
            'reportOptionType' => ReportOptionType::find()
                ->where('id',ReportTypeOption::find()->where('report_type_id', $this->findModel($id)->type_id)->all()->report_option_type_id)->all(),


        ]);
    }

    /**
     * Creates a new Report model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Report();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Report model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Report model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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
        if (($model = Report::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
