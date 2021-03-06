<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\StorePlanogram */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Store Planogram',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Store Planograms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>





<div class="store-planogram-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
