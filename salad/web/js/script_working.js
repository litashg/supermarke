
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
    var last_div_before_edit = all_items[0].id;
    var dataURL;

    //VARIABLES
    //
    //var dv_c2_totfat_1 =;



    //ON BOOTSTRAP

   // $('#dv_c2_totfat_1').html( Math.round(c2_totfat_1/65*100)+"%");
    //ON BOOTSTRAP



//    var total=0;
//    var text = '&nbsp';
//    if ( typeof all_items !==  'undefined'){
//    $( ".prod_items" ).click(function(s) {
//        id=$(this).attr('id');
//        id=id.split('-');
//        id=id[1];
//
//        if ( $(this).hasClass("active_ingrid") ){
//            $.each(all_items, function(key, val) {
//                console.log(val.c2_totfat_1);
//                if (val.id == id){
//                    total=total-(parseFloat(val.c2_totfat_1));
//                    $( ".result").html(Math.abs(total.toFixed(1)));
//                   // $(this).removeClass( 'active' );
//                     text = $('.igred').html();
//                    text = text.replace(val.name,'');
//                    $('.igred').html(text);
//                };
//                //Math.abs(total.toFixed(1))   parseFloat
//                console.log('-'+total);
//                return text;
//                return parseFloat(total).toFixed(1);
//           });
//        }else{
//        $.each(all_items, function(key, val) {
//            if (val.id == id){
//                total=total+(parseFloat(val.c2_totfat_1));
//                $( ".result").html(Math.abs(total.toFixed(1)));
//                if( typeof text ===  'undefined'){
//                    $('.igred').html(val.name);
//                    text = text+val.name;
//                }else{
//                text = text+val.name;
//                $('.igred').html(text);}
//             };
//            console.log('+'+total);
//            return parseFloat(total).toFixed(1);
//            });
//
//    }
//        $(this).toggleClass( 'active_ingrid' );
//
//    });
//}

    //VIRTUAL SB CALC

//CALC CHANGE DISPLAYIG INGREDIENTS
    $('body').on('click', '.cat_name', function(e) {
   // $(".cat_name").click(function(e) {
        e.preventDefault();
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
                   // console.log($("#ingr_ent_calc_"+ all_items[i].id).length);
                 //   console.log('remove');
                     // console.log(added_ingred);
                      added_ingred.splice( $.inArray( all_items[i].id,added_ingred), 1 );
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
                   //ADD SALAD ITEM TO FINISH
                      $('#finish_slad').append("<div id='cotn_finish_id_"+all_items[i].id+"' class='col-xs-6 col-sm-5 col-md-15 finish_cont'> <div class='con'><img class='ingred_img' src='"+window.location.href.substr(0, location.href.lastIndexOf("/") + 1) +"/images/salad_bar/ingred_2.jpg' alt=''/></div><span class='inged_name'>"+all_items[i].name+"</span><span class='inged_count'>"+all_items[i].c1_container+"</span> </div>")


                   //ADD SALAD ITEM TO FINISH

                   // console.log($("#ingr_ent_calc_"+ all_items[i].id).length);
                   // console.log('add');
                   // console.log(all_items[i].c2_vit_c+'aaaaaa');


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
                   if (cur_val!==1){

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


//    BUTTON SAVE SALAD
    $('body').on('click', '.class_save', function(e) {

        e.preventDefault();
        if(($.trim($('#salad_name').val())=='')||($('#salad_name').val()=='Enter salad name')){

            $('#salad_name').css('border-color','#a94442');
            $('#salad_name').css('border-width','2px');

        }
        else{
        $('#salad_name').css('border-color','#cdccc4');
        $('#salad_name').css('border-width','1px');
        $('#finish_slad').css("visibility",'visible');
        $('.display_ingred').css("display",'none');
        $('.green_name').html($('#salad_name').val());
        $('#salad_name').css("display",'none');
        $('.green_name').css("display",'block');
        $('.cat_name').css("display",'none');
        $('.class_save').css("display",'none');
        $('.min_plus').css("visibility",'hidden');
        $('.manage_links').css("visibility",'visible');
        $('.cat_name_visib').css("display",'block');

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
        //console.log(last_div_before_edit);
        $('#salad_name').css("display",'block');
        $('.green_name').css("display",'none');


    })
//    BUTTON EDIT SALAD

//print page
    $('body').on('click', '.cat_print', function(e) {
        window.print();

    })
//print page


// IMAGE
//   user login send salad to us
    $('body').on('click', '.cat_pdf', function(e) {
        $('.done_msg').remove();
        $('.top').hide();
        $('.header').hide();
        $('.bread').hide();
        $('.js--page-footer').hide();
        $('.manage_links').hide();

        e.preventDefault(false);

        html2canvas(document.body, {
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
                        console.log('saved');
                        $('.top').show();
                        $('.header').show();
                        $('.bread').show();
                        $('.js--page-footer').show();
                        $('.manage_links').show();
                        $('.mess_g').append('<div class="done_msg">SALAD SUCCESSFULLY SAVED</div>');
                    });
            }
                else{
                    $('#save_salad_form').css('display','block');
                    $('#form_cont').css('display','block');

                }
            }
        });

        });
//  user login  send salad to us


    //anonim form submit form_save_salad
    $('body').on('click', '#save_salad_submit', function(e) {
        $('.done_msg').remove();
        e.preventDefault(false);
        var valid_name = false;
        var valid_email = false;
        var reg_mail = /[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+/;
        var reg_name = /^[a-z0-9/-_+.@]+/;
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

            if((!reg_name.test($.trim($('#user_name').val())))||($.trim($('#user_name').val())== 'Not valid name')){
                $('#user_name').val('Not valid name');
                $('#user_name').css('border-color','#a94442');
                $('#user_name').css('color','#a94442');
            }
            else{
                $('#user_name').css('border-color','#3c763d');
                $('#user_name').css('color','#3c763d');
                valid_name = true;

            }
        if(valid_email && valid_name ){
            $.ajax({
                type: "POST",
                url: "index.php?r=site/save-img",
                data: {
                    imgBase64: dataURL,
                    userName: $.trim($('#user_name').val()),
                    userEmail: $.trim($('#user_email').val()),
                    saladName: $.trim($('#salad_name').val())
                }
            }).done(function (o) {
                console.log('saved');
                $('.top').show();
                $('.header').show();
                $('.bread').show();
                $('.js--page-footer').show();
                $('.manage_links').show();
            });

           // console.log(dataURL);
            $('#save_salad_form').css('display','none');
            $('#form_cont').css('display','none');
            $('.mess_g').append('<div class="done_msg">SALAD SUCCESSFULLY SAVED</div>');
        }

    })
//anonim form submit form_save_salad


// IMAGE

});
$(function () { $('#jstree_demo_div').jstree(); });







