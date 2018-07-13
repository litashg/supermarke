<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\forms\ContactForm;

class SiteController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {

        switch (\Yii::$app->user->identity->role) {
            case 1:                                //if user is admin
                return $this->redirect('/admin');
                break;
            case 2:                                //if user is store
                return $this->redirect('/store');
                break;
            case 3:                                //if user is company
                return $this->redirect('/cabinet');
                break;
            case 4:
                return $this->redirect('/admin');
                break;
            case 5:                                //if user is guest
                return $this->redirect('/guest');
                break;
            default:
                return $this->render('index');
                break;
        }
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

}
