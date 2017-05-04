<?php

namespace Core;

use \Illuminate\Database\Eloquent\Model as Eloquent;
use \Core\Database as DBO;

class Model extends Eloquent {
	
	public function __construct(array $attributes = []){
		parent::__construct($attributes);
		
		DBO::instance()->bootEloquent();
	}
	
}