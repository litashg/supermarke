<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ReportTypeOption */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Report Type Option',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Report Type Options'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-type-option-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
