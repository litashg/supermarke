<?php
//ini_set('display_errors',1);
//ini_set('display_startup_errors',1);
//error_reporting(-1);

error_reporting(0);
//ini_set('display_errors', true);
// comment out the following two lines when deployed to production
//error_reporting(E_ALL ^ E_NOTICE);

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/../config/web.php');



(new yii\web\Application($config))->run();

