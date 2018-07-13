<?php
namespace app\components;

use Yii;
use yii\base\Widget;

class adminMenu extends Widget
{
    public $menuItems;
    
    private function makeMenu($items, $menuCssClass = '')
    {
        $output = "<ul class='{$menuCssClass}'>";
        foreach($items as $item)
        {
            if(empty($item['items'])) {
                $output .= '<li><a href="'.\yii\helpers\Url::to($item['url']).'">';
                if(!empty($item['icon']))
                    $output .= "<i class='{$item['icon']}'></i>";
                $output .= "<span>{$item['label']}</span></a></li>".PHP_EOL;
            }
            else
            {
                $output .= '<li class="treeview"><a href="#">';
                if(!empty($item['icon']))
                    $output .= "<i class='{$item['icon']}'></i>";
                $output .= "<span>{$item['label']}</span><i class='fa fa-angle-left pull-right'></i></a>";
                $output .= $this->makeMenu($item['items'], 'treeview-menu');
                $output .= '</li>'.PHP_EOL;
            }
        }
        return PHP_EOL . $output . '</ul>' . PHP_EOL;
    }
    
    public function init()
    {
       $this->menuItems = [
           ['label'=>Yii::t('admin','Dashboard'), 'icon'=>'fa fa-dashboard', 'url'=>['/admin/index']],

           ['label' => Yii::t('admin','Users'), 'icon'=>'fa fa-user', 'url' => ['/users/admin/index']],
           ['label' => Yii::t('admin','File category'), 'icon'=>'fa fa-user', 'url' => ['/file-category/index']],
           ['label' => Yii::t('admin','File upload'), 'icon'=>'fa fa-user', 'url' => ['/documents/index']],
           ['label' => Yii::t('admin','Company'), 'icon'=>'fa fa-users', 'url' => ['/company/index']],
           ['label' => Yii::t('admin','Store'), 'icon'=>'fa fa-home', 'url' => ['/store/index']],
           ['label' => Yii::t('admin','Store-planogram'), 'icon'=>'fa fa-bar-chart', 'url' => ['/store-planogram/index']],
           ['label' => Yii::t('admin','Report'), 'icon'=>'fa fa-book', 'url' => ['/report/index']],
           ['label' => Yii::t('admin','Report Type'), 'icon'=>'fa fa-suitcase', 'url' => ['/report-type/index']],
//           ['label' => Yii::t('admin','Report Option Value'), 'icon'=>'fa fa-money', 'url' => ['/report-options-value/index']],
           [
               'label'=>Yii::t('admin','Settings'),
               'icon'=>'fa fa-cogs',
               'items'=>[
                   ['label'=>Yii::t('admin','Site setings'), 'icon'=>'fa fa-cog', 'url'=>['/settings/index']],
                   ['label'=>Yii::t('admin','Role'), 'icon'=>'fa fa-meh-o', 'url'=>['/role/index']],
                   ['label'=>Yii::t('admin','Report Type Option'), 'icon'=>'fa fa-pencil', 'url'=>['/report-type-option/index']],
                   ['label'=>Yii::t('admin','Database'), 'icon'=>'fa fa-database', 'url'=>['/admin/db']],

               ],
           ],



       ];
    }
    
    public function run()
    {
        return $this->render('admin_menu', ['data'=> $this->makeMenu($this->menuItems, 'sidebar-menu')]);
    }
}
?>