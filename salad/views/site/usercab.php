<?php

use yii\helpers\Url;

?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="push-down-30">
                <div class="banners--big my_banner">
                    <strong> USER CABINET</strong>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">

            <div id="navbar" class="navbar navbar-inverse my_navbar navbar-fixed-top">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle tog_but" data-toggle="collapse" data-target=".navbar-collapse1">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!--                    <a href="  "-->
                    <!--                       title="Home" rel="home">-->
                    <!---->
                    <!--                        <h5 class="site-description">MENU</h5>-->
                    <!--                    </a>-->
                </div>

                <div class="clearfix"></div>
                <div class="collapse navbar-collapse navbar-collapse1">
                    <ul class="nav nav1 nav-stacked" id="menu-bar"> <!-- Notice the "nav-stacked" class we added here -->
                        <li><a href="#">Plant Tour</a></li>
                        <li class="panel dropdown"> <!-- We add the panel class to workaround collapsing menu items in Bootstrap -->
                            <a data-toggle="collapse" data-parent="#menu-bar" href="#collapseOne">
                                Sales Sheets
                            </a>
                            <ul id="collapseOne" class="panel-collapse collapse"> <!-- Notice the ID of this element must match the href attribute in the <a> element above it. Also we have added the panel-collapse class -->
                                <li><a href="#">MAF</a></li>
                                <li><a href="#">Dressing</a></li>
                                <li><a href="#">IKI Product Line</a></li>
                            </ul>
                        </li>

                        <li><a href="#">PDF Documents</a></li>
                        <li><a href="#">Sample Order Form</a></li>
                        <li><a href="<?= Url::to(['site/logout'])?>" data-method="post">LOGOUT</a></li>

                    </ul>
                </div>

                <div class="clearfix"></div>

            </div>

        </div>
        <div class="col-md-9">
            <div class="row">
                <div class="col-xs-12">
                    <div class="push-down-30">
                        <div class="banners--big mar_banner my_banner">
                            <strong> MENU ITEM</strong>
                        </div>
                    </div>
                </div>
            </div>

            <p class="push-down-15 bot_text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec urna risus, hendrerit ut magna fringilla, rhoncus efficitur mi. Mauris molestie sem sit amet varius fringilla. Sed auctor lorem quis erat malesuada varius. Cras dapibus nibh augue, vitae auctor nunc ornare eu. In eget consequat leo. Cras nec congue justo. Integer tempus mollis nunc, vitae iaculis tortor aliquam id. Nulla nec odio gravida, sodales ex ac, aliquam erat. Maecenas sagittis a turpis ac tempus. Vivamus sed orci ut metus vulputate sagittis sit amet id nisl. Ut ac pharetra augue. Sed in nisi nec magna luctus mollis.

                Mauris massa enim, consectetur quis est nec, vestibulum commodo ligula. Etiam ante risus, dignissim congue nulla vel, suscipit interdum leo. Phasellus ultricies nisi nec molestie tempor. Proin non auctor ligula. Suspendisse aliquam auctor nulla ut suscipit. Sed arcu elit, sodales id risus eget, congue egestas libero. Mauris maximus sit amet lorem sed elementum. Quisque lobortis urna quis ipsum bibendum gravida. Quisque mi nunc, tincidunt ut turpis nec, fringilla interdum urna. Vivamus nec elementum massa, nec dapibus metus. Vivamus orci tortor, ornare ut molestie id, aliquam ut arcu. Mauris in justo vel ex faucibus mattis.

                Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc et semper turpis. Suspendisse ac metus pharetra, imperdiet tellus et, sagittis erat. Nam vestibulum ornare ipsum a auctor. Morbi sit amet est efficitur, malesuada eros et, fermentum urna. In vehicula dolor sed metus ornare dapibus. Donec ultrices euismod tempus. Maecenas sagittis vulputate eros, eget semper lectus luctus et. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Suspendisse finibus porta orci, eget tincidunt tellus scelerisque quis. In tristique posuere ex a porta. Maecenas vitae
                diam mi. Donec ut urna rutrum, bibendum velit at, blandit odio. </p>
        </div>
    </div>

</div>