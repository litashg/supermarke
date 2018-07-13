<?php

use yii\helpers\Url;


$this->params['breadcrumbs'][] = $page->breadcrumbs;

?>
<script type="text/javascript">


    $(document).ready(function(){
        $('.col-sm-6').find('p').css({ "font-size": "16px" });
    });


</script>
<div class="container">

<?=$page->content?>
<?=$page_err?>


    </div>