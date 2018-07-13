<?php
use yii\helpers\Url;
use \app\models\Category;

$sub_cats = $model->getCategories()->all();
$products = $model->getProductsAsc()->all();

if ($model->cat_icon) {

    $cat_ico = $model->cat_icon;
} else {
    $cat_ico = 'def_ico.png';
}


$pp_parent_id = $model->parent_id;
$pp_model = Category::find()->where(array('id' => $pp_parent_id))->one();

$this->title = $model->name;

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
?>


<!--TEST delete to show model test-->
<div class="container">
<div class="row">
    <div class="col-xs-12">
        <div class="push-down-30">
            <div class="banners--big my_banner">
                <strong> <?= $model->name;
                    $model1 = $model; ?></strong>
            </div>
        </div>
    </div>
</div>

    <?php
        if (isset($model1->text))
            echo '<div class="container" >';
        echo $model1->text;
        echo '</div>';
    ?>


    <? if ((isset($sub_cats)) && (count($sub_cats) > 0)): ?>
    <div class="row">

        <?
        $count = count($sub_cats);
        $i = 0;
        $column = 0;

        foreach ($sub_cats as $model):

            $img_m_path = "def.jpg";
            if ((isset($model->cat_img)) && ($model->cat_img != "")) {

//            AHTUNG! UNCOMMENT THIS LINE!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
                $img_m_path = $model->cat_img;
            }
            ?>
            <?php
            if ($model->link) {
                ?>
                <a href="<?= Yii::$app->homeUrl . $model->link ?>">
                    <div class='  col-xs-6 col-sm-4 col-md-3 js--isotope-target js--cat-1 prod_cnt'>
                        <div class="products__single">

                            <figure class="products__image my_img">

                                <div class="menu-item related_item view_prod_rel_item ">

                                    <div class="menu-img menu-img_view_cat menu-img_index ">

                                        <img class="products__image my_img"
                                             src="<?php echo Yii::$app->request->BaseUrl ?>/uploads/<?= $img_m_path ?>"
                                             alt="">
                                        <a class="link_img" href="<?= Yii::$app->homeUrl . $model->link ?>">
                                            <div class="product-overlay">

                                            </div>
                                        </a>
                                    </div>
                                    <a class="link_img" href="<?= Yii::$app->homeUrl . $model->link ?>">
                                        <div class="menu-content">
                                        </div>
                                    </a>
                                    <h5 class="prod_na products__title view_prod_main"><a class="rel_name_lnk"
                                                                                          href="<?= Yii::$app->homeUrl . $model->link ?>"><?= $model->name ?></a>
                                    </h5>
                                </div>
                            </figure>
                        </div>
                    </div>
                </a>


            <?php
            } else {
                ?>
                <a href="<?= Url::toRoute(['/site/view_cat', 'id' => $model->alias]) ?>">
                    <div class='  col-xs-6 col-sm-4 col-md-3 js--isotope-target js--cat-1 prod_cnt'>
                        <div class="products__single">

                            <figure class="products__image my_img">

                                <div class="menu-item related_item view_prod_rel_item ">

                                    <div class="menu-img menu-img_view_cat menu-img_index ">

                                        <img class="products__image my_img"
                                             src="<?php echo Yii::$app->request->BaseUrl ?>/uploads/<?= $img_m_path ?>"
                                             alt="">
                                        <a class="link_img"
                                           href="<?= Url::toRoute(['/site/view_cat', 'id' => $model->alias]) ?>">
                                            <div class="product-overlay">

                                            </div>
                                        </a>
                                    </div>
                                    <a class="link_img"
                                       href="<?= Url::toRoute(['/site/view_cat', 'id' => $model->alias]) ?>">
                                        <div class="menu-content">

                                        </div>
                                    </a>
                                    <h5 class="prod_na products__title view_prod_main"><a class="rel_name_lnk"
                                                                                          href="<?= Url::toRoute(['/site/view_cat', 'id' => $model->alias]) ?>"><?= $model->name ?></a>
                                    </h5>

                                </div>
                            </figure>
                        </div>
                    </div>
                </a>
                <?
                $column = $column + 1;

                if ((++$i === $count && $column !== 4) || ($column == 4)) {



                    $column = 0;
                }
            }
        endforeach;
        ?>

    </div>

<? endif; ?>



<!--TEST-->

<!--PRODUCTS-->
<? if ((isset($products)) && (count($products) > 0)): ?>

    <h2 class="text-center">PRODUCTS</h2>
    <div class="row">


        <?
        $count = count($sub_cats);
        $i = 0;
        $column = 0;

        foreach ($products as $model):

            if ($model->visible) {
                $img_m_path = "def.jpg";
                if ((isset($model->prod_img)) && ($model->prod_img != "")) {
                    //  AHTUNG! UNCOMMENT THIS LINE!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
                    $img_m_path = $model->prod_img;
                }
                ?>
                <a href="<?= Url::toRoute(['/site/view_prod', 'id' => $model->alias]) ?>">
                    <div class='  col-xs-6 col-sm-4 col-md-3 js--isotope-target js--cat-1 prod_cnt'>
                        <div class="products__single">
                            <figure class="products__image my_img">
                                <div class="menu-item related_item">
                                    <div class="menu-img menu-img_view_cat menu-img_index ">
                                        <img class="products__image my_img"
                                             src="<?= Yii::$app->request->BaseUrl ?>/uploads/<?= $img_m_path ?>"
                                             alt="">
                                        <a class="link_img"
                                           href="<?= Url::toRoute(['/site/view_prod', 'id' => $model->alias]) ?>">
                                            <div class="product-overlay">

                                            </div>
                                        </a>
                                    </div>
                                    <a class="link_img"
                                       href="<?= Url::toRoute(['/site/view_prod', 'id' => $model->alias]) ?>">
                                        <div class="menu-content">

                                            <div class="menu-icon">
                                                <img src="<?= Yii::$app->request->BaseUrl ?>/uploads/cat_icon/<?= $cat_ico ?>"
                                                    alt="">
                                            </div>
                                        </div>
                                    </a>
                                    <h5 class="prod_na products__title ">
                                        <a class="rel_name_lnk" href="<?= Url::toRoute(['/site/view_prod', 'id' => $model->alias]) ?>">
                                            <?= $model->name ?>
                                        </a>
                                    </h5>
                                    <!--                        ADD-->
                                    <?php

                                    $rel_prod_cat = Category::find()->where(array('id' => $model->cat_id))->one();
                                    ?>
                                    <br/>

                                    <!--                        ADD-->

                                </div>


                            </figure>
                        </div>
                    </div>
                </a>
                <?
                $column = $column + 1;

                if ((++$i === $count && $column !== 4) || ($column == 4)) {
                    // echo "</div>";
                    $column = 0;
                }
            }
        endforeach;
        ?>

        <!--            </div>-->
    </div>

<? endif; ?>

</div>


<!--    PRODUCTS-->
