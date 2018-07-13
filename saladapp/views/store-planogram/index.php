<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StorePlanogramSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Store Planograms');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="store-planogram-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Store Planogram',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'path',
            'title',
            'description:ntext',

            [
                'attribute'=>'store_id',
                'value'=>'store.name'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
