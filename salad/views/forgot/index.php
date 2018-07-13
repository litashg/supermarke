<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
$this->title = 'Recover password';
$this->params['breadcrumbs'][] = $this->title;


?>
<?php $form = ActiveForm::begin(); ?>

<div class="container">
    <hr/>
    <div class="row">
    <div class="col-sm-5">
<?= $form->field($model, 'email')->label('Enter your email') ?>
<?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
]) ?>
</div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Send', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>
    <hr/>
</div>