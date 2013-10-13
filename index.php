<?php 

define("RD", __DIR__);
define("CONFIG_RD", __DIR__ . '/config/');

require_once __DIR__ . "/vendor/autoload.php";

/*
Database Layer
*/
use App\Database;
$db_setting = Config::database('db');
Database::initialize($db_setting);

/* 
Application Layer
*/
$app = new Silex\Application();
$app['debug'] = true;
$app['VERSION'] = '1.0';

require_once __DIR__ . '/src/routes.php';

$app->run();

 ?>