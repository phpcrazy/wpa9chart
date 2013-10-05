<?php 

define("RD", __DIR__);
define("CONFIG_RD", __DIR__ . '/config/');

require_once __DIR__ . "/vendor/autoload.php";

$app = new Silex\Application();
$app['debug'] = true;
$app['VERSION'] = '1.0';

require_once __DIR__ . '/src/routes.php';

$app->run();

 ?>