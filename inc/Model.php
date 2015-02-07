<?php


class Model {
    public function __construct()
    {

    }

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
        if(!$mail->send()) {
            return false;
        } else {
            return true;
        }
    }

    public static function generateLink(array $params)
    {
        $address = implode('/',$params);
        $host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        return "http://$host$uri/$address";
    }


}