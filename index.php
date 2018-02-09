<?php
// Require composer autoloader
require __DIR__ . '/vendor/autoload.php';
session_start();
// Create Router instance
$router = new \Bramus\Router\Router();

// Define routes
$router->setNamespace('\App\Controllers');

$router->get('/', 'PageController@index');

// Run it!
$router->run();