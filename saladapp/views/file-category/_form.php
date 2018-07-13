<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->registerJsFile(Yii::getAlias('@web/js/file-category.js'), ['depends' => \yii\web\JqueryAsset::className()]);
/* @var $this yii\web\View */
/* @var $model app\models\FileCategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="file-category-form">

    <?php $form = ActiveForm::begin(); ?>


    <?php
        if($model->for_guest==1){
            $guest = "checked";
        }else{
            $guest="";
        }
        if($model->for_shop==1){
            $shop = "checked";
        }else{
            $shop="";
        }
        if($model->is_global==1){
            $global = "checked";
        }else{
            $global="";
        }

    ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'description')->textarea(['maxlength' => 500]) ?>

    <?= $form->field($model, 'parent_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\FileCategory::find()->where('parent_id<=2')->all(), 'id', 'name')) ?>


<div class="form-group field-filecategory-is_global">

    <input type="checkbox" name="FileCategory[is_global]" id="filecategory-is_global" value="1" <?= $global ?>>
    <label for="filecategory-is_global">Is Global</label>
</div>

    <div class="form-group field-filecategory-for_shop">

        <input type="checkbox" name="FileCategory[for_shop]" id="filecategory-for_shop" value="1" <?= $shop ?>>
        <label for="filecategory-for_shop">For Shop</label>
    </div>

    <div class="form-group field-filecategory-for_guest">

        <input type="checkbox" name="FileCategory[for_guest]" id="filecategory-for_guest" value="1" <?= $guest ?> >
        <label for="filecategory-for_guest">For Guest</label>
    </div>
<!--    --><?//= $form->field($model, 'for_shop')->checkbox() ?>
<!---->
<!--    --><?//= $form->field($model, 'for_guest')->checkbox() ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
