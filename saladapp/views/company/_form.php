<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Company */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="company-form">

    <?php $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data'] // important
    ]); ?>

    <?= $form->field($model, 'logo_path')->widget(\kartik\file\FileInput::classname(),
        [
            'options' => ['multiple' => false],
            'pluginOptions' => ['previewFileType' => 'any']
        ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => 55]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 200]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
