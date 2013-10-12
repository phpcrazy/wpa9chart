<?php 

require __DIR__ . "/vendor/autoload.php";

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

$capsule = new DB;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'wpa9chart',
    'username'  => 'root',
    'password'  => 'mmlinks',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
$capsule->setEventDispatcher(new Dispatcher(new Container));
$capsule->setAsGlobal();

$user = DB::table('user')->distinct()->get();
var_dump($user);





 ?>