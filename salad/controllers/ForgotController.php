<?php

namespace app\controllers;

use app\models\RecoverPassForm;
use app\models\User;
use Yii;
use  app\models\ForgotForm;
use yii\base\Security;

class ForgotController extends \yii\web\Controller
{
    public function actionIndex()
    {

        $model = new ForgotForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

           $cur_mail = $model->email;
            $ne_u = new User();
            $forgot_user =   $ne_u->find()->where(['email' => trim($cur_mail)])->one();
            if($forgot_user){
                $forgot_user->scenario = 'forgot_key';
                $date = new \DateTime();
                $forgot_user->setAttribute('forgot_key', md5($date->getTimestamp()+'12212883543'));
                $forgot_user->save();
                $model = new ForgotForm();
                $model->contact($cur_mail,$forgot_user->forgot_key);
                return $this->render('succses');
            }else{
                return $this->render("no_mail");
            }
        }
        return $this->render('index', ['model' => $model]);
    }
    public function actionValid()
    {
        $id =  Yii::$app->getRequest()->getQueryParam('u_id');
        $model = new RecoverPassForm();
        if($id){
            $ne_u = new User();
            $forgot_user =   $ne_u->find()->where(['forgot_key' => trim($id)])->one();
            if($forgot_user){
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $forgot_user->scenario = 'new_pass';
            $forgot_user->password_hash = Yii::$app->security->generatePasswordHash($model->new_pass);
            $forgot_user->forgot_key = NULL;
            $forgot_user->save();
            return $this->render('new_pass_sucs');
        }
        }
                return $this->render('valid', ['model' => $model]);
            }
        return $this->render('no_u_id');
    }

}
