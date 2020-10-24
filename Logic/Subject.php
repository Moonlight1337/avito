<?php


namespace Logic;
require_once 'Manager.php';

class Subject
{
    protected $pos_id;
    protected $name;
    protected $url;
    protected $price;
    protected $manager;

    function __construct($subject)
    {
        $page = file_get_contents($subject);
        $this->name = $this->getName($page);
        $this->price = $this->getPrice($page);
        $this->manager = new Manager();
        $this->url = $subject;


    }

    function savePos(){
        $sql = "INSERT INTO positions (name, url, price) VALUES (?, ?, ?)";
        $param_arr[] = "sss";
        $param_arr[] = &$this->name;
        $param_arr[] = &$this->url;
        $param_arr[] = &$this->price;
        $this->pos_id = $this->manager->getPreparedResult($sql, $param_arr);
        $s = 1;
    }

    function getPosId(){
        $sql = "SELECT * FROM positions WHERE url=?";
        $param_arr[] = "s";
        $param_arr[] = $this->url;
        $this->manager->getPreparedResult($sql, $param_arr);
        return 1;
    }

    protected function getPrice($page){
        $page = preg_split('/itemprop="price" content="/', $page);
        $page = preg_split('/">/', $page[1]);
        $price = (int)$page[0];
        return $price;
    }

    protected function getName($page){
        $page = preg_split('/class="title-info-title-text" itemprop="name">/', $page);
        $page = preg_split('/</', $page[1]);
        $name = $page[0];
        return $name;
    }

}