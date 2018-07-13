<?php

namespace app\controllers;

use app\models\Documents;
use app\models\FileCategory;
use app\models\Report;
use app\models\ReportHistory;
use app\models\ReportHistorySearch;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\data\SqlDataProvider;
use app\models\forms\UploadForm;
use app\helpers\dbHelper;

class GuestController extends Controller
{
    public function behaviors()
    {
        return [
//            'access' => [
//                'class' => AccessControl::className(),
////                'rules' => [
////                    [
////                        'allow' => true,
////                        'roles' => ['@'],
////                        'matchCallback' => function ($rule, $action) {
////                            return ((\Yii::$app->user->identity->getIsAdmin()) || (\Yii::$app->user->identity->getIsMerchen()));
////                        },
////                    ],
////                ],
//            ],
        ];
    }

    public function init()
    {
        $this->layout = 'guest';
    }

    public function actionIndex()
    {
        $document_category = FileCategory::find()->where('for_guest=1')->all();
        $documents = [];
        foreach($document_category as $category){

                    $documents =  array_merge($documents, Documents::find()->where('file_category_id=' . $category->id)->all());


        }
      //  echo "<pre>";
      //      var_dump($documents[0]);
      //      die;

        return $this->render('index' , ['message' => "message",
            'documents'=>$documents,
            'document_category'=>$document_category
        ]);
    }
    public function actionDocuments($id){
        $document_category = FileCategory::find()->where('id='.$id)->one();

        $documents = Documents::find()->where('file_category_id='.$document_category->id)->all();

        return $this->render('documents',[
                'document_category'=>$document_category,
                'documents'=>$documents
            ]

        );
    }
}