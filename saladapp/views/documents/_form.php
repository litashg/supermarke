<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use kartik\depdrop\DepDrop;
use kartik\select2\Select2;


$this->registerJsFile(Yii::getAlias('@web/js/documents.js'), ['depends' => \yii\web\JqueryAsset::className()]);

/* @var $this yii\web\View */
/* @var $model app\models\Documents */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="documents-form">


    <?php $cur_lang = "";
    if (Yii::$app->language!="en"){
        $cur_lang = "/".Yii::$app->language;
    };

    ?>



    <?php $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data'] // important
    ]); ?>

    <?= $form->field($model, 'path')->widget(FileInput::classname(),
        [
            'options' => ['multiple' => false],
            'pluginOptions' => ['previewFileType' => 'any']
        ]); ?>





<!--    --><?//= $form->field($model, 'company_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Company::find()->all(),'id','name')); ?>



<!--    --><?php
//    echo Html::hiddenInput('input-type-1', 'Additional value 1', ['id'=>'input-type-1']);
//    echo Html::hiddenInput('input-type-2', 'Additional value 2', ['id'=>'input-type-2']);
//
//    echo $form->field($model, 'store_id')->widget(DepDrop::classname(), [
//        'type'=>DepDrop::TYPE_SELECT2,
//        'data'=>[2 => 'Tablets'],
//        'options'=>['id'=>'subcat1-id', 'placeholder'=>'Select ...'],
//        'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
//        'pluginOptions'=>[
//            'depends'=>['cat1-id'],
//            'url'=>\yii\helpers\Url::to(['/documents/subcat1']),
//            'params'=>['input-type-1', 'input-type-2']
//        ]
//    ]);



    ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'desc')->textarea(['rows' => 6]) ?>



    <?= $form->field($model, 'file_category_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\FileCategory::find()->where('id>2')->all(), 'id', 'name')
        ,[
        'prompt'=>'Select File Category',
        'onchange'=>'

          $.post("'.$cur_lang.'/documents/category?id='.'"+$(this).val(), function(data) {



            if(data == "<option value=\'\'>Select Company</option>"){
                $(".field-documents-company_id").hide();
                $(".field-documents-store_id").hide();
            }else{
                 $(".field-documents-company_id").show();
                 $("select#documents-company_id").html(data);
            }
         });

           '
    ]
    ) ?>

    <?= $form->field($model, 'company_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Company::find()->all(),'id','name'),[
        'prompt'=>'Select Company',
        'onchange'=>'
            $.post("'.$cur_lang.'/documents/list?id='.'"+$(this).val(),function(data) {
                $("select#documents-store_id").html(data);
                $(".field-documents-store_id").show();
            });'

    ]); ?>

    <?= $form->field($model, 'store_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Store::find()->all(),'id','name'),[
        'prompt'=>'Select Store',

    ]); ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
