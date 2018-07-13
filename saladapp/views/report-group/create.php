<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ReportGroup */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Report Group',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Report Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-group-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
