<?php

namespace app\controllers;

use Yii;
use app\models\UserSalad;
use app\models\UserSaladSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * UserSaladController implements the CRUD actions for UserSalad model.
 */
class UserSaladController extends Controller
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
     * Lists all UserSalad models.
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
        $searchModel = new UserSaladSearch();
        $get = Yii::$app->request->get();
        $post =Yii::$app->request->post();


        Yii::$app->request->queryParams = array_merge($get,$post);

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserSalad model.
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
     * Creates a new UserSalad model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserSalad();

        if ($model->load(Yii::$app->request->post()) ) {

            $image = UploadedFile::getInstance($model, 'img');
            if (isset($image)) {

                $img_path = Yii::$app->basePath . '/web/uploads/user_salad/';
                $ext = end((explode(".", $image->name)));
                $model->img = Yii::$app->security->generateRandomString().".{$ext}";
                $path = $img_path . $model->img;
            }



            if($model->save()){
                if (isset($image)) {
                    $image->saveAs($path);
                }
            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing UserSalad model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'update';

        if ($model->load(Yii::$app->request->post()) ) {


            $image = UploadedFile::getInstance($model, 'img');


            if (isset($image)  ) {

                $img_path = Yii::$app->basePath . '/web/uploads/user_salad/';
                $ext = end((explode(".", $image->name)));
                $model->img = Yii::$app->security->generateRandomString().".{$ext}";
                $path = $img_path . $model->img;
            }



            if($model->save()){

                if (isset($image)) {
                    $image->saveAs($path);
                }
            }



            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing UserSalad model.
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
     * Finds the UserSalad model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserSalad the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserSalad::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
