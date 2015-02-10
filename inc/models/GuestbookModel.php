<?php


class GuestbookModel extends Model {

    public static function getMessages()
    {
        $sth = DB::getInstance() -> prepare('SELECT * FROM `st1_comments`');
        $sth -> execute();
        $list = $sth -> fetchAll();
        return $list;
    }

    public static function countMessages()
    {
        $sth = DB::getInstance() -> prepare('SELECT COUNT(*) AS num FROM `st1_comments`');
        $sth -> execute();
        $quantity = $sth -> fetch();
        return $quantity['num'];
    }

    public function goToPage($num)
    {

    }

}