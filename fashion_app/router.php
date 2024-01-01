<?php


// router.php
session_start();

require_once '../config/config.php';
require_once '../router/Router.php';
require_once '../config/routes.php';
require_once '../app/models/AuthModel.php';
require_once '../app/models/Model.php';


// Autoloading

// Get the URL
$url = $_SERVER['REQUEST_URI'];

spl_autoload_register(function ($className) {

    require_once 'app/controllers/' . $className . '.php';
});
echo '<pre>';
var_dump($url);
echo '</pre>';
$db = new Model();
$auth = new AuthModel($db);
// Instantiate the Router and handle the request
$router = new Router($url, $routes, $auth);
$router->handle();
