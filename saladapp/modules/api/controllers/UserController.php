<?php
namespace app\modules\api\controllers;


use dektrium\user\helpers\Password;
use dektrium\user\models\LoginForm;
use dektrium\user\models\User;
use yii\data\ActiveDataProvider;
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;
use yii\web\Response;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
header('Access-Control-Allow-Methods: PUT,GET,HEAD,POST,PATCH,DELETE,OPTIONS');


class UserController extends ActiveController
{

    public $modelClass = '\dektrium\user\models\User';


//    public function actionLogin()
//    {
//
//        $model = \Yii::createObject(LoginForm::className());
//
//
//        if ($model->load(\Yii::$app->getRequest()->post()) && $model->login()) {
//
//
//            echo \Yii::$app->user->identity->getAuthKey();
//            die;
//        }
//
//
//    }
    public function actionLogin()
    {

       // print_r($_POST);
       // die;
        $login = $_POST["login"];
        $pwd = $_POST["password"];

        $pwd_hash = md5($pwd);

        $usr = User::find()->where("username='".$login."' AND password_md5='".$pwd_hash."'")->one();

        if (isset($usr))
       // return $usr->auth_key;
            return $usr;
        else{
            echo "error";
            die;
        }

    }




}