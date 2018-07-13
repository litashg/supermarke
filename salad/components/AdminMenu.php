<?php
namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;

class AdminMenu extends Widget
{

    public $params = array(
        // пусть по умолчанию будет активна ссылка на вино
        'action'=>'wine',
    );

    public function init()
    {
        parent::init();
        if ($this->params  === null) {
            $this->params  = array('action'=>'wine',);
        }
    }

    public function run()
    {
        return $this->render('admin_menu',array('params' => $this->params));
    }
}