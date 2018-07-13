<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\FileCategory */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'File Category',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'File Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="file-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
