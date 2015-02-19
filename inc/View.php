<?php


class View
{
    public $page = 1;

    /**
     * @todo function for $captchaQuest
     * @todo $pageCur, $area
     * @param $tplName
     */
    public function render($tplName)
    {
        $userStatus = SessionModel::getCurrentUserStatus();
        $captchaQuest = '2+2';
        $area = '';
        $pageCur = 1;
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