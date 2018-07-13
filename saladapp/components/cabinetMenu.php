<?php
namespace app\components;

use app\models\Documents;
use app\models\FileCategory;
use app\models\Store;
use app\models\StoreCabinet;
use app\models\Company;
use Yii;
use yii\base\Widget;

class cabinetMenu extends Widget
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
        $file_categories = FileCategory::find()->where('parent_id=2')->andWhere('for_guest=0')->all();


        $documents = [];
        foreach($file_categories as $category){
                $document = ['label' => $category->name];

                $file_subcategories = FileCategory::find()->where('parent_id='.$category->id)->andWhere('for_guest=0')->all();
            if($file_subcategories){
                foreach($file_subcategories as $single_file){
                    if($single_file){

                        $new_menu_element = [];
                        $new_menu_element["label"] = $single_file->name;
                        $new_menu_element["icon"]  = 'fa fa-bars';
                        $new_menu_element["url"]   = '';
                        $new_menu_element["url"]   = '/store-cabinet/documents?id='.$single_file->id;

                        $document['items'][] =  $new_menu_element;
                    }


                }
            }else{
                $document["label"] = $category->name;
                $document["icon"]  = 'fa fa-bars';
                $document["url"]   = '';
                $document["url"]   = '/store-cabinet/documents?id='.$category->id;
            }

            $this->menuItems[] = $document;
        }


        $store_items =  ['label' => "<b>Stores:</b>", 'icon'=>''];



       //get cur user
        $cur_user = Yii::$app->user->identity;
        if (!isset($cur_user)){
            echo "error: user not found";
            die;
        }

            //if store
            if ($cur_user->role == 2){
                //get store
                $store = Store::find()->where("id=".$cur_user->store_id)->one();
                if (!isset($store)) {
                    echo "error: user store not found";
                    die;
                }
                //create menu
                $new_menu_element = [];

                $new_menu_element["label"] = $store->name;
                $new_menu_element["icon"]  = 'fa fa-bars';
                $new_menu_element["url"]   = '';
                $new_menu_element["url"]   = '/store-cabinet/view?id='.$store->id;

                $store_items['items'][] =  $new_menu_element;
            }

            //if company
            elseif($cur_user->role == 3){
                //get company
                $company = Company::find()->where("id=".$cur_user->company_id)->one();

                $stores = Store::find()->where('company_id='.$cur_user->company_id)->all();
                if(!isset($company)){
                    echo "error: company not found";
                    die;
                }
                //get stores from company
                $store_list = $stores;
               //create menu

                foreach ($store_list as $store){
                        $new_menu_element = [];
                        $new_menu_element["label"] = $store->name;
                        $new_menu_element["icon"] = 'fa fa-bars';
                        $new_menu_element["url"]   = '/store-cabinet/view?id='.$store->id;
                    $store_items['items'][]= $new_menu_element;
                }


            }
        $this->menuItems[] =$store_items;

    }

    public function run()
    {
        return $this->render('catalog_menu', ['data'=> $this->makeMenu($this->menuItems, 'sidebar-menu')]);
    }
}
?>