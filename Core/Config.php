<?php

namespace Core;

class Config {

	/**
	 * Application root
	 * @var string
	 */
	const __APP__ROOT__ = __DIR__;
	
	/**
	 * Database driver
	 * @var string
	 */
	const DB_DRIVER = 'mysql';
	
	/**
	 * Database charset
	 * @var string
	 */
	const DB_CHARSET = 'utf8';
	
	/**
	 * Database collation
	 * @var string
	 */
	const DB_COLLATION = 'utf8_unicode_ci';
	
	/**
	 * Database host
	 * @var string
	 */
	const DB_HOST = 'localhost';
	
	/**
	 * Database name
	 * @var string
	 */
	const DB_NAME = 'dev_engine_db';
	
	/**
	 * Database user
	 * @var string
	 */
	const DB_USER = 'root';
	
	/**
	 * Database password
	 * @var string
	 */
	const DB_PASSWORD = '';
	
	/**
	 * Database table prefix - security
	 * @var string
	 */
	const DB_PREFIX = 'wasd_';
	
	
	/**
	 * Show or hide error messages on screen
	 * @var boolean
	 */
	const SHOW_ERRORS = true;
	
	
}
