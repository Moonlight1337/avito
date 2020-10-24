<?php


namespace Logic;
require_once 'Manager.php';


class Subsctiber
{
    protected $name;
    protected $email;
    protected $id_pos;
    protected $manager;

    function __construct($post)
    {
        $this->name = $post['name'];
        $this->email = $post['email'];
        $subject = new Subject($post['subject']);
        $subject->savePos();
        $this->id_pos = $subject->getPosId();
        $this->manager = new Manager();
    }

    function subscribe(){
        $sql = "INSERT INTO users (name, email)
                VALUES (?, ?, ?)";
        $param_arr[] = "ss";
        $param_arr[] = $this->name;
        $param_arr[] = $this->email;
        $this->manager->getPreparedResult($sql, $param_arr);
    }


}