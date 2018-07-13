<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model app\models\ContactForm */

$this->title = 'Careers';
$this->params['breadcrumbs'][] = $this->title;
//error_reporting(E_ALL);
?>
<div class="site-contact">
    <div class="container">
        <h1><?= Html::encode($this->title) ?></h1>

        <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

            <div class="alert alert-success">
                Thank you for contacting us. We will respond to you as soon as possible.
            </div>


        <?php else: ?>

            <p>
                Please use the form below to inquire about available career opportunities with Isabelle&#39;s Kitchen, Inc. and T.J. Pupillo, Inc.
            </p>

            <div class="row">
                <div class="col-lg-5">
                    <?php $form = ActiveForm::begin(['id' => 'career-form','action' => ['site/careers']]); ?>
                    <?= $form->field($model, 'name')->label('Your name') ?>
                    <?= $form->field($model, 'email')->label('E-mail') ?>
                    <?= $form->field($model, 'phone')->label('Phone number') ?>
                    <?= $form->field($model, 'message')->textArea(['rows' => '6'])->label('Message') ?>
                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>
                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>

        <?php endif; ?>
    </div>
</div>