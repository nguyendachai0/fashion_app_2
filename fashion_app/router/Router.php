
<?php
class Router
{
    private $url;
    private $routes;
    private $authModel;
    public function __construct($url, $routes, $authModel)
    {
        $this->url = rtrim($url, '/');
        $this->url = ($this->url == '') ? '/' : $this->url;

        $this->routes = $routes;
        $this->authModel = $authModel;
    }


    public function handle()
    {
        $found = false;

        foreach ($this->routes as $route => $controllerMethod) {
            $pattern = $this->getRoutePattern($route);

            if (preg_match($pattern, $this->url, $matches)) {
                // Remove the full match
                array_shift($matches);

                $this->callControllerMethod($controllerMethod, $matches);
                $found = true;
                break;
            }
        }

        if (!$found) {
            $this->notFound();
        }
    }
    private function getRoutePattern($route)
    {
        // Convert the route to a regular expression pattern
        $pattern = preg_replace('/\//', '\\/', $route);
        $pattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '([a-zA-Z0-9_]+)', $pattern);
        $pattern = '/^' . $pattern . '$/';

        return $pattern;
    }
    private function callControllerMethod($controllerMethod, $parameters = [])
    {
        list($controllerName, $methodName) = explode('@', $controllerMethod);

        // Check if login is required for this route
        $loginRequired = ($this->isLoginRequired($controllerName, $methodName));
        $curr_user = $this->authModel->getCurrentUserId();

        // If login is required and the user is not logged in, redirect to login
        if ($loginRequired && !$this->authModel->isAdmin($curr_user)) {
            header("Location: /access-denied");
            exit();
        } else {
            $controller = new $controllerName();
            if (method_exists($controller, $methodName)) {
                // Call the method with parameters if any
                call_user_func_array([$controller, $methodName], $parameters);
            } else {
                // Handle the case where the method doesn't exist
                $this->notFound();
            }
        }
    }
    private function isLoginRequired($controllerName, $actionName)
    {
        // Define the list of controllers and actions that require login
        $loginRequiredRoutes = [
            'AdminController' => ['index'],
            'CategoryController' => ['index', 'create', 'store', 'delete', 'edit', 'update'],
            'ProductController' => ['index', 'create', 'store', 'delete', 'edit', 'update'],
            'UserController' => ['index', 'create', 'store', 'delete', 'edit', 'update'],
            // Add more controllers and actions as needed
        ];

        return isset($loginRequiredRoutes[$controllerName]) && in_array($actionName, $loginRequiredRoutes[$controllerName]);
    }


    private function notFound()
    {
        // header("Location: /access-denied");
        // require '../app/views/errors.php';
        exit();
    }
}
