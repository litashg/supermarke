<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model app\models\LoginForm */

 $this->title = 'Login';
 $this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
<div class="site-login col-lg-9">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill in the login details:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'username')->label('Login') ?>

    <?= $form->field($model, 'password')->passwordInput()->label('Password') ?>

    <?= $form->field($model, 'rememberMe', [
        'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
    ])->checkbox() ?>

    <div class="forgot">
        <a class="forgot" href="<?=Url::toRoute(['/forgot']); ?>">Forgot your Password?</a>
    </div>
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
    </div>


    <?php ActiveForm::end(); ?>


</div>
    <div class="col-lg-3">
        <h1>Reports</h1>

        <p>Click here if you need to preview reports:</p>

        <a class="btn btn-primary" href="http://cabinet.supermarketers.com/" target="_blank">Reports panel</a>


    </div>

</div>