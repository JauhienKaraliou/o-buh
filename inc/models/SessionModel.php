<?php


class SessionModel extends Model
{
    public static function startSession()
    {
        session_start();
    }

    public static function setWarningMessage(array $msgs)
    {
        foreach ($msgs as $msg) {
            array_push($_SESSION['warningMsg'], $msg);
        }
        return;
    }

}