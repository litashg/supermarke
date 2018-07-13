<?php

use yii\helpers\Url;
$this->title = 'Virtual salad bar';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="container">
<!--	<div class="row ">-->
<!--		<div class="col-xs-12 upper_pad ">-->
<!--					<strong class="upper_name"> Virtual salad bar</strong>-->
<!--		</div>-->
<!--	</div>-->
    <div class="row">
        <div class="col-xs-12">
            <div class="push-down-30">
                <div class="banners--big my_banner">
                    <strong > Virtual Salad Bar</strong>
                </div>
            </div>
        </div>
    </div>

    <!-- -->



    <!-- Trigger the modal with a button -->
    <div class=" green_btn " style="max-width: 340px!important; cursor: pointer" data-toggle="modal" data-target="#myModal"><i class="fa fa-question-circle"></i> &nbsp;How to use the Virtual Salad Bar</div>
    <br/>
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">How to use the Virtual Salad Bar</h4>
                </div>


                <div class="modal-body">
                    <div class="row">1. Choose Ingredient Category.</div>
                    <br/>
                    <div class="row">  2. Click on Ingredients you would like to add.</div>
                    <div class="row">a. If you would like to add more than one serving click the + in the ingredient tab.</div>
                    <div class="row"> b. To remove an ingredient, deselect the photo.</div>
                    <br/>
                    <div class="row">3. After all ingredients are added (using steps 1&2), enter a name for your salad in the field.</div>
                    <br/>
                    <div class="row"> 4. Click save recipe for a summary page and sharing options.</div>
                    <br/>
                    <div class="row">  5. Review final ingredients, net weight, nutrition facts and allergen information.</div>
                    <br/>
                    <div class="row"> 6. Share your salads with us, and your community.</div>
                    <br/>
                </div>
<!--                <div class="modal-footer">-->
<!--                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
<!--                </div>-->
            </div>

        </div>
    </div>


    <!-- -->
<!--    <a href="/web/site/page/how_to_use_the_Virtual_Salad_Bar">-->
<!--        <div class="green_btn" style="max-width: 330px!important;"><i class="fa fa-question-circle"></i>How to use the Virtual Salad Bar</div>-->
<!--    </a>-->
<!---->
<!--    <br/>-->


    <div class="row show-grid no_all">
<!--        <div class="col-xs-1 col-sm-1 col-md-1 "></div>-->
            <div class="col-xs-12 col-sm-12 col-md-12 choose_sal">
                <div class="row show-grid">
                <div style="overflow: hidden" class="col-xs-4 col-sm-6 col-md-6 img_cont ">
                    <div  class="img_cont">
                        <img class="cho_img over_img " style="" src="<?php echo Yii::$app->request->BaseUrl?>/images/salad_bar/choose_salad1.jpg" alt=""/>
                    </div>
                </div>
                <div class="col-xs-8 col-sm-6 col-md-6 img_cont over_flow ">
                    <div class="cho_a "><a class="cho_a_l" href="<?php echo Url::toRoute('site/create-salad')?>"><span class="line_h">Create Your Salad</span></a></div>
                </div>
            </div>
        </div>
<!--        <div class="col-xs-1 col-sm-1 col-md-1"></div>-->
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center or_use">
<!--            <p>or use <a class="most_pop" href=""> most popular recipes</a></p>-->
        </div>
    </div>
    <?php
    foreach ($admin_salads as $admin_sld ) {
        if (count($admin_sld) > 0) {
            echo "<div class='row'>
                     <div class='col-xs-12 col-sm-12 col-md-12'>
                <div class='row'>";
            for ($c = 1; $c <= count($admin_sld) - 1; $c++) {
                    ?>
                    <div class="col-xs-12 col-sm-3 col-md-3 sal_cont">
                        <a class="link_enab"
                           href="<? echo Url::toRoute(['create-salad', 'id' => $admin_sld[$c]['uniq_id']]); ?>">
                            <img class="sal_img"
                                 <?php
                                 if($admin_sld[$c]['img']){
                                     $img = '/uploads/user_salad/'.$admin_sld[$c]['img'];
                                 }else{
                                     $img = '/images/salad_bar/sal_bar_1.jpg';
                                 }
                                 ?>
                                 src="<?php echo Yii::$app->request->BaseUrl.$img?>" alt=""/>
                            <span class="sal_name"><?= $admin_sld[$c]['name'] ?></span>
                        </a>
                    </div>
                <?php
                }
                echo "   </div>
                          </div>
                 </div>";
            }

    }

    ?>

<!--    GOODS-->
<!--    <div class="row">-->
<!--        <div class="col-xs-12 col-sm-12 col-md-12">-->
<!--            <div class="row">-->
<!--                <div class="col-xs-3 col-sm-3 col-md-3 sal_cont">-->
<!--                    <a class="link_c" href="">-->
<!--                    <img class="sal_img" src="--><?php //echo Yii::$app->request->BaseUrl?><!--/images/salad_bar/sal_bar_1.jpg" alt=""/>-->
<!--                        <span class="sal_name">Salad 1</span>-->
<!--                    </a>-->
<!--                </div>-->
<!---->
<!--                <div class="col-xs-3 col-sm-3 col-md-3 sal_cont">-->
<!--                    <a class="link_c" href="">-->
<!--                    <img class="sal_img" src="--><?php //echo Yii::$app->request->BaseUrl?><!--/images/salad_bar/sal_bar_2.jpg" alt=""/>-->
<!--                        <span class="sal_name">Salad 1</span>-->
<!--                        </a>-->
<!--                </div>-->
<!--                <div class="col-xs-3 col-sm-3 col-md-3 sal_cont">-->
<!--                    <a class="link_c" href="">-->
<!--                    <img class="sal_img" src="--><?php //echo Yii::$app->request->BaseUrl?><!--/images/salad_bar/sal_bar_3.jpg" alt=""/>-->
<!--                    <span class="sal_name">Salad 3</span>-->
<!--                        </a>-->
<!--                </div>-->
<!--                <div class="col-xs-3 col-sm-3 col-md-3 sal_cont">-->
<!--                    <a class="link_c" href="">-->
<!--                        <img class="sal_img" src="--><?php //echo Yii::$app->request->BaseUrl?><!--/images/salad_bar/sal_bar_3.jpg" alt=""/>-->
<!--                        <span class="sal_name">Salad 3</span>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!--            </div>-->
<!--    </div>-->
<!--    <div class="row">-->
<!--        <div class="col-xs-12 col-sm-12 col-md-12">-->
<!--            <div class="row">-->
<!--                <div class="col-xs-3 col-sm-3 col-md-3 sal_cont">-->
<!--                    <a class="link_c" href="">-->
<!--                        <img class="sal_img" src="--><?php //echo Yii::$app->request->BaseUrl?><!--/images/salad_bar/sal_bar_1.jpg" alt=""/>-->
<!--                        <span class="sal_name">Salad 1</span>-->
<!--                    </a>-->
<!--                </div>-->
<!---->
<!--                <div class="col-xs-3 col-sm-3 col-md-3 sal_cont">-->
<!--                    <a class="link_c" href="">-->
<!--                        <img class="sal_img" src="--><?php //echo Yii::$app->request->BaseUrl?><!--/images/salad_bar/sal_bar_2.jpg" alt=""/>-->
<!--                        <span class="sal_name">Salad 1</span>-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="col-xs-3 col-sm-3 col-md-3 sal_cont">-->
<!--                    <a class="link_c" href="">-->
<!--                        <img class="sal_img" src="--><?php //echo Yii::$app->request->BaseUrl?><!--/images/salad_bar/sal_bar_3.jpg" alt=""/>-->
<!--                        <span class="sal_name">Salad 3</span>-->
<!--                    </a>-->
<!--                </div>-->
<!--                <div class="col-xs-3 col-sm-3 col-md-3 sal_cont">-->
<!--                    <a class="link_c" href="">-->
<!--                        <img class="sal_img" src="--><?php //echo Yii::$app->request->BaseUrl?><!--/images/salad_bar/sal_bar_3.jpg" alt=""/>-->
<!--                        <span class="sal_name">Salad 3</span>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--    GOODS END-->
    <div class="balast"></div>

</div>
<?php
//echo "<script language='javascript'>var all_items = ".$var."</script>";
?>
<?php
//$var = \yii\helpers\Json::decode($var);
//var_dump($var);
//foreach($var as $prod_item){
  //  if($prod_item['parent_id'] !==0){
    //    echo "<div id='prod-".$prod_item['id']."' class='prod_items'>".$prod_item['name']."</div>";}

//}

?>
<!--<div > Total Fat <strong class="result"></strong></div>
<div class="igred"></div>-->
