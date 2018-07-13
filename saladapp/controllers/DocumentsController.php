<?php

namespace app\controllers;

use app\models\Company;
use app\models\FileCategory;
use app\models\Store;
use Yii;
use app\models\Documents;
use app\models\DocumentsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DocumentsController implements the CRUD actions for Documents model.
 */
class DocumentsController extends Controller
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
     * Lists all Documents models.
     * @return mixed
     */


    public function init()
    {
        $this->layout = 'admin';
    }
    public function actionIndex()
    {
        $searchModel = new DocumentsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Documents model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Documents model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Documents();


        if ($model->load(Yii::$app->request->post())  ) {

            $model->path = \yii\web\UploadedFile::getInstances($model, 'path');
            $model->path[0]->saveAs('pdf/'.$_FILES['Documents']['name']['path']);
            $model->path = $_FILES['Documents']['name']['path'];
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Documents model.
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
     * Deletes an existing Documents model.
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
     * Finds the Documents model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Documents the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Documents::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

    }

    public function actionCategory($id){
         $companies = Company::find()->all();


        $category = FileCategory::find()->where(['id'=>$id])->one();

        if($category->for_shop == 0 && $category->is_global == 0 && $category->for_guest == 0){
            echo "<option value=''>Select Company</option>";
            foreach($companies as $company){
                echo "<option >".$company->name."</option>";
            }
        }elseif($category->is_global == 1 && $category->for_guest == 0 && $category->for_shop == 0){
            echo "<option value=''>Select Company</option>";
        }elseif($category->is_global == 0 && $category->for_guest == 0 && $category->for_shop == 1){
            echo "<option value=''>Select Company</option>";
            foreach($companies as $company){
                echo "<option value='".$company->id."'>".$company->name."</option>";
            }
        }elseif($category->is_global == 0 && $category->for_guest == 1 && $category->for_shop == 0 ){
            echo "<option value=''>Select Company</option>";
        }elseif($category->is_global == 1 && $category->for_guest == 0 && $category->for_shop == 1 ){
            echo "<option value=''>Select Company</option>";
        }



    }

    public function actionList($id){
        $countStores = Store::find()
            ->where(['company_id'=>$id])
            ->count();

        $stores=Store::find()
            ->where(['company_id'=>$id])
            ->all();

        if($countStores>0){
            echo "<option value=''>Select Store</option>";
            foreach($stores as $store){
                echo "<option value='".$store->company_id."'>".$store->name."</option>";
            }
        }else{
            echo "<option value=''>Select Store</option>";
            echo "<option value=''>-</option>";
        }
    }



}

