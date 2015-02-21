<?php

class RegistrationModel extends Model
{
    /**
     * @return array
     */
    public static function getClubs()
    {
        $sql = "SELECT `id_club`,`club_name` FROM `buh_clubs`";
        $sth = DB::getInstance()->query($sql, PDO::FETCH_ASSOC);
        return $sth->fetchAll();
    }

    /**
     * returns the list of qualifications
     * @return array
     */
    public static function getQualifications()
    {
        $sth = DB::getInstance()->prepare('SELECT `id_qual`,`qual_name` FROM `buh_qualification`');
        $sth->execute();
        return $sth->fetchAll();
    }

    /**
     * returns classes is being participated into selected competitions
     * @todo select classes only for definite competition
     * @return array
     */
    public static function getClasses()
    {
        $sth = DB::getInstance()->prepare('SELECT * FROM `buh_class`');
        $sth->execute();
        return $sth->fetchAll();
    }

    /**
     * returns id-s of etaps on selected contest
     * @param $contID
     * @return array
     */
    public static function getEtaps($contID)
    {
        $sth = DB::getInstance()->prepare('SELECT `id_etap`,`date` FROM `buh_etap` WHERE `id_contest`=:id_contest');
        $sth->execute(array('id_contest' => $contID));
        return $sth->fetchAll();
    }

    /**
     * @return bool
     */
    public static function registerParticipant(array $param, array $etapID)
    {
        $sth = DB::getInstance()->prepare('INSERT INTO `buh_participant`(`id_etap`,`id_runner`,`id_club`,`id_qual`,
`id_class`,`si_card_num`,`reg_email`) VALUES (:id_etap,:id_runner,:id_club,:id_qual,:id_class,:si_card_num,:reg_email)');
        foreach ($etapID as $etap) {
            $param['id_etap']=$etap;
            if (!$sth->execute($param)) {
                return false;
            }
        }
        return true;
    }

    /**
     * set a new club and returns its ID
     * @param $club
     * @return mixed
     */
    public static function setNewClub($club)
    {
        $sth = DB::getInstance()->prepare('INSERT INTO `buh_clubs`(`club_name`) VALUES (:new_club)');
        $sth->execute(array('new_club' => $club));
        return DB::getInstance()->lastInsertId();
    }

    /**
     * set new runner['name'],['surname'],['birth_year'],['gender']
     * @param array $runner
     * @return string
     */
    public static function setNewRunner(array $runner)
    {
        $sth = DB::getInstance()->prepare('INSERT INTO `buh_runners` (`name`,`surname`,`birth_year`,`gender`)
                                           VALUES (:name,:surname,:birth_year,:gender)');
        $sth->execute($runner);
        return DB::getInstance()->lastInsertId();
    }

    /**
     * ['name'],['surname']
     * @param array $runner
     * @return mixed
     */
    public static function getRunnerID(array $runner)
    {
        $sth = DB::getInstance()->prepare('SELECT `id_runner` FROM `buh_runners`
 WHERE `name`=:name and `surname`=:surname');
        $sth->execute($runner);
        return $sth->fetch();
    }

    /**
     * @param array $params
     * @return string
     */
    public static function setNewCompetition(array $params)
    {
        $sth = DB::getInstance()->prepare('INSERT INTO `buh_contests`(`name`,`date_begin`,`date_end`,`registration_open`)
VALUES (:name, :date_begin,:date_end,:registration_open)');
        $sth->execute(array('name' => $params['name'],
            'date_begin' => $params['date_begin'],
            'date_end' => $params['date_finish'],
            'registration_open' => '1'));
        return DB::getInstance()->lastInsertId();
    }

    /**
     * @param $compID
     * @return bool
     */
    public static function setEtaps($compID)
    {
        $sth = DB::getInstance()->prepare('SELECT `date_begin`,`date_end` FROM `buh_contests`
WHERE `id_contest`=:id_contest');
        $std = DB::getInstance()->prepare('INSERT INTO `buh_etap`(`id_contest`,`date`) VALUES (:id_contest,:date)');
        $sth->execute(array('id_contest' => $compID));
        $date = $sth->fetch();
        $dateBegin = date_create($date['date_begin']);
        $dateFinish = date_create($date['date_end']);
        $sth->errorInfo();
        for ($i = $dateBegin; $i <= $dateFinish; date_add($i, date_interval_create_from_date_string('1 day'))) {
            $dateToIns=date_format($i,'Y-m-d');
            $res = $std->execute(array('id_contest' => $compID, 'date' => $dateToIns));
            if (!$res) {
                return false;
            }
        }
        return true;
    }

    public static function getFutureCompetitionsList()
    {
        $sth = DB::getInstance()->prepare('SELECT `id_contest`,`name`,`date_begin`,`date_end` FROM `buh_contests`
WHERE `registration_open`=:registration_open  ORDER BY `date_begin` DESC');
        $sth->execute(array('registration_open'=> 1 ));
        return $sth->fetchAll();
    }

    /**
     * returns ['id_contest'],['name'],['date_begin'],['date_end']
     * @param $param
     * @return mixed
     */
    public static function getCompetition($param)
    {
        $sth = DB::getInstance()->prepare('SELECT `id_contest`,`name`,`date_begin`,`date_end` FROM `buh_contests`
WHERE `id_contest`=:id_contest');
        $sth->execute(array('id_contest'=> $param));
        return $sth->fetch();
    }

    public static function getNewestCompetition()
    {
        $sth=DB::getInstance()->prepare('SELECT `id_contest` FROM `buh_contests` WHERE `registration_open`=:reg_open
ORDER BY `date_begin` DESC');
        $sth->execute(array('reg_open'=>1));
       return $sth->fetchColumn();
    }

}
