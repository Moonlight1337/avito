<?php


namespace Logic;
require_once 'SendEmail.php';
require_once 'Subscribe.php';

class SubscribePage
{
    /* Получение страницы с формой подпики */
    static function getPage()
    {
        include 'templates/index.html';
    }

    /* Получение страницы для подверждения почты */
    static function getConfPage()
    {
        $code = rand(1000,9999);
        $send_email = new SendEmail();
        $send_email->SendConfirmationCode($_POST['email'], $code);
        $_SESSION['post'] = $_POST;
        $_SESSION['code'] = $code;
        include 'templates/confirmation.html';
    }

    /* Проверка кода */
    static function checkCode($code)
    {
        if($code == $_SESSION['code']){
            $subscribe = new Subscribe($_SESSION['post']);
            $subscribe->subscribe();
            include 'templates/complete.html';
        }
        else{
            include 'templates/wrongcode.html';
        }
    }


}