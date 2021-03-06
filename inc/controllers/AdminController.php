<?php

class AdminController extends Controller
{
    /**
     * shows log-in form
     */
    public function defaultAction()
    {
        if(SessionModel::getCurrentUserName()) {
            parent::redirect(array('admin','manage'));
        } else {
            $this->view->render('login');
        }
        $this->clearMessages();
    }

    /**
     * logging in
     */
    public function loginAction()
    {
        if (isset($_POST['action']) and $_POST['action'] == 'login') {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
            $userID = UserModel::checkUserPassword(array('name' => $username, 'password' => $password));
            if ($userID) {
                SessionModel::setCurrentUser($username, $userID);
            } else {
                SessionModel::setWarningMessage(array('Username-password does not match!'));
            }
        }
        $this->redirect(array());
    }

    /**
     * logging out
     */
    public function logoutAction()
    {
        if (isset($_POST['action']) and $_POST['action'] == 'logout') {
            SessionModel::unsetCurrentUser();
        }
        $this->redirect(array());
    }

    /**
     * setting new moderator
     */
    public function setModeratorAction()
    {
        if (SessionModel::getCurrentUserStatus() == 1 and isset($_POST['action']) and $_POST['action'] == 'setModerator') {
            $param['new_name'] = htmlspecialchars($_POST['new_name']);
            $param['new_password'] = htmlspecialchars($_POST['new_password']);
            $param['email'] = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            if (UserModel::setModerator($param)) {
                SessionModel::setSuccessfulMessage(array('Moderator added successfully!'));
            } else {
                SessionModel::setWarningMessage(array('Adding moderator failed'));
            }
            $this->redirect(array('admin'));
        } else {
            $this->redirect(array());
        }
    }

    /**
     * shows moderating-administrating page
     */
    public function manageAction()
    {
        if (SessionModel::getCurrentUserName()) {
            $this->view->competitions = RegistrationModel::getFutureCompetitionsList();
            $this->view->render('adminPage');
        } else {
            $this->redirect(array());
        }
    }

    /**
     * @todo add classes selection
     * Sets a new competition event into base
     */
    public function setNewCompetitionAction()
    {
        if (isset($_POST['action']) and $_POST['action'] == 'setNewCompetition') {
            $compParam['name'] = htmlspecialchars($_POST['name']);
            $compParam['date_begin'] = htmlspecialchars($_POST['date_begin']);
            $compParam['date_finish'] = htmlspecialchars($_POST['date_finish']);
            $compID = RegistrationModel::setNewCompetition($compParam);
            if (!$compID) {
                SessionModel::setWarningMessage(array('Error while setting new competition!'));
            } elseif (RegistrationModel::setEtaps($compID)) {
                SessionModel::setSuccessfulMessage(array('New competition set up successfully!'));
            }
        }
        $this->redirect(array('admin','manage'));
    }
}