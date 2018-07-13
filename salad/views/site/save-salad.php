<?php

use yii\helpers\Url;
$this->title = 'Save your own salad';
$this->params['breadcrumbs'][] = ['label' => 'Virtual salad bar', 'url' => Url::toRoute(['/site/virtual'])];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="container">
<div class="row">
<div class="col-xs-12 col-sm-8 col-md-9">
    <div class="row ">
        <div class="col-xs-12 col-sm-12 col-md-12 upper_pad ">
            <strong class="upper_name"> My first salad</strong>
        </div>

    </div>
    <div class="row ">
        <div class="col-xs-12 col-sm-12 col-md-12 main_c">


            <div style="clear: both"></div>


            <!--    GOODS-->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="row">
                        <div class="col-xs-6 col-sm-5 col-md-15 ">

                                <div class="con">
                                    <img class="ingred_img" src="<?php echo Yii::$app->request->BaseUrl?>/images/salad_bar/ingred_2.jpg" alt=""/>
                                </div>

                                <span class="inged_name_save">Salad 1</span>
                                <span class="inged_count">1 cup</span>

                        </div>
                        <div class="col-xs-6 col-sm-5 col-md-15 ">

                                <div class="con">
                                    <img class="ingred_img" src="<?php echo Yii::$app->request->BaseUrl?>/images/salad_bar/ingred_2.jpg" alt=""/>
                                </div>

                                <span class="inged_name_save">Salad 1</span>
                                <span class="inged_count">1 cup</span>

                        </div>
                        <div class="col-xs-6 col-sm-5 col-md-15 ">

                                <div class="con">
                                    <img class="ingred_img" src="<?php echo Yii::$app->request->BaseUrl?>/images/salad_bar/ingred_2.jpg" alt=""/>
                                </div>

                                <span class="inged_name_save">Salad 1</span>
                                <span class="inged_count">1 cup</span>

                        </div>

                        <div class="col-xs-6 col-sm-5 col-md-15 ">

                                <div class="con">
                                    <img class="ingred_img" src="<?php echo Yii::$app->request->BaseUrl?>/images/salad_bar/ingred_2.jpg" alt=""/>
                                </div>

                                <span class="inged_name_save">Salad 1</span>
                                <span class="inged_count">1 cup</span>

                        </div>
                        <div class="col-xs-6 col-sm-5 col-md-15  ">

                                <div class="con">
                                    <img class="ingred_img" src="<?php echo Yii::$app->request->BaseUrl?>/images/salad_bar/ingred_2.jpg" alt=""/>
                                </div>

                                <span class="inged_name_save">Salad 1</span>
                                <span class="inged_count">1 cup</span>

                        </div>
                    </div>
                </div>
            </div>

            <!--    GOODS END-->
        </div>

    </div>
    <div class="row manage_links">
        <div class="col-xs-12 col-sm-8 col-md-8  ">
        <a class="cat_name  " href=""><spna class="glyphicon glyphicon-arrow-left" ></spna><span> EDIT RECEPIE</span></a>
        <a class="cat_name" href=""><spna class="glyphicon glyphicon-print" ></spna><span> PRINT RECEPIE</span></a>
        <a class="cat_name" href=""><spna class="glyphicon glyphicon-send" ></spna><span> SEND YOUR RECIPE  TO US</span></a>
                </div>
        <div class="col-xs-12 col-sm-4 col-md-4  ">
        <span class="pull-left">SHARE RECIPE</span>
            <a class="at_btn style_at " href=""><span>&#64;</span></a>
        <a class="at_btn style_fb" href=""><span class="zocial-facebook"></span></a>

</div>
    </div>
    <div class="balast"></div>
</div>
<div class="col-xs-12 col-sm-4 col-md-3">
    <!--MENU-->

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <!--                   menu 1   -->

            <div class="up_menu">
                <div class="m_title">
<!--                    <input id="salad_name" class="enter" type="text" placeholder="Enter salad name"/>-->
                            <p class="enter green1">My first salad</p>
                </div>
                <div class="ingr_main">
                    <p class="ingr">Ingredients</p>
                    <!--         div.ingr_ent>span.ent_span+(a>span.glyphicon.glyphicon-minus)+span+(a>span.glyphicon.glyphicon-plus)-->
                    <!--        one igren calc-->
                    <div class="ingr_ent">
                        <div class="ent_sp_text">
                            <span class="ent_span">Pasta LaPastaPasta </span>
                        </div>
                        <div class="znak_cont">
                            <a class="znak" href="">
                                <span class="glyphicon glyphicon-minus"></span>
                            </a>
                            <span class="count_ent">6</span>
                            <a class="znak1" href="">
                                <span class="glyphicon glyphicon-plus"></span>
                            </a>
                        </div>
                        <div style="clear: both"></div>
                    </div>
                    <!--        one igren calc-->

                    <!--        one igren calc-->
                    <div class="ingr_ent">
                        <div class="ent_sp_text">
                            <span class="ent_span">Pasta LaPastaPasta </span>
                        </div>
                        <div class="znak_cont">
                            <a class="znak" href="">
                                <span class="glyphicon glyphicon-minus"></span>
                            </a>
                            <span class="count_ent">6</span>
                            <a class="znak1" href="">
                                <span class="glyphicon glyphicon-plus"></span>
                            </a>
                        </div>
                        <div style="clear: both"></div>
                    </div>
                    <!--        one igren calc-->



                </div>

                <div class="calc_sum">

                    <span class="l_t_span">Net wt.</span>
                    <span class="r_t_span">1.8 lbs</span>
                    <div class="shadow"></div>
                </div>
            </div>
            <!--                   menu 1   -->
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <!--                       menu2    -->

            <div class="up_menu down_menu">
                <div class="ingr_main">
                    <p class="ingr">Nutrition facts</p>
                    <div class="ser_s">
                        <div class="pull-left"><span>Serving Size</span></div>
                        <div class="pull-right"><span>363 g</span></div>
                        <div style="clear: both"></div>
                    </div>
                    <div class="calor">
                        <div class="pull-left"><span style="font-weight: 600;font-size: 1em">Calories</span></div>
                        <div class="pull-right"><span>388</span></div>
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
                            <td class="main_level">Total Fat</td>
                            <td>19g</td>
                            <td>30%</td>

                        </tr>
                        <tr>
                            <td class="level_d" >Satured Fat</td>
                            <td>6g</td>
                            <td>32%</td>

                        </tr>
                        <tr>
                            <td class="level_d" >Trans Fat</td>
                            <td>0g</td>
                            <td>0%</td>

                        </tr>
                        <tr>
                            <td class="main_level">Cholesterol</td>
                            <td>23mg</td>
                            <td>8%</td>

                        </tr>
                        <tr>
                            <td class="main_level">Sodium</td>
                            <td>867mg</td>
                            <td>36%</td>

                        </tr>
                        <tr>
                            <td class="main_level">Total Carbs</td>
                            <td>38g</td>
                            <td>13%</td>
                        </tr>
                        <tr>
                            <th class="level_d" scope="row">Dietary Fiber</th>
                            <td>6g</td>
                            <td>32%</td>
                        </tr>
                        <tr>
                            <td class="level_d">Sugar</td>
                            <td>6g</td>
                            <td>32%</td>
                        </tr>
                        <tr class="last_tr">
                            <td class="main_level last_tr">Protein</td>
                            <td>38g</td>
                            <td>13%</td>
                        </tr>

                        <!--                                    fddfdfdf-->

                        </tbody>
                    </table>
                    <table  class="table bar_table down_bar_table">
                        <tbody>
                        <tr class="vitamin">
                            <td width="30%" class="main_level" >Vitamin A</td>
                            <td  style="text-align: right!important;" width="10%" >438%</td>
                            <td width="20%"></td>
                            <td  width="30%" class="main_level">Vitamin C</td>
                            <td style="text-align: right!important;padding-right: 5px!important;"  width="10%">43%</td>
                        </tr>
                        <tr class="vitamin vitamin_brd">
                            <td class="main_level">Iron</td>
                            <td style="text-align: right!important;">438%</td>
                            <td width="20%"></td>
                            <td class="main_level">Calcium</td>
                            <td style="text-align: right!important;padding-right: 5px!important;" >8%</td>
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
                            <p>peanuts</p>
                            <p>egg</p>
                            <p>wheat</p>
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
