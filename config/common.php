<?php

$params = require(__DIR__ . '/params.php');

return [
    'id' => 'common',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'db' => [
            'class'    => 'yii\db\Connection',
            'dsn'      => 'mysql:host=localhost;dbname=yii2basic',
            'username' => 'root',
            'password' => '',
            'charset'  => 'utf8',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
    'params' => $params,
];
