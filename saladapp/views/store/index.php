<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StoreSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Stores');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="store-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Add {modelClass}', [
    'modelClass' => 'Store',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],


//            'id',
            'name',
            'address',
            [
                'attribute'=>'company_id',
                'value'=>'storeCompany.name'
            ],

            'phone',
//             'email:email',
//             'address',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
