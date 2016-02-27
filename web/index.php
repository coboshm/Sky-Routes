<?php

$filename = __DIR__.preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
if (php_sapi_name() === 'cli-server' && is_file($filename)) {
    return false;
}

error_reporting(E_ALL);

require_once __DIR__.'/../vendor/autoload.php';

$app = require __DIR__.'/../src/SkyRoutes/app.php';
require __DIR__ . '/../config/development.php';
$app->run();
