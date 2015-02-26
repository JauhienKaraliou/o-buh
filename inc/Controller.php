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

    public function clearMessages()
    {
        SessionModel::clearMessages();
    }

    public function checkPage($page)
    {
        $page = ($page > 0)?$page:1;
        return $page;
    }
}