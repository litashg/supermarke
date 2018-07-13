<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ReportTemplate */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Report Template',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Report Templates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-template-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
