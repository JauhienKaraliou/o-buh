<?php


class NewsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function __destruct()
    {
        parent::__destruct();
    }

    /**
     * return the list of last n news
     * @param int $pageNum
     */
    public function defaultAction($pageNum = 1)
    {
        $this -> view -> newsList = NewsModel::getNewsListPrepared((int)$pageNum);
        $this -> view -> render('news');
    }

    /**
     * show pages with previous news in short variant
     */
    public function pageAction($pageNum=1)
    {
        self::defaultAction((int) $pageNum);
    }

    /**
     * shows selected post
     * @param $postID
     */
    public function postAction($postID=0)
    {
        if($postID==0) {
            self::defaultAction();
        } else {
            require_once 'inc/models/NewsModel.php';
            $this -> view -> post = NewsModel::getSelectedPost((int) $postID);
            $this -> view -> render('post');
        }

    }

    /**
     * @todo fulfil this method
     * show the full variant of definite post
     * @param $postID
     */
    public function readAction($postID)
    {

    }

    /**
     * @todo do editing news
     *
     * provide possibility to edit posts
     * @param $newsID
     */
    public function editAction($newsID)
    {

    }


    /**
     * moves to form for creating news
     */
    public function createAction()
    {
        $this->view->render('createNews');
    }

    /**
     * publish news
     */
    public function publishAction()
    {
        NewsModel::savePost();
        parent::redirect(array('news'));
    }

    /**
     * remove news
     */
    public function removeAction()
    {

    }
}