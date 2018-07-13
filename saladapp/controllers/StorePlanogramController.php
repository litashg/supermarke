<?php

namespace app\controllers;

use Yii;
use app\models\StorePlanogram;
use app\models\StorePlanogramSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StorePlanogramController implements the CRUD actions for StorePlanogram model.
 */
class StorePlanogramController extends Controller
{
    var $path;
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
     * Lists all StorePlanogram models.
     * @return mixed
     */
    public function init()
    {
        $this->layout = 'admin';
    }

    public function actionIndex()
    {
        $searchModel = new StorePlanogramSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single StorePlanogram model.
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
     * Creates a new StorePlanogram model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new StorePlanogram();
        
        if ($model->load(Yii::$app->request->post())  ) {

            $model->path = \yii\web\UploadedFile::getInstances($model, 'path');
            $model->path[0]->saveAs('pdf/'.$_FILES['StorePlanogram']['name']['path']);
            $model->path = $_FILES['StorePlanogram']['name']['path'];
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing StorePlanogram model.
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
     * Deletes an existing StorePlanogram model.
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
     * Finds the StorePlanogram model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return StorePlanogram the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = StorePlanogram::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
