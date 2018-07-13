<?php
use yii\helpers\Url;
use \app\models\Category;

$cat = $model->getCat()->one();

$this->title = $model->name;
$pp_parent_id = $cat->parent_id;
$pp_model = Category::find()->where(array('id' => $pp_parent_id))->one();


$this->params['breadcrumbs'][] = ['label' => $cat->name, 'url' => Url::toRoute(['/site/view_cat', 'id' => $cat->alias])];
$this->params['breadcrumbs'][] = $model->name;
while ($pp_parent_id > 0) {
    $b_el = ['label' => $pp_model->name, 'url' => Url::toRoute(['/site/view_cat', 'id' => $pp_model->alias])];
    array_unshift($this->params['breadcrumbs'], $b_el);

    $pp_parent_id = $pp_model->parent_id;
    $pp_model = Category::find()->where(['id' => $pp_parent_id])->one();
}
if (isset($pp_model)) {
    $b_el = ['label' => $pp_model->name, 'url' => Url::toRoute(['/site/view_cat', 'id' => $pp_model->alias])];
    array_unshift($this->params['breadcrumbs'], $b_el);
}
$img_m_path = "product.jpg";
if ((isset($model->prod_img)) && ($model->prod_img != "")) {
    //  AHTUNG! UNCOMMENT THIS LINE!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    $img_m_path = $model->prod_img;
}

?>
<!--ADDD-->
<div class="container main_prod">
<div class="push-down-30">
    <div class="row">
        <div class="col-xs-12 col-sm-4  col-md-5">
            <div class="product-preview">
                <div class="push-down-20">
                    <img class="js--product-preview" alt="Single product image" src="<?php
                    echo Yii::$app->request->BaseUrl?>/uploads/<?= $img_m_path ?>" width="360" height="458">
                    <?php
                    //                    echo Yii::$app->request->BaseUrl
                    ?><!--/uploads/--><?//=$img_m_path
                    ?>
                </div>


                <div class="product-preview__thumbs  clearfix">



                    <?php   foreach ($images as $image) {
                        ?>
                        <div class="product-preview__thumb  active  js--preview-thumbs">
                            <a href=".js--product-preview" data-src="<?php
                            echo Yii::$app->request->BaseUrl?>/uploads/<?= $image->name ?>">
                                <img src="<?php
                                echo Yii::$app->request->BaseUrl?>/uploads/<?= $image->name ?>"
                                     alt="Single product thumbnail image" width="66" height="82"/>
                            </a>
                        </div>

                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-8  col-md-7">
            <div class="products__content">
                <!--                <div class="push-down-30"></div>-->

                <span class="products__category"><?= $model->getCat()->one()->name ?></span>

                <h1 class="single-product__title "><span class="light"></span> <?= $model->name ?></h1>


                <span class="item_n"><?= $model->item_number ?></span>
                <span class="pack_s"> <?= $model->pack_size ?></span>

                <hr class="bold__divider">
                <p class="single-product__text">
                    <?= $model->full_desc ?>
                </p>
                <hr class="bold__divider">
                <!-- Single button -->

                <!-- Quantity buttons -->

                <!-- Add to cart button -->

                <!-- Social banners -->
                <div class="row">
                    <div class="col-xs-12  col-sm-3  col-md-2 share_on">
                        <span class="share_prod">SHARE</span>
                    </div>
                    <div class="col-xs-12 col-sm-7  col-md-8 ">

                        <a id="face_prod" href="#">
                            <div class="soc_prod"><img class="soc_image_prod soc_prod_f" src="
                        <?php echo Yii::$app->request->BaseUrl ?>/images/view_prod/share_face.png" alt=""/></div>
                        </a>

                        <a href="http://pinterest.com/pin/create/button/?url=<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>&media=http://<?php
                        echo $_SERVER[HTTP_HOST] . Yii::$app->request->BaseUrl?>/uploads/<?= $img_m_path ?>&description=<?= $model->name ?>"
                           class="pina_prod">
                            <div class="soc_prod"><img class="soc_image_prod soc_prod_p" src="
                            <?php echo Yii::$app->request->BaseUrl ?>/images/view_prod/share_p.png" alt=""/></div>
                        </a>
                        <a href="https://twitter.com/home?status=<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>">
                            <div class="soc_prod"><img class="soc_image_prod soc_prod_twit" src="
                            <?php echo Yii::$app->request->BaseUrl ?>/images/view_prod/share_twit.png" alt=""/></div>
                        </a>

                        <a class="style_at my_share" href="#">
                            <div class="soc_prod"><img class="soc_image_prod" src="
                            <?php echo Yii::$app->request->BaseUrl ?>/images/view_prod/share_mail.png" alt=""/></div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Tabs -->
<div class="push-down-30">
<div class="row">
<div class="col-xs-12 col-md-12">
<!-- Nav tabs -->
<ul class="nav  nav-tabs">
    <li class="active"><a href="#tabDesc" data-toggle="tab"><span class="alerg_info_tab">Ingredients</span></a></li>
    <li><a href="#tabManufacturer" data-toggle="tab"><span class="alerg_info_tab">Nutrition</span></a></li>
    <li><a href="#tabReviews" data-toggle="tab"><span class="alerg_info_tab">Specifications</span></a></li>
</ul>
<div class="tab-content">
<div class="tab-pane  fade  in  active" id="tabDesc">
    <div class="row">
        <div class="col-xs-12  col-sm-7">
            <br/>
            <?= $model->ingredients ?>
            <br/>
        </div>
        <div class="col-xs-12  col-sm-5">
            <br/>
            <span class="alerg_info_text">Allergens</span>

            <div class="row alg_cont">
                <?php
                foreach ($model->allergens as $allergen) {
                    ?>
                    <div class="col-xs-6  col-sm-6">
                        <img
                            src="<?php echo Yii::$app->request->BaseUrl ?>/uploads/allergen_icon/<?= $allergen[0]['image'] ?>"
                            alt=""/>
                        <span class="alg_name"><?= $allergen[0]['name'] ?></span>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<div class="tab-pane  fade" id="tabManufacturer">


<!--Nutrition FACTS-->

<div class="row colums">

    <div class="col-xs-12 col-sm-6 col-md-3 no_padding">
        <table class="table table-hover my_table">
            <thead>
            <tr>
                <th><span class="bolder">Nutrition</span></th>


            </tr>
            <tr>

                <th><span class="bolder">Facts</span></th>


            </tr>
            </thead>
            <tbody>
            <!--            <tr>-->
            <!--                <td><h1>Nutrition Facts</h1></td>-->
            <!--            </tr>-->
            <tr>
                <td><span>Serving Size About <?= $model->c1_container ?></span>
                    (<?= $model->c1_size ?>g)
                </td>
            </tr>
            <tr>
                <!--                                <td > <span>Serving Per Container </span></td>-->
            </tr>
            <tr>
                <td><span class="bold">Calories </span><?= $model->c1_calories ?></td>
            </tr>
            <tr>
                <td class="jump"><span>Calories from Fat <?= $model->c1_calfat ?></span></td>
            </tr>
            </tbody>

        </table>

    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 no_padding">

        <table class="table table-hover my_table">
            <thead>
            <tr class="fat">
                <th>Amount / Serving</th>
                <th class="text-right">% Daily Value*</th>

            </tr>
            </thead>
            <tbody>
            <tr class="line">
                <td><strong>Total Fat</strong> <?= $model->c2_totfat_1 ?>g</td>
                <td class="text-right"><strong><?= $model->c2_totfat_2 ?>%</strong></td>

            </tr>
            <tr class="line ">

                <td class="jump"><span>Saturated Fat <?= $model->c2_satfat_1 ?>g</span></td>
                <td class="text-right"><strong><?= $model->c2_satfat_2 ?>%</strong></td>

            <tr class="line">

                <td class="jump"><span>Trans Fat <?= $model->c2_transfat_1 ?>g</span></td>

            </tr>
            <tr class="line">
                <td><strong>Cholesterol</strong> <?= $model->c2_cholester_1 ?>mg</td>
                <td class="text-right"><strong> <?= $model->c2_cholester_2 ?>%</strong></td>

            </tr>
            <tr class="fat">
                <td><strong>Sodium</strong> <?= $model->c2_sod_1 ?>mg</td>
                <td class="text-right"><strong><?= $model->c2_sod_2 ?>%</strong></td>

            </tr>
            <tr>
                <td class="text-center">Vitamin A <?= $model->c2_vit_a ?>%</td>
                <td class="text-center">Vitamin C <?= $model->c2_vit_c ?>%</td>

            </tr>
            </tbody>
        </table>

    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 no_padding">
        <table class="table table-hover my_table">
            <thead>
            <tr class="fat">
                <th>Amount / Serving</th>
                <th class="text-right">% Daily Value*</th>

            </tr>
            </thead>
            <tbody>
            <tr class="line">
                <td><strong>Total Carbohydrate </strong><?= $model->c3_totcarb_1 ?>g</td>
                <td class="text-right"><strong><?= $model->c3_totcarb_2 ?>%</strong></td>

            </tr>
            <tr class="line">
                <td class="jump"><span>Dietary Fiber <?= $model->c3_dietfib_1 ?>g</span></td>
                <td class="text-right"><strong><?= $model->c3_dietfib_2 ?>%</strong></td>

            <tr class="line">
                <td class="jump"><span>Sugars <?= $model->c3_sugar_1 ?>g</span></td>
                <td class="text-right"></td>
            </tr>
            <tr class="white_brd">
                <td><strong>Protein</strong> <?= $model->c3_protein_1 ?>g</td>
                <td></td>

            </tr>
            <tr class="fat">
                <td>&nbsp</td>
                <td>&nbsp</td>

            </tr>

            <tr>
                <td class="text-center">Calcium <?= $model->c3_calcium ?>%</td>
                <td class="text-center">Iron <?= $model->c3_iron ?>%</td>

            </tr>
            </tbody>
        </table>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-3 no_padding">
        <table class="table table-hover my_table ">
            <thead>
            <tr>
                <th colspan="4" class="lower">*Percent Daily Values are based on a
                    2,000 calorie diet. Your daily values may be higher
                    or lower depending on your calorie needs:
                </th>


            </tr>
            </thead>
            <tbody>
            <tr class="smaller line  ">
                <td></td>
                <td>Calories:</td>
                <td>2,000</td>
                <td>2,500</td>
            </tr>
            <tr class="smaller  ">
                <td>Total Fat</td>
                <td>Less than</td>
                <td>65g</td>
                <td>80g</td>

            <tr class="smaller ">
                <td class="jump"><span>Saturated Fat</span></td>
                <td>Less than</td>
                <td>20g</td>
                <td> 25g</td>
            </tr>
            <tr class="smaller ">
                <td>Cholesterol</td>
                <td>Less than</td>
                <td>20g</td>
                <td>25g</td>

            </tr>

            <tr class="smaller  ">
                <td>Sodium</td>
                <td>Less than</td>
                <td>2,400 mg</td>
                <td>2,400 mg</td>

            </tr>
            <tr class="smaller  ">
                <td class="smaller">Total Carbohydrate</td>
                <td></td>
                <td>300g</td>
                <td>375g</td>

            </tr>
            <tr class="smaller line ">
                <td class="jump"><span>Dietary Fiber</span></td>
                <td></td>
                <td>25g</td>
                <td>30g</td>

            </tr>
            <tr class="smaller  ">
                <td colspan="4">Calories per gram:</td>
            </tr>
            <tr class="smaller_more  ">
                <td>Fat 9</td>
                <td>Carbohydrate 4</td>
                <td colspan="2">Protein 4</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>


<!--Nutrition FACTS-->


</div>
<div class="tab-pane  fade" id="tabReviews">
    <br/>
    <span class="tab_spec">Shelf life:</span> <span class="tab_spec_val"><?= $model->shelf_life ?></span><br/>
    <span class="tab_spec">Standard item number:</span><span
        class="tab_spec_val"><?= $model->standard_item_number ?></span><br/>
    <span class="tab_spec">Standard pack size: </span><span
        class="tab_spec_val"> <?= $model->standard_pack_size ?></span><br/>
    <span class="tab_spec">Case dimensions:</span><span class="tab_spec_val"> <?= $model->case_dimensions ?></span><br/>
    <!--                    <span class="tab_spec">Gross weight:</span> <span class="tab_spec_val">-->
    <? //=$model->gross_weight?><!--</span><br/>-->
    <span class="tab_spec">Ti/Hi:</span><span class="tab_spec_val"> <?= $model->ti_hi ?></span>
</div>
</div>


</div>

</div>

</div>

<!-- Navigation -->


<!--            CAROUSEL-->





<?php
if (count($best_prod) > 0) {
    ?>
    <hr class="bold__divider">
    <div class="row prod_cnt1">
        <h3 class="h3_related">Related<strong> products</strong></h3>

        <div class=" row hide_arrows text-center">
            <div class="col-md-12">
                <a href="#js--latest-products-carousel " class="prod_arr_hide_left" data-slide="prev"><span
                        class="glyphicon   glyphicon-circle glyphicon-chevron-left products-navigation__arrow @2x "></span></a>&nbsp;
                <a href="#js--latest-products-carousel" class="prod_arr_hide_right" data-slide="next"><span
                        class=" glyphicon  glyphicon-circle glyphicon-chevron-right products-navigation__arrow @2x "></span></a>
            </div>
        </div>

        <div class="nav_cont_left col-xs-1 col-sm-1 col-md-1  ">
            <a href="#js--latest-products-carousel " class="prod_arr_left prod_arr" data-slide="prev"><span
                    class="glyphicon   glyphicon-circle glyphicon-chevron-left products-navigation__arrow @2x "></span></a>&nbsp;
        </div>


        <!-- Products -->
        <div id="js--latest-products-carousel" class="carousel cont_prod_view slide col-xs-10 col-sm-10 col-md-10"
             data-ride="carousel" data-interval="0">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <?php
                $c = 0;
                for ($i = 0;$i <= count($best_prod) - 1;$i++){
                 if($best_prod[$i][0]['visible']){
                ?>

                <?php if ($i == 0){ ?>
                <div class="item active prod_view_item">
                    <div class="row">
                        <?php } ?>

                        <?php if ($c == 4) { ?>

                        <?php } ?>

                        <?php
                        $img_m_path = "def.jpg";
                        if ((isset($best_prod[$i][0]['prod_img'])) && ($best_prod[$i][0]['prod_img'])) {
                            //  AHTUNG! UNCOMMENT THIS LINE!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
                            $img_m_path = $best_prod[$i][0]['prod_img'];
                        }
                        ?>
                        <a href="<?= Url::toRoute(['/site/view_prod', 'id' => $best_prod[$i][0]['alias']]) ?>">
                            <div class='col-xs-6 xxs-12 col-sm-6 col-md-3 js--isotope-target js--cat-1 prod_cnt'>
                                <div class="products__single">

                                    <figure class="products__image my_img">

                                        <div class="menu-item related_item">

                                            <div class="menu-img">

                                                <img class="products__image my_img"
                                                     src="<?php echo Yii::$app->request->BaseUrl ?>/uploads/<?= $img_m_path ?>"
                                                     alt="">
                                                <a class="link_img"
                                                   href="<?= Url::toRoute(['/site/view_prod', 'id' => $best_prod[$i][0]['alias']]) ?>">
                                                    <div class="product-overlay">

                                                    </div>
                                                </a>
                                            </div>
                                            <a class="link_img"
                                               href="<?= Url::toRoute(['/site/view_prod', 'id' => $best_prod[$i][0]['alias']]) ?>">
                                                <div class="menu-content">

                                                    <div class="menu-icon"><img
                                                            src="<?php echo Yii::$app->request->BaseUrl ?>/uploads/cat_icon/<?= $prod_cat['cat_icon'] ?>"
                                                            alt=""></div>


                                                </div>
                                            </a>
                                            <h5 class="prod_na products__title"><a class="rel_name_lnk"
                                                                                   href="<?= Url::toRoute(['/site/view_prod', 'id' => $best_prod[$i][0]['alias']]) ?>"><?= $best_prod[$i][0]['name'] ?></a>
                                            </h5>


                                            <?php

                                            $rel_prod_cat = Category::find()->where(array('id' => $best_prod[$i][0]['cat_id']))->one();
                                            ?>

                                            <p><a class="link_to_rel_cat"
                                                  href="<?= Url::toRoute(['/site/view_cat', 'id' => $rel_prod_cat->alias]) ?>"><?= $rel_prod_cat->name ?></a>
                                            </p>
                                        </div>


                                    </figure>
                                </div>
                            </div>
                        </a>

                        <?php
                        $c++;
                        if ($c == 4) {
                            $c = 0;
                            echo "
                                             </div>
                                            </div>

                                    <div class='item  prod_view_item'>
                                <div class='row'>";
                        }
                        }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="nav_cont_right col-xs-1 col-sm-1 col-md-1">
            <a href="#js--latest-products-carousel" class="prod_arr_rigth prod_arr" data-slide="next"><span
                    class=" glyphicon  glyphicon-circle glyphicon-chevron-right products-navigation__arrow @2x "></span></a>

        </div>

    </div>
<?php
}
?>

<!--            CAROUSEL-->
<div id="form_cont">
    <form action="" id="save_salad_form">
        <a class="close_form" href=""><span class=" glyphicon glyphicon-remove-circle"></span></a>
        <!--    <input type="text" class="form-control" id="user_name" required="required" placeholder="Your name"/><br>-->
        <input type="email" class="form-control" id="user_email" required="required" placeholder="Your email"/><br>
        <input type="submit" class="btn btn-success" id="save_salad_submit" value="SEND"/>
    </form>
</div>

<!-- Products -->

</div>
<!--ADD-->




