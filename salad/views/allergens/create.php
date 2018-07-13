<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Allergens */

$this->title = 'Create Allergens';
$this->params['breadcrumbs'][] = ['label' => 'Allergens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
<div class="allergens-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>