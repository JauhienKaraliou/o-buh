<?php


class NewsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * return the list of last n news
     */
    public function defaultAction($pageNum = 1)
    {
        require_once 'inc/models/NewsModel.php';
        $this -> view -> newsList = NewsModel::getNewsList((int)$pageNum);
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
     * show the full variant of a definite news
     * @param $newsID
     */
    public function readAction($newsID)
    {

    }




    /**
     * create news
     */
    public function createAction()
    {

    }

    /**
     * remove news
     */
    public function removeAction()
    {

    }

    /**
     * move news to archive
     */
    public function moveAction()
    {

    }

}