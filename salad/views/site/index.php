<?php
use \app\models\Category;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\captcha\Captcha;
/* @var $this yii\web\View */
$this->title = 'Supermarketers';
?>


<!--CAROUSEL-->
<div data-interval="5000" data-ride="carousel" class="carousel  slide  carousel--fixed-height" id="organique-jumbotron-slider">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php
        $i = 0;
        $ci = 0;
        $active1 ='';
        foreach($images as $image){
            $active1 = '';
            if($ci==0){
                $ci = 1;
                $active1 = 'active';
            }
            ?>
        <li  data-slide-to="<?=$i?>" data-target="#organique-jumbotron-slider" class="<?=$active1?>"></li>
        <?php
        $i++;
        }?>
<!--        <li data-slide-to="1" data-target="#organique-jumbotron-slider" class=""></li>-->
<!--        <li data-slide-to="2" data-target="#organique-jumbotron-slider" class="active"></li>-->
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner  carousel-inner--captions ">
<!--        <div class="item my_itm">-->
<!--            <img height="420" width="1920" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" pagespeed_url_hash="1966863437" alt="organic-slider-1" class="attachment-jumbotron-slider wp-post-image sli_de_img" src="images/dark_wood.jpg" style="margin-left: -248px;">	<div class="carousel-caption">-->
<!--                <div class="jumbotron__container">-->
<!--                    <h2 class="jumbotron__subtitle">-->
<!--                        Awesome oppurtunity to save a lot of money on	</h2>-->
<!--                    <h1 class="jumbotron__title">-->
<!--                        FRESH ORGANIC FOOD	</h1>-->
<!--                    <a target="_self" style="color:#f3f2eb;background-color:#fe6e3a;border-color:#cb582e;border-radius:3px;-moz-border-radius:3px;-webkit-border-radius:3px" class="su-button su-button-style-default" href="http://themeforest.net/item/organique-wordpress-theme-for-healthy-food-shop/7312458?ref=ProteusThemes"><span style=""> Buy theme</span></a> &nbsp; <a target="_self" style="color:#f3f2eb;background-color:#b1b0a7;border-color:#8e8d86;border-radius:3px;-moz-border-radius:3px;-webkit-border-radius:3px" class="su-button su-button-style-default" href="https://demo.proteusthemes.com/organique/theme-features/"><span style=""> Read More</span></a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="item my_itm">-->
<!--            <img height="420" width="1920" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" pagespeed_url_hash="2555863279" alt="organic-slider-3" class="attachment-jumbotron-slider wp-post-image sli_de_img" src="images/dark_wood.jpg" style="margin-left: -248px;">	<div class="carousel-caption">-->
<!--                <div class="jumbotron__container">-->
<!--                    <h2 class="jumbotron__subtitle">-->
<!--                        Awesome oppurtunity to save a lot of money on	</h2>-->
<!--                    <h1 class="jumbotron__title">-->
<!--                        FRESH ORGANIC FOOD	</h1>-->
<!--                    <a target="_self" style="color:#f3f2eb;background-color:#fe6e3a;border-color:#cb582e;border-radius:3px;-moz-border-radius:3px;-webkit-border-radius:3px" class="su-button su-button-style-default" href="http://themeforest.net/item/organique-wordpress-theme-for-healthy-food-shop/7312458?ref=ProteusThemes"><span style=""> Buy theme</span></a> &nbsp; <a target="_self" style="color:#f3f2eb;background-color:#b1b0a7;border-color:#8e8d86;border-radius:3px;-moz-border-radius:3px;-webkit-border-radius:3px" class="su-button su-button-style-default" href="https://demo.proteusthemes.com/organique/theme-features/"><span style=""> Read More</span></a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

        <?php
//        $c  = count($images);
//
//        for($i=0;$i<=$c;$i++):
//            if($i=0){
//                $active = 'active';
//            }else{
//                $active='';
//            }

        $c = 0;
        $i = 0;
        foreach($images as $image){

            $active = '';
            if($c==0){
                $c = 1;
                $active = 'active';
            }

       ?>
        <div class="item <?=$active?> my_itm">
            <img height="420" width="1920"  onload="pagespeed.CriticalImages.checkImageForCriticality(this);" pagespeed_url_hash="2<?=$i?>6136<?=$i?>358" alt="organic-slider-<?=$i?>" class="attachment-jumbotron-slider wp-post-image sli_de_img" src="<?php echo Yii::$app->request->BaseUrl?>/uploads/main_slider/<?=$image->image?>" style="margin-left: -248px;">	<div class="carousel-caption">
                <div class="jumbotron__container">
<!--                    <h2 class="jumbotron__subtitle">-->
<!--                        Awesome oppurtunity to save a lot of money on	</h2>-->
<!--                    <h1 class="jumbotron__title">-->
<!--                        FRESH ORGANIC FOOD	</h1>-->
<!--                    <a target="_self" style="color:#f3f2eb;background-color:#fe6e3a;border-color:#cb582e;border-radius:3px;-moz-border-radius:3px;-webkit-border-radius:3px" class="su-button su-button-style-default" href="http://themeforest.net/item/organique-wordpress-theme-for-healthy-food-shop/7312458?ref=ProteusThemes"><span style=""> Buy theme</span></a> &nbsp; <a target="_self" style="color:#f3f2eb;background-color:#b1b0a7;border-color:#8e8d86;border-radius:3px;-moz-border-radius:3px;-webkit-border-radius:3px" class="su-button su-button-style-default" href="https://demo.proteusthemes.com/organique/theme-features/"><span style=""> Read More</span></a>-->
                </div>
            </div>
        </div>
<?php
            $i++;
        }?>
<!--        --><?php //endfor ?>
    </div>
    <!-- Controls -->
    <a data-slide="prev" href="#organique-jumbotron-slider" class="left  carousel-control">
        <span class="glyphicon  glyphicon-chevron-left"></span>
    </a>
    <a data-slide="next" href="#organique-jumbotron-slider" class="right  carousel-control">
        <span class="glyphicon  glyphicon-chevron-right"></span>
    </a>
    </a>
</div>
<!--CAROUSEL-->



<div class="container">
<div class="widgets__heading--line">
    <h4 class="widgets__heading">Welcome to Supermarketers.com</h4>
</div>
<h3 class="text-center" >Home of Isabelle's Kitchen, Inc. and T.J. Pupillo, Inc.</h3>
<div class="products-navigation  push-down-15">

    <div class="row">
        <div class="col-xs-12 col-sm-4">
            <div class="widgets__navigation">
                <div class="aligh_center ">
                    <img alt="#" class="product__img" src="images/cat_1_new.png" height="80px">
                    <h5 class="green cat_text_head">COMMISSARY‐STYLE PRODUCTION</h5>
                </div>
                <p class="cat_text">Isabelle’s Kitchen manufactures premium quality salads,
                    sides and dips for the wholesale, foodservice and retail industries using
                    commissary‐style production to ensure the freshest product possible.</p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4">
            <div class="widgets__navigation">
                <div class="aligh_center ">
                    <img alt="#" class="product__img" src="images/cat_2_new.png"   height="80px">
                    <h5 class="green cat_text_head">CUSTOMIZED PROGRAMS</h5>
                </div>

<p class="cat_text">Salad Bar Tenders distributes salad bar products, develops customized salad bar programs for supermarkets,
    and trains salad bar staff to display our products in an attractive, food safe manner.</p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4">
            <div class="widgets__navigation">
                <div class="aligh_center ">
                    <img alt="#" class="product__img" src="images/cat_3_new.png"  height="80px">
                    <h5 class="green cat_text_head">HOME‐STYLE RECIPES</h5>
                </div>
                <p class="cat_text">Maple Avenue Foods is the clean‐label line of salads and sides from Isabelle’s Kitchen made with NO preservatives,
                    antibiotics, chemicals, artificial ingredients or high fructose corn syrup.</p>
            </div>
        </div>


    </div>
</div>

    <!--3 category-->
</div>
  <div class="row no_marg  ">

    <div class="col-xs-12  col-sm-12 featured_text">
      <div class="products-navigation__arrows pattern_show arr">
        <a href="#js--latest-products-carousel" data-slide="prev"><span class="glyphicon  glyphicon-chevron-left products-navigation__arrow @2x arr_left"></span></a>&nbsp;
          <span class=" carouser_text_1">Featured</span> <span class=" carouser_text_2">Products</span>

        <a href="#js--latest-products-carousel" data-slide="next"><span class="glyphicon  glyphicon-chevron-right products-navigation__arrow @2x arr_right"></span></a>
      </div>
    </div>
  </div>

<!-- Products -->
<div id="js--latest-products-carousel" class="carousel slide" data-ride="carousel" data-interval="0">
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <div class="row ">
          <?php
          for($i=0;$i<=3;$i++){
          ?>
            <div class="xxs-12-cat col-xs-6  col-sm-6 col-md-3  js--isotope-target     js--cat-5" data-price="2.73" data-rating="5">

  <div class="products__single carou_small  ">
    <figure class="products__image menu-img menu-img_index  ">
        <a href="<?=
        Url::toRoute(['site/view_prod', 'id' => $best_prod[$i]['alias']]);?>">
        <img alt="#" class="product__image img_100 "  src="<?php
        $img_m_path = 'product.jpg';

        if($best_prod[$i]['prod_img']){
            $img_m_path = $best_prod[$i]['prod_img'];
        }

        echo Yii::$app->request->BaseUrl?>/uploads/<?=$img_m_path?>">

      <div class="product-overlay">
<!--        <a class="product-overlay__more" href="single-product.html">-->
<!--          <span class="glyphicon glyphicon-search"></span>-->
<!--        </a>-->
      </div>
        </a>
    </figure>
    <div class="row">
      <div class="col-xs-9">
        <h5 class="products__title">
          <a class="products__link  js--isotope-title" href="<?=
          Url::toRoute(['site/view_prod', 'id' => $best_prod[$i]['alias']]);?>"><?=$best_prod[$i]['name']?></a>
        </h5>
      </div>
    </div>
      <div class="row">
          <div class="col-xs-9">
              <h5 class="products__title">
                  <a class="products__link  js--isotope-title sub_disc" href="single-product.html"><?//=$best_prod['desc_title']?></a>
              </h5>
          </div>
      </div>

  </div>



</div>

          <?php
              if($i==1){
                  echo "<div class='clearfix visible-xs'></div>";
              }
          }
          ?>

      </div>
    </div>

    <div class="item">
      <div class="row">
          <?php
          for($i=4;$i<=7;$i++) {
              ?>

              <div class="xxs-12-cat col-xs-6  col-sm-6 col-md-3  js--isotope-target     js--cat-5" data-price="2.73" data-rating="5">

                  <div class="products__single carou_small  ">
                      <figure class="products__image menu-img menu-img_index  ">
                          <a href="<?=
                          Url::toRoute(['site/view_prod', 'id' => $best_prod[$i]['alias']]);?>">
                              <img alt="#" class="product__image img_100 "  src="<?php
                              $img_m_path = 'product.jpg';

                              if($best_prod[$i]['prod_img']){
                                  $img_m_path = $best_prod[$i]['prod_img'];
                              }

                              echo Yii::$app->request->BaseUrl?>/uploads/<?=$img_m_path?>">

                              <div class="product-overlay">

                              </div>
                          </a>
                      </figure>
                      <div class="row">
                          <div class="col-xs-9">
                              <h5 class="products__title">
                                  <a class="products__link  js--isotope-title" href="<?=
                                  Url::toRoute(['site/view_prod', 'id' => $best_prod[$i]['alias']]);?>"><?=$best_prod[$i]['name']?></a>
                              </h5>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-xs-9">
                              <h5 class="products__title">
                                  <a class="products__link  js--isotope-title sub_disc" href="single-product.html"><?//=$best_prod['desc_title']?></a>
                              </h5>
                          </div>
                      </div>

                  </div>



              </div>

          <?php
              if($i==5){
                  echo "<div class='clearfix visible-xs'></div>";
              }
          }
          ?>
      </div>
    </div>
  </div>
</div>

<div class="container smaller">
    <div class="widgets__heading--line">
        <h4 class="widgets__heading">What makes us unique</h4>
    </div>

    <!--4 category-->
    <div class="products-navigation  push-down-15">

        <div class="row">
            <div class="col-xs-12 col-sm-3">
                <div class="widgets__navigation">
                    <div class="aligh_center ">
                        <img alt="#" class="product__img" src="images/uniq_1.png" width="100px" height="100px">
                        <h4 class="green cat_text_head">QUALITY</h4>
                    </div>
                    <p class="cat_text">
                        We know that as a valued
                        supplier to our customers,
                        we are responsible for
                        maintaining consistent
                        product quality. We have
                        built relationships with
                        suppliers over the year to
                        ensure we have consistent
                        quality ingredients to make
                        consistent, high quality
                        products.</p></div>
            </div>
            <div class="col-xs-12 col-sm-3">
                <div class="widgets__navigation">
                    <div class="aligh_center ">
                        <img alt="#" class="product__img" src="images/uniq_2.png" width="100px" height="100px">
                        <h4 class="green cat_text_head">VARIETY</h4>
                    </div>
                    <p class="cat_text">Salad Bar Tenders offers
                        over 200 items for your
                        salad bar: highlighted by
                        our own prepared salads
                        from Isabelle's Kitchen,
                        which can be used on your
                        salad bar, deli, or wherever
                        your creativity takes them.
                        We are continually adding more
                        selections to our menu and
                        responding to customer requests.
                    </p></div>
            </div>
            <div class="col-xs-12 col-sm-3">
                <div class="widgets__navigation">
                    <div class="aligh_center ">
                        <img alt="#" class="product__img" src="images/uniq_3.png" width="100px" height="100px">
                        <h4 class="green cat_text_head">FRESHNESS</h4>
                    </div>

                    <p class="cat_text">Isabelle's Kitchen acts
                        as your commissary, preparing
                        salads "just in time"
                        so you are able to offer
                        your customers the freshest
                        salads. Salad Bar Tenders
                        carefully maintains our lean
                        inventory to ensure all
                        distributed product is as
                        fresh as possible.   </p></div>
            </div>
            <div class="col-xs-12 col-sm-3">
                <div class="widgets__navigation">
                    <div class="aligh_center ">
                        <img alt="#" class="product__img" src="images/uniq_4.png" width="180px" height="100px">
                        <h4 class="green cat_text_head">SERVICE</h4>
                    </div>
                    <p class="cat_text">Our family of companies is
                        dedicated to providing the
                        best customer service available;
                        we know exceptional service makes
                        a difference. Our own customer service
                        staff is always available to answer
                        your call or email during business
                        hours.
                    </p> </div>
            </div>


        </div>
    </div>
</div>

<div class="container smaller">
    <div class="widgets__heading--line">
        <h4 class="widgets__heading">About the Virtual Salad Bar</h4>
    </div>

    <!--4 category-->
    <div class="products-navigation  push-down-15">

        <div class="row">
            <div class="col-xs-12 col-sm-4">
                <div class="widgets__navigation">
                    <div class="aligh_center ">
                        <img alt="#" class="product__img" src="images/vsb_promo1_sm.png" width="100px" height="100px">
                        <h4 class="green cat_text_head">Nutrition & Allergens</h4>
                    </div>
                    <p class="cat_text">
                        If you have dietary restrictions or simply want to know exactly what you're eating, our Virtual Salad Bar calculates the nutrition and allergen information for your salad bar selections.</p></div>
            </div>
            <div class="col-xs-12 col-sm-4">
                <div class="widgets__navigation">
                    <div class="aligh_center ">
                        <img alt="#" class="product__img" src="images/vsb_promo2_sm.png" width="100px" height="100px">
                        <h4 class="green cat_text_head">Cost Estimate</h4>
                    </div>
                    <p class="cat_text">To help you estimate the cost of your salad at your local supermarket salad bar, our Virtual Salad Bar calculates the weight (in lbs.) based on your selections.
                    </p></div>
            </div>
            <div class="col-xs-12 col-sm-4">
                <div class="widgets__navigation">
                    <div class="aligh_center ">
                        <img alt="#" class="product__img" src="images/vsb_promo3_sm.png" width="100px" height="100px">
                        <h4 class="green cat_text_head">Create & Share</h4>
                    </div>

                    <p class="cat_text">If you have a special salad recipe you want to share with the world, our Virtual Salad Bar has a social media share option and you can submit your recipe to us to be featured on our website.</p></div>
            </div>




        </div>

        <a href="/web/site/virtual">
            <div class="green_btn">Try the Virtual Salad Bar</div>
        </a>
    </div>
</div>
    <!--4 category-->

<div class="testimonials   pattern_show">
  <div class="container">
    <div class="row">
      <div class="col-sm-3  hidden-xs">
        <div class="testimonials__quotes">
          <img alt="#" class="testimonials__quotes--img" src="images/quotes.png">
        </div>
      </div>
      <div class="col-xs-12  col-sm-6">
        <a href="#js--testimonails-carousel" data-slide="prev"><span class="glyphicon  glyphicon-chevron-left products-navigation__arrow arr_left "></span></a>
          <span class=" carouser_text_1">Customer </span> <span class=" carouser_text_2">Testimonials</span>
        <a href="#js--testimonails-carousel" data-slide="next"><span class="glyphicon  glyphicon-chevron-right products-navigation__arrow arr_right "></span></a>
        <hr class="divider-dark">
        <div id="js--testimonails-carousel" class="carousel  slide" data-ride="carousel" data-interval="0">
          <div class="carousel-inner">
            <div class="item  active">
              <q class="testimonials__text">Every week I go shopping for my 90 year old mother and every week she gets 1/4 pound of ham and cheese and she always says to me, "don't forget the Mr. Ron's cole slaw. A sandwich is not a sandwich without the Mr. Ron's.</q><br><br>
              <cite><b>Nanci Gilberg</b></cite>
            </div>
<!--            <div class="item">-->
<!--              <q class="testimonials__text">THANKS! I really appreciate the FAST service of Proteus! Really Really Happy with the theme and support! Thanks again.</q><br><br>-->
<!--              <cite><b>Timonvki,</b></cite> Themeforest user-->
<!--            </div>-->
<!--            <div class="item">-->
<!--              <q class="testimonials__text">Great theme, perfect for any salon. Client loves it. Very good documentation and easy to use and setup.</q><br><br>-->
<!--              <cite><b>Ypclarke,</b></cite> Themeforest user-->
<!--            </div>-->
          </div>
        </div>
      </div>
      <div class="col-sm-3  hidden-xs">
        <div class="testimonials__quotes--rotate">
          <img alt="#" class="testimonials__quotes--img" src="images/quotes.png">
        </div>
      </div>
    </div>
  </div>
</div>

    <!--Form-->

<div class="container form_cont">

    <div class="row">


            <h4 class="ready">Ready to work with us?</h4>

        <div class="col-xs-12 col-sm-6 pad_l "><h4 class="green pad_l bigger">I’m ready!</h4>


            <address class="pad_l">
                <strong class="up">Isabelle's Kitchen (Manufacturing/Private Label)</strong><br>
                417 Main Street, Harleysville, PA 19438<br>
                800-355-7252<br>
            </address>
<!--            <address class="pad_l">-->
<!--                <a href="mailto:#"> info@supermarketers.com</a>-->
<!--            </address>-->

            <address class="pad_l">
                <strong class="up"> Salad Bar Tenders (Distribution/Salad Bar Programs)</strong><br>
                855 Maple Avenue, Harleysville, PA 19438<br>
                800-355-8806<br>
            </address>

        </div>
        <div class="col-xs-12 col-sm-6 bor_der ">
            <h4 class="green pad_l bigger text-center ">Email contact form</h4>



<div class="row ">
    <div class="col-xs-12 col-sm-6 ">
        <?php $form = ActiveForm::begin(['id' => 'contact-form','options'=>['role'=>'form']]); ?>
        <div class="form-group">
        <?= $form->field($model, 'name')->textInput(array('placeholder' => 'Your name'))->label(false)?>
            </div>
        <div class="form-group">
        <?= $form->field($model, 'phone')->textInput(array('placeholder' => 'Phone number'))->label(false) ?>
            </div>
        <div class="form-group">
        <?= $form->field($model, 'email')->textInput(array('placeholder' => 'E-mail address'))->label(false) ?>
            </div>
        <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
            'template' => '<div class="row"><div class="col-md-12">{image}</div><div class="col-md-12">{input}</div></div>',
        ])->label(false) ?>
    </div>
        <div class="col-xs-12 col-sm-6 ">
        <div class="form-group">
        <?= $form->field($model, 'body')->textArea(['rows' => 5,'placeholder'=>'Message','class'=>'form-control text_b'])->label(false) ?>
            </div>
        <div class="form-group">
            <?= Html::submitButton('SEND', ['class' => 'btn btn-success fl_r add_pad', 'name' => 'contact-button','style'=>'margin-top:48px!important;']) ?>
        </div>
            </div>
        <?php ActiveForm::end(); ?>
<script>
    $('#contactform-verifycode').attr('placeholder','Verification Code');
</script>


<!--                <form role="form">-->
<!---->
<!--                    <div class="form-group">-->
<!---->
<!--                        <input type="name" class="form-control" id="exampleInputName1" placeholder="Your name">-->
<!--                    </div>-->
<!--                    <div class="form-group">-->
<!---->
<!--                        <input type="phone" class="form-control" id="exampleInputPhone1" placeholder="Phone number">-->
<!--                    </div>-->
<!--                    <div class="form-group">-->
<!---->
<!--                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="E-mail address">-->
<!--                    </div>-->
<!--                        </div>-->
<!--                      <div class="col-xs-12 col-sm-6 ">-->
<!--                    <div class="form-group">-->
<!--                    <textarea class="form-control text_a" rows="5" placeholder="Your question..." ></textarea>-->
<!--                    </div>-->
<!--        <div class="form-group">-->
<!--                    <button type="submit" class="btn btn-success fl_r add_pad">SEND</button>-->
<!--        </div>-->
<!--                </form>-->
    </div>
            </div>
        </div>

    </div>
</div>

<!--<div class="container">-->
<!--        <div class="banners--big  banners--big-left">-->
<!--            <div class="row">-->
<!--                <div class="col-xs-12  col-md-7">-->
<!--                    <div class="banners--big__text">-->
<!--                        Sign up on newsletter and  recive our informational updates twice a month-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-xs-12  col-md-5">-->
<!--                    <div class="banners--big__form">-->
<!--                        <form action="http://proteusthemes.us4.list-manage.com/subscribe/post?u=ea0786485977f5ec8c9283d5c&amp;id=5dad3f35e9" method="post" name="mc-embedded-subscribe-form" role="form" target="_blank">-->
<!--                            <div class="form-group  form-group--form">-->
<!--                                <input type="email" name="EMAIL" class="form-control  form-control--form" placeholder="Enter your E-mail address" required>-->
<!--                                <button class="btn  btn-primary" type="submit">SIGN UP NOW</button>-->
<!--                            </div>-->
<!--                            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
<!--                            <div style="position: absolute; left: -5000px;"><input type="text" name="b_ea0786485977f5ec8c9283d5c_5dad3f35e9" value=""></div>-->
<!--                        </form>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--</div>-->



