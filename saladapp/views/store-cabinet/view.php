<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use app\components\adminCollapsibleBlock;

/* @var $this yii\web\View */
/* @var $model app\models\StoreCabinet */

$this->title = $model->name;

//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>



<div class=" store-view">

    <h1>
        <?= Html::encode($this->title) ?>
    </h1>

    <p style="margin-top: -46px;float: right;">
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>



    <?php adminCollapsibleBlock::begin([

        'color' => 'grey',
        'btn_type' => 'info',
        'icon' => 'fa-info-circle',
        'title' => "Detail info",


    ]);
    ?>

    <?= DetailView::widget([

        'model' => $model,
        'attributes' => [

            'description:ntext',
            'phone',
            'email:email',
            'address',

        ],
    ]) ?>

    <?php adminCollapsibleBlock::end(); ?>

    <h1 style="clear: left;color:black;">
        Reports
    </h1>
    <? if($reports){ ?>
<div style="width:100%;height:170px;overflow: scroll;">

    <table class="table table-striped table-bordered table-hover table-condensed">

        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Full</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($reports as $report){ ?>
                <tr>
                    <td><?= $report['id'];?></td>
                    <td><?= $report['creation_date'];?></td>
                    <td><?= Html::a(Html::tag('div',
                        Html::tag('i', '', ['class' => 'fa fa-external-link fa-fw']) . ' View full'),
                            Url::to(['/report-cabinet/view', 'id' => $report['id']]),
                                [
                                    'title'=>'Click me!',
                                    'target'=>'_blank'
                                ]); ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>

    </table>
</div>
    <? }else{ ?>
        <h1 style="color:black;">
            Reports are not loaded.
        </h1>
    <? } ?>


    <? if($planograms){ ?>
        <h1 style="color:black;">
            Planogramm
        </h1>
    <div style="width:100%;height:180px;overflow: scroll;">

        <table class="table table-striped table-bordered table-hover table-condensed">

            <thead>
                <tr>
                    <th>file name</th>
                    <th>description</th>
                    <th>download</th>
                    <th>view</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($planograms as $planogram){ ?>
                    <tr>
                        <td><?= $planogram['title'];?></td>
                        <td><?= $planogram['description'];?></td>


                        <td><?= Html::a(Html::tag('div',
                                Html::tag('i', '', ['class' => 'fa fa-download fa-fw ']) . '  Download planogramm'),
                                Url::toRoute(["store-cabinet/pdf-download", 'pdf_path' => $planogram['path']]),
                                [
                                    'title'=>'Download me!',

                                ]);
                            ?>
                        </td>
                        <td><?= Html::a(Html::tag('div',
                                Html::tag('i', '', ['class' => 'fa fa-eye fa-fw ']) . ' View planogramm'),
                                Url::to('/pdf/'.$planogram['path']),
                                [
                                    'title'=>'Read me online!',
                                    'target'=>'_blank'
                                ]);
                            ?>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
    <? }else{ ?>
        <h1 style="color:black;">
            Planograms are not loaded.
        </h1>
    <? } ?>
</div>
