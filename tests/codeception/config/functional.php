<?php
$_SERVER['SCRIPT_FILENAME'] = YII_TEST_ENTRY_FILE;
$_SERVER['SCRIPT_NAME'] = YII_TEST_ENTRY_URL;

$commonLocal = __DIR__ . '/../../../config/common.local.php';
$webLocal = __DIR__ . '/../../../config/web.local.php';

/**
 * Application configuration for functional tests
 */
return yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../../../config/common.php'),
    file_exists($commonLocal) ? require($commonLocal) : [],
    require(__DIR__ . '/../../../config/web.php'),
    file_exists($webLocal) ? require($webLocal) : [],
    require(__DIR__ . '/config.php'),
    [
        'components' => [
            'request' => [
                // it's not recommended to run functional tests with CSRF validation enabled
                'enableCsrfValidation' => false,
                // but if you absolutely need it set cookie domain to localhost
                /*
                'csrfCookie' => [
                    'domain' => 'localhost',
                ],
                */
            ],
        ],
    ]
);
