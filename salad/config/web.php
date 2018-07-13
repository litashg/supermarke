<?php


$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '1qaz2wsx',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
        ],

        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],

        'assetManager' => [
            'bundles' => [
                'yii\bootstrap\BootstrapAsset' => [
                    'sourcePath' => null,
                    'basePath' => '@webroot',
                    'baseUrl' => '@web',
                    'css' => ['css/bootstrap.css','css/jstree.css'],

                ],
            ],
            ],
'urlManager' => [
            'enablePrettyUrl' => true,
             'showScriptName' => false,
            'rules' => [
               // 'site/create-salad/<id:\d+>' =>  'site/create-salad/<id:\d+>',
             //  'site/page/<id:\w+>' => '<action>/<id:\w+>',

            //   '/page/<action>' => '<action>',
             //   '<controller:\w+>/<id:\w+>' => '<controller>/view',
           //     '<controller:\w+>/<id:\d+>' => '<controller>/create-salad',
             //   '<controller:\w+>/<action:\w+>/<id:\w+>' => '<controller>/<action>',
             //   '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
              //  '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
              //  'module/<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',

               // '<controller:\w+>/<id:\w+>' => '<controller>',
                '<controller:\w+>/<action:\w+>/<id:\w+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>/<id>' => '<controller>/<action>',

                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<controller:\w+>/create-salad/<id>' => 'site/create-salad',
                '<controller:\w+>/create-pdf/<id>' => '/site/create-pdf',


                '<controller>/<action>' => '<controller>/<action>',

            ]
        ],

        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles' => ['guest'],
        ],

        'db' => require(__DIR__ . '/db.php'),


    ],



    'params' => $params,

];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
