<?php


class Controller
{
    protected $view;

    protected function __construct()
    {
        $this->view = new View();
    }
}