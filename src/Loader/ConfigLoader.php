<?php 

class Config {
	public static function __callStatic($name, $argument) {
		return static::configCheck($name, $argument);	
	}

	public function __call($name, $argument) {
		return $this->configCheck($name, $argument);
	}

	protected static function configCheck($name, $argument) {
		$file = CONFIG_RD . $name . '.php';
		$config_values = require $file;

		if(file_exists($file)) {
			return $key = arrayResolver($argument, $config_values);				
		} else {
			trigger_error("Config file doesn't exist!", E_USER_ERROR);
		}
	}
}

 ?>