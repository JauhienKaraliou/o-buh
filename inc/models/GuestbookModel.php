<?php

class GuestbookModel extends Model
{
    /**
     * @param $limit
     * @param $offset
     * @return array
     */
    public static function getMessages($limit,$offset)
    {
        $sth = DB::getInstance()->prepare('SELECT * FROM `buh_comments` ORDER BY `date_time` DESC
LIMIT :limit OFFSET :offset');
        $sth->bindValue(':offset', $offset, PDO::PARAM_INT);
        $sth->bindValue(':limit', $limit, PDO::PARAM_INT);
        $sth->execute();
        return $sth->fetchAll();
    }

    /**
     * counts number of messages in guestbook
     * @return string
     */
    public static function countMessages()
    {
        $sth = DB::getInstance()->prepare('SELECT COUNT(*) AS num FROM `buh_comments`');
        $sth->execute();
        return $sth->fetchColumn();
    }

    /**
     * @param $param
     * @return bool
     */
    public static function saveMessage($param)
    {
        $sth = DB::getInstance()->prepare('INSERT INTO `buh_comments`
(`author_name`, `author_email`, `text`, `is_deleted`) VALUES (:author, :email, :text, :del)');
        return $sth->execute($param);
    }
}