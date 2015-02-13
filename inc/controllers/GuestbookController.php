<?php


class GuestbookController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function defaultAction()
    {
        $this->view->comments = GuestbookModel::getMessages();
        $this->view->pagesNum = GuestbookModel::countMessages();
        $this->view->render('guestbook');
        $_SESSION['resultMsg'] = '';
    }

    public function saveMessageAction()
    {
        if (isset($_POST['action'])) {
            GuestbookModel::saveMessage();
        }
        self::defaultAction();
    }

}