
<?php
/*

// Check if the user is authenticated before allowing access to certain routes
$authenticatedRoutes = [
    BASE_URL . '/admin',
    BASE_URL . '/admin/category',
    BASE_URL . '/admin/category/create',
    BASE_URL . '/admin/category/store',
    BASE_URL . '/admin/category/edit',
    BASE_URL . '/admin/category/update',
    BASE_URL . '/admin/category/delete',
    BASE_URL . '/admin/product',
    BASE_URL . '/admin/product/create',
    BASE_URL . '/admin/product/store',
    BASE_URL . '/admin/product/edit',
    BASE_URL . '/admin/product/update',
    BASE_URL . '/admin/product/delete',
    BASE_URL . '/admin/user',
    BASE_URL . '/admin/user/create',
    BASE_URL . '/admin/user/store',
    BASE_URL . '/admin/user/edit',
    BASE_URL . '/admin/user/update',
    BASE_URL . '/admin/user/delete',
    // Add more authenticated routes as needed
];

if (in_array($url, $authenticatedRoutes) && !isset($_SESSION['user_id'])) {
    // Redirect to the login page if the user is not authenticated
    header("Location: " . BASE_URL . 'login');
    exit();
}

switch ($url) {
    case BASE_URL:
        $controller = new HomeController();
        $controller->index();


        break;
    case BASE_URL . 'admin':
    case BASE_URL . 'admin/index.php':
        require('../app/views/admin/index.php');
        break;

    case BASE_URL . 'admin/category':
        $controller = new CategoryController();
        $controller->index();

        break;

    case BASE_URL . 'admin/category/create':
        $controller = new CategoryController();
        $controller->create();
        break;

    case BASE_URL . 'admin/category/store':
        $controller = new CategoryController();
        $controller->store();
        break;
    case BASE_URL . 'admin/category/edit':
        // Extract the category ID from the URL

        $categoryId = $_POST['id'];
        if ($categoryId) {

            $controller = new CategoryController();
            $controller->edit($categoryId);
        } else {
            // Handle missing category ID (optional)
            header("HTTP/1.0 400 Bad Request");
            echo "Category ID is missing.";
        }
        break;
    case BASE_URL . 'admin/category/delete':
        // Extract the category ID from the URL

        $categoryId = $_POST['id'];
        if ($categoryId) {

            $controller = new CategoryController();
            $controller->delete($categoryId);
        } else {
            // Handle missing category ID (optional)
            header("HTTP/1.0 400 Bad Request");
            echo "Category ID is missing.";
        }
        break;
    case BASE_URL . 'admin/category/update':

        $controller = new CategoryController();
        $controller->update($_POST['id']);
        break;
    case BASE_URL . 'admin/product':
        $controller = new ProductController();
        $controller->index();
        break;
    case BASE_URL . 'admin/product/create':
        $controller = new ProductController();
        $controller->create();
        break;

    case BASE_URL . 'admin/product/store':
        $controller = new ProductController();
        $controller->store();
        break;
    case BASE_URL . 'admin/product/edit':
        // Extract the product ID from the URL

        $productId = $_POST['id'];
        if ($productId) {

            $controller = new ProductController();
            $controller->edit($productId);
        } else {
            // Handle missing product ID (optional)
            header("HTTP/1.0 400 Bad Request");
            echo "product ID is missing.";
        }
        break;
    case BASE_URL . 'admin/product/update':

        $controller = new ProductController();
        $controller->update($_POST['id']);
        break;
    case BASE_URL . 'admin/product/delete':
        // Extract the product ID from the URL

        $productId = $_POST['id'];
        if ($productId) {

            $controller = new ProductController();
            $controller->delete($productId);
        } else {
            // Handle missing category ID (optional)
            header("HTTP/1.0 400 Bad Request");
            echo "Category ID is missing.";
        }
        break;
    case BASE_URL . 'admin/user':
        $controller = new UserController();
        $controller->index();
        break;
    case BASE_URL . 'admin/user/create':
        $controller = new UserController();
        $controller->create();
        break;
    case BASE_URL . 'admin/user/store':
        $controller = new UserController();
        $controller->store();
        break;
    case BASE_URL . 'admin/user/edit':
        // Extract the user ID from the URL

        $userId = $_POST['id'];
        if ($userId) {

            $controller = new UserController();
            $controller->edit($userId);
        } else {
            // Handle missing user ID (optional)
            header("HTTP/1.0 400 Bad Request");
            echo "user ID is missing.";
        }
        break;
    case BASE_URL . 'admin/user/update':

        $controller = new UserController();
        $controller->update($_POST['id']);
        break;
    case BASE_URL . 'admin/user/delete':
        // Extract the user ID from the URL

        $userId = $_POST['id'];
        if ($userId) {

            $controller = new UserController();
            $controller->delete($userId);
        } else {
            // Handle missing category ID (optional)
            header("HTTP/1.0 400 Bad Request");
            echo "Category ID is missing.";
        }
        break;
    case BASE_URL . 'login':
        // Display login form or handle login logic
        include('../app/views/admin/auth/login.php');
        break;

    case BASE_URL . 'register':
        // Display registration form or handle registration logic
        include('../app/views/admin/auth/register.php');
        break;

    case BASE_URL . 'logout':

        $controller = new AuthController('nul');
        $controller->logout();
        break;
 * 
 * 
 */
$routes = [
    '/' => 'HomeController@index',

    '/product/(\d+)' => 'ProductController@show',
    '/cart/add' => 'CartController@add',
    '/login' => 'AuthController@login',
    '/register' => 'AuthController@register',
    '/cart' => 'CartController@index',
    '/order/store' => 'CartController@proceedOrder',
    '/logout' => 'AuthController@logout',
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



    // Add more routes as needed
];

// Include the routes array in the Router class