<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \app\models\AuthItem;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin([
	    'options'=>['enctype'=>'multipart/form-data'] // important
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => 255]) ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>

    <?php


        echo $form->field($model, 'role')->dropDownList(ArrayHelper::map(AuthItem::find()->all(), 'name', 'name'));

    ?>

    <?php if(!$model->isNewRecord){
        echo  '<div class="img_cont">';
        echo  '<img alt="#" class="main_img" width="100" height="100" src="';
        echo Yii::$app->request->BaseUrl.'/uploads/'.$model->image;
        echo '"></div>';
    }

    ?>
    <?
	// your fileinput widget for single file upload
	echo $form->field($model, 'image')->widget(FileInput::classname(), [
		'options'=>[
			'accept'=>'image/*',
		],

		'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png'], 'showUpload'=> false, ]]);
	?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
