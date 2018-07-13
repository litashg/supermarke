<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\components\AdminMenu;
use yii\widgets\ActiveForm;
use yii\grid\CheckboxColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = ['label' => 'Admin panel','url' => ['//category/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">
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

            <?= AdminMenu::widget(['params' => array("action"=>"wine")]) ?>

        </div>
        <div class="col-md-10">

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
            <p>
                <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
            </p>

<!--            ADD DELETE CHECKBOX-->
            <?php $form = ActiveForm::begin([
                'id' => 'ride-form',
                'enableClientValidation'=>false,
                'validateOnSubmit' => true, // this is redundant because it's true by default
            ]); ?>
            <!--            ADD DELETE CHECKBOX-->

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                   // 'id',
                    'name',
                    'short_desc:ntext',
                    //'link',
                    // 'full_desc:ntext',

// <!--            ADD DELETE CHECKBOX-->
                    array(
                        'header' => Html::checkBox('selection_all', false, [
                            'class' => 'select-on-check-all',
                            // 'label' => 'All',
                        ]),
                        'class'=>new CheckboxColumn,
                    ),
// <!--            ADD DELETE CHECKBOX-->
                    [
                        'attribute' => 'cat_img',
                        'format' => 'html',
                        'value' => function($data) {  if((isset($data->cat_img))&&($data->cat_img!="")) return Html::img(Yii::$app->request->BaseUrl.'/uploads/'.$data->cat_img, ['width'=>'100']); else return Html::img(  Yii::$app->request->BaseUrl.'/uploads/def.jpg', ['width'=>'100']);}
                    ],
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>

<!--            <!--            ADD DELETE CHECKBOX-->
            <div class="row buttons">
                <?php echo Html::SubmitButton('Delete selected item(s)',array('class' => 'btn btn-danger')); ?>
            </div>
<!---->
            <?php ActiveForm::end(); ?>
<!---->
<!--            <!--            ADD DELETE CHECKBOX-->
        </div>
    </div>
</div>
</div>



