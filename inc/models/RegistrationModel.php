<?php


class RegistrationModel extends Model
{

    public static function getClubs()
    {
        $sql = "SELECT `id_club`,`club_name` FROM `buh_clubs`";
        $sth = DB::getInstance()->query($sql, PDO::FETCH_ASSOC);
        $clubs = $sth->fetchAll();
        return $clubs;

    }

    public static function getEtapNum($contID)
    {
        $sql = "SELECT COUNT(*) FROM `buh_etap` WHERE `id_contest`=$contID";
        $sth = DB::getInstance()->query($sql, PDO::FETCH_ASSOC);
        $clubs = $sth->fetchAll();
        return $clubs;
    }

    public static function validateForm()
    {

    }

    public static function registerParticipant()
    {

    }

    public static function setNewClub()
    {

    }

    public static function setNewRunner()
    {

    }


}