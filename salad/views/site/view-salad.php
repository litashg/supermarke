<?php

use yii\helpers\Url;
$this->title = 'Your salad  "'.$u_salad->name.'"';
$this->params['breadcrumbs'][] = ['label' => 'Virtual salad bar', 'url' => Url::toRoute(['/site/virtual'])];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="container">
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="row ">
        <div class="col-xs-12 col-sm-12 col-md-12 upper_pad ">
            <strong class="upper_name"> <?=$u_salad->name;?> </strong>
        </div>

    </div>
<div class="img_cont">
    <p style="float: left"><?= DateTime::createFromFormat('Y-m-d H:i:s', $u_salad->created)->format('d-m-Y H:i').'<br>';?></p>

</div>
    <div class="balast"></div>
</div>

<!--MENU-->

</div>
<!--    <a class="tester" href="http://google.com.ua">FACE</a>-->

</div>
    <img width="100%" height="100%" src="<?= \Yii::$app->request->BaseUrl.'/usersalad/'.$u_salad->img?>" alt=""/>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">


                <div class="row ">
                    <div class="col-xs-6 col-sm-6 col-md-6  ">
                        <a class="cat_name cat_print" href=""><spna class="glyphicon glyphicon-print" ></spna><span> PRINT RECEPIE</span></a>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 pull-right ">
                        <span class="pull-right">SHARE RECIPE</span></br>
                        <!--            <a class="at_btn style_at " href=""><span>&#64;</span></a>-->
                        <!--            <a target="_blank" class="at_btn style_fb" href=""><span class="zocial-facebook"></span></a>-->
                        <div id="fb-root" class="pull-right"></div>
                        <div class="fb-share-button pull-right" data-href="" data-layout="button_count"></div>
                    </div>
                </div>
                <div class="balast"></div>
            </div>

            <!--MENU-->

        </div>
        <!--    <a class="tester" href="http://google.com.ua">FACE</a>-->

    </div>
<?php
$this->registerJsFile('js/face.js')
?>