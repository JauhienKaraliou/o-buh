<?php

class GuestbookModel extends Model
{

    /**
     * @todo  fix thees two methods
     * @return array
     */
    public static function getMessages()
    {
        $sth = DB::getInstance()->prepare('SELECT * FROM `buh_comments`');
        $sth->execute();
        $list = $sth->fetchAll();
        return $list;
    }

    /**
     * @todo  fix thees two methods
     * @return mixed
     */
    public static function countMessages()
    {
        $sth = DB::getInstance()->prepare('SELECT COUNT(*) AS num FROM `buh_comments`');
        $sth->execute();
        $quantity = $sth->fetch();
        return $quantity['num'];
    }

    /**
     * @todo  fix thees two methods
     * @return mixed
     */
    public function goToPage($num)
    {

    }

    public static function saveMessage()
    {
        $sth = DB::getInstance()->prepare('INSERT INTO `buh_comments`
(`author_name`, `author_email`, `text`, `is_deleted`) VALUES (:author, :email, :text, :del)');
        $authorName = htmlspecialchars($_POST['author_name']);
        $authorEmail = htmlspecialchars($_POST['author_email']);
        $text = htmlspecialchars($_POST['messagetext']);
        $isDeleted = 0;
        $execRes = $sth->execute(array('author' => $authorName, 'email' => $authorEmail, 'text' => $text, 'del' => $isDeleted));
        return $execRes;
    }

}