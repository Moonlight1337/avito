<?php


namespace Logic;

class SendEmail
{
    protected $from;
    function __construct()
    {
            ini_set( 'display_errors', 1 );
            error_reporting( E_ALL );
            $this->from = "test@avito.ru;";
    }

    function SendConfirmationCode($email, $code)
    {
            $to = $email;
            $subject = 'Код подтверждения';
            $message = 'Ваш код подтверждения:'.$code;
            $headers = "From:" . $this->from;
            mail($to,$subject,$message, $headers);
    }

    function SendPriceUpdateEmail($pos){
            $to = $pos['email'];
            $subject = 'Цена на товар обновилась';
            $message = 'Уважаемый '.$pos['name'].' у товара '.$pos['pos_name'].' обновилась цена. Ткушая цена:'.$pos['price'].'р';
            $headers = "From:" . $this->from;
            mail($to,$subject,$message, $headers);

    }
}
