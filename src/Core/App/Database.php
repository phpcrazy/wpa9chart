<?php 
namespace App;

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class Database {
	protected static $capsule = null;
	public static function initialize()
	{
		static::$capsule = new DB;
		static::$capsule->addConnection([
			'driver'    => 'mysql',
			'host'      => 'localhost',
			'database'  => 'wpa9chart',
			'username'  => 'root',
			'password'  => 'mmlinks',
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => '',
			]);
		static::$capsule->setEventDispatcher(new Dispatcher(new Container));
		static::$capsule->setAsGlobal();
		static::$capsule->bootEloquent();
	}

}

 ?>