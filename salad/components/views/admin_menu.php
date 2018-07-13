<?
use yii\helpers\Url;
?>
<div id="navbar" class="navbar navbar-inverse my_navbar navbar-fixed-top">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle tog_but" data-toggle="collapse" data-target=".navbar-collapse1">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <div class="clearfix"></div>
    <div class="collapse navbar-collapse navbar-collapse1">
        <ul class="nav nav1 nav-stacked" id="menu-bar"> <!-- Notice the "nav-stacked" class we added here -->
            <li><a href="<?=Url::toRoute('/category/index')?>" class="list-group-item <?if($params['action']=="category") echo "active"?>">CATEGORIES</a></li>
            <li><a href="<?=Url::toRoute('/product/index')?>" class="list-group-item <?if($params['action']=="product") echo "active"?>">PRODUCTS</a></li>
            <li><a href="<?= Url::to(['user/index'])?>" data-method="post">USERS</a></li>
            <li><a href="<?= Url::to(['salad-items/index'])?>" data-method="post">SALAD ITEMS</a></li>
            <li><a href="<?= Url::to(['user-salad/index'])?>" data-method="post">USER SALADS</a></li>
            <li><a href="<?= Url::to(['allergens/index'])?>" data-method="post">SALAD ALLERGENS</a></li>
            <li><a href="<?= Url::to(['page/index'])?>" data-method="post">STATIC PAGES</a></li>
            <li><a href="<?= Url::to(['admin/main-slider'])?>" data-method="post">MAIN SLIDER</a></li>
            <li><a href="<?= Url::to(['site/logout'])?>" data-method="post">LOGOUT</a></li>


        </ul>
    </div>
    <div class="clearfix"></div>
</div>





