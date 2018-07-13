<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReportCabinetSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="report-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'type_id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'store_id') ?>

    <?= $form->field($model, 'comment') ?>

    <?php // echo $form->field($model, 'status_id') ?>

    <?php // echo $form->field($model, 'checker_comment') ?>

    <?php // echo $form->field($model, 'creation_date') ?>

    <?php // echo $form->field($model, 'transaction') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
