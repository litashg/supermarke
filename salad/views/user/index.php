<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\components\AdminMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = ['label' => 'Admin panel','url' => ['//category/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-index">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="push-down-30">
                    <div class="banners--big">
                        <strong> <?= Html::encode($this->title) ?></strong>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">

            <div class="col-md-2">

                <?= AdminMenu::widget(['params' => array("action"=>"wine")]) ?>

            </div>
            <div class="col-md-10">

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'email',
//            [
//                'attribute' => 'password',
//                'value' =>  function($data) { return '***'; },
//
//            ],
            'role',
            [
                'attribute' => 'image',
                'format' => 'html',
                'value' => function($data) {  if((isset($data->image))&&($data->image!="")) return Html::img(Yii::$app->request->BaseUrl.'/uploads/'.$data->image, ['width'=>'100']); else return Html::img(  Yii::$app->request->BaseUrl.'/uploads/def.jpg', ['width'=>'100']);}

            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
    </div>
</div>
