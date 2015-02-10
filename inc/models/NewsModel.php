<?php


class NewsModel extends Model
{

    public static function getNewsList($pageNum)
    {
        $page = parent::checkPage($pageNum);
        $offset = ($page - 1) * LIMIT_PER_PAGE;
        $limit = LIMIT_PER_PAGE;
        $sql = "SELECT `id_post`,`id_user`,`date_time`,`prev_content` FROM `buh_posts`  ORDER BY
`date_time` DESC LIMIT $limit OFFSET $offset";
        $sth = DB::getInstance()->query($sql, PDO::FETCH_ASSOC);
        $news = $sth->fetchAll();
        return $news;
    }

    public static function getSelectedPost($postID)
    {
        $postID = parent::checkPage($postID);
        $sql = "SELECT * FROM `buh_posts` WHERE `id_post`=$postID";
        $sth = DB::getInstance()->query($sql, PDO::FETCH_ASSOC);
        $post = $sth->fetchAll();
        return $post;
    }


}