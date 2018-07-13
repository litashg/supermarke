<?php
namespace app\controllers;

use app\models\Documents;
use dektrium\user\models\User;
use Yii;
use app\models\Article;
use app\models\ArticleCategory;
use app\models\search\ArticleSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
class CabinetController extends Controller
{
    public function behaviours(){
        return [
            'access'=>[
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow'=>true,
                        'roles'=>['@'],
                        'matchCallback'=> function ($rule,$action){
//                            return (\Yii::$app->user->identity->getIsStore()|| \Yii::$app->user->identity->getIsCompany());
                            return (\Yii::$app->user->identity->getIsStore()|| \Yii::$app->user->identity->getIsCompany());
                        }
                    ]
                ]
            ]
        ];
    }


    public function init()
    {
        $this->layout = 'cabinet';
    }
    public function actionIndex()
    {

        $documents = Documents::find()->where('store_id='. \Yii::$app->user->identity->getUserStore())->all();





        return $this->render('index' , ['message' => "message",
                                        'documents'=>$documents
        ]);
    }

    }