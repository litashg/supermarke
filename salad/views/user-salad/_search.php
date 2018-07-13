<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserSaladSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="container">
<div class="user-salad-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>
    <?= $form->field($model, 'uniq_id') ?>

<!--    --><?//= $form->field($model, 'img') ?>

<!--    --><?//= $form->field($model, 'ingred') ?>

<!--    --><?//= $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'user_name') ?>

    <?php // echo $form->field($model, 'created') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>