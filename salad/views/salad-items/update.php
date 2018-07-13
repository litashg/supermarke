<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SaladItems */

$this->title = 'Update Salad Items: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Salad Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="salad-items-update">
    <div class="container">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
    </div>
