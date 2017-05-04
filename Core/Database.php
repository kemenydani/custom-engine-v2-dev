<?php

namespace Core;

use Core\Config as Config;

class Database extends \Illuminate\Database\Capsule\Manager {
	
	private static $_instance = null;
	
	public function __construct($container = null){
		parent::__construct($container);
		
		$this->addConnection([
			'driver'    => Config::DB_DRIVER,
			'host'      => Config::DB_HOST,
			'database'  => Config::DB_NAME,
			'username'  => Config::DB_USER,
			'password'  => Config::DB_PASSWORD,
			'charset'   => Config::DB_CHARSET,
			'collation' => Config::DB_COLLATION,
			'prefix'    => Config::DB_PREFIX,
		]);
	}
	
	public static function instance(){
		if(!isset(self::$_instance)){
			self::$_instance = new Database();
		}
		return self::$_instance;
	}
	
	public static function invoke(){
		return self::instance()->connection();
	}

}