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

    public static function setCurrentUser($name,$status)
    {
        $_SESSION['userStatus'] = $status;
        $_SESSION['userName'] = $name;
    }

    public static function unsetCurrentUser()
    {
        unset($_SESSION['userStatus']);
        unset($_SESSION['userName']);
    }

    /**
     * @return mixed
     */
    public static function getCurrentUserName()
    {
        return $_SESSION['userName'];
    }

    /**
     * @return mixed
     */
    public static function getCurrentUserStatus()
    {
        return $_SESSION['userStatus'];
    }

    public static function clearMessages()
    {
        unset($_SESSION['warningMsg']);
        unset($_SESSION['successMsg']);
    }

}