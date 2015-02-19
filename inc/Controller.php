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
        header("Location: " .BASE_URL.'/'.$address);
    }
}