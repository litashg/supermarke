<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ReportType */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Report Type',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Report Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
