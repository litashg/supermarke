<?php

namespace app\controllers;

use app\models\Report;
use app\models\ReportHistory;
use app\models\ReportHistorySearch;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\data\SqlDataProvider;
use app\models\forms\UploadForm;
use app\helpers\dbHelper;

class AdminController extends Controller
{
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
					'rules' => [
						[
							'allow' => true,
                            'roles' => ['@'],
                            'matchCallback' => function ($rule, $action) {
                                return ((\Yii::$app->user->identity->getIsAdmin()) || (\Yii::$app->user->identity->getIsMerchen()));
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
	
    public function actionIndex()
    {

		$searchModel = new ReportHistorySearch();
		$dataProvider = $searchModel->search(\Yii::$app->request->queryParams);
		$dataProvider->setSort(['defaultOrder' => ['status_id'=>SORT_ASC]]);
		$dataProvider->pagination->pageSize=10;

		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,

		]);
    }
    
    public function actionDb($msg = '')
    {
    	return $this->render('db', ['msg' => $msg]);
    }
    
    public function actionBackup()
    {
    	$msg = \Yii::t('admin','Backup file create failure.');
    	try {
    		$zipname = dbHelper::db_backup();
    		if($zipname)
    		{
    			$msg = \Yii::t('admin','Backup file is stored in ') . $zipname;
    			return \Yii::$app->response->sendFile($zipname);
    		}
    	}
    	catch (Exception $e) {
    		$this->redirect(['db', 'msg'=>$msg]);
    	}
    	return $this->redirect(['db', 'msg'=>$msg]);
    }
    public function actionRestore()
    {
    	$msg = \Yii::t('admin','Database restore error');
    	$model = new UploadForm();
    	if (\Yii::$app->request->isPost)
    	{
    		try
    		{
    			$model->file = UploadedFile::getInstance($model, 'file');
    			if ($model->validate())
    			{
    				$filename = \Yii::$app->basePath . '/runtime/' . $model->file->name;
    				if ( $model->file->saveAs($filename) )
    				{
    					if ( dbHelper::db_restore($filename, (strtolower($model->file->extension) == 'zip')) )
    					{
    						$msg = \Yii::t('admin','Database restored from ') . $model->file->name;
    					}
    					unlink($filename);
    				}
    				$this->redirect(['db', 'msg'=>$msg]);
    			}
    		}
    		catch (Exception $e)
    		{
    			$this->redirect(['db', 'msg'=>$msg]);
    		}
    	}
    	return $this->render('restore', ['model' => $model]);
    }




	public function actionConfirm(){
		$time = \Yii::$app->formatter->asDatetime(time(), "php:Y-m-d H:i:s");

		$report_id = $_GET['id'] ;
		$report_current_id = $_GET['current_id'];

		if(!isset($_GET['comment'])){
			$report_comment = " ";
		}else{
			$report_comment = $_GET['comment'] ;
		}

		$report = Report::findOne($report_id);
		$report->status_id = 2;
		$report->save();

		$report_current = ReportHistory::findOne($report_current_id);
		$report_current->status_id = 2;
		$report_current->save();

		$reportHistory = new ReportHistory();
		$reportHistory->report_id = $report_id;
		$reportHistory->status_comment = $report_comment;
		$reportHistory->send_datetime = $time ;
		$reportHistory->status_id = 2;
		$reportHistory->save();

		$this->redirect('/admin/index');

	}


	public function actionDenyConfirm(){

		$time = \Yii::$app->formatter->asDatetime(time(), "php:Y-m-d H:i:s");

		$report_id = $_GET['id'] ;
		$report_current_id = $_GET['current_id'];
		if(!isset($_GET['comment'])){
			$report_comment = " ";
		}else{
			$report_comment = $_GET['comment'] ;
		}

		$report = Report::findOne($report_id);
		$report->status_id = 3;
		$report->save();

		$report_current = ReportHistory::findOne($report_current_id);
		$report_current->status_id = 3;
		$report_current->save();

		$reportHistory = new ReportHistory();
		$reportHistory->report_id = $report_id;
		$reportHistory->status_comment = $report_comment;
		$reportHistory->send_datetime = $time ;
		$reportHistory->status_id = 3;
		$reportHistory->save();

		$this->redirect('/admin/index');
	}
}
