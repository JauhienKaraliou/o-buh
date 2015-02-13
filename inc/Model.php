<?php


class Model {


    public  static function sendMail($to, $subject, $body)
    {
        $mail                = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth      = true;
        $mail->SMTPKeepAlive = true;
        $mail->SMTPSecure = 'ssl';
        $mail->SMTPDebug = 0;
        $mail->Host          = 'smtp.gmail.com';
        $mail->Port          = 465;
        $mail->Username      = MAIL_USER;
        $mail->Password      = MAIL_PASSWORD;
        $mail->SetFrom(MAIL_USER);
        $mail->CharSet      = 'UTF-8';
        $mail->Subject      = $subject;
        $mail->MsgHTML( $body );
        $mail->AddAddress($to);
        return ($mail->send());
    }

    public static function checkPage($page)
    {
        $page = (is_int($page))?$page:(int) $page;
        $page = ($page > 0 and $page <= PHP_INT_MAX)?$page:1;
        return $page;
    }

}