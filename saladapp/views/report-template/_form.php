<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReportTemplate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="report-template-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'report_group_id')->textInput() ?>

    <?= $form->field($model, 'report_type_id')->textInput() ?>

    <?= $form->field($model, 'store_id')->textInput() ?>

    <?= $form->field($model, 'report_type_option_id')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
