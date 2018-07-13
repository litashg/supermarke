<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model app\models\ContactForm */

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-contact">
    <div class="container">
        <h1><?= Html::encode($this->title) ?></h1>

        <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

            <div class="alert alert-success">
                Thank you for contacting us. We will respond to you as soon as possible.
            </div>

            <!--    <p>-->
            <!--        Note that if you turn on the Yii debugger, you should be able-->
            <!--        to view the mail message on the mail panel of the debugger.-->
            <!--        --><?php //if (Yii::$app->mailer->useFileTransport): ?>
            <!--        Because the application is in development mode, the email is not sent but saved as-->
            <!--        a file under <code>--><? //= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?><!--</code>.-->
            <!--        Please configure the <code>useFileTransport</code> property of the <code>mail</code>-->
            <!--        application component to be false to enable email sending.-->
            <!--        --><?php //endif; ?>
            <!--    </p>-->

        <?php else: ?>

            <p>
                If you have business inquiries or other questions, please fill out the following form to contact us.
                Thank you.
            </p>

            <div class="row">
                <div class="col-lg-5">
                    <?php $form = ActiveForm::begin(['id' => 'contact-form', 'action' => ['site/contact'],]); ?>
                    <?= $form->field($model, 'name') ?>
                    <?= $form->field($model, 'email') ?>
                    <?= $form->field($model, 'phone') ?>
                    <?= $form->field($model, 'body')->textArea(['rows' => 6])->label('Message') ?>
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
<!--    <div class="container smaller">-->
<!--        <div class="widgets__heading--line">-->
<!--            <h4 class="widgets__heading">FAQ</h4>-->
<!--        </div>-->
<!---->
<!--        <!--4 category-->-->
<!--        <div>-->
<!--            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ultricies porttitor placerat. Cras id-->
<!--            ipsum volutpat, dapibus libero quis, tincidunt dolor. Phasellus ultricies, nulla et pellentesque aliquam,-->
<!--            diam odio vehicula libero, rutrum vulputate massa enim nec augue. Duis at tortor at metus iaculis tincidunt-->
<!--            sed nec urna. Aliquam sed leo quis diam tristique laoreet. Nam bibendum lectus vitae quam egestas, sit amet-->
<!--            porta elit efficitur. Suspendisse tempor turpis pulvinar, laoreet est bibendum, interdum elit.-->
<!---->
<!--            Duis sed ante eu arcu porttitor euismod. Nullam in faucibus ex, at fringilla nisi. Morbi eleifend, magna ac-->
<!--            pellentesque viverra, justo dolor posuere nisi, sed aliquet ante ipsum et nibh. Nulla at turpis nec dui-->
<!--            rutrum scelerisque. Morbi turpis libero, imperdiet gravida porta id, placerat eget leo. Duis condimentum-->
<!--            risus orci, sed vestibulum est gravida eu. Suspendisse potenti. Fusce non dictum risus. Aenean nibh eros,-->
<!--            ultricies et dignissim eget, tristique in dolor. In vitae auctor metus, et sollicitudin justo. Praesent a-->
<!--            lorem arcu. Aliquam lorem arcu, ultrices nec fringilla a, ullamcorper eu augue. Proin tempor nisl vitae-->
<!--            nulla ultrices feugiat. Aliquam tristique posuere sagittis. Sed ut massa id ligula dapibus tristique id et-->
<!--            metus. Duis rhoncus ornare enim, at porttitor odio consectetur non.-->
<!--        </div>-->
<!--        <br>-->
<!--        <br>-->
<!--    </div>-->
</div>