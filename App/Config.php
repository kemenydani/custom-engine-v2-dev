<?php

namespace App;

/**
 * Application configuration
 *
 * PHP version 7.0
 */
class Config{

	/**
	 * Application root
	 * @var string
	 */
	const __APP__ROOT__ = __DIR__;
	
    /**
     * Database host
     * @var string
     */
    const DB_HOST = 'localhost';

    /**
     * Database name
     * @var string
     */
    const DB_NAME = 'venko';

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
    const DB_PREFIX = 'xyz_';
    
    /**
     * Show or hide error messages on screen
     * @var boolean
     */
    const SHOW_ERRORS = true;
}
