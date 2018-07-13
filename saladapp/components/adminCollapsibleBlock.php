<?php
namespace app\components;

use Yii;
use yii\base\Widget;

class adminCollapsibleBlock extends Widget
{
    public $color = 'blue';
    public $btn_type = 'primary';
    public $icon = 'fa-cog';
    public $title = '';
    public $body = '';
    public $footer ='';
    public $title_color ='black';
    public $icon_color ='black';

    public function init()
    { ?>
        <div style="padding-left:0px;padding-right:0px;" class="col-md-12">
        <div class="box box-solid bg-<?= $this->color ?>-gradient ">
        <div class="box-header">
        <!-- tools box -->
        <div class="pull-right box-tools">
            <button
            class="btn btn-<?= $this->btn_type ?> btn-sm pull-right"
            data-widget='collapse'
					data-toggle="tooltip"
					title="<?= Yii::t('admin', 'Collapse') ?>"
					style="margin-right: 5px;">
					<i class="fa fa-chevron-down"></i>
        					    </button>
        					    </div><!-- /. tools -->
        					    <i class="fa <?= $this->icon ?>"  style="color:<?= $this->icon_color ?>;"></i>
        					    <h3 class="box-title" style="color:<?= $this->title_color ?>;"><?= $this->title ?></h3>
        		</div>
        		<div class="box-body " style="display: none" >
    <?php }

    public function run()
    {
        if( isset($content) )
            echo $content;
        elseif( isset($this->body) )
            echo $this->body; 
        ?>
        		</div><!-- /.box-body-->
        		<div class="box-footer no-border" style="display: none">
        		  <?php if(isset($this->footer)) echo $this->footer; ?>
        		</div>
        	</div>
         </div>

    <?php }
}
?>