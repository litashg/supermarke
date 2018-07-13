<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ReportOptionType */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Report Option Type',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Report Option Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-option-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
