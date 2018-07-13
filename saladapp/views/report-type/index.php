<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReportTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Report Types');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-type-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Report Type',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute'=>'report_group_id',
                'value'=>'reportGroupInfo.name'
            ],

//            'description:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>




</div>
