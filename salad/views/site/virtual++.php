<?php

use yii\helpers\Url;

?>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="push-down-30">
				<div class="banners--big">
					<strong> VIRUAL SALAD BAR</strong>
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
						<li class="panel dropdown"> <!-- We add the panel class to workaround collapsing menu items in Bootstrap -->
							<a data-toggle="collapse" data-parent="#menu-bar" href="#collapseOne">
								menu
							</a>
							<ul id="collapseOne" class="panel-collapse collapse"> <!-- Notice the ID of this element must match the href attribute in the <a> element above it. Also we have added the panel-collapse class -->
								<li><a href="#">menu</a></li>
								<li><a href="#">menu</a></li>
								<li><a href="#">menu</a></li>
								<li><a href="#">menu</a></li>
							</ul>
						</li>
						<li class="panel dropdown"> <!-- We add the panel class to workaround collapsing menu items in Bootstrap -->
							<a data-toggle="collapse" data-parent="#menu-bar" href="#collapseTwo">
								menu
							</a>
							<ul id="collapseTwo" class="panel-collapse collapse"> <!-- Notice the ID of this element must match the href attribute in the <a> element above it. Also we have added the panel-collapse class -->
								<li><a href="#">menu</a></li>
								<li><a href="#">menue</a></li>
								<li><a href="#">menu</a></li>
								<li><a href="#">menu</a></li>
							</ul>
						</li>
						<li><a href="#">menu</a></li>
						<li><a href="#">menus</a></li>
						<li><a href="#">menu</a></li>
						<li><a href="#">menu</a></li>


					</ul>
				</div>

				<div class="clearfix"></div>

			</div>

		</div>
		<div class="col-md-9">
			<div class="row">
				<div class="col-xs-12">
					<div class="push-down-30">
						<div class="banners--big mar_banner">
							<strong> CHOOSE INGREDIENTS</strong>
						</div>
					</div>
				</div>
			</div>


		</div>
	</div>

</div>
<?

echo "<script language='javascript'>var all_items = ".$var."</script>";
?>
<?php
$var = \yii\helpers\Json::decode($var);
//var_dump($var);
 foreach($var as $prod_item){
     if($prod_item['parent_id'] !==0){
     echo "<div id='prod-".$prod_item['id']."' class='prod_items'>".$prod_item['name']."</div>";}

  }

?>
<div > Total Fat <strong class="result"></strong></div>
<div class="igred"></div>