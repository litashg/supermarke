<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\components\AdminMenu;
use yii\widgets\ActiveForm;
use yii\grid\CheckboxColumn;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SaladItemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Salad Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salad-items-index">
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
        <?= Html::a('Create Salad Items', ['create'], ['class' => 'btn btn-success']) ?>
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

            'id',
            'name',
           // 'parent_id',
            //'full_desc:ntext',
            //'image',
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
                'attribute' => 'image',
                'format' => 'html',
                'value' => function($data) {  if((isset($data->image))&&($data->image!="")) return Html::img(Yii::$app->request->BaseUrl.'/uploads/'.$data->image, ['width'=>'100']); else return Html::img(Yii::$app->request->BaseUrl.'/uploads/product.jpg', ['width'=>'100']);}

            ],
            // 'ingredients',
            // 'c1_size',
            // 'c1_container',
            // 'c1_calories',
            // 'c1_calfat',
            // 'c2_totfat_1',
            // 'c2_totfat_2',
            // 'c2_satfat_1',
            // 'c2_satfat_2',
            // 'c2_transfat_1',
            // 'c2_transfat_2',
            // 'c2_cholester_1',
            // 'c2_cholester_2',
            // 'c2_sod_1',
            // 'c2_sod_2',
            // 'c3_totcarb_1',
            // 'c3_totcarb_2',
            // 'c3_dietfib_1',
            // 'c3_dietfib_2',
            // 'c3_sugar_1',
            // 'c3_sugar_2',
            // 'c3_protein_1',
            // 'c3_protein_2',
            // 'c3_calcium',
            // 'c3_iron',
            // 'c2_vit_a',
            // 'c2_vit_c',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

                <!--            ADD DELETE CHECKBOX-->
                <div class="row buttons">
                    <?php echo Html::submitButton('Delete selected item(s)',array('class' => 'btn btn-danger')); ?>
                </div>

                <?php ActiveForm::end(); ?>

                <!--            ADD DELETE CHECKBOX-->
                </div>
            </div>
</div>
</div>