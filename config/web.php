<?php

$config = [
    'id' => 'basic',
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
            'modules' => [
                'rbac' => [
                    'class' => 'yii2mod\rbac\Module',
                ],
            ],
        ],
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '5QYFMqL5j-K4Vh-xp7ekZd4RHfBDP7wJ',
        ],
        'user' => [
//            'identityClass' => 'app\models\User',
            'identityClass'   => 'app\models\UserModel',
            'enableAutoLogin' => true,
            'loginUrl'        => '/site/login',
        ],
        'authManager' => [
            'class'           => 'yii\rbac\DbManager',
            'defaultRoles'    => ['guest', 'user'],
            //'cache'           => 'yii\caching\FileCache',
            'itemTable'       => 'AuthItem',
            'itemChildTable'  => 'AuthItemChild',
            'assignmentTable' => 'AuthAssignment',
            'ruleTable'       => 'AuthRule',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
        ],
        'urlManager' => [
            'cache' => false,
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                '<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
//                'search/<type:(job|candidate|company)>' => 'search/index',
//                'login' => 'site/login',
//                ['class' => 'yii2mod\cms\components\PageUrlRule'],
            ]
        ],
        /*'assetManager' => [
            'bundles' => [
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [],
                ],
            ],
        ],*/
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['10.8.4.*'],
    ];
}

return $config;
