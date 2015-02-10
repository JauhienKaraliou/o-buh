<?php


class GuestbookController extends Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function defaultAction()
    {
        require 'inc/models/GuestbookModel.php';
        $this -> view -> comments = GuestbookModel::getMessages();
        $this -> view -> pagesNum = GuestbookModel::countMessages();
        $this -> view -> render('guestbook');
        $_SESSION['resultMsg'] = '';

    }

}