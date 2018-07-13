<?php

namespace app\controllers;

use Yii;
use app\models\ReportType;
use app\models\ReportTypeSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ReportTypeController implements the CRUD actions for ReportType model.
 */
class ReportTypeController extends Controller
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

    public function init()
    {
        $this->layout = 'admin';
    }

    /**
     * Lists all ReportType models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReportTypeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ReportType model.
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
     * Creates a new ReportType model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ReportType();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {


            $image_file = UploadedFile::getInstance($model, 'report_image');
            if (isset($image_file)){

                $upload_path = $_SERVER['DOCUMENT_ROOT']."/pictures/reports/";
                $related_path = "/pictures/reports/";

                if (!file_exists($upload_path.$model->id)) {
                    mkdir($upload_path.$model->id, 0777, true);
                }
                $upload_path.=($model->id."/");
                $related_path.=($model->id."/");

                //remove all files from dir
                $files = glob($upload_path.'*'); // get all file names
                foreach($files as $file){ // iterate files
                    if(is_file($file))
                        unlink($file); // delete file
                }

                $model->report_image = $image_file;

                $unique_name = uniqid();
                $upload_path = $upload_path . $unique_name . '.' . $model->report_image->extension;
                $related_path = $related_path . $unique_name . '.' . $model->report_image->extension;

                $model->report_image->saveAs($upload_path);

                $model->report_image = $related_path;
                $model->save();


        }
            return $this->redirect(['view', 'id' => $model->id]);
        }else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ReportType model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {





        $model = $this->findModel($id);



        if ($model->load(Yii::$app->request->post()) && $model->save()) {


            $image_file = UploadedFile::getInstance($model, 'report_image');


            if (isset($image_file)) {

                $upload_path = $_SERVER['DOCUMENT_ROOT'] . "/pictures/reports/";
                $related_path = "/pictures/reports/";


                if (!file_exists($upload_path . $model->id)) {
                    mkdir($upload_path . $model->id, 0777, true);
                }
                $upload_path .= ($model->id . "/");
                $related_path .= ($model->id . "/");


                //remove all files from dir
                $files = glob($upload_path . '*'); // get all file names
                foreach ($files as $file) { // iterate files
                    if (is_file($file))
                        unlink($file); // delete file
                }


                $model->report_image = $image_file;

                $unique_name = uniqid();
                $upload_path = $upload_path . $unique_name . '.' . $model->report_image->extension;
                $related_path = $related_path . $unique_name . '.' . $model->report_image->extension;

                $model->report_image->saveAs($upload_path);

                $model->report_image = $related_path;
                $model->save();


            }
            return $this->redirect(['view', 'id' => $model->id]);
        }
        else {



                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }


    /**
     * Deletes an existing ReportType model.
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
     * Finds the ReportType model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ReportType the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ReportType::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
