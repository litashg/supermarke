<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PhotoPath */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Photo Path',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Photo Paths'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="photo-path-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
