<?php

namespace Core;

class Validator{
	
	public static $_error_messages = [];
	
	
	
	public static function validateLength($input_field, $min = 0, $max = 250){
		if(strlen($input_field[key($input_field)]) < $min){
			self::addError($input_field[key($input_field)], "The value is too short!");
			return false;
		} else if(strlen($input_field[key($input_field)]) > $max) {
			self::addError($input_field[key($input_field)], "The value is too long!");
			return false;
		}
		return true;
	}
	
	public static function addError($key, $message){
		self::$_error_messages[$key][] = $message;
	}
	
	public static function passed(){
		return count(self::$_error_messages) ? true : false;
	}
}