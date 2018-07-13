<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\components\AdminMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
<div class="page-index">
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


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Page', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'alias',
           // 'content:ntext',
            'breadcrumbs',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

        </div>
    </div>
</div>
</div>
