<?php

namespace App\Controllers;

use \Models\User as User;
use \Core\View as View;

class HomeController extends \Core\Controller{

    public function indexAction(){
		
		var_dump("HomeController index");
		
		$user = User::find(1);
	
	    $user->username = 'snowy_work';
	    $user->save();

	    View::renderTemplate('Home/index');
    }
    
}
