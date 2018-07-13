<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 26.11.14
 * Time: 21:32
 */
use yii\helpers\Url;

?>
<div class="container">
<div class="row">
    <div class="col-xs-12">
        <div class="push-down-30">
            <div class="banners--big">
                <strong> SEARCH RESULTS</strong>
            </div>
        </div>
    </div>
</div>




<?
$count = count($products_array);
$i = 0;
$column = 0;

foreach ($products_array as $model):

    $img_m_path = "def.jpg";
    if ((isset($model->prod_img))  && ($model->prod_img!="") ){

//            AHTUNG! UNCOMMENT THIS LINE!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        $img_m_path = $model->prod_img;
    }
    ?>
<!--    <div class="row">-->
<!--    <div class='col-xs-6 col-sm-6 col-md-3'>-->
<!--        <a href="--><?//=Url::toRoute(['/site/view_prod','id'=>$model->id])?><!--">-->
<!--            <div class="panel panel-default ">-->
<!--                <div class="panel-body my_panel">-->
<!--                    <img style='height: 100%' class='img-thumbnail' src='--><?php
//
//                    echo Yii::$app->request->BaseUrl?><!--/uploads/--><?//=$img_m_path?><!--'/>-->
<!--                </div>-->
<!--                <div class="panel-footer">--><?//=$model->name?><!--</div>-->
<!--            </div>-->
<!--        </a>-->
<!---->
<!--    </div>-->
    <a  href="<?=Url::toRoute(['/site/view_prod','id'=>$model->alias])?>">
        <div class='  col-xs-6 col-sm-4 col-md-3 js--isotope-target js--cat-1 prod_cnt'>
            <!--            <div class=' xxs-12-cat col-xs-6 col-sm-6 col-md-3 js--isotope-target js--cat-1 prod_cnt'>-->
            <div class="products__single">

                <figure class="products__image my_img">

                    <div class="menu-item related_item view_prod_rel_item ">

                        <div class="menu-img menu-img_view_cat menu-img_index ">

                            <img class="products__image my_img" src="<?php echo Yii::$app->request->BaseUrl?>/uploads/<?=$img_m_path?>" alt="">
                            <a class="link_img" href="<?=Url::toRoute(['/site/view_prod','id'=>$model->alias])?>">
                                <div class="product-overlay">

                                </div> </a>
                        </div>
                        <a class="link_img" href="<?=Url::toRoute(['/site/view_prod','id'=>$model->alias])?>">
                            <div class="menu-content">

                                <!--                                        <div class="menu-icon"><img src="--><?php //echo Yii::$app->request->BaseUrl?><!--/uploads/cat_icon/--><?//=$cat_ico?><!--" alt=""></div>-->


                            </div>
                        </a>
                        <h5  class="prod_na products__title view_prod_main"><a class="rel_name_lnk" href="<?=Url::toRoute(['/site/view_prod','id'=>$model->alias])?>"><?=$model->name?></a></h5>


                        <!--                        ADD-->
                        <?php

                        //  $rel_prod_cat = Category::find()->where(array('id' => $model->cat_id))->one();
                        ?>

                        <!--                                <p> <a  class="link_to_rel_cat" href="--><?//= Url::toRoute(['/site/view_cat', 'id' => $model->alias]) ?><!--">--><?//= $model->name ?><!--</a>-->
                        <!--                                </p>-->
                        <!--                        ADD-->




                    </div>



                </figure>
            </div>
        </div>
    </a>
    <?
    $column = $column + 1;

    if((++$i === $count && $column !== 4) || ($column == 4)) {
//        echo "</div>";
        $column = 0;
    }

endforeach;
?>

</div>