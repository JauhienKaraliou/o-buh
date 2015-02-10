<?php


class RegistrationController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function defaultAction($contID=1)
    {
        require_once 'inc/models/RegistrationModel.php';
        $this->view->clubs = RegistrationModel::getClubs();
        $this->view->etapsNum = RegistrationModel::getEtapNum($contID);
        $this->view->render('registration');
    }

    public function submitAction()
    {

    }

    public function listAction()
    {

    }

}