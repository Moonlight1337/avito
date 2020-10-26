<?php


namespace Logic;

require_once 'Manager.php';
require_once 'Subject.php';
require_once 'SendEmail.php';

class Update
{

    public static function updatePrices($new_prices)
    {
        foreach ($new_prices as $pos){
            $subject = new Subject(null, $pos);
            $subject->updatePrice($pos);
            $send_email = new SendEmail();
            $pos_id = $pos['pos_id'];
            $manager = new Manager();
            $sql = "SELECT u.user_id, pos_name, price, name, email FROM positions p 
                    left join user_to_pos up on p.pos_id = up.pos_id 
                    left join users u on up.user_id = u.user_id 
                    WHERE p.pos_id = $pos_id";
            $positions = $manager->getMultipleAssocResult($sql);
            foreach ($positions as $p){
                $send_email->SendPriceUpdateEmail($p);
            }
            exit(1);
        }
    }

    public static function getAllPos()
    {
        $manager = new Manager();
        $sql = "SELECT * FROM positions ";
        return $manager->getMultipleAssocResult($sql);
    }

    public static function getNewPrices($all_pos){
        foreach ($all_pos as $pos){
            $old_price = $pos['price'];
            $parser = new Parser($pos['url']);
            $new_price = $parser->getPrice();
            if($new_price != $old_price){
                $pos['price'] = $new_price;
                $new_prices[] = $pos;
            }
        }
        return $new_prices;
    }
}