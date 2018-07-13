<?php
use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use app\components\adminCollapsibleBlock;
?>
<?php $this->title = $document_category->name?>

    <div class="row ">

        <?  if($documents){ ?>
            <h1 style="color:black;">
                <?=$document_category->name;?>
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
                    <?php foreach($documents as $planogram){ ?>

                        <tr>
                            <td><?= $planogram['title'];?></td>
                            <td><?= $planogram['desc'];?></td>


                            <td><?= Html::a(Html::tag('div',
                                    Html::tag('i', '', ['class' => 'fa fa-download fa-fw ']) . '  Download file'),
                                    Url::toRoute(["store-cabinet/pdf-download", 'pdf_path' => $planogram['path']]),
                                    [
                                        'title'=>'Download me!',

                                    ]);
                                ?>
                            </td>
                            <td><?= Html::a(Html::tag('div',
                                    Html::tag('i', '', ['class' => 'fa fa-eye fa-fw ']) . ' View file'),
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
                <?=$document_category->name;?>  are not loaded.
            </h1>
        <? } ?>





    </div>


<?// echo $message;?>