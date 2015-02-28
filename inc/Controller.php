<?php

class Controller
{
    /**
     * @var View
     */
    protected $view;

    /**
     *
     */
    public function __construct()
    {
        SessionModel::start();
        $this->view = new View();
    }

    /**
     * @param array $params
     */
    protected function redirect(array $params)
    {
        $address = implode('/', $params);
        header("Location: " .BASE_URL.'/'.$address);
    }

    /**
     *
     */
    public function clearMessages()
    {
        SessionModel::clearMessages();
    }

    /**
     * @param $page
     * @return int
     */
    public function checkPage($page)
    {
        $page = ($page > 0)?$page:1;
        return $page;
    }
}