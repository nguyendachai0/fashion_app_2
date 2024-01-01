
<?php

/***
 * routes to get access to controller and function 
 */

require_once '../app/models/AuthModel.php';
require_once '../app/models/Model.php';
require_once '../app/controllers/AuthController.php';
$db  = new Model();
$auth = new AuthModel($db);
$curr_user =  $auth->getCurrentUserId();
echo '<pre>';
var_dump($curr_user);
echo '</pre>';
// die();
// $authCon = new AuthController();
// $authCon->checkAdminAccess();
$routes = [
    '/' => 'HomeController@index',
    '/login' => 'AuthController@login',
    '/register' => 'AuthController@register',
    '/logout' => 'AuthController@logout',
    '/about-us' => 'HomeController@aboutUs',
    '/shop' => 'HomeController@shop',
    '/blog' => 'HomeController@blog',
    '/contact' => 'HomeController@contact',

    '/access-denied' => 'AuthController@access_denied',

    '/product/(\d+)' => 'ProductController@show',
    '/cart/add' => 'CartController@add',
    '/cart/update' => 'CartController@update',
    '/cart/delete' => 'CartController@delete',
    '/cart/clear' => 'CartController@deleteAll',
    '/cart' => 'CartController@index',
    '/order/store' => 'CartController@proceedOrder',
    '/myorder' => 'OrderController@myOrder',

    '/admin' => 'AdminController@index',

    //Category in Admin
    '/admin/category' => 'CategoryController@index',
    '/admin/category/create' => 'CategoryController@create',
    '/admin/category/store' => 'CategoryController@store',
    '/admin/category/delete' => 'CategoryController@delete',
    '/admin/category/edit/(\d+)' => 'CategoryController@edit',
    '/admin/category/update' => 'CategoryController@update',

    // Product in Admin
    '/admin/product' => 'ProductController@index',
    '/admin/product/create' => 'ProductController@create',
    '/admin/product/store' => 'ProductController@store',
    '/admin/product/delete' => 'ProductController@delete',
    '/admin/product/edit/(\d+)' => 'ProductController@edit',
    '/admin/product/update' => 'ProductController@update',

    // User in Admin
    '/admin/user' => 'UserController@index',
    '/admin/user/create' => 'UserController@create',
    '/admin/user/store' => 'UserController@store',
    '/admin/user/delete' => 'UserController@delete',
    '/admin/user/edit/(\d+)' => 'UserController@edit',
    '/admin/user/update' => 'UserController@update',

    // Order in Admin
    '/admin/order' => 'OrderController@index',
    '/admin/order/create' => 'OrderController@create',
    '/admin/order/store' => 'OrderController@store',
    '/admin/order/delete' => 'OrderController@delete',
    '/admin/order/edit/(\d+)' => 'OrderController@edit',
    '/admin/order/update' => 'OrderController@update',
    '/admin/order/update/status' => 'OrderController@updateStatus',



    // Add more routes as needed
];
