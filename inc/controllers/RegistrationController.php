<?php

class RegistrationController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * shows registration form
     * @param int $contID
     */
    public function defaultAction($contID = 0)
    {
        $contID = ($contID == 0) ? RegistrationModel::getNewestCompetition() : $contID;
        $this->view->clubs = RegistrationModel::getClubs();
        $this->view->classes = RegistrationModel::getClasses($contID);
        $this->view->quals = RegistrationModel::getQualifications();
        $this->view->etaps = RegistrationModel::getEtaps($contID);
        $this->view->competition = RegistrationModel::getCompetition($contID);
        $this->view->render('registration');
        $this->clearMessages();
    }

    /**
     * register runner to competition
     */
    public function submitAction()
    {
        if (isset($_POST['action']) and $_POST['action'] == 'register') {
            $etapID[]='';
            $runner['name'] = htmlspecialchars($_POST['name']);
            $runner['surname'] = htmlspecialchars($_POST['surname']);
            $param['id_runner'] = RegistrationModel::getRunnerID($runner);
            if(!$param['id_runner']) {
                $runner['gender'] = htmlspecialchars($_POST['gender']);
                $runner['birth_year'] = (int)$_POST['year_of_birth'];
                $param['id_runner'] = RegistrationModel::setNewRunner($runner);
            }
            $param['id_qual'] = (int)$_POST['id_qual'];
            $param['id_class'] = (int)$_POST['id_class'];
            $param['si_card_num'] = (isset($_POST['si_card'])) ? (int)$_POST['si_card'] : 0;
            $param['reg_email'] = filter_var($_POST['club_agent_email'], FILTER_VALIDATE_EMAIL);
            $etapID = $_POST['id_etap'];
            if (isset($_POST['id_club']) and $_POST['id_club']!='') {
                $param['id_club'] = (int)$_POST['id_club'];
            } elseif (!$_POST['id_club'] and isset($_POST['new_club'])) {
                $param['id_club'] = RegistrationModel::setNewClub(htmlspecialchars($_POST['new_club']));
            } else {
                SessionModel::setWarningMessage(array('select your club or enter a new one!'));
            }
            if(RegistrationModel::registerParticipant($param, $etapID)) {
                SessionModel::setSuccessfulMessage(array('Registered successfully!'));
            } else {
                SessionModel::setWarningMessage(array('Error occured while registering'));
            }
        }
        $this->redirect(array('registration', 'default', $_POST['competition_id']));
    }
}