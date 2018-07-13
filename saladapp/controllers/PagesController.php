<?php
namespace app\controllers;

use Yii;
use app\models\Page;
use app\models\search\PageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

class PagesController extends Controller
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
						'only' => ['delete'],
						'rules' => [
								[
									'allow' => true,
									'actions' => ['delete'],
									'roles' => ['@'],
								],
						],
				],
		];
	}
	
	public function init()
	{
		$this->layout = 'admin';
	}
	
    public function actionView($alias)
    {
    	$this->layout = 'main';
        $model = Page::find()->where(['alias'=>$alias, 'status'=>Page::STATUS_PUBLISHED, 'lang'=>Yii::$app->language])->one();
        if(!$model){
            $model = Page::find()->where(['alias'=>$alias, 'status'=>Page::STATUS_PUBLISHED, 'lang'=>Yii::$app->sourceLanguage])->one();
            if( ! $model ) {
                throw new NotFoundHttpException(Yii::t('page', 'Page not found'));
            }      
        }
        return $this->render('view', ['model'=>$model]);
    }
    
    /**
     * Lists all Page models.
     * @return mixed
     */
    public function actionIndex()
    {
    	$searchModel = new PageSearch();
    	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    	return $this->render('index', [
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    	]);
    }
    /**
     * Creates a new Page model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
    	$model = new Page();
    	if ($model->load(Yii::$app->request->post()) && $model->save()) {
    		return $this->redirect(['index']);
    	} else {
    		return $this->render('create', [
    				'model' => $model,
    		]);
    	}
    }
    /**
     * Updates an existing Page model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
    	$model = $this->findModel($id);
    	if ($model->load(Yii::$app->request->post()) && $model->save()) {
    		return $this->redirect(['index']);
    	} else {
    		return $this->render('update', [
    				'model' => $model,
    		]);
    	}
    }
    /**
     * Deletes an existing Page model.
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
     * Finds the Page model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Page the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
    	if (($model = Page::findOne($id)) !== null) {
    		return $model;
    	} else {
    		throw new NotFoundHttpException(Yii::t('page', 'The requested page does not exist.'));
    	}
    }
}