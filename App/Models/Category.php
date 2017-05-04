<?php

namespace Models;

class Category extends \Core\Model {
	
	protected $table = 'categories';
	protected $primaryKey = 'category_id';
	protected $fillable = ['category_id', 'name', 'short_name'];
	
	public function __construct(array $attributes = []){
		parent::__construct($attributes);
	}
	
}