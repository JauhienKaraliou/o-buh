<?php

class Captcha {

    /**
     * @return string
     */
    public static function generateCaptcha()
    {
        $answ = rand(1, 20);
        $marker = rand(0, 1) ? '+' : '-';

        $b = rand(1, $answ);
        switch ($marker) {
            case '+':
                $a = $answ - $b;
                break;
            case '-':
                $a = $answ + $b;
                break;
        }
        SessionModel::setCaptchaAnswer($answ);
        return $a . ' ' . $marker . ' ' . $b;
    }
}