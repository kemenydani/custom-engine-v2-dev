<?php

namespace Models;

class User extends \Core\Model  {
	
	protected $table = 'users';
	protected $primaryKey = 'user_id';
	protected $fillable = ['user_id', 'username', 'email_address'];
	
	public function __construct($attributes = []){
		parent::__construct($attributes);
		
	}

}