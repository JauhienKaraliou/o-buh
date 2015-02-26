<?php

class UserModel extends Model {

    /**
     * check whether user's password is correct
     * @param array $userParams
     * @return string
     */
    public static function checkUserPassword(array $userParams)
    {
        $sth = DB::getInstance()->prepare('SELECT `id_user`,`user_status_id` FROM `buh_users` WHERE `username`=:username and
            `sha1_password`=:sha1_password');
        $sth->execute(array('username' => $userParams['name'], 'sha1_password' => sha1($userParams['password'])));
        return $sth->fetch();
    }

    /**
     * sets new moderator
     * @param array $param
     * @return bool
     */
    public static function setModerator(array $param)
    {
        $sth = DB::getInstance()->prepare('INSERT INTO `buh_users`(`username`,`user_status_id`,`email`,`sha1_password`)
VALUES (:username,:user_status_id,:email,:sha1_password)');
        return $sth->execute(array('username'=>$param['new_name'],
            'user_status_id'=>'2',
            'email'=>$param['email'],
            'sha1_password'=>sha1($param['new_password'])));
    }
}