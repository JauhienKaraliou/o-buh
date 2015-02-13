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
        $stylesheetLink = self::generateLink(array('css', 'bootstrap.css'));
        $jsLink = self::generateLink(array('js', 'bootstrap.js'));
        $tinymceLink = self::generateLink(array('js', 'tinymce', 'tinymce.min.js'));
        $newsLink = self::generateLink(array('news'));
        $guestbookLink = self::generateLink(array('guestbook'));
        $registerLink = self::generateLink(array('registration'));
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