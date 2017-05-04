<?php

namespace App\Controllers;

use \Core\Input as Input;
use \Core\Validator as Validator;
use \Models\User as User;

class UserController extends \Core\Controller{
	
	public function indexAction(){
	
	}
	
	public function adminIndexAction(){
	
	}
	
	public function registerAction(){
		
		$user = User::where("username", "snowy_work");
		
		var_dump($user->exists());
		
		/*
		$post_data = [
			'username' => 'snowy',
			'password' => 'kacsa',
			'email' => 'asd@asd.com'
		];
		
		//Check if the form was posted
		if(Input::post()){
			Validator::validateLength(Input::field("username"), 5, 30);
			Validator::validateLength(Input::field("email"), 5);
			
			if(Validator::passed()){
				$User = new \Models\User();
				$User->setEmail(Input::value("email"));
				$User->setUsername(Input::value("username"));
			}
		}
		
		if(\Models\User::owned("username", $post_data['username'])){
		
		}
	*/
		
	}
	
}