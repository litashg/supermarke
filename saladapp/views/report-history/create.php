<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ReportHistory */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Report History',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Report Histories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-history-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
