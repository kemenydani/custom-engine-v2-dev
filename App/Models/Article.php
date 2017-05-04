<?php

namespace Models;

class Article extends \Core\Model {
	
	protected $table = 'articles';
	protected $primaryKey = 'article_id';
	protected $fillable = ['article_id', 'title', 'category_id', 'author_user_id'];
	
	public function __construct(array $attributes = []){
		parent::__construct($attributes);
	}
	
}