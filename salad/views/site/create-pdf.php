<?php

use yii\helpers\Url;
use yii\helpers\Html;
//$this->title = 'Create your own salad';
$this->params['breadcrumbs'][] = ['label' => 'Virtual salad bar', 'url' => Url::toRoute(['/site/virtual'])];
$this->params['breadcrumbs'][] = $this->title;

?>
<?php
//var_dump($yii_ingred);
//var_dump(json_decode($exist_salad->ingred));
$exist_decode = json_decode($exist_salad->ingred);
$yii_eist_sal_array = [];
$yii_eist_sal_val_array = [];

foreach($exist_decode->ingred as $sal=>$val){
    $yii_eist_sal_array[]  = $sal;
    $yii_eist_sal_val_array[$sal] = $val;
}

?>

<div class="row">
<div class="col-xs-5 col-sm-5 col-md-5" >





    <?php
                echo '
<div class="row display_ingred ingred_cat_">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="row">';
                foreach($yii_ingred as $ingred){

                    if($ingred->image!==''){
                        $img = '/uploads/'.$ingred->image;

                    }else{
                        $img ='/images/salad_bar/ingred_2.jpg';
                    }

                    if(in_array($ingred->id,$yii_eist_sal_array)){
                        ?>
                        <div id="cotn_id_<?php echo $ingred->id?>" class="col-xs-6 col-sm-6 col-md-15 ingren_cont ">
                            <a class="link_c" href="">
                                <div class="con">
                                    <img class="ingred_img" src="<?php echo Yii::$app->request->BaseUrl ?><?=$img?>"
                                         alt=""/>
                                </div>
                                <a class="ing_ln" href="">
                                    <span class="glyphicon glyphicon-plus "></span>
                                </a>
                                <div>
                                <span class="inged_name"><?= $ingred->name ?></span>
                                </div>
                                <div >
                                <span class="inged_count"><?= $ingred->c1_container ?></span>
                                </div>
                            </a>
                        </div>
                        <?php
                    }

                }
                echo '  </div>
                        </div>
                    </div>';

//            Disable another ingredients

    //            Disable another ingredients
    ?>
    <!--            NON VISIBLE CREATED SALAD-->




    <div class="balast"></div>
    <!--            NON VISIBLE CREATED SALAD-->

    <div class="balast"></div>
</div>
<div class="col-xs-7 col-sm-7 col-md-7" >
    <!--MENU-->

    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <!--                   menu 1   -->

            <div class="up_menu ">
                <div >
                    <p class="enter green1 "><?=$exist_salad->name?></p>
                    <!--            <p class="enter">Enter salad name</p>-->
                </div>
                <div class="ingr_main ingr_main_calc ">
                    <p class="ingr">Ingredients</p>
                    <?php
                    foreach($yii_ingred as $ingred){
                    if(in_array($ingred->id,$yii_eist_sal_array)) {
                        ?>
                        <div class="ingr_ent" id="ingr_ent_calc_3">
                            <div class="ent_sp_text">
                                <span  class="ent_span"><strong><?=$ingred->name?></strong> </span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span  class="count_ent " id="count_ent_3"><strong><?=$yii_eist_sal_val_array[$ingred->id]?></strong></span>
                            </div>
<!--                            <div class="znak_cont" style="float: left">-->

<!--                                <span class="count_ent " id="count_ent_3">--><?//=$yii_eist_sal_val_array[$ingred->id]?><!--</span>-->

<!--                            </div>-->
                            <div style="clear: both">

                            </div>
                        </div>
                    <?php
                    }
                    }?>

                </div>
                <?php
                $c1_size=0;
                $c1_calories = 0;
                $c2_totfat_1 = 0;
                $c2_totfat_per = 0;
                $c2_satfat_1= 0;
                $c2_transfat_1 = 0;
                $c2_cholester_1 = 0;
                $c2_sod_1 =0;
                $c3_totcarb_1=0;
                $c3_dietfib_1 = 0;
                $c3_sugar_1=0;
                $c3_protein_1=0;
                $c2_vit_a=0;
                $c2_vit_c=0;
                $c3_iron=0;
                $c3_calcium=0;

                foreach($yii_ingred as $ingred){
                    if(in_array($ingred->id,$yii_eist_sal_array)) {
                        $c1_size += $ingred->c1_size*$yii_eist_sal_val_array[$ingred->id];
                        $c1_calories += $ingred->c1_calories*$yii_eist_sal_val_array[$ingred->id];
                        $c2_totfat_1+=$ingred->c2_totfat_1*$yii_eist_sal_val_array[$ingred->id];
                        $c2_totfat_per = round($c2_totfat_1/65*100);
                        $c2_satfat_1+=$ingred->c2_satfat_1*$yii_eist_sal_val_array[$ingred->id];
                        $c2_satfat_per = round($c2_satfat_1/20*100);
                        $c2_transfat_1 += $ingred->c2_transfat_1*$yii_eist_sal_val_array[$ingred->id];
                        $c2_transfat_per = 0;
                        $c2_cholester_1+=$ingred->c2_cholester_1*$yii_eist_sal_val_array[$ingred->id];
                        $c2_cholester_per = round($c2_cholester_1/300*100);
                        $c2_sod_1+=$ingred->c2_sod_1*$yii_eist_sal_val_array[$ingred->id];
                        $c2_sod_per = round($c2_sod_1/2400*100);
                        $c3_totcarb_1+=$ingred->c3_totcarb_1*$yii_eist_sal_val_array[$ingred->id];
                        $c3_totcarb_per = round($c3_totcarb_1/300*100);
                        $c3_dietfib_1+=$ingred->c3_dietfib_1*$yii_eist_sal_val_array[$ingred->id];
                        $c3_dietfib_per = round($c3_dietfib_1/25*100);
                        $c3_sugar_1+=$ingred->c3_sugar_1*$yii_eist_sal_val_array[$ingred->id];
                        $c3_protein_1+=$ingred->c3_protein_1*$yii_eist_sal_val_array[$ingred->id];
                        $c2_vit_a+=$ingred->c2_vit_a*$yii_eist_sal_val_array[$ingred->id];
                        $c2_vit_c+=$ingred->c2_vit_c*$yii_eist_sal_val_array[$ingred->id];
                        $c3_iron+=$ingred->c3_iron*$yii_eist_sal_val_array[$ingred->id];
                        $c3_calcium+=$ingred->c3_calcium*$yii_eist_sal_val_array[$ingred->id];

                    }}
                ?>


                    <span class="l_t_span">Net wt.</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span id="grm_to_lbs" class="r_t_span"><?=round($c1_size/454,1)?> lbs</span>

            </div>

        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <!--                       menu2    -->
            <div class="up_menu down_menu">
                <div class="ingr_main">
                    <p class="ingr">Nutrition facts</p>
                    <div class="ser_s">
                        <div class="pull-left"><span>Serving Size</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="c1_size"><?=$c1_size?>g</span></div>
                        <div class="pull-right"></div>
                        <div style="clear: both"></div>
                    </div>
                    <div class="calor">
                        <div class="pull-left"><span style=" font-family: Open-Bold!important;font-size: 1em">Calories</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><?= $c1_calories?></span></div>
                        <div id="count_calories" style=" font-family: Open-Semi!important;font-size: 1em" class="pull-right"></div>
                    </div>
                    <table class="table bar_table">
                        <thead>
                        <tr>
                            <th> </th>
                            <th></th>
                            <th>APS*</th>
                            <th></th>
                            <th>%DV**</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td  class="main_level">Total Fat</td>
                            <td></td>
                            <td id="c2_totfat_1"><?=$c2_totfat_1?>g</td>
                            <td></td>
                            <td id="dv_c2_totfat_1"><?=$c2_totfat_per?>%</td>

                        </tr>
                        <tr>
                            <td class="level_d" >Satured Fat</td>
                            <td></td>
                            <td id="c2_satfat_1"><?=$c2_satfat_1?>g</td>
                            <td></td>
                            <td  id="dv_c2_satfat_1"><?=$c2_satfat_per?>%</td>

                        </tr>
                        <tr>
                            <td class="level_d" >Trans Fat</td>
                            <td></td>
                            <td id="c2_transfat_1" ><?=$c2_transfat_1?>g</td>
                            <td></td>
                            <td id="dv_c2_transfat_1" ><?=$c2_transfat_per?>%</td>

                        </tr>
                        <tr>
                            <td class="main_level">Cholesterol</td>
                            <td></td>
                            <td id="c2_cholester_1" ><?=$c2_cholester_1?>mg</td>
                            <td></td>
                            <td id="dv_c2_cholester_1"><?=$c2_cholester_per?>%</td>

                        </tr>
                        <tr>
                            <td class="main_level">Sodium</td>
                            <td></td>
                            <td id="c2_sod_1" ><?=$c2_sod_1?>mg</td>
                            <td></td>
                            <td id="dv_c2_sod_1"><?=$c2_sod_per?>%</td>

                        </tr>
                        <tr>
                            <td class="main_level">Total Carbs</td>
                            <td></td>
                            <td id="c3_totcarb_1" ><?=$c3_totcarb_1?>g</td>
                            <td></td>
                            <td id="dv_c3_totcarb_1"><?=$c3_totcarb_per?>%</td>
                        </tr>
                        <tr>
                            <th class="level_d" scope="row">Dietary Fiber</th>
                            <td></td>
                            <td id="c3_dietfib_1" ><?=$c3_dietfib_1?>g</td>
                            <td></td>
                            <td id="dv_c3_dietfib_1" ><?=$c3_dietfib_per?>%</td>
                        </tr>
                        <tr>
                            <td class="level_d">Sugar</td>
                            <td></td>
                            <td id="c3_sugar_1"><?=$c3_sugar_1?>g</td>
                            <td></td>
                            <td id="dv_c3_sugar_1" >0%</td>
                        </tr>
                        <tr>
                            <td class="main_level" >Protein</td>
                            <td></td>
                            <td id="c3_protein_1"><?=$c3_protein_1?>g</td>
                            <td></td>
                            <td>0%</td>
                        </tr>

                        </tbody>
                    </table>
                    <table  class="table bar_table down_bar_table">
                        <tbody>
                        <tr class="vitamin">
                            <td width="30%" class="main_level" >Vitamin A</td>
                            <td id="c2_vit_a"  style="text-align: right!important;" width="10%" ><?=$c2_vit_a?>%</td>
                            <td width="20%"></td>
                            <td  width="30%" class="main_level">Vitamin C</td>
                            <td id="c2_vit_c" style="text-align: right!important;padding-right: 5px!important;"  width="10%"><?=$c2_vit_c?>%</td>
                        </tr>
                        <tr class="vitamin vitamin_brd">
                            <td class="main_level">Iron</td>
                            <td id="c3_iron" style="text-align: right!important;"><?=$c3_iron?>%</td>
                            <td width="20%"></td>
                            <td class="main_level">Calcium</td>
                            <td id="c3_calcium" style="text-align: right!important;padding-right: 5px!important;" ><?=$c3_calcium?>%</td>
                        </tr>
                        </tbody>
                    </table>
                    <div style="clear: both"></div>
                    <div class="descr_text">
                        <p>
                            * Amount Per Serving
                        </p>
                        <p>
                            ** Percent Daily Values are based on a 2,000 calorie diet.
                            Your daily values may be higher or lower depending
                            on your calorie needs
                        </p>
                    </div>
                    <div class="alergen">
                        <div class="alerg_ico">
                            <span class="aler_text">Allergens &nbsp;<img class="alg_img" src="<?php echo Yii::$app->request->BaseUrl?>/images/salad_bar/allergen.png" alt=""/> </span>
                        </div>
                        <div class="alerg_ingred">
                           <?

                           foreach($exist_decode->allergens as $sal=>$val){
                              echo "<p>$sal</p>";
                           }

                           ?>
                        </div>

                    </div>


                </div>


            </div>

            <!--                       menu2    -->
        </div>
    </div>
</div>
<!--MENU-->

</div>


<!--form for save salad-->


