<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Page */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => 255]) ?>
    <?= $form->field($model, 'breadcrumbs')->textInput(['maxlength' => 255]) ?>

<!--    --><?//= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'content')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'full',
        'clientOptions' => [
            'filebrowserUploadUrl' => '/web/site/url'
        ]
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
