<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
$this->title = 'New password';
$this->params['breadcrumbs'][] = $this->title;


?>
<?php $form = ActiveForm::begin(); ?>

<div class="container">
    <hr/>
    <div class="row">
        <div class="col-sm-5">
            <?= $form->field($model, 'new_pass')->label('Enter new password') ?>

        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Send', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
    <hr/>
</div>
