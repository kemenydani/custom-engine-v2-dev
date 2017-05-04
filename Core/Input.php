<?php

namespace Core;

class Input{
	
	public static function post(){
		return (!empty($_POST)) ? true : false;
	}
	
	public static function get(){
		return (!empty($_GET)) ? true : false;
	}
	
	public static function value($key){
		if(isset($_POST[$key])){
			return self::sanitizePost()[$key];
		} else if($_GET[$key]) {
			return self::sanitizeGet()[$key];
		}
		return '';
	}
	
	public static function field($key){
		if(isset($_POST[$key])){
			return [$key => self::sanitizePost()[$key]];
		} else if($_GET[$key]) {
			return [$key => self::sanitizeGet()[$key]];
		}
		return [];
	}
	
	private static function sanitizePost(){
		return filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
	}
	
	private static function sanitizeGet(){
		return filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
	}
	
}