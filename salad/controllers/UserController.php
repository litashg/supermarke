<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\UserSearch;
use yii\base\Exception;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\base\Security;


/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();


        if ($model->load(Yii::$app->request->post())) {
            // var_dump($_FILES);
            //   exit();
            // get the uploaded file instance. for multiple file uploads
            // the following data will return an array
            $image = UploadedFile::getInstance($model, 'image');
            $path = Yii::$app->params['uploadPath'];


            Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/uploads/';

            if (isset($image)){



                // store the source file name
                //$model->filename = $image->name;



                $ext = end((explode(".", $image->name)));

                // generate a unique file name
                $model->image = Yii::$app->security->generateRandomString().".{$ext}";

                // the path to save file, you can set an uploadPath
                // in Yii::$app->params (as used in example below)
                $path = Yii::$app->params['uploadPath'] . $model->image;
                //  var_dump($path);
                // exit();

            }

            $model->password_hash = Yii::$app->security->generatePasswordHash($model->password);

            if($model->save()){
                if (isset($image)){

                    $image->saveAs($path);
                }
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                // error in saving model
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);

    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {

        $model = $this->findModel($id);
        $model->scenario = 'update';
	    if ($model->load(Yii::$app->request->post())) {
		   // var_dump($_FILES);
		 //   exit();
		    // get the uploaded file instance. for multiple file uploads
		    // the following data will return an array
		    $image = UploadedFile::getInstance($model, 'image');
		    $path = Yii::$app->params['uploadPath'];


		    Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/uploads/';

		    if (isset($image)){
			    // store the source file name
			    //$model->filename = $image->name;
			    $ext = end((explode(".", $image->name)));

			    // generate a unique file name
			    $model->image = Yii::$app->security->generateRandomString().".{$ext}";

			    // the path to save file, you can set an uploadPath
			    // in Yii::$app->params (as used in example below)
			    $path = Yii::$app->params['uploadPath'] . $model->image;
			  //  var_dump($path);
			   // exit();

		    }
            if($model->password){
            $model->password_hash = Yii::$app->security->generatePasswordHash($model->password);}

		    if($model->save()){
			    if (isset($image)){

				    $image->saveAs($path);
			    }
			    return $this->redirect(['view', 'id' => $model->id]);
		    } else {
			    // error in saving model
		    }
	    }
            return $this->render('update', [
                'model' => $model,
            ]);

    }

    /**
     * Deletes an existing User model.
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
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
