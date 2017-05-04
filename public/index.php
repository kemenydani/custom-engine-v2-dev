<?php

/**
 * Composer psr4
 */
require dirname(__DIR__) . '/vendor/autoload.php';

/**
 * Error handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

/**
 * Routing
 */
$router = new Core\Router();

// Add the routes
$router->add('', ['controller' => 'HomeController', 'action' => 'index']);
$router->add('home/', ['controller' => 'HomeController', 'action' => 'index']);

$router->add('user/register/', ['controller' => 'UserController', 'action' => 'register']);

$router->dispatch($_SERVER['QUERY_STRING']);