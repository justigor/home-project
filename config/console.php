<?php

Yii::setAlias('@tests', dirname(__DIR__) . '/tests');

return [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'app\commands',
    'controllerMap' => [
        'rbac' => 'yii2mod\rbac\commands\RbacCommand',
    ],
];
