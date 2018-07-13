<?php

namespace app\controllers;

use app\models\Documents;
use app\models\FileCategory;
use app\models\Report;
use dektrium\user\models\User;
use Yii;
use app\models\StoreCabinet;
use app\models\StorePlanogram;
use app\models\StoreCabinetSearch;
use yii\data\ArrayDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * StoreCabinetController implements the CRUD actions for Store model.
 */
class StoreCabinetController extends Controller
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
                            return (\Yii::$app->user->identity->getIsStore()|| \Yii::$app->user->identity->getIsCompany());
                        },
                    ],
                ],
            ],
        ];
    }

    public function init()
    {
        $this->layout = 'cabinet';
    }


    /**
     * Lists all Store models.
     * @return mixed
     */


    public function actionIndex()
    {
        $searchModel = new StoreCabinetSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Store model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        return $this->render('view', [
            'model' => $this->findModel($id),
            'reports'=>   Yii::$app->user->identity->storeReports ,
            'planograms' => $this->findModel($id)->storePlanograms
        ]);
    }

    /**
     * Creates a new Store model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new StoreCabinet();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Store model.
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


    public function actionDocuments($id){
        $document_category = FileCategory::find()->where('id='.$id)->one();

        if(($document_category->is_global) || ($document_category->for_guest)){
            $documents = Documents::find()->where('file_category_id='.$document_category->id)->all();
        }
        elseif(!$document_category->for_shop){

            $documents = Documents::find()->where('file_category_id='.$document_category->id)->andWhere('company_id='.\Yii::$app->user->identity->getUserCompany())->all();

        }
        elseif($document_category->for_shop){
            $documents = Documents::find()->where('file_category_id='.$document_category->id)->andWhere('store_id='.\Yii::$app->user->identity->getUserStore())->all();

        }


      //  $documents = Documents::find()->where('file_category_id='.$document_category->id)->andWhere('store_id='.\Yii::$app->user->identity->getUserStore())->all();



        return $this->render('documents',[
                'document_category'=>$document_category,
                'documents'=>$documents
            ]

        );
    }

    public function actionShowPlanogramm($id)
    {
        $plano = StorePlanogram::find()->where(['id' => $id])->all();
        $provider = new ArrayDataProvider([
            'allModels' => $plano,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'attributes' => ['id', 'title'],
            ],
        ]);


        return $this->render('showplanogramm',[
                'dataProvider'=>$provider,
                'plano'=>$plano,

            ]

        );


    }

    public function actionDownloadPlanogramm(){

        return $this->render('downloadplanogram');

    }
    /**
     * Deletes an existing Store model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    // pdf downloader
    public function actionPdfDownload($pdf_path){
        if($pdf_path) {
            $path = Yii::getAlias('@webroot') . '/pdf/' . $pdf_path;
            Yii::$app->response->sendFile($path);
        }else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }



    /**
     * Finds the Store model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Store the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StoreCabinet::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
