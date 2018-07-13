<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\components\AdminMenu;
use yii\widgets\ActiveForm;
use yii\grid\CheckboxColumn;
use \app\models\Category;
use kartik\file\FileInput;
use yii\helpers\Url;
use kartik\select2\Select2;
use yii\web\JsExpression;
use yii\base\View;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Main slider';
$this->params['breadcrumbs'][] = ['label' => 'Admin panel', 'url' => ['//category/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="push-down-30">
                <div class="banners--big">
                    <strong> <?= Html::encode($this->title) ?></strong>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-2">

            <?= AdminMenu::widget(['params' => array("action" => "wine")]) ?>

        </div>
        <div class="col-md-10">
            <?php $form = ActiveForm::begin([
                'options' => ['enctype' => 'multipart/form-data'] // important
            ]); ?>

            <?php
            echo '<label class="control-label">Main slider images</label>';
            echo FileInput::widget([
                'model' => $model,
                'attribute' => 'images[]',
                'options' => ['multiple' => true
                    , 'accept' => 'image/*'],
                'pluginOptions' => ['allowedFileExtensions' => ['jpg', 'gif', 'png'], 'showUpload' => false,]
            ]);
            ?>

            <div class="row">
                <?
                $count = count($images);
                $i = 0;
                $column = 0;
                foreach ($images as $img) {
                    ?>
                    <div class='col-xs-6 col-sm-6 col-md-3 js--isotope-target js--cat-1'>
                        <div class="products__single">
                            <figure class="products__image my_img">
                                <a href="
            <?php echo Url::toRoute(['admin/image-delete', 'id' => $img->id]); ?>
                       " data-method="post">
                                    <img alt="#" class="products__image my_img" width="263" height="334" src="
                            <?php echo Yii::$app->request->BaseUrl ?>/uploads/main_slider/<?= $img->image ?>">
                                </a>

                                <div class="product-overlay">
                                    <a data-method="post" class="product-overlay__more"
                                       href="<?php echo Url::toRoute(['admin/image-delete', 'id' => $img->id]); ?>">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </a>
                                    <a class="link_img" data-method="post"
                                       href="<?php echo Url::toRoute(['admin/image-delete', 'id' => $img->id]); ?>">
                                        <img alt="#" class="img_span" width="263" height="334" src="
                                <?php echo Yii::$app->request->BaseUrl ?>/uploads/main_slider/<?= $img->image ?>"></a>
                                </div>
                            </figure>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <h5 class="products__title">

                                        <a href="
            <?php echo Url::toRoute(['admin/image-delete', 'id' => $img->id]); ?>
            " class="products__link  js--isotope-title" data-method="post"></a>
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

                    if ((++$i === $count && $column !== 4) || ($column == 4)) {

                        // echo "</div>";

                        $column = 0;
                    }

                }?>


            </div>
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Save' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end(); ?>


        </div>
    </div>
</div>

<br/>
<br/>
<br/>