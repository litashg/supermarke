<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SaladItemsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="salad-items-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'parent_id') ?>

    <?= $form->field($model, 'full_desc') ?>

    <?= $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'ingredients') ?>

    <?php // echo $form->field($model, 'c1_size') ?>

    <?php // echo $form->field($model, 'c1_container') ?>

    <?php // echo $form->field($model, 'c1_calories') ?>

    <?php // echo $form->field($model, 'c1_calfat') ?>

    <?php // echo $form->field($model, 'c2_totfat_1') ?>

    <?php // echo $form->field($model, 'c2_totfat_2') ?>

    <?php // echo $form->field($model, 'c2_satfat_1') ?>

    <?php // echo $form->field($model, 'c2_satfat_2') ?>

    <?php // echo $form->field($model, 'c2_transfat_1') ?>

    <?php // echo $form->field($model, 'c2_transfat_2') ?>

    <?php // echo $form->field($model, 'c2_cholester_1') ?>

    <?php // echo $form->field($model, 'c2_cholester_2') ?>

    <?php // echo $form->field($model, 'c2_sod_1') ?>

    <?php // echo $form->field($model, 'c2_sod_2') ?>

    <?php // echo $form->field($model, 'c3_totcarb_1') ?>

    <?php // echo $form->field($model, 'c3_totcarb_2') ?>

    <?php // echo $form->field($model, 'c3_dietfib_1') ?>

    <?php // echo $form->field($model, 'c3_dietfib_2') ?>

    <?php // echo $form->field($model, 'c3_sugar_1') ?>

    <?php // echo $form->field($model, 'c3_sugar_2') ?>

    <?php // echo $form->field($model, 'c3_protein_1') ?>

    <?php // echo $form->field($model, 'c3_protein_2') ?>

    <?php // echo $form->field($model, 'c3_calcium') ?>

    <?php // echo $form->field($model, 'c3_iron') ?>

    <?php // echo $form->field($model, 'c2_vit_a') ?>

    <?php // echo $form->field($model, 'c2_vit_c') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
