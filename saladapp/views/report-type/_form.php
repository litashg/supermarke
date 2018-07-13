<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReportType */
/* @var $form yii\widgets\ActiveForm */


?>

<div class="report-type-form">

    <?php $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data'] // important
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>



    <?php

    if ( $model->report_image!=""){
        echo $form->field($model, 'report_image')->widget(\kartik\file\FileInput::classname(), [
            'options' => [
                'accept' => 'image/*',
            ],
            'pluginOptions' => [
                'initialPreview'=>[
                    Html::img($model->report_image, ['class'=>'file-preview-image']),
                ],
                'showRemove' => false,
                'showUpload' => false,
            ]
        ]);
    }
    else{
        echo $form->field($model, 'report_image')->widget(\kartik\file\FileInput::classname(), [
            'options' => [
                'accept' => 'image/*',
            ],
            'pluginOptions' => [
                'showRemove' => false,
                'showUpload' => false,
            ]
        ]);
    }
   ?>

    <?= $form->field($model, 'report_title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'report_subtitle')->textInput(['maxlength' => 255]) ?>




    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
