<?php

$commonLocal = __DIR__ . '/../../../config/common.local.php';
$webLocal = __DIR__ . '/../../../config/web.local.php';

/**
 * Application configuration for unit tests
 */
return yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../../../config/common.php'),
    file_exists($commonLocal) ? require($commonLocal) : [],
    require(__DIR__ . '/../../../config/web.php'),
    file_exists($webLocal) ? require($webLocal) : [],
    require(__DIR__ . '/config.php')
);
