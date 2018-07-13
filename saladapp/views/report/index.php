<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Reports');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
            'id',
            [
                'attribute'=>'type_id',
                'value'=>'typeInfo.name'
            ],
            [
                'attribute'=>'user_id',
                'value'=>'userInfo.username'
            ],
            [
                'attribute'=>'store_id',
                'value'=>'storeInfo.name'
            ],
            [
                'attribute'=>'status_id',
                'value'=>'statusInfo.title'
            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
