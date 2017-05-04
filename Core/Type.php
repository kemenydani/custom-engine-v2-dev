<?php

namespace Core;

class Type{
	
	public static function email($string){
		if(filter_var($string, FILTER_VALIDATE_EMAIL)){
			return true;
		};
		return false;
	}
	
	public static function numeric($data){
		if(is_numeric($data)){
			return true;
		};
		return false;
	}
	
	public static function arr($data){
		if(is_array($data)){
			return true;
		};
		return false;
	}
	
	public static function string($data){
		if(is_string($data)){
			return true;
		};
		return false;
	}
	
	public static function json($string){
		json_decode($string);
		return (json_last_error() == JSON_ERROR_NONE) ? true : false;
	}
	
}