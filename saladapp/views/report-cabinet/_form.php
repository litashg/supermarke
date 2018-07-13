<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReportCabinet */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="report-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type_id')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'store_id')->textInput() ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status_id')->textInput() ?>

<!--    --><?//= $form->field($model, 'checker_comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'creation_date')->textInput() ?>

    <?= $form->field($model, 'transaction')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
