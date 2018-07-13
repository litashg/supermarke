<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PhotoPath */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="photo-path-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'report_id')->textInput() ?>

    <?= $form->field($model, 'path')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
