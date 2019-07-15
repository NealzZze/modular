<?php

define('YII_DEBUG', true);
define('YII_ENV', 'dev');

require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';
require __DIR__ . '/../vendor/autoload.php';

$config = require __DIR__ . '/../config/web.php';
$yii = new yii\web\Application($config);
$yii->run();
