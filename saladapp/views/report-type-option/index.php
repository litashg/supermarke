<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReportTypeOptionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Report Type Options');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-type-option-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Report Type Option',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute'=>'report_type_id',
                'value'=>'reportType.name',

            ],
            'title',
            [
                'attribute'=>'report_option_type_id',
                'value'=>'typeInfo.type',

            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
