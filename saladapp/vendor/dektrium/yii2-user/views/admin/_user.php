<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

/**
 * @var yii\widgets\ActiveForm    $form
 * @var dektrium\user\models\User $user
 */

?>

<?= $form->field($user, 'username')->textInput(['maxlength' => 25]) ?>
<?= $form->field($user, 'email')->textInput(['maxlength' => 255]) ?>
<?= $form->field($user, 'password')->passwordInput() ?>
<?//= $form->field($user, 'role')->textInput(['maxlength' => 1])?>
<?= $form->field($user, 'role')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Role::find()->all(), 'id', 'name')) ?>

<?//= $form->field($user, 'store_id')->textInput()?>
<?= $form->field($user, 'company_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Company::find()->all(),'id','name'),[
    'prompt'=>'Select Company',
    'onchange'=>'
            $.post("'.$cur_lang.'/documents/list?id='.'"+$(this).val(),function(data) {
                $("select#user-store_id").html(data);
                $(".field-documents-store_id").show();
            });'

])->label('Company'); ?>

<?= $form->field($user, 'store_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Store::find()->all(),'id','name'),[
    'prompt'=>'Select Store',

])->label('Store'); ?>

<?//= $form->field($user, 'company_id')->textInput()?>





<?//= $form->field($user, 'role')
//    ->dropDownList(
//       \yii\helpers\ArrayHelper::map(\app\models\Role::find()->all(),'id','name')
//
//
//    );?>
