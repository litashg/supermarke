<?php

use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'Create your own salad';
$this->params['breadcrumbs'][] = ['label' => 'Virtual salad bar', 'url' => Url::toRoute(['/site/virtual'])];
$this->params['breadcrumbs'][] = $this->title;

?>
<?php

?>
<div class="container ">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-9">
            <div class="row ">
                <div class="col-xs-12 col-sm-12 col-md-4 upper_pad ">
                    <strong class="upper_name"> Virtual salad bar</strong>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-8 text-right upper_pad_s ">
                    <strong class="upper_name_s"> Create your own salad or use <a class="cho_a_s" href=""> most popular recipes</a></strong>
                </div>
            </div>
            <div class="row ">
                <div class="col-xs-12 col-sm-12 col-md-12 main_c">

                    <?php
                    for($i=0;$i<=count($yii_ingred)-1;$i++)
                        if($yii_ingred[$i]->parent_id==0){
                            if($i==0){
                                echo '<a id="cat_'.$yii_ingred[$i]->id.'" class="cat_name cat_name_active" href=""><span>'.$yii_ingred[$i]->name.'</span></a>';
                            }else{
                        echo '<a id="cat_'.$yii_ingred[$i]->id.'" class="cat_name" href=""><span>'.$yii_ingred[$i]->name.'</span></a>';
                            }
                    }
                    ?>
            </div>
                </div>
                    <div style="clear: both"></div>


<?php

for($i=0;$i<=count($yii_ingred)-1;$i++)
    if($yii_ingred[$i]->parent_id==0){
        if($i==0){
            echo '

<div class="row display_ingred ingred_cat_'.$yii_ingred[$i]->id.'">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="row">';
            $c =0;
            foreach($yii_ingred as $ingred){
                if($ingred->parent_id == $yii_ingred[$i]->id){
                    ?>
                    <div id="cotn_id_<?php echo $ingred->id?>" class="col-xs-6 col-sm-5 col-md-15 ingren_cont ">
                        <a class="link_c" href="">
                            <div class="con">
                                <img class="ingred_img" src="<?php echo Yii::$app->request->BaseUrl ?>/images/salad_bar/ingred_2.jpg"
                                     alt=""/>
                            </div>
                            <a class="ing_ln" href="">
                                <span class="glyphicon glyphicon-plus "></span>
                            </a>
                            <span class="inged_name"><?= $ingred->name ?></span>
                            <span class="inged_count"><?= $ingred->c1_container ?></span>
                        </a>
                    </div>
                    <?php
                    $c++;
                   if($c%5==0){
                       echo' </div>
                        </div>
                    </div>
                     <div class="row display_ingred ingred_cat_'.$yii_ingred[$i]->id.'">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="row">
                    ';

                   }
                }

            }
            echo '  </div>
                        </div>
                    </div>';

//            Disable another ingredients

        }else{
            echo '

<div class="row non_display_ingred ingred_cat_'.$yii_ingred[$i]->id.'" >
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="row">';
            $c =0;
            foreach($yii_ingred as $ingred){
                if($ingred->parent_id == $yii_ingred[$i]->id){
                    ?>
                    <div id="cotn_id_<?php echo $ingred->id?>" class="col-xs-6 col-sm-5 col-md-15 ingren_cont ">
                        <a class="link_c" href="">
                            <div class="con">
                                <img class="ingred_img" src="<?php echo Yii::$app->request->BaseUrl ?>/images/salad_bar/ingred_2.jpg"
                                     alt=""/>
                            </div>
                            <a class="ing_ln" href="">
                                <span class="glyphicon glyphicon-plus "></span>
                            </a>
                            <span class="inged_name"><?= $ingred->name ?></span>
                            <span class="inged_count"><?= $ingred->c1_container ?></span>
                        </a>
                    </div>
                    <?php
                    $c++;
                    if($c%5==0){
                        echo' </div>
                        </div>
                    </div>
                     <div class="row non_display_ingred ingred_cat_'.$yii_ingred[$i]->id.'">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="row">
                    ';

                    }
                }

            }
            echo '  </div>
                        </div>
                    </div>';

        }
    }
//            Disable another ingredients
?>
                                <!--            NON VISIBLE CREATED SALAD-->

            <div id="finish_slad" class="row ">


            </div>

            <div class="row manage_links">
                <div class="col-xs-12 col-sm-8 col-md-8  ">
                    <a id="edit_recipe" class="cat_name cat_name_visib" href=""><spna class="glyphicon glyphicon-arrow-left" ></spna><span> EDIT RECIPE</span></a>
                    <a class="cat_name cat_print cat_name_visib" href="" ><spna class="glyphicon glyphicon-print" ></spna><span> PRINT RECIPE</span></a>
                    <a class="cat_name cat_pdf cat_name_visib" href=""><spna class="glyphicon glyphicon-send" ></spna><span> SEND YOUR RECIPE TO US</span></a>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4  ">
                    <span class="pull-left">SHARE RECIPE</span>
                    <a class="at_btn style_at " href=""><span>&#64;</span></a>
                    <a id="share" class="at_btn style_fb" href="http://www.facebook.com/sharer.php?u=http://bit.ly/FBshareArticle"><span class="zocial-facebook"></span></a>
                    <div id="fb-root"></div>
                    <div class="fb-share-button" data-href="" data-layout="button_count"></div>


                </div>
            </div>
            <div class="balast"></div>
                                   <!--            NON VISIBLE CREATED SALAD-->

            <div class="balast"></div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-3">
<!--MENU-->

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
<!--                   menu 1   -->

     <div class="up_menu print_hide">
         <div class="m_title">
             <input id="salad_name" class="enter form-control" type="text" placeholder="Enter salad name"/>
             <p class="enter green1 green_name"></p>
<!--            <p class="enter">Enter salad name</p>-->
         </div>
         <div class="ingr_main ingr_main_calc ">
         <p class="ingr">Ingredients</p>
<!--         div.ingr_ent>span.ent_span+(a>span.glyphicon.glyphicon-minus)+span+(a>span.glyphicon.glyphicon-plus)-->
<!--        one igren calc-->

    </div>

         <div class="calc_sum">

             <span class="l_t_span">Net wt.</span>
             <span id="grm_to_lbs" class="r_t_span">0 lbs</span>
             <div class="shadow"></div>
         </div>
     </div>
<!--  --><?//= Html::a('SAVE RECIPE', ['site/save-salad'], ['class' => 'btn btn-success dropdown-toggle class_save']) ?>
                        <a href=""class="btn btn-success dropdown-toggle class_save">SAVE RECIPE</a>

<!--                   menu 1   -->
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
<!--                       menu2    -->

                        <div class="up_menu down_menu">
                            <div class="ingr_main">
                                <p class="ingr">Nutrition facts</p>
                              <div class="ser_s">
                                  <div class="pull-left"><span>Serving Size</span></div>
                                  <div class="pull-right"><span id="c1_size">0g</span></div>
                                  <div style="clear: both"></div>
                              </div>
                                <div class="calor">
                                    <div class="pull-left"><span style="font-weight: 600;font-size: 1em">Calories</span></div>
                                    <div id="count_calories" class="pull-right"><span>0</span></div>
                                </div>
                                <table class="table bar_table">
                                    <thead>
                                    <tr>
                                        <th> </th>
                                        <th>APS*</th>
                                        <th>%DV**</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td  class="main_level">Total Fat</td>
                                        <td id="c2_totfat_1">0g</td>
                                        <td id="dv_c2_totfat_1">0%</td>

                                    </tr>
                                    <tr>
                                        <td class="level_d" >Satured Fat</td>
                                        <td id="c2_satfat_1">0g</td>
                                        <td id="dv_c2_satfat_1">0%</td>

                                    </tr>
                                    <tr>
                                        <td class="level_d" >Trans Fat</td>
                                        <td id="c2_transfat_1" >0g</td>
                                        <td id="dv_c2_transfat_1" >0%</td>

                                    </tr>
                                    <tr>
                                        <td class="main_level">Cholesterol</td>
                                        <td id="c2_cholester_1" >0mg</td>
                                        <td id="dv_c2_cholester_1">0%</td>

                                    </tr>
                                    <tr>
                                        <td class="main_level">Sodium</td>
                                        <td id="c2_sod_1" >0mg</td>
                                        <td id="dv_c2_sod_1">0%</td>

                                    </tr>
                                    <tr>
                                        <td class="main_level">Total Carbs</td>
                                        <td id="c3_totcarb_1" >0g</td>
                                        <td id="dv_c3_totcarb_1">0%</td>
                                    </tr>
                                    <tr>
                                        <th class="level_d" scope="row">Dietary Fiber</th>
                                        <td id="c3_dietfib_1" >0g</td>
                                        <td id="dv_c3_dietfib_1" >0%</td>
                                    </tr>
                                    <tr>
                                        <td class="level_d">Sugar</td>
                                        <td id="c3_sugar_1">0g</td>
                                        <td id="dv_c3_sugar_1" >0%</td>
                                    </tr>
                                    <tr class="last_tr">
                                        <td class="main_level last_tr">Protein</td>
                                        <td id="c3_protein_1">0g</td>
                                        <td>0%</td>
                                    </tr>


<!--                                    fddfdfdf-->

                                    </tbody>
                                </table>
                                <table  class="table bar_table down_bar_table">
                                    <tbody>
                                    <tr class="vitamin">
                                        <td width="30%" class="main_level" >Vitamin A</td>
                                        <td id="c2_vit_a"  style="text-align: right!important;" width="10%" >0%</td>
                                        <td width="20%"></td>
                                        <td  width="30%" class="main_level">Vitamin C</td>
                                        <td id="c2_vit_c" style="text-align: right!important;padding-right: 5px!important;"  width="10%">0%</td>
                                    </tr>
                                    <tr class="vitamin vitamin_brd">
                                        <td class="main_level">Iron</td>
                                        <td id="c3_iron" style="text-align: right!important;">0%</td>
                                        <td width="20%"></td>
                                        <td class="main_level">Calcium</td>
                                        <td id="c3_calcium" style="text-align: right!important;padding-right: 5px!important;" >0%</td>
                                    </tr>
                                    </tbody>
                                </table>
                                    <div style="clear: both"></div>
                                <div class="descr_text">
                                    <i>
                                       * Amount Per Serving
                                    </i>
                                    <br/>
                                    <i>
                                        ** Percent Daily Values are based on a 2,000 calorie diet.
                                        Your daily values may be higher or lower depending
                                        on your calorie needs
                                    </i>
                                </div>
                                <div class="alergen">
                                    <div class="alerg_ico">
                                        <span class="aler_text">Allergens &nbsp;<img src="<?php echo Yii::$app->request->BaseUrl?>/images/salad_bar/allergen.png" alt=""/> </span>
                                    </div>
                                    <div class="alerg_ingred">
<!--                                        <p>peanuts</p>-->
<!--                                        <p>egg</p>-->
<!--                                        <p>wheat</p>-->
                                    </div>

                                </div>
                                <div class="discl_cont">
                                <a class="discl" href="">Disclaimer</a>
                                </div>

                            </div>


                        </div>

<!--                       menu2    -->
                    </div>
                </div>
            </div>
<!--MENU-->

    </div>

</div>
<!--form for save salad-->
<?php
if(Yii::$app->user->isGuest){
?>
    <div id="form_cont">
<form action="" id="save_salad_form" >
    <a class="close_form" href=""><span class=" glyphicon glyphicon-remove-circle"></span></a>
<!--    <input type="text" class="form-control" id="user_name" required="required" placeholder="Your name"/><br>-->
    <input type="email" class="form-control" id="user_email" required="required" placeholder="Your email"/><br>
    <input type="submit" class="btn btn-success" id="save_salad_submit" value="SEND"/>
</form>
    </div>
<?php
}else{
    echo "<script language='javascript'>var cur_user_id = ".Yii::$app->user->identity->id.";console.log(cur_user_id);</script>";

}
?>
<!--form for save salad-->


<?
$this->registerJsFile('js/pdf/html2canvas.js');
echo "<script language='javascript'>var all_items = ".$var."</script>";
echo "<script language='javascript'>var allergens = ".$allergens."</script>";
//var_dump($exist_salad);
//die;
if($exist_salad !== 'null'){
   // var_dump($exist_salad->name);die;

    echo "<script language='javascript'>var exist_salad_name  =  '".  $exist_salad->name."';</script>";
echo "<script language='javascript'>var exist_salad  = ".$exist_salad->ingred.";console.log(exist_salad);</script>";
}
?>
