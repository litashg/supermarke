<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Allergens */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="container">
<div class="allergens-form">

    <?php $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data'] // important
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>
    <?php if(!$model->isNewRecord){
        echo  '<div class="img_cont">';
        echo  '<img alt="#" class="main_img" width="100" height="100" src="';
        echo Yii::$app->request->BaseUrl.'/uploads/allergen_icon/'.$model->image;
        echo '"></div>';
    }

    ?>
    <?

    // your fileinput widget for single file upload
    echo $form->field($model, 'temp_image')->label('Image')->widget(FileInput::classname(), [
        'options'=>[
            'accept'=>'image/*',
        ],

        'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png'], 'showUpload'=> false, ]]);

    ?>
    <br/>
    <br/>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>