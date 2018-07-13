<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Report */

//$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Reports'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="report-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <h3><?php echo $type->description;?></h3>




<?php //print_r($typename->username); ?>
<?php //print_r($user); ?>
<?php //print_r($store->description); ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'userinfo.username',
            'comment:ntext',
            'statusinfo.description',
            'creation_date',
            'transaction',
        ],
    ]) ?>


</div>
