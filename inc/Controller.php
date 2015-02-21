<?php


class Controller
{
    protected $view;

    protected function __construct()
    {
        SessionModel::start();
        $this->view = new View();
    }

    protected function redirect(array $params)
    {
        $address = implode('/', $params);
        header("Location: " .BASE_URL.'/'.$address);
    }

    protected function __destruct()
    {
        SessionModel::clearMessages();
    }
}