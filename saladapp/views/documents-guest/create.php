<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DocumentsGuest */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Documents Guest',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Documents Guests'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="documents-guest-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
