<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\User;
use app\components\AdminMenu;
use yii\widgets\ActiveForm;
use yii\grid\CheckboxColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSaladSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Salads';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
<div class="user-salad-index">
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

<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User Salad', ['create'], ['class' => 'btn btn-success']) ?>
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

            //'id',
            'name',
           // 'img',
            //'ingred',
           // 'email:email',
            'uniq_id',
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
                'attribute' => 'rname',
               // 'value' => 'rname.name'
                'value' => function ($searchModel) {
                    if($searchModel['rname']==NULL){
                    return 'anonymous';}else{
                        return $searchModel['rname']['name'];
                    }
                },

            ],
//            [
//                'attribute' => 'user_name',
//                'format' => 'raw',
//                'value' => function ($model) {
//
//                    if ($model->user_id == 0){
//
//                        $user = User::find($model->user_id)->one();
//
//                        return
//                            '<div>'.$user->name.'</div>';
//                    }
//                    else{
//                        return
//                            '<div>'.$model->user_name.'</div>';
//                    }
//
//
//                },
//            ],
             'created',
            // 'user_id',

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
