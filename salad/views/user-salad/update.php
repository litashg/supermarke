<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserSalad */

$this->title = 'Update User Salad: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'User Salads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="container">
<div class="user-salad-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
    </div>
