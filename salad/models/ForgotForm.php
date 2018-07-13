<?php

namespace app\models;

use yii\base\Model;
use Yii;
use yii\helpers\Url;

class ForgotForm extends Model
{

    public $email;
    public $verifyCode;

    public function rules()
    {
        return [
            [['email'], 'required'],
            ['email', 'email'],
            ['verifyCode', 'captcha'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    public function contact($email,$forgot_key)

    {
        $cont = Url::to(['/forgot/valid', 'u_id' => $forgot_key], true);
      //  var_dump($cont);
       // die;
        $email_ad= Yii::$app->params['adminEmail'];
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([$email => $email_ad])
                ->setSubject('Recover password to Supermarketers.com')
                ->setHtmlBody('To change your password follow this <a href="'.$cont.'"> link</a>')

                ->send();

            return true;


    }
}