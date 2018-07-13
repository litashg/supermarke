<?php

namespace app\controllers;

use app\models\MainSlider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use Yii;

class AdminController extends \yii\web\Controller
{


    public function behaviors()
    {
        return [

            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                    // everything else is denied
                ],
            ],
        ];
    }

    public function actionMainSlider()
    {

        $model = new MainSlider();

        if ($model->load(Yii::$app->request->post())) {

            $images1 = UploadedFile::getInstances($model, 'images');
            if ($images1) {
                foreach ($images1 as $getimg) {
                    $ext = end((explode(".", $getimg->name)));

                    $img = new MainSlider();
                    $img->image = Yii::$app->security->generateRandomString() . ".{$ext}";
                    Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/uploads/main_slider/';
                    $path = Yii::$app->params['uploadPath'] . $img->image;
                    $img->save();
                    $getimg->saveAs($path);

                }
            }
        }


        $images = MainSlider::find()->all();
        $model = new MainSlider();
        return $this->render('index',[
            'images' =>$images,
            'model'=>$model
        ]);
    }

    public function actionImageDelete($id){

             MainSlider::deleteAll(["id"=>$id]);

        return $this->redirect(['admin/main-slider']);
    }


}
