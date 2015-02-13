<?php


class NewsModel extends Model
{
    /**
     * Метод для спора с Василием Сергеевичем о ток как работает PDO
     * @param $pageNum
     * @return array
     */
    public static function getNewsListPrepared($pageNum)
    {
        $page = parent::checkPage($pageNum);
        $offset = ($page - 1) * LIMIT_PER_PAGE;
        $limit = LIMIT_PER_PAGE;
        $sth = DB::getInstance()->prepare('SELECT `id_post`,`id_user`,`date_time`,`prev_content` FROM `buh_posts`  ORDER BY
`date_time` DESC LIMIT :limit OFFSET :offset');
        $sth->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $sth->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $sth->execute();
        $news = $sth->fetchAll();
        return $news;
    }

    /**
     * returns selected post
     * @param $postID
     * @return array
     */
    public static function getSelectedPost($postID)
    {
        $sth = DB::getInstance()->prepare('SELECT * FROM `buh_posts` WHERE `id_post`=:id_post');
        $sth->bindValue(':id_post', (int)$postID, PDO::PARAM_INT);
        $sth->execute();
        $post = $sth->fetchAll();
        return $post;
    }

    /**
     * @todo selecting authorized moderator
     */
    public static function savePost()
    {
        $userID = 1;
        $content = $_POST['area'];
        $postPrev = htmlspecialchars($_POST['post_preview']);
        $title = htmlspecialchars($_POST['post_title']);
        $sth = DB::getInstance()->prepare('INSERT INTO `buh_posts`(`id_user`,`content`,`prev_content`,`title`)
VALUES (:id_user, :content, :prev_content, :title)');
        return $sth->execute(array('id_user'=>$userID, 'content'=>$content, 'prev_content'=>$postPrev,
        'title'=>$title));

    }


}