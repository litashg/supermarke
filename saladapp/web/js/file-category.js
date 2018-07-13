
$('#filecategory-for_guest').on('ifChecked', function(){


    $('#filecategory-for_shop').iCheck('disable');
    $('#filecategory-is_global').iCheck('disable');

});
$('#filecategory-for_guest').on('ifUnchecked', function(){


    $('#filecategory-for_shop').iCheck('enable');
    $('#filecategory-is_global').iCheck('enable');

});