<?php

namespace app\controllers;

use Yii;
use app\models\Category;
use app\models\CategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends Controller
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
     * Lists all Category models.
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

        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Category model.
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
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Category();

        if ($model->load(Yii::$app->request->post())) {
            // get the uploaded file instance. for multiple file uploads
            // the following data will return an array
            $image = UploadedFile::getInstance($model, 'image');

            $path = Yii::$app->params['uploadPath'];


            Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/uploads/';
            $icon = UploadedFile::getInstance($model, 'icon');
            $ico_path = Yii::$app->basePath . '/web/uploads/cat_icon/';

            if (isset($image)){

                // store the source file name
                $model->filename = $image->name;
                $ext = end((explode(".", $image->name)));
                // generate a unique file name
                $model->cat_img = Yii::$app->security->generateRandomString().".{$ext}";
                // the path to save file, you can set an uploadPath
                // in Yii::$app->params (as used in example below)
                $path = Yii::$app->params['uploadPath'] . $model->cat_img;
            }
//            ICO
            if (isset($icon)){
                // store the source file name
                $ext1 = end((explode(".", $icon->name)));
                // generate a unique file name
                $model->cat_icon = Yii::$app->security->generateRandomString().".{$ext1}";
                // the path to save file, you can set an uploadPath
                // in Yii::$app->params (as used in example below)
                $path1 = $ico_path . $model->cat_icon;
            }
//            ICO



            if($model->save()){
                if (isset($image)){

                    $image->saveAs($path);
                }
                if (isset($icon)){

                    $icon->saveAs($path1);
                }

                 return $this->redirect(['view', 'id' => $model->id]);
            } else {
                // error in saving model
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);

        /*
        $model = new Category();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
        */
    }

    /**
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);


        if ($model->load(Yii::$app->request->post())) {
            // get the uploaded file instance. for multiple file uploads
            // the following data will return an array
            $image = UploadedFile::getInstance($model, 'image');
            $path = Yii::$app->params['uploadPath'];
            Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/uploads/';

            $icon = UploadedFile::getInstance($model, 'icon');
            $ico_path = Yii::$app->basePath . '/web/uploads/cat_icon/';

            if (isset($image)){
                // store the source file name
                $model->filename = $image->name;
                $ext = end((explode(".", $image->name)));

                // generate a unique file name
                $model->cat_img = Yii::$app->security->generateRandomString().".{$ext}";

                // the path to save file, you can set an uploadPath
                // in Yii::$app->params (as used in example below)
                $path = Yii::$app->params['uploadPath'] . $model->cat_img;
            }

            //            ICO
            if (isset($icon)){
                // store the source file name
                $ext1 = end((explode(".", $icon->name)));
                // generate a unique file name
                $model->cat_icon = Yii::$app->security->generateRandomString().".{$ext1}";
                // the path to save file, you can set an uploadPath
                // in Yii::$app->params (as used in example below)
                $path1 = $ico_path . $model->cat_icon;
            }
//            ICO


            if($model->save()){
                if (isset($image)){
                    $image->saveAs($path);
                }
                if (isset($icon)){

                    $icon->saveAs($path1);
                }


                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                // error in saving model
            }
        }
        return $this->render('update', [
            'model' => $model,
        ]);

        /*
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
        */
    }

    /**
     * Deletes an existing Category model.
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
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
