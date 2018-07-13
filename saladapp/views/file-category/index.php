<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FileCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'File Categories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="file-category-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'File Category',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute'=>'parent_id',
                'value'=>'parentCategory.name'
            ],
//            'parentCategory.name',
            'is_global',
            'for_shop',
             'for_guest',
            'description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
