
$(document).ready(function(){
$( ".dropdown" ).hover(
    function() {
        $( ".menu_title",this ).css("border",'none');
    }
    , function() {
        $( ".menu_title",this ).css("border",'2px solid #71a866;');
    }
);
//create salad bar js
    $(".link_c").click(function(e) {
        e.preventDefault();
    });
    $(".ing_ln").click(function(e) {
        e.preventDefault();
    });

    $( ".ingren_cont" ).hover(

        function() {
            if (! $(this).hasClass("active") ){
                $( ".inged_name",this ).css("color",'#fff');
                $( ".inged_count",this ).css("color",'#fff');
                $(this).css("background-color",'#71a866');}
        }
        , function() {
            if (! $(this).hasClass("active") ){
                $( ".inged_name",this ).css("color",'#71a866');
                $( ".inged_count",this ).css("color",'#565554');
                $(this).css("background-color",'#fff');
            }

        }
    );


    $( ".ingren_cont" ).click(

        function() {
            if ( $(this).hasClass("active") ){
                $( ".inged_name",this ).css("color",'#71a866');
                $( ".inged_count",this ).css("color",'#565554');
                $( ".ing_ln",this ).css("display",'none');
                $('.ing_ln',this).animate({scale: "0.5"}, 100);
                $(this).css("background-color",'#fff');
                $(this).removeClass("active");
                $("#overlay",this).remove();
            }
            else{
                $( ".inged_name",this ).css("color",'#fff');
                $( ".inged_count",this ).css("color",'#fff');
                $( ".ing_ln",this ).css("display",'block');
                $('.ing_ln',this).animate({scale: "1"}, 100);
                $(this).css("background-color",'#71a866');
                $(this).addClass("active");

            //
                var docHeight = $(".ingred_img",this).height();
                $(".con",this).append("<div id='overlay'></div>");
                $("#overlay",this)
                    .height(docHeight)
                    .css({
                        'opacity' : 0.4,
                        'position': 'absolute',
                        'top': 0,
                        'left': 0,
                        'background-color': 'black',
                        'width': '100%',
                        'z-index': 5000
                    });
            //
            }
        }
        //, function() {
        //    $( ".inged_name",this ).css("color",'#71a866');
        //    $( ".inged_count",this ).css("color",'#565554');
        //    $( ".ing_ln",this ).css("display",'none');
        //    $('.ing_ln',this).animate({scale: "0.5"}, 1000);
        //}
    );

    //create salad bar js
    var $window = $(window),
        $html = $('#menu-bar');

    $window.resize(function resize() {
        if ($window.width() < 768) {
            return $html.removeClass('nav-stacked');
        }
        $html.addClass('nav-stacked');
    }).trigger('resize');


    $('#jstree_demo_div').on("changed.jstree", function (e, data) {
        $( "#category-parent_id option:selected" ).val(data.selected).text(data.node.text);
        $( "#product-cat_id option:selected" ).val(data.selected).text(data.node.text);
        $( "#saladitems-parent_id option:selected" ).val(data.selected).text(data.node.text);


    });

    //___--_________________________________________________________________________
    //___--_________________________________________________________________________
    //___--_________________________________________________________________________
    //___--_________________________________________________________________________


    //VIRTUAL SB CALC
    //VARIABLES
    var c1_calories=0;
    var added_ingred = [];
    var c2_totfat_1 = 0;
    var c2_satfat_1 = 0;
    var c2_transfat_1 = 0;
    var c2_cholester_1 = 0;
    var c2_sod_1 = 0;
    var c3_totcarb_1 = 0;
    var c3_dietfib_1 = 0;
    var c3_sugar_1 = 0;
    var c3_protein_1 = 0;
    var c2_vit_a = 0;
    var c2_vit_c = 0;
    var c3_iron = 0;
    var c3_calcium = 0;
    var c1_size =0;
    var added_allergens = [];
    if (typeof (all_items) !=="undefined"){
        var last_div_before_edit = all_items[0].id;
    }
    var dataURL;
   // var new_salad_id;
    var sal_uniq;




    // IF SALAD IS ALREADY EXIST


    if(typeof exist_salad !==  'undefined'){
        sal_uniq = exist_salad.uniqid;
        $('#save_as_pdf').attr('href','/web/site/create-pdf/'+sal_uniq);
        console.log( exist_salad);
        for(ing in exist_salad.ingred){
            added_ingred[added_ingred.length] = parseInt(ing);
        }
        for(ing in exist_salad.allergens) {
            added_allergens[ing] = exist_salad.allergens[ing];
        }
        for( var con = 0; con <=added_ingred.length;con++){

            for(var i=0; i<all_items.length; i++) {
                if (all_items[i].id == added_ingred[con]) {
                    var cur_numbers = exist_salad.ingred[added_ingred[con]];

                    $( ".inged_name",'#cotn_id_'+all_items[i].id ).css("color",'#fff');
                    $( ".inged_count",'#cotn_id_'+all_items[i].id ).css("color",'#fff');
                    $( ".ing_ln",'#cotn_id_'+all_items[i].id ).css("display",'block');
                //    $('.ing_ln','#cotn_id_'+all_items[i].id).animate({scale: "1"}, 100);
                    $('.ing_ln','#cotn_id_'+all_items[i].id).css({
                        '-webkit-transform' : 'scale(' + 1 + ')',
                        '-moz-transform'    : 'scale(' + 1 + ')',
                        '-ms-transform'     : 'scale(' + 1+ ')',
                        '-o-transform'      : 'scale(' + 1+ ')',
                        'transform'         : 'scale(' + 1 + ')'
                    });
                    $('#cotn_id_'+all_items[i].id).css("background-color",'#71a866');
                    $('#cotn_id_'+all_items[i].id).addClass("active");
                    var docHeight = $(".ingred_img",'#cotn_id_'+all_items[i].id).height();
                    $(".con",'#cotn_id_'+all_items[i].id).append("<div id='overlay'></div>");
                    $("#overlay",'#cotn_id_'+all_items[i].id)
                        .height(docHeight)
                        .css({
                            'opacity' : 0.4,
                            'position': 'absolute',
                            'top': 0,
                            'left': 0,
                            'background-color': 'black',
                            'width': '100%',
                            'z-index': 5000
                        });

                    c1_calories += parseFloat(all_items[i].c1_calories)*cur_numbers;
                    $('#count_calories').html(c1_calories);

                    c2_totfat_1 += parseFloat(all_items[i].c2_totfat_1)*cur_numbers;
                    $('#c2_totfat_1').html(Math.abs(c2_totfat_1.toFixed(1)) + 'g');

                    c2_satfat_1 += parseFloat(all_items[i].c2_satfat_1)*cur_numbers;
                    $('#c2_satfat_1').html(Math.abs(c2_satfat_1.toFixed(1)) + 'g');

                    c2_transfat_1 += parseFloat(all_items[i].c2_transfat_1)*cur_numbers;
                    $('#c2_transfat_1').html(Math.abs(c2_transfat_1.toFixed(1)) + 'g');

                    c2_sod_1 += parseFloat(all_items[i].c2_sod_1)*cur_numbers;
                    $('#c2_sod_1').html(Math.abs(c2_sod_1.toFixed(1)) + 'g');

                    c3_totcarb_1 += parseFloat(all_items[i].c3_totcarb_1)*cur_numbers;
                    $('#c3_totcarb_1').html(Math.abs(c3_totcarb_1.toFixed(1)) + 'g');

                    c3_dietfib_1 += parseFloat(all_items[i].c3_dietfib_1)*cur_numbers;
                    $('#c3_dietfib_1').html(Math.abs(c3_dietfib_1.toFixed(1)) + 'g');


                    c2_cholester_1 += parseFloat(all_items[i].c2_cholester_1)*cur_numbers;
                    $('#c2_cholester_1').html(Math.abs(c2_cholester_1.toFixed(1)) + 'g');

                    c3_sugar_1 += parseFloat(all_items[i].c3_sugar_1)*cur_numbers;
                    $('#c3_sugar_1').html(Math.abs(c3_sugar_1.toFixed(1)) + 'g');

                    c3_protein_1 += parseFloat(all_items[i].c3_protein_1)*cur_numbers;
                    $('#c3_protein_1').html(Math.abs(c3_protein_1.toFixed(1)) + 'g');

                    c2_vit_a += parseFloat(all_items[i].c2_vit_a)*cur_numbers;
                    $('#c2_vit_a').html(Math.abs(c2_vit_a.toFixed(1)) + '%');

                    c2_vit_c += parseFloat(all_items[i].c2_vit_c)*cur_numbers;
                    $('#c2_vit_c').html(Math.abs(c2_vit_c.toFixed(1)) + '%');

                    c3_iron += parseFloat(all_items[i].c3_iron)*cur_numbers;
                    $('#c3_iron').html(Math.abs(c3_iron.toFixed(1)) + '%');

                    c3_calcium += parseFloat(all_items[i].c3_calcium)*cur_numbers;
                    $('#c3_calcium').html(Math.abs(c3_calcium.toFixed(1)) + '%');

                    c1_size += parseFloat(all_items[i].c1_size)*cur_numbers;
                    $('#c1_size').html(Math.abs(c1_size.toFixed(1)) + 'g');


                    $('#dv_c2_totfat_1').html(Math.round(c2_totfat_1 / 65 * 100) + "%");

                    $('#dv_c2_satfat_1').html(Math.round(c2_satfat_1 / 20 * 100) + "%");

                    $('#dv_c2_cholester_1').html(Math.round(c2_cholester_1 / 300 * 100) + "%");

                    $('#dv_c2_sod_1').html(Math.round(c2_sod_1 / 2400 * 100) + "%");

                    $('#dv_c3_totcarb_1').html(Math.round(c3_totcarb_1 / 300 * 100) + "%");

                    $('#dv_c3_dietfib_1').html(Math.round(c3_dietfib_1 / 25 * 100) + "%");

                    $('#grm_to_lbs').html((c1_size / 454).toFixed(1) + " lbs");
                    $('.ingr_main_calc').append("<div id='ingr_ent_calc_" + all_items[i].id + "'class='ingr_ent'><div class='ent_sp_text'> <span class='ent_span'>" + all_items[i].name + " </span> </div> <div class='znak_cont'> <a id='minus_" + all_items[i].id + "' class='znak min_plus' href=''> <span  class='glyphicon glyphicon-minus'></span></a><span id='count_ent_" + all_items[i].id + "' class='count_ent '>"+cur_numbers+"</span><a id='pluss_" + all_items[i].id + "' class='znak1 min_plus' href=''><span class='glyphicon glyphicon-plus'></span> </a> </div> <div style='clear: both'></div> </div>");
                    //ADD SALAD ITEM TO FINISH ATTENCION ATTENCIONATTENCIONATTENCIONATTENCIONATTENCIONATTENCIONATTENCIONATTENCION


                    if(all_items[i].image !== ''){
                        var img = 'uploads/'+all_items[i].image;
                    }else{
                        var img = 'images/salad_bar/ingred_2.jpg';
                    }


                    $('#finish_slad').append("<div id='cotn_finish_id_" + all_items[i].id + "' class='col-xs-6 col-sm-5 col-md-15 finish_cont'> <div class='con'><img class='ingred_img' src='http://new.supermarketers.com/web/"+img+"' alt=''/></div><span class='inged_name'>" + all_items[i].name + "</span><span class='inged_count'>" + all_items[i].c1_container + "</span> </div>")


                }

                }

            }
        $('#salad_name').css('border-color','#cdccc4');
        $('#salad_name').css('border-width','1px');

        $('#finish_slad').css("visibility",'visible');
        $('#finish_slad').css("position",'initial');

        $('.display_ingred').css("display",'none');
        $('.green_name').html($('#salad_name').val());
        $('#salad_name').css("display",'none');
        $('.green_name').css("display",'block');
        $('.cat_name').css("display",'none');
        $('.class_save').css("display",'none');
        $('.min_plus').css("visibility",'hidden');

        $('.manage_links').css("visibility",'visible');
        $('.manage_links').css("position",'initial');

        $('.cat_name_visib').css("display",'block');
        $('.cat_pdf').css("display",'none');
        //
        $('.done_msg').remove();

        function emptyObject(obj) {
            for (var c in obj) {
                return false;
            }
            return true;
        }
        if(added_allergens){
            for( alerg in added_allergens){
                        $('.alerg_ingred').append('<p>'+ alerg+'</p>');

            }
        }
        $('.green_name').html(exist_salad_name);
        console.log( added_allergens);



       // return added_ingred;
    }
    // IF SALAD IS ALREADY EXIST


    //VIRTUAL SB CALC

//CALC CHANGE DISPLAYIG INGREDIENTS
    $('body').on('click', '.cat_name', function(e) {
   // $(".cat_name").click(function(e) {
        if(this.id !=='save_as_pdf'){
        e.preventDefault();
        }
        $(".cat_name_active").removeClass('cat_name_active');
        $(this).addClass('cat_name_active');
        $('.display_ingred').css('display','none');
        $('.display_ingred').addClass('non_display_ingred').removeClass('display_ingred');

        $('.ingred_cat_'+this.id.substr(4)).removeClass('non_display_ingred').addClass('display_ingred');
        $('.display_ingred').css('display','block');
        //for(item.id in all_items.id){
           // if(item.id==this.id.substr(4)){
           // }
      //  }
        console.log(last_div_before_edit);
        return last_div_before_edit;

    });
//CALC CHANGE DISPLAYIG INGREDIENTS


//    Adding/deleting entity to calculator
   $(".ingren_cont").click(function(e) {
        for(var i=0; i<all_items.length; i++) {

            if (all_items[i].id == this.id.substr(8)){
                  if(($.inArray(all_items[i].id,added_ingred))>=0){
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!deleting summary

                      c1_calories = c1_calories-(parseFloat(all_items[i].c1_calories))*(parseInt($("#count_ent_"+all_items[i].id).text()));
                      $('#count_calories').html(c1_calories);


                      c2_totfat_1 = c2_totfat_1 -(parseFloat(all_items[i].c2_totfat_1))*(parseInt($("#count_ent_"+all_items[i].id).text()));
                      $('#c2_totfat_1').html(Math.abs(c2_totfat_1.toFixed(1))+'g');

                      c2_transfat_1 = c2_transfat_1 -(parseFloat(all_items[i].c2_transfat_1))*(parseInt($("#count_ent_"+all_items[i].id).text()));
                      $('#c2_transfat_1').html(Math.abs(c2_transfat_1.toFixed(1))+'g');


                      c2_satfat_1 = c2_satfat_1 -(parseFloat(all_items[i].c2_satfat_1))*(parseInt($("#count_ent_"+all_items[i].id).text()));
                      $('#c2_satfat_1').html(Math.abs(c2_satfat_1.toFixed(1))+'g');

                      c2_cholester_1 = c2_cholester_1 -(parseFloat(all_items[i].c2_cholester_1))*(parseInt($("#count_ent_"+all_items[i].id).text()));
                      $('#c2_cholester_1').html(Math.abs(c2_cholester_1.toFixed(1))+'g');

                      c2_sod_1 = c2_sod_1 -(parseFloat(all_items[i].c2_sod_1))*(parseInt($("#count_ent_"+all_items[i].id).text()));
                      $('#c2_sod_1').html(Math.abs(c2_sod_1.toFixed(1))+'g');

                      c3_totcarb_1 = c3_totcarb_1 -(parseFloat(all_items[i].c3_totcarb_1))*(parseInt($("#count_ent_"+all_items[i].id).text()));
                      $('#c3_totcarb_1').html(Math.abs(c3_totcarb_1.toFixed(1))+'g');

                      c3_dietfib_1 = c3_dietfib_1 -(parseFloat(all_items[i].c3_dietfib_1))*(parseInt($("#count_ent_"+all_items[i].id).text()));
                      $('#c3_dietfib_1').html(Math.abs(c3_dietfib_1.toFixed(1))+'g');

                      c3_sugar_1 = c3_sugar_1 -(parseFloat(all_items[i].c3_sugar_1))*(parseInt($("#count_ent_"+all_items[i].id).text()));
                      $('#c3_sugar_1').html(Math.abs(c3_sugar_1.toFixed(1))+'g');

                      c3_protein_1= c3_protein_1 -(parseFloat(all_items[i].c3_protein_1))*(parseInt($("#count_ent_"+all_items[i].id).text()));
                      $('#c3_protein_1').html(Math.abs(c3_protein_1.toFixed(1))+'g');

                      c2_vit_a = c2_vit_a -(parseFloat(all_items[i].c2_vit_a))*(parseInt($("#count_ent_"+all_items[i].id).text()));
                      $('#c2_vit_a').html(Math.abs(c2_vit_a.toFixed(1))+'%');

                      c2_vit_c = c2_vit_c -(parseFloat(all_items[i].c2_vit_c))*(parseInt($("#count_ent_"+all_items[i].id).text()));
                      $('#c2_vit_c').html(Math.abs(c2_vit_c.toFixed(1))+'%');

                      c3_iron = c3_iron -(parseFloat(all_items[i].c3_iron))*(parseInt($("#count_ent_"+all_items[i].id).text()));
                      $('#c3_iron').html(Math.abs(c3_iron.toFixed(1))+'%');

                      c3_calcium = c3_calcium -(parseFloat(all_items[i].c3_calcium))*(parseInt($("#count_ent_"+all_items[i].id).text()));
                      $('#c3_calcium').html(Math.abs(c3_calcium.toFixed(1))+'%');


                      c1_size =  c1_size-(parseFloat(all_items[i].c1_size))*(parseInt($("#count_ent_"+all_items[i].id).text()));
                      $('#c1_size').html(Math.abs(c3_calcium.toFixed(1))+'g');


                      $('#dv_c2_totfat_1').html( Math.round(c2_totfat_1/65*100)+"%");

                      $('#dv_c2_satfat_1').html( Math.round(c2_satfat_1/20*100)+"%");

                      $('#dv_c2_cholester_1').html( Math.round(c2_cholester_1/300*100)+"%");

                      $('#dv_c2_sod_1').html( Math.round(c2_sod_1/2400*100)+"%");

                      $('#dv_c3_totcarb_1').html( Math.round(c3_totcarb_1/300*100)+"%");

                      $('#dv_c3_dietfib_1').html( Math.round(c3_dietfib_1/25*100)+"%");

                      $('#grm_to_lbs').html( (c1_size/454).toFixed(1)+" lbs");












                      //REMOVE SALAD ITEM TO FINISH
                      $("#cotn_finish_id_"+all_items[i].id).remove();
                      console.log('asdasd');

                      //REMOVE SALAD ITEM TO FINISH




                      //console.log(all_items[i].c2_vit_c+'bbbbb');

                      $("#ingr_ent_calc_"+ all_items[i].id).remove();

                      added_ingred.splice( $.inArray( all_items[i].id,added_ingred), 1 );


                 //     adding allergens
                 //
                      function emptyObject(obj) {
                          for (var c in obj) {
                              return false;
                          }
                          return true;
                      }
                      if(!emptyObject(allergens[this.id.substr(8)])){



                          for( var i=0;i<allergens[this.id.substr(8)].length;i++ ){

                              if(i%2 == 0){
                                  if( added_allergens[allergens[this.id.substr(8)][i]]!==0){
                                      added_allergens[allergens[this.id.substr(8)][i]] = added_allergens[allergens[this.id.substr(8)][i]]-1;
                                      console.log(added_allergens);
                                  }
                                  if(added_allergens[allergens[this.id.substr(8)][i]]==0){
                                    $("p:contains("+allergens[this.id.substr(8)][i]+")").remove();
                                      console.log(added_allergens);
                                  }



                              }
                          }


                      }
                      ////adding allergens
                      return added_ingred;
                      return c1_calories;
                      return c2_totfat_1.toFixed(1);
                      return c2_satfat_1.toFixed(1);
                      return c2_transfat_1.toFixed(1);
                      return c2_cholester_1.toFixed(1);
                      return c2_sod_1.toFixed(1);
                      return c3_totcarb_1.toFixed(1);
                      return c3_dietfib_1.toFixed(1);
                      return c3_sugar_1.toFixed(1);
                      return c3_protein_1.toFixed(1);
                      return c2_vit_a.toFixed(1);
                      return c2_vit_c.toFixed(1);
                      return c3_iron.toFixed(1);
                      return c3_calcium.toFixed(1);
                      return  c1_size.toFixed(1);
                      return added_allergens;
            }

           else if(($.inArray(all_items[i].id,added_ingred))==-1){
                    added_ingred.push(all_items[i].id) ;

                c1_calories+=parseFloat(all_items[i].c1_calories);
                      $('#count_calories').html(c1_calories);

                c2_totfat_1+=parseFloat(all_items[i].c2_totfat_1);
                 $('#c2_totfat_1').html(Math.abs(c2_totfat_1.toFixed(1))+'g');

                 c2_satfat_1+=parseFloat(all_items[i].c2_satfat_1);
                 $('#c2_satfat_1').html(Math.abs(c2_satfat_1.toFixed(1))+'g');

                 c2_transfat_1+=parseFloat(all_items[i].c2_transfat_1);
                 $('#c2_transfat_1').html(Math.abs(c2_transfat_1.toFixed(1))+'g');

                 c2_sod_1+=parseFloat(all_items[i].c2_sod_1);
                 $('#c2_sod_1').html(Math.abs(c2_sod_1.toFixed(1))+'g');

                 c3_totcarb_1+=parseFloat(all_items[i].c3_totcarb_1);
                 $('#c3_totcarb_1').html(Math.abs(c3_totcarb_1.toFixed(1))+'g');

                 c3_dietfib_1+=parseFloat(all_items[i].c3_dietfib_1);
                 $('#c3_dietfib_1').html(Math.abs(c3_dietfib_1.toFixed(1))+'g');


                 c2_cholester_1+=parseFloat(all_items[i].c2_cholester_1);
                 $('#c2_cholester_1').html(Math.abs(c2_cholester_1.toFixed(1))+'g');

                 c3_sugar_1+=parseFloat(all_items[i].c3_sugar_1);
                 $('#c3_sugar_1').html(Math.abs(c3_sugar_1.toFixed(1))+'g');

                      c3_protein_1+=parseFloat(all_items[i].c3_protein_1);
                 $('#c3_protein_1').html(Math.abs(c3_protein_1.toFixed(1))+'g');

                 c2_vit_a+=parseFloat(all_items[i].c2_vit_a);
                 $('#c2_vit_a').html(Math.abs(c2_vit_a.toFixed(1))+'%');

                 c2_vit_c += parseFloat(all_items[i].c2_vit_c);
                 $('#c2_vit_c').html(Math.abs(c2_vit_c.toFixed(1))+'%');

                 c3_iron += parseFloat(all_items[i].c3_iron);
                 $('#c3_iron').html(Math.abs(c3_iron.toFixed(1))+'%');

                 c3_calcium += parseFloat(all_items[i].c3_calcium);
                 $('#c3_calcium').html(Math.abs(c3_calcium.toFixed(1))+'%');

                  c1_size += parseFloat(all_items[i].c1_size);
                 $('#c1_size').html(Math.abs(c1_size.toFixed(1))+'g');



               $('#dv_c2_totfat_1').html( Math.round(c2_totfat_1/65*100)+"%");

               $('#dv_c2_satfat_1').html( Math.round(c2_satfat_1/20*100)+"%");

              $('#dv_c2_cholester_1').html( Math.round(c2_cholester_1/300*100)+"%");

               $('#dv_c2_sod_1').html( Math.round(c2_sod_1/2400*100)+"%");

               $('#dv_c3_totcarb_1').html( Math.round(c3_totcarb_1/300*100)+"%");

               $('#dv_c3_dietfib_1').html( Math.round(c3_dietfib_1/25*100)+"%");

                      $('#grm_to_lbs').html( (c1_size/454).toFixed(1)+" lbs");

                $('.ingr_main_calc').append("<div id='ingr_ent_calc_"+ all_items[i].id+"'class='ingr_ent'><div class='ent_sp_text'> <span class='ent_span'>"+all_items[i].name+" </span> </div> <div class='znak_cont'> <a id='minus_"+all_items[i].id+"' class='znak min_plus' href=''> <span  class='glyphicon glyphicon-minus'></span></a><span id='count_ent_"+all_items[i].id+"' class='count_ent '>1</span><a id='pluss_"+all_items[i].id+"' class='znak1 min_plus' href=''><span class='glyphicon glyphicon-plus'></span> </a> </div> <div style='clear: both'></div> </div>");
                   //ADD SALAD ITEM TO FINISH ATTENCION ATTENCIONATTENCIONATTENCIONATTENCIONATTENCIONATTENCIONATTENCIONATTENCION

                      if(all_items[i].image !== ''){
                          var img = 'uploads/'+all_items[i].image;
                      }else{
                          var img = 'images/salad_bar/ingred_2.jpg';
                      }


                      $('#finish_slad').append("<div id='cotn_finish_id_"+all_items[i].id+"' class='col-xs-6 col-sm-5 col-md-15 finish_cont'> <div class='con'><img class='ingred_img' src='http://new.supermarketers.com/web/"+img+"' alt=''/></div><span class='inged_name'>"+all_items[i].name+"</span><span class='inged_count'>"+all_items[i].c1_container+"</span> </div>")


                   //ADD SALAD ITEM TO FINISH

                   // console.log($("#ingr_ent_calc_"+ all_items[i].id).length);
                   // console.log('add');
                   // console.log(all_items[i].c2_vit_c+'aaaaaa');


                      //adding allergens
                      function emptyObject(obj) {
                          for (var c in obj) {
                              return false;
                          }
                          return true;
                      }
                      if(!emptyObject(allergens[this.id.substr(8)])){
                          for( var i=0;i<allergens[this.id.substr(8)].length;i++ ){
                              if(i%2 == 0){
                                  if(!added_allergens[allergens[this.id.substr(8)][i]]){
                                  added_allergens[allergens[this.id.substr(8)][i]] = 1;
                                      console.log(added_allergens);
                                      $('.alerg_ingred').append('<p>'+allergens[this.id.substr(8)][i]+'</p>');
                                  }
                                  else{
                                      added_allergens[allergens[this.id.substr(8)][i]] = added_allergens[allergens[this.id.substr(8)][i]]+1;
                                      console.log(added_allergens);
                                  }
                              }
                          }
                      }
                      //adding allergens
                    return c1_calories;
                    return c2_totfat_1.toFixed(1);
                    return added_ingred;
                    return c2_satfat_1.toFixed(1);
                    return c2_transfat_1.toFixed(1);
                    return c2_cholester_1.toFixed(1);
                    return c2_sod_1.toFixed(1);
                    return c3_totcarb_1.toFixed(1);
                    return c3_dietfib_1.toFixed(1);
                    return c3_sugar_1.toFixed(1);
                    return c3_protein_1.toFixed(1);
                    return c2_vit_a.toFixed(1);
                    return c2_vit_c.toFixed(1);
                    return c3_iron.toFixed(1);
                    return c3_calcium.toFixed(1);
                    return c1_size.toFixed(1);
                    return added_allergens;
                }
            }

        }

    })

//    Adding/deleting entity to calculator



//    Minus /plus
    $('body').on('click', '.min_plus', function(e) {
        e.preventDefault();


        for(var i=0; i<all_items.length; i++) {
            if (all_items[i].id == this.id.substr(6)){
                cur_val = parseInt($("#count_ent_"+all_items[i].id).text());


               if(this.id =='minus_'+this.id.substr(6)){
                   if (cur_val!==0){

                       $("#count_ent_"+all_items[i].id).html((cur_val=cur_val-1));

                       c2_totfat_1-=parseFloat(all_items[i].c2_totfat_1);
                       $('#c2_totfat_1').html(Math.abs(c2_totfat_1.toFixed(1))+'g');

                       c1_calories-=parseFloat(all_items[i].c1_calories);
                       $('#count_calories').html(c1_calories);


                       c2_satfat_1-=parseFloat(all_items[i].c2_satfat_1);
                       $('#c2_satfat_1').html(Math.abs(c2_satfat_1.toFixed(1))+'g');


                       c2_transfat_1-=parseFloat(all_items[i].c2_transfat_1);
                       $('#c2_transfat_1').html(Math.abs(c2_transfat_1.toFixed(1))+'g');

                       c2_cholester_1-=parseFloat(all_items[i].c2_cholester_1);
                       $('#c2_cholester_1').html(Math.abs(c2_cholester_1.toFixed(1))+'g');

                       c2_sod_1-=parseFloat(all_items[i].c2_sod_1);
                       $('#c2_sod_1').html(Math.abs(c2_sod_1.toFixed(1))+'g');

                       c3_totcarb_1-=parseFloat(all_items[i].c3_totcarb_1);
                       $('#c3_totcarb_1').html(Math.abs(c3_totcarb_1.toFixed(1))+'g');

                       c3_dietfib_1-=parseFloat(all_items[i].c3_dietfib_1);
                       $('#c3_dietfib_1').html(Math.abs(c3_dietfib_1.toFixed(1))+'g');

                       c3_sugar_1-=parseFloat(all_items[i].c3_sugar_1);
                       $('#c3_sugar_1').html(Math.abs(c3_sugar_1.toFixed(1))+'g');

                       c3_protein_1-=parseFloat(all_items[i].c3_protein_1);
                       $('#c3_protein_1').html(Math.abs(c3_protein_1.toFixed(1))+'g');

                       c2_vit_a-=parseFloat(all_items[i].c2_vit_a);
                       $('#c2_vit_a').html(Math.abs(c2_vit_a.toFixed(1))+'%');


                       c2_vit_c -= parseFloat(all_items[i].c2_vit_c);
                       $('#c2_vit_c').html(Math.abs(c2_vit_c.toFixed(1))+'%');

                       c3_iron -= parseFloat(all_items[i].c3_iron);
                       $('#c3_iron').html(Math.abs(c3_iron.toFixed(1))+'%');

                       c3_calcium -= parseFloat(all_items[i].c3_calcium);
                       $('#c3_calcium').html(Math.abs(c3_calcium.toFixed(1))+'%');

                       c1_size -= parseFloat(all_items[i].c1_size);
                       $('#c1_size').html(Math.abs(c1_size.toFixed(1))+'g');


                       $('#dv_c2_totfat_1').html( Math.round(c2_totfat_1/65*100)+"%");

                       $('#dv_c2_satfat_1').html( Math.round(c2_satfat_1/20*100)+"%");

                       $('#dv_c2_cholester_1').html( Math.round(c2_cholester_1/300*100)+"%");

                       $('#dv_c2_sod_1').html( Math.round(c2_sod_1/2400*100)+"%");

                       $('#dv_c3_totcarb_1').html( Math.round(c3_totcarb_1/300*100)+"%");

                       $('#dv_c3_dietfib_1').html( Math.round(c3_dietfib_1/25*100)+"%");

                       $('#grm_to_lbs').html( (c1_size/454).toFixed(1)+" lbs");

                     //  alert(all_items[i].id);

                       if (cur_val == 0){
                         //  $("#ingr_ent_calc_"+all_items[i].id).hide();
                          // $("#cotn_id_"+all_items[i].id).css("background-color","#fff");

                           $( ".inged_name","#cotn_id_"+all_items[i].id ).css("color",'#71a866');
                           $( ".inged_count","#cotn_id_"+all_items[i].id ).css("color",'#565554');
                           $( ".ing_ln","#cotn_id_"+all_items[i].id ).css("display",'none');
                           $('.ing_ln',"#cotn_id_"+all_items[i].id).animate({scale: "0.5"}, 100);
                           $("#cotn_id_"+all_items[i].id).css("background-color",'#fff');
                           $("#cotn_id_"+all_items[i].id).removeClass("active");
                           $("#overlay","#cotn_id_"+all_items[i].id).remove();


                           $("#cotn_finish_id_"+all_items[i].id).remove();
                           $("#ingr_ent_calc_"+ all_items[i].id).remove();
                           added_ingred.splice( $.inArray( all_items[i].id,added_ingred), 1 );



                          // added_ingred.splice( $.inArray( all_items[i].id,added_ingred), 1 );


                       }

                       return c1_calories;

                       return c2_totfat_1.toFixed(1);

                       return c2_satfat_1.toFixed(1);

                       return c2_transfat_1.toFixed(1);

                       return c2_cholester_1.toFixed(1);

                       return c2_sod_1.toFixed(1);

                       return c3_totcarb_1.toFixed(1);

                       return c3_dietfib_1.toFixed(1);

                       return c3_sugar_1.toFixed(1);

                       return c3_protein_1.toFixed(1);

                       return c2_vit_a.toFixed(1);

                       return c2_vit_c.toFixed(1);

                       return c3_iron.toFixed(1);

                       return c3_calcium.toFixed(1);

                       return c1_size.toFixed(1);
                   }
               }
                else{
                   $("#count_ent_"+all_items[i].id).html(cur_val=cur_val+1);

                   c2_totfat_1+=parseFloat(all_items[i].c2_totfat_1);
                   $('#c2_totfat_1').html(Math.abs(c2_totfat_1.toFixed(1))+'g');

                   c1_calories+=parseFloat(all_items[i].c1_calories);
                   $('#count_calories').html(c1_calories);


                   c2_satfat_1+=parseFloat(all_items[i].c2_satfat_1);
                   $('#c2_satfat_1').html(Math.abs(c2_satfat_1.toFixed(1))+'g');

                   c2_transfat_1+=parseFloat(all_items[i].c2_transfat_1);
                   $('#c2_transfat_1').html(Math.abs(c2_transfat_1.toFixed(1))+'g');


                   c2_cholester_1+=parseFloat(all_items[i].c2_cholester_1);
                   $('#c2_cholester_1').html(Math.abs(c2_cholester_1.toFixed(1))+'g');

                   c2_sod_1+=parseFloat(all_items[i].c2_sod_1);
                   $('#c2_sod_1').html(Math.abs(c2_sod_1.toFixed(1))+'g');

                   c3_dietfib_1+=parseFloat(all_items[i].c3_dietfib_1);
                   $('#c3_dietfib_1').html(Math.abs(c3_dietfib_1.toFixed(1))+'g');

                   c3_totcarb_1+=parseFloat(all_items[i].c3_totcarb_1);
                   $('#c3_totcarb_1').html(Math.abs(c3_totcarb_1.toFixed(1))+'g');

                   c3_sugar_1+=parseFloat(all_items[i].c3_sugar_1);
                   $('#c3_sugar_1').html(Math.abs(c3_sugar_1.toFixed(1))+'g');

                   c3_protein_1+=parseFloat(all_items[i].c3_protein_1);
                   $('#c3_protein_1').html(Math.abs(c3_protein_1.toFixed(1))+'g');

                   c2_vit_a+=parseFloat(all_items[i].c2_vit_a);
                   $('#c2_vit_a').html(Math.abs(c2_vit_a.toFixed(1))+'%');

                   c2_vit_c += parseFloat(all_items[i].c2_vit_c);
                   $('#c2_vit_c').html(Math.abs(c2_vit_c.toFixed(1))+'%');

                   c3_iron += parseFloat(all_items[i].c3_iron);
                   $('#c3_iron').html(Math.abs(c3_iron.toFixed(1))+'%');

                   c3_calcium += parseFloat(all_items[i].c3_calcium);
                   $('#c3_calcium').html(Math.abs(c3_calcium.toFixed(1))+'%');

                   c1_size += parseFloat(all_items[i].c1_size);
                   $('#c1_size').html(Math.abs(c1_size.toFixed(1))+'g');


                   $('#dv_c2_totfat_1').html( Math.round(c2_totfat_1/65*100)+"%");

                   $('#dv_c2_satfat_1').html( Math.round(c2_satfat_1/20*100)+"%");

                   $('#dv_c2_cholester_1').html( Math.round(c2_cholester_1/300*100)+"%");

                   $('#dv_c2_sod_1').html( Math.round(c2_sod_1/2400*100)+"%");

                   $('#dv_c3_totcarb_1').html( Math.round(c3_totcarb_1/300*100)+"%");

                   $('#dv_c3_dietfib_1').html( Math.round(c3_dietfib_1/25*100)+"%");

                   $('#grm_to_lbs').html( (c1_size/454).toFixed(1)+" lbs");

                   return c1_calories;
                   return c2_totfat_1.toFixed(1);
                   return c2_satfat_1.toFixed(1);
                   return c2_transfat_1.toFixed(1);
                   return c2_cholester_1.toFixed(1);
                   return c2_sod_1.toFixed(1);
                   return c3_totcarb_1.toFixed(1);
                   return c3_dietfib_1.toFixed(1);
                   return c3_sugar_1.toFixed(1);
                   return c3_protein_1.toFixed(1);
                   return c2_vit_a.toFixed(1);
                   return c2_vit_c.toFixed(1);
                   return c3_iron.toFixed(1);
                   return c3_calcium.toFixed(1);
                   return c1_size.toFixed(1);

               }
            }}

       // return c1_calories;



    })

//    Minus /plus
    $('body').on('click', '#save_as_pdf', function(e) {
        //  e.preventDefault(true);
        return true;

    })

//    BUTTON SAVE SALAD
    $('body').on('click', '.class_save', function(e) {

        e.preventDefault();
        if(($.trim($('#salad_name').val())=='')||($('#salad_name').val()=='Enter salad name')){


            $('#salad_name').css('border-color','#d9534f');
            $('#salad_name').css('border-width','2px');
            $('.warn').css('display','block');
            $(window).scrollTop($('.warn').offset().top-100);
           // var hei =  $('#salad_name').width();
         //   $('.warn').css('width',hei+'px');
            console.log(hei);

        }
        else{
        $('.warn').css('display','none');
        $('#salad_name').css('border-color','#cdccc4');
        $('#salad_name').css('border-width','1px');
        $('#finish_slad').css("visibility",'visible');
            $('#finish_slad').css("position",'initial');


        $('.display_ingred').css("display",'none');
        $('.green_name').html($('#salad_name').val());
        $('#salad_name').css("display",'none');
        $('.green_name').css("display",'block');
        $('.cat_name').css("display",'none');
        $('.class_save').css("display",'none');
        $('.min_plus').css("visibility",'hidden');
        $('.manage_links').css("visibility",'visible');
            $('#manage_links').css("position",'initial');

            $('.cat_name_visib').css("display",'block');
        //
            $('.done_msg').remove();
            $('.top').hide();
            $('.header').hide();
            $('.bread').hide();
            $('.js--page-footer').hide();
            $('.manage_links').hide();





            //CREATING JSON OBJECT FOR SAVING
          //  var salad = new Object();
           // var salad = [];
            var salad= new Object();
            var cur_sal = new Object();
            var cur_alg = new Object();

            for (var i = 0; i <= added_ingred.length-1; i++) {
             var c = added_ingred[i];
                cur_sal[c] = new Array();
                //salad[salad.length] = c;
                cur_sal[c] = parseInt($("#count_ent_"+added_ingred[i]).text());
               // salad[salad.length]['val'] = parseInt($("#count_ent_"+added_ingred[i]).text());
               // console.log(salad.length);
            }

            function S4() {
                return (((1+Math.random())*0x10000)|0).toString(16).substring(1);
            }
            for( cur_a in added_allergens){
                var m = cur_a;
                cur_alg[m] = new Array();
                cur_alg[m] = added_allergens[cur_a];
            }

            salad.ingred =cur_sal;
            salad['uniqid']= S4()+S4();
            sal_uniq =  salad['uniqid'];
            salad.allergens = cur_alg;
            var json_salad = JSON.stringify(salad);
            $('#save_as_pdf').attr('href','/web/site/create-pdf/'+sal_uniq);


            console.log(sal_uniq);

            //return;



            if (typeof(cur_user_id) !== "undefined"){

                $.ajax({
                    type: "POST",
                    url: "/web/site/save-json-salad",
                    data: {
                        jsonSalad:json_salad,
                        uniqId:sal_uniq,
                        userId: cur_user_id,
                        saladName: $.trim($('#salad_name').val())
                    }
                }).done(function (o) {
                    $('.top').show();
                    $('.header').show();
                    $('.bread').show();
                    $('.js--page-footer').show();
                    $('.manage_links').show();
                    //new_salad_id  = o;
                    $('.mess_g').append('<div class="done_msg">SALAD SUCCESSFULLY SAVED. <a href="/web/site/create-salad/'+sal_uniq+'">SHOW SALAD</a></div>');
                   // $(".style_fb").attr("href",'http://www.facebook.com/sharer/sharer.php?u=#url'+window.location.href.substr(0, location.href.lastIndexOf("/") + 1)+'index.php?r=site/view-salad&id='+sal_uniq);
                    // console.log($('.fb-share-button').attr('fb-iframe-plugin-query'));
                    // var new_n = ($('.fb-share-button').attr('fb-iframe-plugin-query')).replace(/create-salad/g, 'view-salad')
                    // $('.fb-share-button').attr('href', new_n  );
                    // console.log(new_n );
                });
            }
            else {
                $.ajax({
                    type: "POST",
                    url: "/web/site/save-json-salad",
                    data: {
                        jsonSalad:json_salad,
                        uniqId:sal_uniq,
                        saladName: $.trim($('#salad_name').val())
                    }
                }).done(function (o) {
                  //  new_salad_id = o;
                    $('.top').show();
                    $('.header').show();
                    $('.bread').show();
                    $('.js--page-footer').show();
                    $('.manage_links').show();
                    $('.mess_g').append('<div class="done_msg">SALAD SUCCESSFULLY SAVED <a href="/web/site/create-salad/'+sal_uniq+'">SHOW SALAD</a></div>');
                    //$(".style_fb").attr("href", 'http://www.facebook.com/sharer/sharer.php?u=' + window.location.href.substr(0, location.href.lastIndexOf("/") + 1) + 'index.php?r=site/view-salad&id=' + sal_uniq);

                    //  console.log($('.fb-share-button').attr('fb-iframe-plugin-query'));
                    //   var new_n = ($('.fb-share-button').attr('fb-iframe-plugin-query')).replace(/create-salad/g, 'view-salad')
                    //  $('.fb-share-button').attr('href', new_n  );
                    // console.log(new_n );
                });
            }














            //CREATING JSON OBJECT FOR SAVING

        /*    html2canvas(document.body, {
                onrendered: function(canvas) {

                    dataURL = canvas.toDataURL("image/png");

                    if (typeof(cur_user_id) !== "undefined"){

                        $.ajax({
                            type: "POST",
                            url: "index.php?r=site/save-img",
                            data: {
                                imgBase64: dataURL,
                                userId: cur_user_id,
                                saladName: $.trim($('#salad_name').val())
                            }
                        }).done(function (o) {
                            $('.top').show();
                            $('.header').show();
                            $('.bread').show();
                            $('.js--page-footer').show();
                            $('.manage_links').show();
                            new_salad_id  = o;
                            $('.mess_g').append('<div class="done_msg">SALAD SUCCESSFULLY SAVED. <a href="index.php?r=site/view-salad&id='+o +'">SHOW SALAD</a></div>');
                            $(".style_fb").attr("href",'http://www.facebook.com/sharer/sharer.php?u=#url'+window.location.href.substr(0, location.href.lastIndexOf("/") + 1)+'index.php?r=site/view-salad&id='+new_salad_id);
                           // console.log($('.fb-share-button').attr('fb-iframe-plugin-query'));
                           // var new_n = ($('.fb-share-button').attr('fb-iframe-plugin-query')).replace(/create-salad/g, 'view-salad')
                           // $('.fb-share-button').attr('href', new_n  );
                           // console.log(new_n );
                        });
                    }
                    else{
                        $.ajax({
                            type: "POST",
                            url: "index.php?r=site/save-img",
                            data: {
                                imgBase64: dataURL,
                                saladName: $.trim($('#salad_name').val())
                            }
                        }).done(function (o) {
                            new_salad_id  = o;
                            $('.top').show();
                            $('.header').show();
                            $('.bread').show();
                            $('.js--page-footer').show();
                            $('.manage_links').show();
                            $('.mess_g').append('<div class="done_msg">SALAD SUCCESSFULLY SAVED <a href="index.php?r=site/view-salad&id='+o +'">SHOW SALAD</a></div>');
                            $(".style_fb").attr("href",'http://www.facebook.com/sharer/sharer.php?u='+window.location.href.substr(0, location.href.lastIndexOf("/") + 1)+'index.php?r=site/view-salad&id='+new_salad_id);

                          //  console.log($('.fb-share-button').attr('fb-iframe-plugin-query'));
                         //   var new_n = ($('.fb-share-button').attr('fb-iframe-plugin-query')).replace(/create-salad/g, 'view-salad')
                          //  $('.fb-share-button').attr('href', new_n  );
                           // console.log(new_n );
                        });

                    }
                }
            });*/
        }

    })




//    BUTTON SAVE SALAD


//    BUTTON EDIT SALAD


    $('body').on('click', '#edit_recipe', function(e) {
        e.preventDefault();
        $('.done_msg').remove();
        $('#finish_slad').css("visibility",'hidden');
        $('#cat_2').addClass('cat_name_active');
        $('.ingred_cat_2').addClass('display_ingred');
        $('.ingred_cat_2').removeClass('non_display_ingred');
        $('.display_ingred').css("display",'block');
        $('.cat_name').css("display",'block');
        $('.class_save').css("display",'block');
        $('.min_plus').css("visibility",'visible');
        $('.manage_links').css("visibility",'hidden');
        $('.cat_name_visib').css("display",'none');
        $('#salad_name').css("display",'block');
        $('.green_name').css("display",'none');


    })
//    BUTTON EDIT SALAD



//print page
    $('body').on('click', '.cat_print', function(e) {
        e.preventDefault(false);
        window.print();
    })
//print page


    //SEND MAIL TO ADMIN
    $('body').on('click', '.cat_pdf', function(e) {
        $('.done_msg').remove();

        e.preventDefault(false);


        $.ajax({
            type: "POST",
            url: "/web/site/mail-owner",
            data: {
                newsSalad:sal_uniq
            }
        }).done(function (o) {

            console.log(o);
            $('.mess_g').append('<div class="done_msg">MAIL SUCCESSFULLY DELIVERED.THANK YOU </div>');
        });






        });
    //SEND MAIL TO ADMIN


    //SEND MAIL TO USER

    //hide form
    $('body').on('click', '.close_form', function(e) {
        e.preventDefault(false);
        $('#save_salad_form').css('display','none');
        $('#form_cont').css('display','none');
    })
    //hide form

    //show form
    $('body').on('click', '.style_at', function(e) {
        $('.done_msg').remove();
        $('#save_salad_form').css('display','block');
        $('#form_cont').css('display','block');
        e.preventDefault(false);
    });
//show form

    $('body').on('click', '#save_salad_submit', function(e) {
        e.preventDefault(false);

        var valid_email = false;
        var reg_mail = /[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+/;
        if (!reg_mail.test( $.trim($('#user_email').val()))) {
            $('#user_email').val('Not valid mail');
            $('#user_email').css('border-color','#a94442');
            $('#user_email').css('color','#a94442');

        }
        else{
            $('#user_email').css('border-color','#3c763d');
            $('#user_email').css('color','#3c763d');
            valid_email = true;
        }
        if(valid_email){
            var mail_to =$.trim($('#user_email').val());
        $.ajax({
            type: "POST",
            url: "/web/site/mail-user",
            data: {
                UserMail:mail_to,
                SaladId:sal_uniq,
                PageUrl:window.location.href
            }
        }).done(function (o) {

            console.log(o);
            $('.mess_g').append('<div class="done_msg">MAIL SUCCESSFULLY DELIVERED.TO '+mail_to+' </div>');
            $('#save_salad_form').css('display','none');
            $('#form_cont').css('display','none');
        });
        }
    })

    //SEND MAIL TO USER

//disclaimer
    $('body').on('click', '.discl', function(e) {
        e.preventDefault(false);
        location.reload();
    })
//disclaimer

//FACEBOOK

    $('body').on('click', '#share', function(e) {
        e.preventDefault(false);
        myWin=open("http://www.facebook.com/sharer.php?u=http://new.supermarketers.com/web/"+encodeURIComponent("site/create-salad/"+sal_uniq),"displayWindow","width=520," +
        "height=300,left=350,top=170,status=no,toolbar=no,menubar=no");
    })
//FACEBOOK

//PRODUCT CONTAINER
    $('.prod_cnt').hover( function(e) {
        $(this).on({
            'mouseenter':function(){
                $( ".menu-icon",this ).css( "background-color", "#413c35" );
            },'mouseleave':function(){
                $( ".menu-icon",this ).css( "background-color", " #71a866" );
            }
        });

    })

    //$('.prod_cnt').hover(
    //    function() {
    //        $(this).children(".menu-icon").css( "background-color", "#413c35" );
    //    }, function() {
    //        $(this).children(".menu-icon").css( "background-color", " #71a866" );
    //    }
    //);

//PRODUCT CONTAINER


    $(function () { $('#jstree_demo_div').jstree(); });

//    PRODUCT SHARE

    $('body').on('click', '#face_prod', function(e) {
        e.preventDefault(false);
        myWin=open("http://www.facebook.com/sharer.php?u=#url","displayWindow","width=520," +
        "height=300,left=350,top=170,status=no,toolbar=no,menubar=no");
    })


//    PRODUCT SHARE

    $(".products__title").height(Math.max.apply(null, $(".products__title").map(function (){ return $(this).height();}).get()));
});







