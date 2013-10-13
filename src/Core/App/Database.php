<?php 
namespace App;

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class Database {
	protected static $capsule = null;
	public static function initialize($db_setting)
	{
		static::$capsule = new DB;
		static::$capsule->addConnection($db_setting);
		static::$capsule->setEventDispatcher(new Dispatcher(new Container));
		static::$capsule->setAsGlobal();
		static::$capsule->bootEloquent();
	}

}

 ?>