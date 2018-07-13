<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
//use dosamigos\multiselect\MultiSelect;
use \kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\UserSalad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-salad-form">

    <?php $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data'] // important
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

<!--    --><?//= $form->field($model, 'img')->textInput(['maxlength' => 255]) ?>

    <?php if(!$model->isNewRecord){
        echo  '<div class="img_cont">';
        echo  '<img alt="#" class="main_img" width="100" height="100" src="';
        echo Yii::$app->request->BaseUrl.'/uploads/user_salad/'.$model->img;
        echo '"></div> <br/> <br/>';

    }

    ?>
    <?
    // your fileinput widget for single file upload
    echo $form->field($model, 'img')->widget(FileInput::classname(), [
        'options'=>[
            'accept'=>'image/*',
        ],

        'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png'], 'showUpload'=> false, ]]);
    ?>

    <?= $form->field($model, 'ingred')->textInput(['maxlength' => 255]) ?>

<!--    --><?//= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>
<!---->
<!--    --><?//= $form->field($model, 'user_name')->textInput(['maxlength' => 255]) ?>
    <?= $form->field($model, 'uniq_id')->textInput() ?>
    <?= $form->field($model, 'created')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?php
//    echo MultiSelect::widget([
//        //'id'=>"multiXX",
//        "options" => ['multiple'=>"multiple"], // for the actual multiselect
//        'data' => \app\models\Allergens::find()->select('id','name')->asArray()->all(), // data as array
//       // 'value' => $model->allergens, // if preselected
//        'name' => 'multti', // name for the form
//        "clientOptions" =>
//            [
//               // "includeSelectAllOption" => true,
//                //'numberDisplayed' => 2
//            ],
//    ]);
//    echo Select2::widget([
//        'model' => $model,
//        'attribute' => 'allergens[]',
//
//        'data'=>\app\models\Allergens::find()->select(id,name)->asArray()->all(),
//        'options' => ['placeholder' => 'Select a allergens...'],
//        'pluginOptions' => [
//           // 'tags' => ,
//          //  'maximumInputLength' => 10
//            'multiple' => true,
//
//        ],
//    ]);
//    echo $form->field($model, 'allergens')->widget(Select2::classname(), [
//        'data' => array_merge(["" => ""], \app\models\Allergens::find()->select(id,name)->asArray()->all()),
//        'language' => 'de',
//        'options' => ['placeholder' => 'Select a state ...'],
//        'pluginOptions' => [
//            'allowClear' => true,
//            'multiple' => true,
//            'hideSearch' => true,
//
//        ],
//    ]);

//    echo $form->field($model, 'allergens')->widget(Select2::classname(), [
//        'data' => array_merge(["" => ""], \app\models\Allergens::find()->select(id,name)->asArray()->all()),
//        'options' => ['placeholder' => 'Select a state ...'],
//        'pluginOptions' => [
//           // 'allowClear' => true,
//            'multiple' => true,
//            'hideSearch' => true,
//        ],
//    ]);

//   echo  $form->field($model, 'allergens')->widget(Select2::classname(), [
////        'data'=> \app\models\Allergens::find()->select(name)->asArray()->all(),
//       'data' => array_merge(["" => ""], \app\models\Allergens::find()->select(id,name)->asArray()->all()),
//       'options' => [
//            'multiple' => true,
//            'hideSearch' => true,
//        ]
//    ])
//    echo $form->field($model, 'allergens')->widget(Select2::classname(), [
//       // 'data' => array_merge(["" => ""], \app\models\Allergens::find()->select(id,name)->asArray()->all()),
//        'data'=> \yii\helpers\ArrayHelper::map(\app\models\Allergens::find()->all(), 'id', 'name'),
//        'options' => [
//            'multiple' => true,
//            ],
//        'pluginOptions'=>[
//                'tags' => $model->getAllergens(),
//               // 'data'=>$model->allergens,
//    ]
//    ]);

    ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
