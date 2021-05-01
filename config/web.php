<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            'cookieValidationKey' => 'sI4Wtp9I2wbg4DwnJov0AKX8pCTWeyCe',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\Users',
            'enableAutoLogin' => true,
            'authTimeout' => 3600*4,
        ],
      
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath'=>'@app/mailer',
            'transport'=>[
                'class'=>'Swift_SmtpTransport',
                'host'=>'smtp.gmail.com',
                'username'=>'raphlamptey@gmail.com',
                'password'=>'&$Pampanaa$$$',
                'port'=>'587',
                'encryption'=>'tls',
            ],
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
        
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'defaultRoles'=>['guest'],
            // uncomment if you want to cache RBAC items hierarchy
            // 'cache' => 'cache',
        ],

        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'login'=>'site/login',
                'dashboard'=>'site/index',
                'register'=>'site/register',
                'approval'=>'request/approval',
                'pendings'=>'request/pending',
                'rejected'=>'request/view'

            ],
        ],
        //  'view' => [
        //      'theme' => [
        //          'pathMap' => [
        //             '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app',
        //          ],
        //      ],
        // ],
    ],
    'modules'=>[
       'settings' => [
           'class' => 'mdm\admin\Modules',
       ],

       'admin'=>[
           'class'=>'mdm/admin/Modules'
       ],
       
       'gridview' => [
        'class' => 'kartik\grid\Module',
        // other module settings
       ],
    ],

    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
