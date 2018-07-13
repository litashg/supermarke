<?php
namespace app\components;

use app\models\FileCategory;
use app\models\Store;
use app\models\StoreCabinet;
use app\models\Company;
use Yii;
use yii\base\Widget;

class guestMenu extends Widget
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



        $file_categories = FileCategory::find()->where('parent_id=2')->andWhere('for_guest=1')->all();


        $documents = [];
        foreach($file_categories as $category){
            $document = ['label' => $category->name];

            $file_subcategories = FileCategory::find()->where('parent_id='.$category->id)->andWhere('for_shop=1')->all();
            if($file_subcategories){
                foreach($file_subcategories as $single_file){
                    if($single_file){

                        $new_menu_element = [];
                        $new_menu_element["label"] = $single_file->name;
                        $new_menu_element["icon"]  = 'fa fa-bars';
                        $new_menu_element["url"]   = '';
                        $new_menu_element["url"]   = '/guest/documents?id='.$single_file->id;

                        $document['items'][] =  $new_menu_element;
                    }


                }
            }else{
                $document["label"] = $category->name;
                $document["icon"]  = 'fa fa-bars';
                $document["url"]   = '';
                $document["url"]   = '/guest/documents?id='.$category->id;
            }

            $this->menuItems[] = $document;
        }


        //get cur user
        $cur_user = Yii::$app->user->identity;
        if (!isset($cur_user)){
            echo "error: user not found";
            die;
        }



    }

    public function run()
    {
        return $this->render('guest_menu', ['data'=> $this->makeMenu($this->menuItems, 'sidebar-menu')]);
    }
}
?>