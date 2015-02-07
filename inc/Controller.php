<?php


class Controller
{
    protected $view;

    protected function __construct()
    {
        $this->view = new View();
    }

    protected function redirect(array $params)
    {
        $address = implode('/', $params);
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        header("Location: http://$host$uri/$address");
    }
}