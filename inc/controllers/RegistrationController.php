<?php


class RegistrationController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function defaultAction($contID = 1)
    {
        //$resentCompetition = RegistrationModel::  @todo select the most resent competiton and if incoming param is emty
        //$todo open registration page for it
        $this->view->clubs = RegistrationModel::getClubs();
        $this->view->etapsNum = RegistrationModel::getEtapNum($contID);
        $this->view->classes = RegistrationModel::getClasses($contID);
        $this->view->quals = RegistrationModel::getQualifications();
        $this->view->partEtaps = RegistrationModel::getEtaps($contID);
        $this->view->competition = RegistrationModel::getCompetition($contID);
        $this->view->render('registration');
    }

    public function submitAction()
    {
        if(isset($_POST['action'])) {
        RegistrationModel::registerParticipant();
        }
        parent::redirect(array('registration','default', $_POST['competition_id']));
    }

}