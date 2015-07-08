<?php
/**
 * Application configuration shared by all test types
 */
return [
    'controllerMap' => [
        'fixture' => [
            'class' => 'yii\faker\FixtureController',
            'fixtureDataPath' => '@tests/codeception/fixtures',
            'templatePath' => '@tests/codeception/templates',
            'namespace' => 'tests\codeception\fixtures',
        ],
    ],
    'components' => [
        'db' => [
            'class'     => 'yii\db\Connection',
            'dsn'       => 'pgsql:host=localhost;dbname=testdb',
            'username'  => 'pguser',
            'password'  => 'pguser',
            'charset'   => 'utf8',
            'schemaMap' => [
                'pgsql' => [
                    'class'         => 'yii\db\pgsql\Schema',
                    'defaultSchema' => 'public' //specify your schema here
                ]
            ],// PostgreSQL
        ],
        'mailer' => [
            'useFileTransport' => true,
        ],
        'urlManager' => [
            'showScriptName' => true,
        ],
    ],
];
