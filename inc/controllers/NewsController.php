<?php

class NewsController extends Controller
{
    /**
     * return the list of last n news
     * @param int $pageNum
     */
    public function defaultAction($pageNum = 1)
    {
        $this->pageAction((int) $pageNum);
    }

    /**
     * show pages with previous news in short variant
     */
    public function pageAction($pageNum=1)
    {
        $pageNum = $this->checkPage((int)$pageNum);
        $offset = ($pageNum - 1) * LIMIT_PER_PAGE;
        $limit = LIMIT_PER_PAGE;
        $this -> view -> newsList = NewsModel::getNewsList($limit,$offset);
        $this->view->pageQuant = ceil(NewsModel::countMessages()/LIMIT_PER_PAGE);
        $this->view->pageCur = $pageNum;
        $this->view->area = 'news';
        $this -> view -> render('news');
    }

    /**
     * shows selected post
     * @param $postID
     */
    public function postAction($postID=0)
    {
        if($postID==0) {
            $this->redirect(array('news','default'));
        } else {
            $this -> view -> post = NewsModel::getSelectedPost((int) $postID);
            $this -> view -> render('post');
        }
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
        if(isset($_POST['action']) and $_POST['action']=='publish') {
            $param['id_user'] = SessionModel::getCurrentUserID();
            $param['content'] = $_POST['area'];
            $param['prev_content'] = htmlspecialchars($_POST['post_preview']);
            $param['title'] = htmlspecialchars($_POST['post_title']);
            if(NewsModel::savePost($param)) {
                SessionModel::setSuccessfulMessage(array('Published successfully!'));
            } else {
                SessionModel::setWarningMessage(array('An error occurred while publishing'));
            }
        }
        $this->redirect(array('news'));
    }
}