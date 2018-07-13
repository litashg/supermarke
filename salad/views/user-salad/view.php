<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\models\UserSalad */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'User Salads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
<div class="user-salad-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          //  'id',
            'name',

           // 'img',
          //  'ingred',
           // 'email:email',
           // 'user_name',
//[
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
            'uniq_id',
          //  'user_id',
        ],
    ]) ?>

</div>
    </div>
