<?php

class NewsModel extends Model
{
    public static function countMessages()
    {
        $sth = DB::getInstance()->prepare('SELECT COUNT(*) AS num FROM `buh_posts`');
        $sth->execute();
        return $sth->fetchColumn();
    }

    /**
     * @param $limit
     * @param $offset
     * @return array
     */
    public static function getNewsList($limit, $offset)
    {
        $sth = DB::getInstance()->prepare('SELECT `id_post`,`id_user`,`date_time`,`prev_content` FROM `buh_posts`
 ORDER BY `date_time` DESC LIMIT :limit OFFSET :offset');
        $sth->bindValue(':offset', $offset, PDO::PARAM_INT);
        $sth->bindValue(':limit', $limit, PDO::PARAM_INT);
        $sth->execute();
        return $sth->fetchAll();
    }

    /**
     * @todo return author of the post
     * returns selected post
     * @param $postID
     * @return array
     */
    public static function getSelectedPost($postID)
    {
        $sth = DB::getInstance()->prepare('SELECT * FROM `buh_posts` WHERE `id_post`=:id_post');
        $sth->bindValue(':id_post', $postID, PDO::PARAM_INT);
        $sth->execute();
        $post = $sth->fetch();
        return $post;
    }

    /**
     * @param array $param
     * @return bool
     */
    public static function savePost(array $param)
    {
        $sth = DB::getInstance()->prepare('INSERT INTO `buh_posts`(`id_user`,`content`,`prev_content`,`title`)
VALUES (:id_user, :content, :prev_content, :title)');
        return $sth->execute($param);
    }
}