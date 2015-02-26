<?php

class View
{
    public $page = 1;

    /**
     * @param $tplName
     */
    public function render($tplName)
    {
        $userStatus = SessionModel::getCurrentUserStatus();
        include 'inc/views/pages/' . $tplName . '.php';
    }

    /**
     * @param $label
     * @return mixed
     */
    public static function lang($label)
    {
        return $label;
    }

    /**
     * @param array $params
     * @return string
     */
    public static function generateLink(array $params)
    {
        $address = implode('/', $params);
        return BASE_URL . "/$address";
    }
}