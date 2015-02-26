<?php

class GuestbookController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param int $pageNum
     */
    public function defaultAction($pageNum = 1)
    {
        $this->pageAction((int)$pageNum);
    }

    /**
     * @param int $pageNum
     */
    public function pageAction($pageNum = 1)
    {
        $pageNum = $this->checkPage((int)$pageNum);
        $offset = ($pageNum - 1) * LIMIT_PER_PAGE;
        $limit = LIMIT_PER_PAGE;
        $this->view->comments = GuestbookModel::getMessages($limit, $offset);
        $this->view->pageQuant = ceil(GuestbookModel::countMessages() / LIMIT_PER_PAGE);
        $this->view->pageCur = $pageNum;
        $this->view->area = 'guestbook';
        $this->view->captcha = Captcha::generateCaptcha();
        $this->view->render('guestbook');
        $this->clearMessages();
    }

    /**
     * Saves message in guestbook
     */
    public function saveMessageAction()
    {
        if (isset($_POST['action']) and $_POST['action'] = 'post') {
            if ($_POST['captcha'] == SessionModel::getCaptchaAnswer()) {
                $param['author'] = htmlspecialchars($_POST['author_name']);
                $param['email'] = htmlspecialchars($_POST['author_email']);
                $param['text'] = htmlspecialchars($_POST['messagetext']);
                $param['del'] = 0;
                if (GuestbookModel::saveMessage($param)) {
                    SessionModel::setSuccessfulMessage(array('Comment added'));
                } else {
                    SessionModel::setWarningMessage(array('Comment not added'));
                }
            } else {
                SessionModel::setWarningMessage(array('Wrong captcha answer!'));
            }
        }
        $this->redirect(array('guestbook'));
    }
}