<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SaladItems */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Salad Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salad-items-view">
    <div class="container">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'parent_id',
            'full_desc:ntext',
            'image',
            'ingredients',
//            'c1_size',
//            'c1_container',
//            'c1_calories',
//            'c1_calfat',
//            'c2_totfat_1',
//            'c2_totfat_2',
//            'c2_satfat_1',
//            'c2_satfat_2',
//            'c2_transfat_1',
//            'c2_transfat_2',
//            'c2_cholester_1',
//            'c2_cholester_2',
//            'c2_sod_1',
//            'c2_sod_2',
//            'c3_totcarb_1',
//            'c3_totcarb_2',
//            'c3_dietfib_1',
//            'c3_dietfib_2',
//            'c3_sugar_1',
//            'c3_sugar_2',
//            'c3_protein_1',
//            'c3_protein_2',
//            'c3_calcium',
//            'c3_iron',
//            'c2_vit_a',
//            'c2_vit_c',
        ],
    ]) ?>
</div>
</div>
