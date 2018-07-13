<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Store */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="store-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>


    <?= $form->field($model, 'company_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Company::find()->all(), 'id', 'name')) ?>


    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => 55]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 200]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => 255]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
