<?php
use yii\grid\GridView;

$this->title = "Show planogramm";

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>




<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [

        'id',
        'path',
        'title',
        'description',
//        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>