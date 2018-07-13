<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use app\models\Category;
use app\models\Product;
use app\models\User;

$cats = Category::find()->orderBy('order DESC')->all();


/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <?php //$this->registerJsFile('js/require.js', ['\backend\assets\AppAsset']);
    ?>
    <script src="http://swip.codylindley.com/jquery.popupWindow.js"></script>






    <script data-main="<?php echo Yii::$app->request->BaseUrl ?>/js/main"
            src="<?php echo Yii::$app->request->BaseUrl ?>/js/jstree.js"></script>
    <script data-main="<?php echo Yii::$app->request->BaseUrl ?>/js/main"
            src="<?php echo Yii::$app->request->BaseUrl ?>/js/require.js"></script>

    <script data-main="<?php echo Yii::$app->request->BaseUrl ?>/js/main"
            src="<?php echo Yii::$app->request->BaseUrl ?>/js/script.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>

<?php $this->beginBody() ?>

<div class="top  js--fixed-header-offset">
    <div class="container">
        <div class="row ">
            <div class="top__menu">
                <p class="text-center slug"><span class='white'>Any questions? Call us</span> <span class='green'>1-800-355-SALAD</span>
                    <?php if (\Yii::$app->user->isGuest) {
                        echo '<a class="btn  btn-primary customer_login" href = "';
                        echo 'http://cabinet.supermarketers.com/user/login';
                        echo '" >';
                        echo '  <span class="glyphicon glyphicon-user" ></span >&nbsp  Customer Login </a>';
                    }?>
                    <?php if (Yii::$app->user->can('admin')) {
                        echo '<a class="btn  btn-primary customer_login" href = "';
                        echo Url::toRoute('category/index');
                        echo '" >';
                        echo '  <span class="glyphicon glyphicon-user" ></span >&nbsp Admin </a >';
                        echo '<a class="btn  btn-primary customer_login log1" href = "';
                        echo Url::toRoute('site/logout');
                        echo '"data-method="post" >LOGOUT</a>';
                    }?>
                    <?php if (Yii::$app->user->can('customer')) {
                        echo '<a class="btn  btn-primary customer_login" href = "';
                        echo Url::toRoute('site/cabinet');
                        echo '" >';
                        echo '  <span class="glyphicon glyphicon-user" ></span >&nbsp Customer </a >';
                        echo '<a class="btn  btn-primary customer_login log1" href = "';
                        echo Url::toRoute('site/logout');
                        echo '"data-method="post" >LOGOUT</a>';

                    }?>
                    <?php if (Yii::$app->user->can('user')) {
                        echo '<a class="btn  btn-primary customer_login" href = "';
                        echo Url::toRoute('site/usercab');
                        echo '" >';
                        echo '  <span class="glyphicon glyphicon-user" ></span >&nbsp User </a >';
                        echo '<a class="btn  btn-primary customer_login log1" href = "';
                        echo Url::toRoute('site/logout');
                        echo '"data-method="post" >LOGOUT</a>';

                    }?>
                    <a style="margin-left:40px; font-size: 1.2em; color: #FFF"
                       href="<?php echo Url::toRoute('site/careers') ?>">Careers</a>
                </p>
            </div>

        </div>
    </div>
</div>
<?php


//var_dump(  Yii::$app->user->can('customer'))
?>

<div class="mess_g "></div>

<!-- Modal register-->
<!--<div class="modal  fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">-->
<!--    <div class="modal-dialog">-->
<!--        <div class="modal-content  center">-->
<!--            <div class="modal-header">-->
<!--                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>-->
<!--                <h3><span class="light">Register</span> to Organique</h3>-->
<!--                <hr class="divider">-->
<!--            </div>-->
<!---->
<!--            <div class="modal-body">-->
<!--                <form action="#" class="push-down-15">-->
<!--                    <div class="form-group">-->
<!--                        <input type="text" id="name" class="form-control  form-control--contact" placeholder="Username">-->
<!--                    </div>-->
<!--                    <div class="form-group">-->
<!--                        <input type="text" id="email" class="form-control  form-control--contact" placeholder="Email">-->
<!--                    </div>-->
<!--                    <div class="form-group">-->
<!--                        <input type="text" id="subject" class="form-control  form-control--contact" placeholder="Password">-->
<!--                    </div>-->
<!--                    <button type="submit" class="btn  btn-primary">REGISTER</button>-->
<!--                </form>-->
<!--                <a data-toggle="modal" role="button" href="#loginModal" data-dismiss="modal">Already Registered?</a>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!---->
<!--<!-- Modal login-->
<!--<div class="modal  fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">-->
<!--    <div class="modal-dialog">-->
<!--        <div class="modal-content  center">-->
<!--            <div class="modal-header">-->
<!--                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>-->
<!--                <h3><span class="light">Login</span> to Organique</h3>-->
<!--                <hr class="divider">-->
<!--            </div>-->
<!--            <div class="modal-body">-->
<!--                <form action="#" class="push-down-15">-->
<!--                    <div class="form-group">-->
<!--                        <input type="text" id="name" class="form-control  form-control--contact" placeholder="Username">-->
<!--                    </div>-->
<!--                    <div class="form-group">-->
<!--                        <input type="text" id="subject" class="form-control  form-control--contact" placeholder="Password">-->
<!--                    </div>-->
<!--                    <button type="submit" class="btn  btn-primary">SIGN IN</button>-->
<!--                </form>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<header class="header">

    <div class="container">
        <div class="row">
            <div class="col-xs-10  col-md-2">
                <div class="header-logo">


                    <?
                    //var_dump($this->params['breadcrumbs']);

                    ?>
                    <a href="<?php echo Url::toRoute('/') ?>"><img alt="Logo" src="<?php
                        $image = '/images/logo.png';
                        if (isset($this->params['breadcrumbs'][0]['label'])) {
                            if (($this->params['breadcrumbs'][0]['label'] == "Salad Bar Tenders") || ($this->params['breadcrumbs'] == "Salad Bar Tenders")) {
                                $image = '/main_ico/saladbartenders.png';
                            }
                            if (($this->params['breadcrumbs'][0]['label'] == "Isabelle's Kitchen") || ($this->params['breadcrumbs'] == "Isabelle's Kitchen")) {
                                $image = '/main_ico/isabelles_logo.png';
                            }
                            if (($this->params['breadcrumbs'][0]['label'] == "Maple Avenue Foods") || ($this->params['breadcrumbs'] == "Maple Avenue Foods")) {
                                $image = '/main_ico/mapleavenue.png';
                            }
                        }
                        if (isset($this->params['breadcrumbs'][0])) {
                            if ($this->params['breadcrumbs'][0] == "Salad Bar Tenders") {
                                $image = '/main_ico/saladbartenders.png';
                            }
                            if ($this->params['breadcrumbs'][0] == "Isabelle's Kitchen") {
                                $image = '/main_ico/isabelles_logo.png';
                            }
                            if ($this->params['breadcrumbs'][0] == "Maple Avenue Foods") {
                                $image = '/main_ico/mapleavenue.png';
                            }
                        }

                        echo Yii::$app->request->BaseUrl . $image?>" width="200" height="90"></a>
                </div>
            </div>
            <div class="col-xs-2  visible-sm  visible-xs">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle  collapsed" data-toggle="collapse"
                            data-target="#collapsible-navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
            </div>

            <div class="col-xs-12  col-md-10">
                <nav class="navbar  navbar-default" role="navigation">
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse   navbar-collapse" id="collapsible-navbar">
                        <ul class="nav col_my  navbar-nav">
                            <li class="dropdown">
                                <a class=" uppercase" href="<?= Url::toRoute('/') ?>"><span
                                        class="menu_title">HOME<span></a>
                            </li>


                            <?php
                            $cats1 = array_reverse($cats);
                            for ($i = 0; $i <= count($cats) - 1; $i++) {
                                if ($cats1[$i]->attributes['parent_id'] == 0 && $cats1[$i]->visible) {

                                    echo '<li class="dropdown">';
                                    echo "<a href=" . Url::toRoute(['site/view_cat', 'id' => $cats1[$i]->attributes['alias']]);
                                    echo ' class="dropdown-toggle uppercase"><span class="menu_title">' . $cats1[$i]->attributes['name'] . '</span><b class="caret"></b></a>';
                                    echo '<ul class="dropdown-menu">';

                                    for ($c = 0; $c <= count($cats) - 1; $c++) {

                                        $count = 0;
                                        if ($cats[$c]->attributes['parent_id'] == $cats1[$i]->attributes['id'] && $cats1[$c]->visible) {
                                            echo '<li>';
                                            echo "<a href=" . Url::toRoute(['site/view_cat', 'id' => $cats[$c]->attributes['alias']]);
                                            echo ' class="uppercase"> ' . $cats[$c]->attributes['name'] . '</a></li>';

                                        }
                                    }
                                    if ($cats1[$i]->attributes['name'] == 'Salad Bar Tenders') {

//                                        echo "<li>
//		                        <a class='uppercase' href='" . Url::toRoute('site/virtual') . "'><span class='menu_title'>VIRTUAL1 SALAD BAR<span></a>
//                           	                        </li> ";
                                    }
                                    echo ' </ul></li>';
                                }
                                //}
                            }
                            ?>
                            <li class="dropdown">
                                <a class="uppercase" href="<?= Url::toRoute(['site/page', 'id' => 'about']) ?>"><span
                                        class="menu_title">ABOUT US</span></a>
                            </li>

                            <li class="dropdown">
                                <a class="uppercase" href="<?= Url::toRoute('site/contact') ?>"><span
                                        class="menu_title">CONTACT US</span></a>

                            </li>
                            <li class="hidden-xs  hidden-sm">
                                <a href="#" class="js--toggle-search-mode"><span
                                        class="glyphicon  glyphicon-search  glyphicon-search--nav"></span></a>
                            </li>
                        </ul>
                        <!-- search for mobile devices -->
                        <form action="<?= Url::toRoute('site/search') ?>" method="post"
                              class="visible-xs  visible-sm  mobile-navbar-form" role="form">
                            <div class="input-group">
                                <input type="text" name="keyword" class="form-control" placeholder="Search">
        <span class="input-group-addon">
          <button type="submit" class="mobile-navbar-form__appended-btn"><span
                  class="glyphicon  glyphicon-search  glyphicon-search--nav"></span></button>
        </span>
                            </div>
                        </form>

                    </div>
                    <!-- /.navbar-collapse -->
                </nav>
            </div>

        </div>
    </div>
    </div>

    <!--Search open pannel-->
    <div class="search-panel">
        <div class="container">
            <div class="row">
                <div class="col-sm-11">
                    <form class="search-panel__form" method="post" action="<?= Url::toRoute('/site/search') ?>">
                        <button type="submit"><span class="glyphicon  glyphicon-search"></span></button>
                        <input type="text" name="keyword" class="form-control" placeholder="Enter your search keyword">
                    </form>
                </div>
                <div class="col-sm-1">
                    <div class="search-panel__close  pull-right">
                        <a href="#" class="js--toggle-search-mode"><span
                                class="glyphicon  glyphicon-circle  glyphicon-remove"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<?php

//            NavBar::begin([
//
//            ]);
//            echo Nav::widget([
//                'options' => ['class' => 'navbar-nav navbar-right'],
//                'items' => [
//                    ['label' => 'Home', 'url' => ['/site/index']],
//
//
//                    (!(Yii::$app->user->isGuest) && (Yii::$app->user->id == 100)) ?
//
//                        ['label' => 'Admin panel',
//                            'url' => ['/category/index'],
//                            'linkOptions' => ['data-method' => 'post']]:
//                         ['label' => 'Admin panel',
//                             'url' => ['/category/index'],
//                             'options' => ['class' => 'display_none']],
//
//                    (!(Yii::$app->user->isGuest) && (Yii::$app->user->id == 101)) ?
//
//                        ['label' => 'Cabinet',
//                            'url' => ['/site/cabinet'],
//                            'linkOptions' => ['data-method' => 'post']]:
//                        ['label' => 'Cabinet',
//                            'url' => ['/site/cabinet'],
//                            'options' => ['class' => 'display_none']],
//
//
//                        Yii::$app->user->isGuest ?
//                        ['label' => 'Login', 'url' => ['/site/login']] :
//                        ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
//                            'url' => ['/site/logout'],
//                            'linkOptions' => ['data-method' => 'post']],
//                ],
//            ]);
//            NavBar::end();
?>

<div class="container my_bred">
    <div class="container bread">
        <?php
        echo Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]);
        ?>
    </div>
</div>
<?=
$content
?>
<!--Page footer-->
<footer class="js--page-footer">
    <div class="footer-widgets">
        <div class="container">
            <div class="row">
                <div class="col-xs-12  col-sm-3">
                    <div class="footer-widgets__social text-center">
                        <a href="">
                            <img class="push-down-10" alt="Footer Logo"
                                 src="<?php echo Yii::$app->request->BaseUrl ?>/images/footer/supermarketers-brown.jpg"
                                 width="90px" height="40px"></a>

                        <a href="http://www.saladbartenders.com">
                            <!--                        <img class="push-down-10" alt="Footer Logo" src="images/cat_bnw/cat_22.png" width="125px" height="50px" >-->
                            <img class="push-down-10" alt="Footer Logo"
                                 src="<?php echo Yii::$app->request->BaseUrl ?>/images/footer/SBT-BROWN.jpg"
                                 width="90px" height="40px">

                        </a>


                        <a href="http://www.supermarketers.com/iki/">
                            <img class="push-down-10" alt="Footer Logo"
                                 src="<?php echo Yii::$app->request->BaseUrl ?>/images/footer/ISABELLES-BROWN.jpg"
                                 width="90px" height="40px"></a>
                        <!--
                                                <a href="http://www.mapleavenuefoods.com/">

                        <!--                        <img class="push-down-10" alt="Footer Logo" src="images/cat_bnw/cat_33.png" width="125px" height="50px"></a>-->
                        <img class="push-down-10" alt="Footer Logo"
                             src="<?php echo Yii::$app->request->BaseUrl ?>/images/footer/MAF-brown.jpg" width="90px"
                             height="40px"></a>

                        <!--                        <p class="push-down-15 bot_text">Adipiscing elit.-->
                        <!--                            Ut ullamcorper consectetur, non lacinia turpis-->
                        <!--                            suscipit non. Estibulum nu nc lacus, tincidunt-->
                        <!--                            non odio eu, scelerisque tristique quam.</p>-->
                        <!--                        </br>-->
                        <!--                        <a class="social-container" href="http://www.youtube.com/user/ProteusNetCompany"><span class="zocial-linkedin"></span></a>-->

                    </div>
                </div>
                <div class="col-xs-12  col-sm-6">
                    <nav class="footer-widgets__navigation">
                        <div class="footer-wdgets__heading--line">
                            <h4 class="footer-widgets__heading">Navigation</h4>
                        </div>
                        <div class="row ">

                            <div class="col-xs-12  col-sm-4 col-md-3 my_bold">
                                <ul class="fut_nav"><a href="#"><span>HOME</span></a>
                                    <li><a href="<?= Url::toRoute('/site/about') ?>">About us</a></li>
                                    <li><a href="<?= Url::toRoute('/site/contact') ?>">Contact us</a></li>
                                </ul>
                            </div>

                            <?php
                            $cats1 = array_reverse($cats);
                            for ($i = 0; $i <= count($cats) - 1; $i++) {
                                if ($cats1[$i]->attributes['parent_id'] == 0 && $cats1[$i]->visible) {

//                if($cats1[$i]->attributes['id']==20) {
//
                                    ?>
                                    <!--<!--                    <li class="dropdown">-->
                                    <!--<!--                        <a class="uppercase"-->
                                    <!--<!--                           href="--><? ////= Url::toRoute(['site/view_cat', 'id' => $cats1[$i]->attributes['alias']]) ?><!--<!--"><span-->
                                    <!--<!--                                class="menu_title">--><? ////= $cats1[$i]->attributes['name'] ?><!--<!--</span></a>-->
                                    <!--<!--                    </li>-->
                                    <!--                --><?php
//                }else{

                                    echo ' <div class="col-xs-12  col-sm-3 col-md-3  my_bold">
                                <ul class="fut_nav">';
                                    echo "<a href=" . Url::toRoute(['site/view_cat', 'id' => $cats1[$i]->attributes['alias']]);
                                    echo ' class="uppercase"><span class="">' . $cats1[$i]->attributes['name'] . '</span></a>';

                                    for ($c = 0; $c <= count($cats) - 1; $c++) {

                                        $count = 0;
                                        if ($cats[$c]->attributes['parent_id'] == $cats1[$i]->attributes['id'] && $cats[$c]->visible) {
                                            echo '<li>';
                                            echo "<a href=" . Url::toRoute(['site/view_cat', 'id' => $cats[$c]->attributes['alias']]);
                                            echo ' > ' . $cats[$c]->attributes['name'] . '</a></li>';

                                        }
                                    }
                                    if ($cats1[$i]->attributes['name'] == 'Salad Bar Tenders') {
                                        echo "<li>
		                        <a href='" . Url::toRoute('site/virtual') . "'>Virtual2 Salad Bar</a>
                           	                        </li> ";
                                    }
                                    echo ' </ul></li></div>';
                                }

//                }
                            }
                            ?>
                        </div>
                    </nav>
                </div>
                <div class="col-xs-12  col-sm-3">
                    <div class="footer-widgets__navigation new_navigat">
                        <div class="footer-wdgets__heading--line">
                            <h4 class="footer-widgets__heading">Contact Us</h4>
                        </div>
                        <div class="contact">
                            <!--                      <span class="more_up">Maple Avenue Foods</span><br>-->

                            <span class="bot_font">800-355-7252</span> <br>
                            <span class="bot_font">855 Maple Avenue, Harleysville, PA 19438</span><br>

<!--                            <a class="footer__link con_type link_1" href="mailto:info@supermarketers.com">-->
<!--                                <span class="bot_font ">sales@supermarketers.com</span>-->
<!--                            </a>-->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12  col-sm-6">
                    <div class="footer__text--link">
                        <a class="footer__link" href="http://www.supermarketers.com/">SUPERMARKETERS.COM </a>©
                        Copyright <?php echo date('Y') ?>. <a class="footer__link" href="http://www.supermarketers.com/"
                                                              target="_blank"></a>
                    </div>
                </div>
                <div class="col-xs-12  col-sm-6">

                </div>
            </div>
        </div>
    </div>
</footer>
<div class="search-mode__overlay"></div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
