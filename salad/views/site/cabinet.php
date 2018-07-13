<?php

use yii\helpers\Url;
use app\models\User;

?>
<?php

$cur_customer = User::find()->where('id = :userid', [':userid' => Yii::$app->user->identity->id])->one();

if( $cur_customer->image){
    $img_m_path = $cur_customer->image;
}else{
    $img_m_path= 'user.png';
}

?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="push-down-30">
                <div class="banners--big my_banner">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 my_cab_bottom">

                            <strong> WELCOME,<?=$cur_customer->name?>!</strong>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6 my_cab_bottom">
                            <a  data-method="post" href="<?=Url::toRoute('site/logout')?>" class="btn pull-right  btn-primary my_cab_btn"><span class="glyphicon glyphicon-log-out"></span> LOGOUT</a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>


		<div class="row ">
			<div class='col-xs-12 col-sm-2 col-md-3 pad_none cus_main cust_nav'>
<!--MENU-->
                <div id="navbar" class="navbar navbar-inverse my_navbar  navbar-fixed-top">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle tog_but tot_cust_btn" data-toggle="collapse" data-target=".navbar-collapse1">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="clearfix"></div>
                    <div class="collapse navbar-collapse navbar-collapse1 pad_none">
                        <ul class="nav nav1 nav2 nav-stacked" id="menu-bar"> <!-- Notice the "nav-stacked" class we added here -->
                            <li class="cust_menu_li"><a href="<?=Url::toRoute('/category/index')?>" class="list-group-item <?if($params['action']=="category") echo "active"?>">Order Guides (PDF)</a></li>
<!--                            <li><a href="--><?//=Url::toRoute('/product/index')?><!--" class="list-group-item --><?//if($params['action']=="product") echo "active"?><!--">Reports (PDF)</a></li>-->
                            <li  class="dropdown cust_menu_li"><a href="#" data-toggle="dropdown">Reports (PDF)<span style="margin-top: 8px" class="caret pull-right"></span></a>
                                <ul class="dropdown-menu">
                                    <li class="relat"><a class="my_drop_d" href="#">Distribution</a></li>
                                    <li class="relat"><a class="my_drop_d" href="#">Product Movement</a></li>
                                    <li class="relat"><a class="my_drop_d" href="#">Margin</a></li>
                                </ul>
                            </li>
                            <li class="cust_menu_li"><a href="<?= Url::to(['user/index'])?>" data-method="post">Plan-O-Grams (PDFs)</a></li>
                            <li class="cust_menu_li"><a href="<?= Url::to(['salad-items/index'])?>" data-method="post">Nutrition & Allergen Guides</a></li>


                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
<!--MENU-->
			</div>


			<div class='col-xs-12 col-sm-10 col-md-9  cus_main'>

                <table class="table table-striped">
                    <thead>
                    <tr>

                        <th> Name</th>
                        <th>Date</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>

                        <td>Order Gouide 1</td>
                        <td>2/12/2015</td>
                        <td><a href=""><img src="<?php
                            echo Yii::$app->request->BaseUrl?>/images/cabinet_pdf.png" alt=""/></a></td>
                    </tr>
                    <tr>

                        <td>Order Gouide 1</td>
                        <td>2/12/2015</td>
                        <td><a href=""><img src="<?php
                            echo Yii::$app->request->BaseUrl?>/images/cabinet_pdf.png" alt=""/></a></td>
                    </tr>
                    <tr>

                        <td>Order Gouide 1</td>
                        <td>2/12/2015</td>
                        <td><a href=""><img src="<?php
                            echo Yii::$app->request->BaseUrl?>/images/cabinet_pdf.png" alt=""/></a></td>
                    </tr>
                    </tbody>
                </table>

			</div>

		</div>


</div>