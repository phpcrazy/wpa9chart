<?php 

define("RD", __DIR__);
define("CONFIG_RD", __DIR__ . '/config/');

require_once RD . '/vendor/autoload.php';

$app = new App\Application;
require RD . '/src/routes.php';
$app->requestResolver();
$app->ContextMatcher();
$app->run();
unset($app);
 ?>