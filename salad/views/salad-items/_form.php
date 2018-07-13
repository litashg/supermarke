<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use \app\models\SaladItems;
use yii\helpers\ArrayHelper;
use \app\models\Allergens;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\SaladItems */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="container">
<div class="salad-items-form">

    <?php $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'parent_id')->label('Category name')->dropDownList(ArrayHelper::map(SaladItems::find()->all(), 'id', 'name')) ?>
    <?=$form->field($model, 'visible')->checkBox([
        'uncheck' => '0', 'checked' => '1'])
    ?>
    <!--    TREE-->
    <div id="jstree_demo_div">
        <ul>
            <li id="0">No parent

                <?
                $datas = SaladItems::find()->all();
                function generatePageTree($datas, $parent = 0, $limit=0){
                    if($limit > 1000) return ''; // Make sure not to have an endless recursion
                    $tree = '<ul>';
                    for($i=0, $ni=count($datas); $i < $ni; $i++){
                        if($datas[$i]->parent_id == $parent){
                            $tree .= '<li id="'.$datas[$i]->id.'">';
                            $tree .= $datas[$i]->name;
                            $tree .= generatePageTree($datas, $datas[$i]->id, $limit++);
                            $tree .= '</li>';
                        }
                    }
                    $tree .= '</ul>';
                    return $tree;
                }
                echo(generatePageTree($datas));
                ?>
            </li>
        </ul>
    </div>

    <!--    TREE-->

    <?= $form->field($model, 'full_desc')->textarea(['rows' => 6]) ?>

    <?php if(!$model->isNewRecord){
        echo  '<div class="img_cont">';
        echo  '<img alt="#" class="main_img" width="100" height="100" src="';
        echo Yii::$app->request->BaseUrl.'/uploads/'.$model->image;
        echo '"></div>';
    }

    // your fileinput widget for single file upload
    echo $form->field($model, 'image')->label('Main image')->widget(FileInput::classname(), [
        'options'=>[
            'accept'=>'image/*',
        ],

        'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png'], 'showUpload'=> false, ]]);

    ?>

    <?= $form->field($model, 'ingredients')->textarea(['rows' => 6]) ?>

<!--    allergens-->


    <?php
    echo $form->field($model, 'allergens')->widget(Select2::classname(), [
        // 'data' => array_merge(["" => ""], \app\models\Allergens::find()->select(id,name)->asArray()->all()),
        'data'=> \yii\helpers\ArrayHelper::map(\app\models\Allergens::find()->all(), 'id', 'name'),
        'options' => [
            'multiple' => true,
        ],
    ]);
    ?>
<!--    allergens-->

    <!--    TABLE-->



    <div class="col-xs-12 col-sm-12 col-md-4 no_padding">
        <table class="table table-hover my_table">
            <thead>
            <tr>
                <th><span class ="bolder">Nutrition </span></th>

            </tr>
            <tr>
                <th><span class ="bolder"> Facts</span></th>
            </tr>
            </thead>
            <tbody>
            <!--            <tr>-->
            <!--                <td><h1>Nutrition Facts</h1></td>-->
            <!--            </tr>-->
            <tr>
                <td> <span>Serving Size<?= Html::activeTextInput($model, 'c1_container', ['class'=>'form-item req','size'=>10]) ?></span></br>
                (<?= Html::activeTextInput($model, 'c1_size', ['class'=>'form-item req','size'=>3]) ?>g)</td>
            </tr>
<!--            <tr>-->
<!--               -->
<!---->
<!--          /  </tr>-->
            <tr>
                <td > <span>Serving Per Container </span></td>
            </tr>
            <tr>
                <td><span class ="bold">Calories </span><?= Html::activeTextInput($model, 'c1_calories', ['class'=>'form-item req','size'=>3]) ?></td>
            </tr>
            <tr>
                <td class="jump"> <span>Calories from Fat <?= Html::activeTextInput($model, 'c1_calfat', ['class'=>'form-item req','size'=>3]) ?></span></td>
            </tr>
            </tbody>

        </table>

    </div>
    <div class="col-xs-12 col-sm-12 col-md-4 no_padding">

        <table class="table table-hover my_table">
            <thead>
            <tr class="fat">
                <th>Amount / Serving</th>
                <th  class="text-right">% Daily Value*</th>

            </tr>
            </thead>
            <tbody>
            <tr class="line">
                <td><strong>Total fat</strong> <?= Html::activeTextInput($model, 'c2_totfat_1', ['class'=>'form-item req','size'=>3]) ?>g</td>
                <td class="text-right"><strong> <?= Html::activeTextInput($model, 'c2_totfat_2', ['class'=>'form-item req','size'=>3]) ?>%</strong></td>

            </tr>
            <tr class="line ">

                <td class="jump"><span>Saturated Fat  <?= Html::activeTextInput($model, 'c2_satfat_1', ['class'=>'form-item req','size'=>3]) ?>g</span></td>
                <td class="text-right"><strong><?= Html::activeTextInput($model, 'c2_satfat_2', ['class'=>'form-item req','size'=>3]) ?>%</strong></td>

            <tr class="line">

                <td class="jump"><span>Trans Fat <?= Html::activeTextInput($model, 'c2_transfat_1', ['class'=>'form-item req','size'=>3]) ?>g</span></td>

                <td class="text-right"><strong><?= Html::activeTextInput($model, 'c2_transfat_2', ['class'=>'form-item req','size'=>3]) ?>%</strong> </td>
            </tr>
            <tr class="line">
                <td><strong>Cholesterol</strong> <?= Html::activeTextInput($model, 'c2_cholester_1', ['class'=>'form-item req','size'=>3]) ?>mg</td>
                <td class="text-right"><strong><?= Html::activeTextInput($model, 'c2_cholester_2', ['class'=>'form-item req','size'=>3]) ?>%</strong></td>

            </tr>
            <tr class="fat">
                <td><strong>Sodium</strong> <?= Html::activeTextInput($model, 'c2_sod_1', ['class'=>'form-item req','size'=>3]) ?>mg</td>
                <td class="text-right"><strong><?= Html::activeTextInput($model, 'c2_sod_2', ['class'=>'form-item req','size'=>3]) ?>%</strong></td>

            </tr>
            <tr>
                <td class="text-center">Vitamin A <?= Html::activeTextInput($model, 'c2_vit_a', ['class'=>'form-item req','size'=>3]) ?>%</td>
                <td class="text-center">Vitamin C <?= Html::activeTextInput($model, 'c2_vit_c', ['class'=>'form-item req','size'=>3]) ?>%</td>

            </tr>
            </tbody>
        </table>

    </div>
    <div class="col-xs-12 col-sm-12 col-md-4 no_padding">
        <table class="table table-hover my_table">
            <thead>
            <tr class="fat">
                <th>Amount / Serving</th>
                <th class="text-right">% Daily Value*</th>

            </tr>
            </thead>
            <tbody>
            <tr class="line">
                <td><strong>Total Carbohydrate </strong><?= Html::activeTextInput($model, 'c3_totcarb_1', ['class'=>'form-item req','size'=>3]) ?>g</td>
                <td class="text-right"><strong><?= Html::activeTextInput($model, 'c3_totcarb_2', ['class'=>'form-item req','size'=>3]) ?>%</strong></td>

            </tr>
            <tr class="line">
                <td class="jump"><span>Dietary Fiber <?= Html::activeTextInput($model, 'c3_dietfib_1', ['class'=>'form-item req','size'=>3])?>g</span></td>
                <td class="text-right"> <strong><?= Html::activeTextInput($model, 'c3_dietfib_2', ['class'=>'form-item req','size'=>3]) ?>%</strong> </td>

            <tr class="line">
                <td class="jump"><span>Sugars <?= Html::activeTextInput($model, 'c3_sugar_1', ['class'=>'form-item req','size'=>3]) ?>g</span></td>
                <td class="text-right"> </td>
            </tr>
            <tr class="white_brd">
                <td><strong>Protein</strong><?= Html::activeTextInput($model, 'c3_protein_1', ['class'=>'form-item req','size'=>3]) ?>g </td>
                <td></td>

            </tr>
            <tr class="fat lit_down">
                <td>&nbsp</td>
                <td>&nbsp</td>

            </tr>

            <tr >
                <td class="text-center">Calcium <?= Html::activeTextInput($model, 'c3_calcium', ['class'=>'form-item req','size'=>3]) ?>%</td>
                <td class="text-center">Iron <?= Html::activeTextInput($model, 'c3_iron', ['class'=>'form-item req','size'=>3]) ?>%</td>

            </tr>
            </tbody>
        </table>
    </div>


    <br/>
    <br/>


    <!--    TABLE-->
</div>


</div>
    <div class="row">
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end(); ?>
</div>
<?php if($model->isNewRecord || $model->parent_id==0):?>
    <script>
        $("#saladitems-parent_id").prepend("<option value='0' selected='selected'>No parent</option>");
    </script>
<?php else:?>

    <script>
        $("#saladitems-parent_id").prepend("<option value='0' >No parent</option>");
    </script>
<?php endif; ?>