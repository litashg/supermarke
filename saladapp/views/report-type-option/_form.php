<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReportTypeOption */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="report-type-option-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'report_type_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\ReportType::find()->all(), 'id', 'name')) ?>


    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'report_option_type_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\ReportOptionType::find()->all(), 'id', 'type')) ?>

    <?= $form->field($model, 'order')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
