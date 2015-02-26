<?php

class SessionModel extends Model
{

    public static function start()
    {
        session_start();
    }

    public static function setWarningMessage(array $msgs)
    {
        $_SESSION['warningMsg']=(!$_SESSION['warningMsg'])?[]:$_SESSION['warningMsg'];
        foreach ($msgs as $msg) {
            array_push($_SESSION['warningMsg'], $msg);
        }
    }

    public static function setSuccessfulMessage(array $msgs)
    {
        $_SESSION['successMsg']=(!$_SESSION['successMsg'])?[]:$_SESSION['successMsg'];
        foreach ($msgs as $msg) {
            array_push($_SESSION['successMsg'], $msg);
        }
    }

    public static function setCurrentUser($name,$userID)
    {
        $_SESSION['userStatus'] = $userID['user_status_id'];
        $_SESSION['userName'] = $name;
        $_SESSION['userID']= $userID['id_user'];
    }

    public static function setCaptchaAnswer($string)
    {
        $_SESSION['captchaAnswer'] = $string;
    }

    public static function unsetCurrentUser()
    {
        unset($_SESSION['userStatus']);
        unset($_SESSION['userName']);
        unset($_SESSION['userID']);
    }

    /**
     * @return mixed
     */
    public static function getCurrentUserName()
    {
        return $_SESSION['userName'];
    }

    public static function getCaptchaAnswer()
    {
        return $_SESSION['captchaAnswer'];
    }

    /**
     * @return mixed
     */
    public static function getCurrentUserStatus()
    {
        return $_SESSION['userStatus'];
    }

    /**
     * @return mixed
     */
    public static function getCurrentUserID()
    {
        return $_SESSION['userID'];
    }

    public static function clearMessages()
    {
        unset($_SESSION['warningMsg']);
        unset($_SESSION['successMsg']);
    }
}