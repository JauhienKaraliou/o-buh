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
     * returns the number of running days on competitions
     * @param $contID
     * @return array
     */
    public static function getEtapNum($contID)
    {
        $sth = DB::getInstance()->prepare('SELECT COUNT(*) FROM `buh_etap` WHERE `id_contest`=:id_contest');
        $sth->execute(array('id_contest' => $contID));
        return $sth->fetchAll();
    }

    /**
     * returns classes is being participated into selected competitions
     * @param $contID
     * @return array
     */
    public static function getClasses($contID)
    {
        $sth = DB::getInstance()->prepare('SELECT `id_class` FROM `buh_classes_on_contest` WHERE
        `id_contest`=:id_contest');
        $sth->execute(array('id_contest' => $contID));
        return $sth->fetchAll();
    }

    /**
     * returns id-s of etaps on selected contest
     * @param $contID
     * @return array
     */
    public static function getEtaps($contID)
    {
        $sth = DB::getInstance()->prepare('SELECT `id_etap` FROM `buh_etap` WHERE
        `id_contest`=:id_contest');
        $sth->execute(array('id_contest' => $contID));
        return $sth->fetchAll();
    }

    /**
     * @todo add result messages through session and autofilling correct fields
     * @return bool
     */
    public static function registerParticipant()
    {
        $etapID[] = '';
        $runner['name'] = htmlspecialchars($_POST['name']);
        $runner['surname'] = htmlspecialchars($_POST['surname']);
        $runner['birth_year'] = (int)$_POST['year_of_birth'];
        $runner['gender'] = htmlspecialchars($_POST['gender']);
        $contestID = (int)$_POST['contest_id'];
        $clubID = ($_POST['club_id'] != '') ? (int)$_POST['club_id'] :
            self::setNewClub(htmlspecialchars($_POST['new_club']));
        if (!$clubID) {
            SessionModel::setWarningMessage(array('Choose club or enter your own'));
        }
        $runnerID = self::getRunnerID($runner);  //@todo rewrite as with the clubID
        if (!$runnerID) {
            self::setNewRunner($runner);
            $runnerID = self::getRunnerID($runner);
        }
        $qualID = (int)$_POST['id_qual'];
        $classID = (int)$_POST['id_class'];
        $siCardNum = (isset($_POST['si_card'])) ? (int)$_POST['si_card'] : 0;
        foreach ($_POST['id_etap'] as $postEtap) {
            array_push($etapID, (int)$postEtap);
        }
        $regEmail = filter_var($_POST['club_agent_email'], FILTER_VALIDATE_EMAIL);
        $sth = DB::getInstance()->prepare('INSERT INTO `buh_participant`(`id_etap`,`id_runner`,`id_club`,`id_qual`,
`id_class`,`si_card_num`,`reg_email`) VALUES (:id_etap,:id_runner,:id_club,:id_qual,:id_class,:si_card_num,:reg_email)');
        foreach ($etapID as $etap) {
            if (!$sth->execute(array(
                'id_etap' => $etap,
                'id_runner' => $runnerID,
                'id_club' => $clubID,
                'id_qual' => $qualID,
                'id_class' => $classID,
                'si_card_num' => $siCardNum,
                'reg_email' => $regEmail
            ))
            ) {
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
        $sth = DB::getInstance()->prepare('SELECT `id_club` FROM `buh_clubs` WHERE `club_name`=:club_name');
        $sth->execute(array('club_name' => $club));
        $clubID = $sth->fetch();
        return $clubID['id_club'];
    }

    /**
     * set new runner
     * @todo return ID of new registered runner
     * @param $runner
     * @return bool
     */
    public static function setNewRunner($runner)
    {
        $sth = DB::getInstance()->prepare('INSERT INTO `buh_runners (`name`,`surname`,`birth_year`,`gender`)
                                           VALUES (:name,:surname,:birth_year,:gender)');
        return $sth->execute($runner);
    }

    /**
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

    public static function getCompetition($param)
    {
        $sth = DB::getInstance()->prepare('SELECT `id_contest`,`name`,`date_begin`,`date_end` FROM `buh_contests`
WHERE `id_contest`=:id_contest');
        $sth->execute(array('id_contest'=> $param));
        return $sth->fetch();
    }

}
