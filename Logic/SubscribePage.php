<?php


namespace Logic;
require_once 'SendEmail.php';
require_once 'Subsctiber.php';

class SubscribePage
{
    /* Получение страницы с формой подпики */
    static function getPage(){
        include 'templates/index.html';
    }

    /* Получение страницы для подверждения почты */
    static function getConfPage(){
        $code = rand(1000,9999);
        $code = 1111;
//        $mail = new SendEmail();
//        $mail->SendConfirmationCode($_POST['email'], $code);
        $_SESSION['post'] = $_POST;
//        $_SESSION['name'] = $_POST['name'];
//        $_SESSION['email'] = $_POST['email'];
//        $_SESSION['subject'] = $_POST['subject'];
        $_SESSION['code'] = $code;
        include 'templates/confirmation.html';
    }

    static function checkCode($code){
        if($code == $_SESSION['code']){
            $subscriber = new Subsctiber($_SESSION['post']);
            $subscriber->subscribe();
            include 'templates/complete.html';
        }
        else{
            include 'templates/wrongcode.html';
        }
    }


}