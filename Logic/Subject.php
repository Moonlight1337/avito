<?php


namespace Logic;
require_once 'Manager.php';
require_once 'Parser.php';

class Subject
{
    protected $name;
    protected $url;
    protected $price;
    protected $manager;
    protected $pos_id;

    function __construct($subject = null, $pos = null)
    {
        if(!$pos)
        {
            $parser = new Parser($subject);
            $this->name = $parser->getName();
            $this->url = $subject;
            $this->price = $parser->getPrice();
            $this->manager = new Manager();
        }
        else
        {
            $this->pos_id = $pos['pos_id'];
            $this->price = $pos['price'];
            $this->manager = new Manager();
        }
    }

    function savePos()
    {
        $sql = "INSERT INTO positions (pos_name, url, price) VALUES (?, ?, ?)";
        $param_arr[] = "sss";
        $param_arr[] = &$this->name;
        $param_arr[] = &$this->url;
        $param_arr[] = &$this->price;
        $this->manager->getPreparedResult($sql, $param_arr);
    }

    function getPosId()
    {
        $sql = "SELECT pos_id FROM positions WHERE url=?";
        $param_arr[] = "s";
        $param_arr[] = &$this->url;
        return $this->manager->getPreparedAssocResult($sql, $param_arr)['pos_id'];
    }

    function updatePrice($pos)
    {
        $sql = "UPDATE positions SET price = ? WHERE pos_id = ?";
        $param_arr[] = "ss";
        $param_arr[] = &$this->price;
        $param_arr[] = &$this->pos_id;
        $this->manager->getPreparedResult($sql, $param_arr);
    }


}