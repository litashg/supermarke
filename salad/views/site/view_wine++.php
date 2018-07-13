<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places"></script>

<?php
use yii\helpers\Url;
use \app\models\WineYear;
$years_array = $model->getWineYears()->all();
//$years = $model->getWineYears()->where("label_img!=''")->one();
$i=-1;

$other_wine_array = $model->getManufacturer()->one()->getWines()->all();
?>

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Общая информация</h3>
            </div>
            <div class="panel-body">
                <h2><?=$model->name_en?></h2>
                <h5><?=$model->name_ru?></h5>


                <div id="year_content">

                   <?if (count($years_array)==0):?>

                       <div class="year_item yearn0" style='display:none';>

                        <div class="year_left">
                            <img style='' class='img-thumbnail img-responsive' src='/uploads/def.jpg'/>
                        </div>

                        <div class="year_right">

                            <table class="year_table" style="margin-left: 10px">
                                <tr>
                                    <td style="font-weight: bolder!important; text-align: left; font-size: 16px">Год:</td>

                                    <td>не определен</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold!important;text-align: left;font-size: 16px">Кол-во бутылок:</td>
                                    <td>не определен</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold!important;text-align: left;font-size: 16px">Оценка года:</td>
                                    <td>не определен</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold!important;text-align: left;font-size: 16px">Рекомендации:</td>
                                    <td>не определен</td>
                                </tr>
                            </table>
                        </div>

                   <?endif;?>

                    <?foreach($years_array as $years):
                        $i++;
                        if ($years->label_img=="")
                            $years->label_img = "def.jpg"
                        ?>

                    <div class="year_item year<?="n".$i?>" style='display:none';>

                        <div class="year_left">
                            <img style='' class='img-thumbnail img-responsive' src='/uploads/<?=$years->label_img?>'/>
                        </div>

                        <div class="year_right">



                            <table class="year_table" style="margin-left: 10px">
                                <tr>
                                    <td style="font-weight: bolder!important; text-align: left; font-size: 16px">Год:</td>

                                    <td><?=$years->year?></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold!important;text-align: left;font-size: 16px">Кол-во бутылок:</td>
                                    <td><?=$years->bottles_count?></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold!important;text-align: left;font-size: 16px">Оценка года:</td>
                                    <td><?=$years->year_mark?></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold!important;text-align: left;font-size: 16px">Рекомендации:</td>
                                    <td><?=$years->recommendations?></td>
                                </tr>
                            </table>
                            <!--
                            <div class="year_year"><strong>Год: &nbsp;</strong> <?=$years->year?></div>
                            <div class="year_bottle"><strong>Количество бутылок: &nbsp;</strong> <?=$years->bottles_count?></div>
                            <div class="year_mark"><strong>Оценка года: &nbsp;</strong> <br/> <?=$years->year_mark?></div>
                            -->
                        </div>


                    </div>

                    <?endforeach?>

                    <div class="year_navigation"><span> <a id="prev_year"> <span class="glyphicon glyphicon-chevron-left"></span> </a> выбор года (всего <?=count($years_array)?>) <a id="next_year"> <span class="glyphicon glyphicon-chevron-right"></span> </a> </span></div>

                    <table id="wine_property">
                        <tr>
                            <td style="font-weight: bolder!important; text-align: left; font-size: 16px">Алкоголь:</td>

                            <td><?=$model->alcohol?>%</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>

                        <tr>
                            <td style="font-weight: bolder!important; text-align: left; font-size: 16px">Сбор урожая:</td>

                            <td><?=$model->getIngathering()->one()->name_en?>&nbsp;<span style="font-size: 10px">(<?=$model->getIngathering()->one()->name_ru?>)<span></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>

                        <tr>
                            <td style="font-weight: bolder!important; text-align: left; font-size: 16px">Линейка вин:</td>

                            <td><?=$model->getRange()->one()->name_en?>&nbsp;<span style="font-size: 10px">(<?=$model->getRange()->one()->name_ru?>)<span></td>

                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>

                        <tr>
                            <td style="font-weight: bolder!important; text-align: left; font-size: 16px">Страна:</td>

                            <td><?=$model->getCountry()->one()->name_en?>&nbsp;<span style="font-size: 10px">(<?=$model->getCountry()->one()->name_ru?>)<span></td>

                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>


                        <tr>
                            <td style="font-weight: bolder!important; text-align: left; font-size: 16px">Регион:</td>

                            <td><?=$model->getRegion()->one()->name_en?>&nbsp;<span style="font-size: 10px">(<?=$model->getRegion()->one()->name_ru?>)<span></td>

                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>

                        <tr>
                            <td style="font-weight: bolder!important; text-align: left; font-size: 16px">Департамент:</td>

                            <td><?=$model->getDepartment()->one()->name_en?>&nbsp;<span style="font-size: 10px">(<?=$model->getDepartment()->one()->name_ru?>)<span></td>

                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>

                    </table>

                </div>

            </div>
        </div>

    </div>
</div>

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Производитель</h3>
            </div>

            <div class="panel-body">

                <table id="manufacturer_property">
                    <tr>
                        <td style="font-weight: bolder!important; text-align: left; font-size: 16px">Название:</td>

                        <td><?=$model->getManufacturer()->one()->name_en?>&nbsp;<span style="font-size: 10px">(<?=$model->getManufacturer()->one()->name_ru?>)<span></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>

                    <tr>
                        <td style="font-weight: bolder!important; text-align: left; font-size: 16px">Дата основания:</td>

                        <td><?=$model->getManufacturer()->one()->date_create?></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>

                    <tr>
                        <td style="font-weight: bolder!important; text-align: left; font-size: 16px">Основатель:</td>

                        <td><?=$model->getManufacturer()->one()->founder_en?>&nbsp;<span style="font-size: 10px">(<?=$model->getManufacturer()->one()->founder_ru?>)<span></td>

                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>

                    <tr>
                        <td style="font-weight: bolder!important; text-align: left; font-size: 16px">Сайт:</td>

                        <td><?=$model->getManufacturer()->one()->site?></td>

                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>




                </table>
            </div>
        </div>

    </div>
</div>

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Виноградник</h3>
            </div>
            <div class="panel-body">

                <table id="manufacturer_property">
                    <tr>
                        <td style="font-weight: bolder!important; text-align: left; font-size: 16px">Название:</td>

                        <td><?=$model->getVineyard()->one()->name_en?>&nbsp;<span style="font-size: 10px">(<?=$model->getVineyard()->one()->name_ru?>)<span></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>

                    <tr>
                        <td style="font-weight: bolder!important; text-align: left; font-size: 16px">Категория:</td>

                        <td><?=$model->getVineyard()->one()->category_en?>&nbsp;<span style="font-size: 10px">(<?=$model->getVineyard()->one()->category_ru?>)<span></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>

                    <tr>
                        <td style="font-weight: bolder!important; text-align: left; font-size: 16px">Коммуна:</td>

                        <td><?=$model->getVineyard()->one()->comune_en?>&nbsp;<span style="font-size: 10px">(<?=$model->getVineyard()->one()->comune_ru?>)<span></td>

                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>

                    <tr>
                        <td style="font-weight: bolder!important; text-align: left; font-size: 16px">Почва:</td>

                        <td><?=$model->getVineyard()->one()->ground?></td>

                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>

                    <tr>
                        <td style="font-weight: bolder!important; text-align: left; font-size: 16px">Размер:</td>

                        <td><?=$model->getVineyard()->one()->size?></td>

                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>

                </table>

            </div>
        </div>

    </div>
</div>


<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Карта</h3>
            </div>
            <div class="panel-body">
                <form>
                    <input id="geocomplete" type="hidden" placeholder="Type in an address" size="90" />

                </form>
                <div class="map_canvas"></div>
            </div>
        </div>

    </div>
</div>

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Другие вина этого производителя</h3>
            </div>
            <div class="panel-body">

                <?
                    if(count($other_wine_array)==1) echo "Другие вина не найдены";
                    else{
                ?>

                        <?
                        $count = count($other_wine_array);
                        $i = 0;
                        $column = 0;

                        foreach ($other_wine_array as $model_inner):
                            if ($model_inner->id == $model->id) continue;
                            $years_inner = $model_inner->getWineYears()->where("label_img!=''")->one();

                            if(!isset($years_inner)){
                                $years_inner = new WineYear();
                                $years_inner->label_img = "def.jpg";
                            }

                            if ($column == 0) {
                                echo "<div class='row'>";
                            }
                            ?>

                            <div class='col-md-3'>
                                <a href="<?=Url::toRoute(['/site/view_wine','id'=>$model_inner->id])?>">
                                    <div class="panel panel-default ">
                                        <div class="panel-body my_panel">
                                            <img style='height: 100%' class='img-thumbnail ' src='/uploads/<?=$years_inner->label_img?>'/>
                                        </div>
                                        <div class="panel-footer"><?=$model_inner->name_ru?></div>
                                    </div>
                                </a>

                            </div>
                            <?
                            $column = $column + 1;

                            if((++$i === $count && $column !== 4) || ($column == 4)) {
                                echo "</div>";
                                $column = 0;
                            }
                        endforeach;
                        ?>


                <?}?>

            </div>
        </div>

    </div>
</div>

<script>
    $(document).ready(function() {
        $(".yearn0").show().fadeIn("slow");


        $("#geocomplete").geocomplete({
            map: ".map_canvas"
        });

        $("#geocomplete").geocomplete("find", "<?=$model->getVineyard()->one()->address?>");


    });
    $('#next_year').click(function() {
        var el = $(".year_item:visible");

        if($(".yearn" + (el.index()+1)).length){
            $(".year_item:visible").hide();//find current div here?
            $(".yearn" + (el.index()+1)).show().fadeIn("slow");
        }
    });

    $('#prev_year').click(function() {
        var el = $(".year_item:visible");
        if($(".yearn" + (el.index()-1)).length){
            $(".year_item:visible").hide()//find current div here?
            $(".yearn" + (el.index()-1)).show().fadeIn("slow");
        }
    });

</script>