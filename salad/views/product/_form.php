<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use \app\models\Category;
use kartik\file\FileInput;
use yii\helpers\Url;
use kartik\select2\Select2;
use yii\web\JsExpression;
use yii\base\View;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin([
        'options'=>['enctype'=>'multipart/form-data'] // important
    ]); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => 255]) ?>
<!--    --><?//= $form->field($model, 'alias')->textInput(['maxlength' => 255]) ?>

<!--    --><?//= $form->field($model, 'cat_id')->label('Category name')->dropDownList(ArrayHelper::map(Category::find()->all(), 'id', 'name')) ?>

<?=$form->field($model, 'visible')->checkBox([
    'uncheck' => '0', 'checked' => '1'])
?>

    <?=$form->field($model, 'is_featured')->checkBox([
        'uncheck' => '0', 'checked' => '1'])
    ?>
<!--    --><?php
//    $url = \Yii::$app->urlManager->baseUrl . '/images/flags/';
//    $format = <<< SCRIPT
//function format(state) {
//if (!state.id) return state.text; // optgroup
//src = '$url' + state.id.toLowerCase() + '.png'
//return '<img class="flag" src="' + src + '"/>' + state.text;
//}
//SCRIPT;
//    $escape = new JsExpression("function(m) { return m; }");
//    $this->registerJs($format,View::EVENT_BEGIN_PAGE);
//    echo '<label class="control-label">Provinces</label>';
//    echo Select2::widget([
//        'model'=>$model,
//        'attribute' => 'categories',
//        'data' =>   \yii\helpers\ArrayHelper::map(\app\models\Category::find()->all(), 'id', 'name'),
//        'options' => ['placeholder' => 'Select a state ...'],
//        'pluginOptions' => [
//            'formatResult' => new JsExpression('format'),
//            'formatSelection' => new JsExpression('format'),
//            'escapeMarkup' => $escape,
//            'allowClear' => true
//        ],
//    ]);
//    ?>





    <?php
    $level = array();
    $cats = \app\models\Category::find()->select(['id','name','parent_id'])->asArray()->all();
    foreach ($cats as $cat){
        if($cat['parent_id']!=='0') {
            if(!array_key_exists($cat['id'],$level)){
            $level[$cat['id']] = '<strong>'.$cat['name'].'</strong>';
            foreach ($cats as $cat_maybe){
                if($cat_maybe['parent_id']==$cat['id']){
                    $level[$cat_maybe['id']] = '&nbsp;&nbsp;&nbsp;&nbsp;'.$cat_maybe['name'];
                    foreach ($cats as $cat_maybe_next){
                        if($cat_maybe_next['parent_id']==$cat_maybe['id']) {
                            $level[$cat_maybe_next['id']] = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$cat_maybe_next['name'];
                        }
                    }

                }

            }
        }
        }
    }



  //  var_dump($level);
  //  die;

    $escape = new JsExpression("function(m) { return m; }");
    echo $form->field($model, 'categories')->widget(Select2::classname(), [
        // 'data' => array_merge(["" => ""], \app\models\Allergens::find()->select(id,name)->asArray()->all()),
        //'data'=> \yii\helpers\ArrayHelper::map(\app\models\Category::find()->all(), 'id', 'name'),
        'data'=> $level,

        'options' => [
            'multiple' => true,
            'required'=> true,
        ],
        'pluginOptions' => [
            'escapeMarkup' => $escape,
        ],

    ]);
    ?>
    <!--    TREE-->
<!--    <div id="jstree_demo_div">-->
<!--        <ul>-->
<!--            <li id="0">No parent-->
<!---->
<!--                --><?//
//                $datas = Category::find()->all();
//                function generatePageTree($datas, $parent = 0, $limit=0){
//                    if($limit > 1000) return ''; // Make sure not to have an endless recursion
//                    $tree = '<ul>';
//                    for($i=0, $ni=count($datas); $i < $ni; $i++){
//                        if($datas[$i]->parent_id == $parent){
//                            $tree .= '<li  id="'.$datas[$i]->id.'">';
//                            $tree .= $datas[$i]->name;
//                            $tree .= generatePageTree($datas, $datas[$i]->id, $limit++);
//                            $tree .= '</li>';
//                        }
//                    }
//                    $tree .= '</ul>';
//                    return $tree;
//                }
//                echo(generatePageTree($datas));
//                ?>
<!--            </li>-->
<!--        </ul>-->
<!--    </div>-->

    <!--    TREE-->

    <?= $form->field($model, 'desc_title')->label('Short description')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'full_desc')->label('Full description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ingredients')->label('Ingredients')->textarea(['rows' => 6]) ?>
<!--    TABLE-->
<h3>Specifications</h3>


    <?= $form->field($model, 'shelf_life')->textInput(['maxlength' => 255]) ?>
    <?= $form->field($model, 'standard_item_number')->textInput(['maxlength' => 255]) ?>
    <?= $form->field($model, 'standard_pack_size')->textInput(['maxlength' => 255]) ?>
    <?= $form->field($model, 'case_dimensions')->textInput(['maxlength' => 255]) ?>
<!--    --><?//= $form->field($model, 'gross_weight')->textInput(['maxlength' => 255]) ?>
    <?= $form->field($model, 'ti_hi')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'pack_size')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'item_number')->textInput(['maxlength' => 255]) ?>

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
<!--                    <tr>-->
<!--                        <td> <span>Serving Size(--><?//= Html::activeTextInput($model, 'c1_size', ['class'=>'form-item req','size'=>3]) ?><!--%)</span></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td > <span>Serving Per Container --><?//= Html::activeTextInput($model, 'c1_container', ['class'=>'form-item req','size'=>3]) ?><!--</span></td>-->
<!--                    </tr>-->
                    <tr>
                        <td> <span>Serving Size<?= Html::activeTextInput($model, 'c1_container', ['class'=>'form-item req','size'=>10]) ?></span>
                            (<?= Html::activeTextInput($model, 'c1_size', ['class'=>'form-item req','size'=>3]) ?>g)</td>
                    </tr>
                    <!--            <tr>-->
                    <!--               -->
                    <!---->
                    <!--          /  </tr>-->
                    <tr>
<!--                        <td > <span>Serving Per Container </span></td>-->
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
                        <td><strong>Total Fat</strong> <?= Html::activeTextInput($model, 'c2_totfat_1', ['class'=>'form-item req','size'=>3]) ?>g</td>
                        <td class="text-right"><strong> <?= Html::activeTextInput($model, 'c2_totfat_2', ['class'=>'form-item req','size'=>3]) ?>%</strong></td>

                    </tr>
                    <tr class="line ">

                        <td class="jump"><span>Saturated Fat  <?= Html::activeTextInput($model, 'c2_satfat_1', ['class'=>'form-item req','size'=>3]) ?>g</span></td>
                        <td class="text-right"><strong><?= Html::activeTextInput($model, 'c2_satfat_2', ['class'=>'form-item req','size'=>3]) ?>%</strong></td>

                    <tr class="line">

                        <td class="jump"><span>Trans Fat <?= Html::activeTextInput($model, 'c2_transfat_1', ['class'=>'form-item req','size'=>3]) ?>g</span></td>

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


    <?php
    echo $form->field($model, 'allergens')->widget(Select2::classname(), [
        // 'data' => array_merge(["" => ""], \app\models\Allergens::find()->select(id,name)->asArray()->all()),
        'data'=> \yii\helpers\ArrayHelper::map(\app\models\Allergens::find()->all(), 'id', 'name'),
        'options' => [
            'multiple' => true,
        ],
    ]);
    ?>

<!--    --><?php
//    echo $form->field($model, 'rel_prod')->widget(Select2::classname(), [
//
////        'data'=> \yii\helpers\ArrayHelper::map(\app\models\Product::find()->all(), 'id', 'name'),
//        'data'=> \yii\helpers\ArrayHelper::map(\app\models\Product::find()->andWhere('id <> :id',[':id' => $model->id])->all(), 'id', 'name'),
//        'options' => [
//            'multiple' => true,
//        ],
//    ]);
//    ?>
    <?php if(!$model->isNewRecord){

        echo $form->field($model, 'rel_prod')->widget(Select2::classname(), [

//        'data'=> \yii\helpers\ArrayHelper::map(\app\models\Product::find()->all(), 'id', 'name'),
            'data'=> \yii\helpers\ArrayHelper::map(\app\models\Product::find()->andWhere('id <> :id',[':id' => $model->id])->all(), 'id', 'name'),
            'options' => [
                'multiple' => true,
            ],
        ])->label('Related Products');

    }else{

        echo $form->field($model, 'rel_prod')->widget(Select2::classname(), [

//        'data'=> \yii\helpers\ArrayHelper::map(\app\models\Product::find()->all(), 'id', 'name'),
            'data'=> \yii\helpers\ArrayHelper::map(\app\models\Product::find()->all(), 'id', 'name'),
            'options' => [
                'multiple' => true,
            ],
        ])->label('Related Products');


    }

    ?>


    <!--    TABLE-->

    <?php if(!$model->isNewRecord){
    echo  '<div class="img_cont">';
    echo  '<img alt="#" class="main_img" width="100" height="100" src="';
    echo Yii::$app->request->BaseUrl.'/uploads/'.$model->prod_img;
    echo '"></div>';
    }

    ?>

    <!--    allergens-->




    <?

    // your fileinput widget for single file upload
    echo $form->field($model, 'image')->label('Main image')->widget(FileInput::classname(), [
        'options'=>[
            'accept'=>'image/*',
        ],

        'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png'], 'showUpload'=> false, ]]);

    ?>
    <?php
    echo '<label class="control-label">More images</label>';
    echo FileInput::widget([
        'model' => $model,
        'attribute' => 'images[]',
        'options' => ['multiple' => true
        , 'accept'=>'image/*'],
        'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png'], 'showUpload'=> false, ]
    ]);
    ?>
    <?php  if(!$model->isNewRecord){ ?>

            <div class="col-xs-12  col-sm-12 col-md-12">
                <?
                $count = count($images);
                $i = 0;
                $column = 0;
                foreach($images as $img){

                    $img_m_path = "def.jpg";
                    if ((isset($model->cat_img))  && ($model->cat_img!="") ){

//            AHTUNG! UNCOMMENT THIS LINE!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//            $img_m_path = $model->cat_img;
                    }
                    ?>
                    <div class='col-xs-6 col-sm-6 col-md-3 js--isotope-target js--cat-1'>
                        <div class="products__single">
                            <figure class="products__image my_img">
                                <a href="
            <?php echo  Url::toRoute(['images/delete', 'id' => $img->attributes['id'],'prod_id' => $img->attributes['prod_id'],'prod_name' => $img->attributes['name']]);?>
                       " data-method="post" >
                                    <img alt="#" class="products__image my_img" width="263" height="334" src="
                            <?php echo Yii::$app->request->BaseUrl?>/uploads/<?=$img->attributes['name']?>">
                                </a>

                                <div class="product-overlay">
                                    <a  data-method="post" class="product-overlay__more" href="<?php echo  Url::toRoute(['images/delete', 'id' => $img->attributes['id'],'prod_id' => $img->attributes['prod_id'],'prod_name' => $img->attributes['name']]);?>">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </a>
                                    <a class="link_img" data-method="post" href="<?php echo  Url::toRoute(['images/delete', 'id' => $img->attributes['id'],'prod_id' => $img->attributes['prod_id'],'prod_name' => $img->attributes['name']]);?>">
                                        <img alt="#" class="img_span" width="263" height="334" src="
                                <?php echo Yii::$app->request->BaseUrl?>/uploads/<?=$img->attributes['name']?>"></a>
                                </div>
                            </figure>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <h5 class="products__title">

                                        <a href="
            <?php echo  Url::toRoute(['images/delete', 'id' => $img->attributes['id'],'prod_id' => $img->attributes['prod_id'],'prod_name' => $img->attributes['name']]);?>
            " class="products__link  js--isotope-title" data-method="post" ></a>
                                    </h5>
                                </div>

                            </div>
                            <div class="products__category">
                                <?
                                //                        =
                                //                        $model->name
                                ?>
                            </div>
                        </div>
                    </div>
                    <?
                    $column = $column + 1;

                    if((++$i === $count && $column !== 4) || ($column == 4)) {

                        echo "</div>";

                        $column = 0;
                    }

                }?>

                <?}
                ?>
            </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>







