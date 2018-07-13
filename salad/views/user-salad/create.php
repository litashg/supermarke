<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UserSalad */

$this->title = 'Create User Salad';
$this->params['breadcrumbs'][] = ['label' => 'User Salads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
<div class="user-salad-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
</div>