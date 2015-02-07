<?php


class Router
{

    public function __construct()
    {
        session_start();

        $url = (isset($_GET['url'])) ? trim($_GET['url']) : DEFAULT_CONTROLLER;
        $url = rtrim($url, '/');
        $urlParam = explode('/', $url);
        $controllerName = ucwords($urlParam[0]) . 'Controller';
        $controllerPath = __DIR__ . '/controllers/' . $controllerName . '.php';
        $actionParams = array_slice($urlParam, 2);

        if (file_exists($controllerPath)) {
            require $controllerPath;
        } else {
            throw new Exception ('Controller not found');
        }

        $controller = new $controllerName;
        $actionName = (isset($urlParam[1])) ? $urlParam[1] : DEFAULT_ACTION;
        $actionName .= 'Action';

        if (method_exists($controller, $actionName)) {
            call_user_func_array(array($controller, $actionName), $actionParams);
        } else {
            throw new Exception ('Method not exists');
        }

    }


}