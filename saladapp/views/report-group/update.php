<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ReportGroup */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Report Group',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Report Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="report-group-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
