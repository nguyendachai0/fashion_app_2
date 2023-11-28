<?php







// router.php

require_once '../config/config.php';
require_once '../router/Router.php';
require_once '../config/routes.php';
// Autoloading

session_start();



// Get the URL
$url = $_SERVER['REQUEST_URI'];

spl_autoload_register(function ($className) {

    require_once 'app/controllers/' . $className . '.php';
});


// Instantiate the Router and handle the request
$router = new Router($url, $routes);
$router->handle();
