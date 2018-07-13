<?php

namespace app\controllers;

use Yii;
use app\models\Allergens;
use app\models\AllergensSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * AllergensController implements the CRUD actions for Allergens model.
 */
class AllergensController extends Controller
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
            'access' => array(
                'class' => \yii\filters\AccessControl::className(),
                'rules' => array(

                    array(
                        'allow' => true,
                        'actions' => array('index', 'view','create','update','delete'),
                        'roles' => array('admin')
                    ),
                    array(
                        'allow' => false
                    ),
                )
            )
        ];
    }

    /**
     * Lists all Allergens models.
     * @return mixed
     */
    public function actionIndex()
    {

//        DELETE ITEMS
        if (Yii::$app->request->post('selection')) {
            foreach(Yii::$app->request->post('selection') as $id) {
                $this->findModel($id)->delete();
            }
        }
//        DELETE ITEMS
        $get = Yii::$app->request->get();
        $post =Yii::$app->request->post();


        Yii::$app->request->queryParams = array_merge($get,$post);
        $searchModel = new AllergensSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Allergens model.
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
     * Creates a new Allergens model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Allergens();

        if ($model->load(Yii::$app->request->post())) {

//            image
            $image = UploadedFile::getInstance($model, 'temp_image');

            $ico_path = Yii::$app->basePath . '/web/uploads/allergen_icon/';

            if (isset($image)){

                // store the source file name
                // $model->filename = $image->name;
                $ext = end((explode(".", $image->name)));
                // generate a unique file name
                $model->image = Yii::$app->security->generateRandomString().".{$ext}";
                // the path to save file, you can set an uploadPath
                // in Yii::$app->params (as used in example below)
                $path = $ico_path . $model->image;
            }
//            image

            if($model->save()) {
                if (isset($image)) {

                    $image->saveAs($path);
                }


                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Allergens model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {


//            image
            $image = UploadedFile::getInstance($model, 'temp_image');

            $ico_path = Yii::$app->basePath . '/web/uploads/allergen_icon/';

            if (isset($image)){

                // store the source file name
               // $model->filename = $image->name;
                $ext = end((explode(".", $image->name)));
                // generate a unique file name
                $model->image = Yii::$app->security->generateRandomString().".{$ext}";
                // the path to save file, you can set an uploadPath
                // in Yii::$app->params (as used in example below)
                $path = $ico_path . $model->image;
            }
//            image

            if($model->save()){
            if (isset($image)){

                $image->saveAs($path);
            }








            return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Allergens model.
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
     * Finds the Allergens model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Allergens the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Allergens::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
