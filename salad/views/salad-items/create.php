<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SaladItems */

$this->title = 'Create Salad Items';
$this->params['breadcrumbs'][] = ['label' => 'Salad Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
<div class="salad-items-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
    </div>
