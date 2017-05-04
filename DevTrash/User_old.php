<?php

namespace App\Models;

use \Core\DB as DB;
use \Core\Validator as Validator;


class UserOld extends \Core\Model {
	
	/**
	 * Th
	 * @const _TABLE_
	 */
	const _TABLE_ = "users";

	/**
	 * Parameters which are unique for this type of model ( type => parameter_name )
	 * @const _UNIQUES_
	 */
	protected static $_UNIQUES = [
		"numeric"  => "user_id",
		"string"   => "username",
		"email"    => "email"
	];
	
	public $user_id = 0;
	public $username = "";
	public $email = "";
	public $password = "";
	public $firstname = "";
	public $lastname = "";
	
	public function __construct($input = null){
		if(is_object($input) || is_array($input)){
			$details = $input;
		} else {
			$details = self::find($input);
		}
		$this->fill($details);

		
	}

    /* GETTERS AND SETTERS */

	/**
	 * @return int
	 */
	public function getUserId(){
		return $this->user_id;
	}
	
	/**
	 * @param int $user_id
	 */
	public function setUserId(int $user_id){
		$this->user_id = $user_id;
	}
	
	/**
	 * @return string
	 */
	public function getUsername(){
		return $this->username;
	}
	
	/**
	 * @param string $username
	 */
	public function setUsername(string $username)
	{
		$this->username = $username;
	}
	
	/**
	 * @return string
	 */
	public function getEmail(){
		return $this->email;
	}
	
	/**
	 * @param string $email
	 */
	public function setEmail(string $email){
		$this->email = $email;
	}
	
}
