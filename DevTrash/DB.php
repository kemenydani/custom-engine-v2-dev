<?php

namespace Core;

use \Core\Config as Config;

class DB {

	const __OPERATORS__ = ['=', '>', '<', '>=', '<='];
	
    private static $_instance = null;
    private $_pdo,
		    $_query,
		    $_error = false,
		    $_results,
		    $_count = 0;
    
    public function __construct() {
		try {
		    $this->_pdo = new \PDO("mysql:host=" . Config::DB_HOST . ";dbname=" . Config::DB_NAME, Config::DB_USER, Config::DB_PASSWORD);
		} catch(PDOException $e) {
		    die($e->getMessage());
		}
    }

    public static function invoke(){
		if(!isset(self::$_instance)){
		    self::$_instance = new DB();
		}
		return self::$_instance;
    }
    
    public function query($sql, $params = []){
        $this->_error = false;
        if($this->_query = $this->_pdo->prepare($sql)){
        	if(count($params)){
		        foreach($params as $index => $param){
		        	// $index + 1 -> PDO stuff, first bind value must be 1
					$this->_query->bindValue($index+1, $param);
		        }
	        }
	        
	        if($this->_query->execute()){
        		$this->_results = $this->_query->fetchAll(\PDO::FETCH_OBJ);
        		$this->_count = $this->_query->rowCount();
	        } else {
	            $this->_error = true;
	        }
        }
        
        return $this;
    }
    
    public function action($action, $table, $where = [], $limit = [], $order = []){
	
        $table = \Core\Config::DB_PREFIX . $table;
        $sql = "{$action} FROM {$table} ";
		$binding_array = [];
	    
	    if(!empty($where)){

		    $sql .= "WHERE ";
		    
		    foreach($where as $condition){
			    $field = $condition[0];
			    $operator = $condition[1];
			    $binding_array[] = $condition[2];
			
			    if(in_array($operator, self::__OPERATORS__)) {
				    $sql .= "{$field} {$operator} ? AND ";
			    }
		    }
		    
		    $sql = substr($sql, 0, -4);
	    }

	    if(!empty($limit)){
	        $limit = implode(", ", $limit);
			$sql .= "LIMIT {$limit}";
	    }
	
	    if(!empty($order)){
		    $order = "";
		    $sql .= "ORDER BY {$order}";
	    }

        if(!$this->query($sql, $binding_array)->hasError()){
            return $this;
	    }
        return false;
    }
    
    public function get($table, $where = [], $limit = [], $order = []){
        return $this->action("SELECT *", $table, $where, $limit, $order);
    }
	
	public function getOne($table, $where){
		return $this->action("SELECT *", $table, $where);
	}
    
    public function getFirst($table, $where){
	    return $this->action("SELECT *", $table, $where, $limit = [1]);
    }
    
    public function delete($table, $where){
	    return $this->action("DELETE", $table, $where);
    }
    
    public function insert($table, $fields = []){
    	if(count($fields)){
    		$keys = array_keys($fields);
		
		    $values = substr(str_repeat("?, ",count($fields)),0, -2);
		
		    $table = \Core\Config::DB_PREFIX . $table;
		    
    		$sql = "INSERT INTO {$table} (`" . impode('`, `', $keys) . "`) VALUES ({$values})";
    		
    		if(!$this->query($sql, $fields)->hasError()){
    		    return true;
		    }
	    }
	    return false;
    }
    
    public function update($table, $where, $fields){
	    if(count($where) === 3) {

		    $field = $where[0];
		    $operator = $where[1];
		    $value = $where[2];
		
		    if(in_array($operator, self::__OPERATORS__)) {
			    $set = "";
			
			    foreach ($fields as $name => $value) {
				    $set .= "{$name} = ?, ";
			    }
			
			    $set = substr($set, 0, -2);
			
			    $table = \Core\Config::DB_PREFIX . $table;
			    
			    $sql = "UPDATE {$table} SET {$set} WHERE {$field} {$operator} {$value}";
			    
			    if(!$this->query($sql, $fields)->hasError()){
			        return true;
			    }
		    }
	    }
	    return false;
    }
    
    public function hasError(){
    	return $this->_error;
    }

    public function results(){
		return $this->_results;
    }
    
    public function first(){
		return $this->results()[0];
    }
    
    public function last(){
		return end(array_values($this->results()));
    }
    
    public function count(){
		return $this->_count;
    }
  
}