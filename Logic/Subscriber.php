<?php


namespace Logic;
require_once 'Manager.php';


class Subscriber
{
    protected $name;
    protected $email;
    protected $manager;

    function __construct($post)
    {
        $this->name = $post['name'];
        $this->email = $post['email'];
        $this->manager = new Manager();
    }

    function saveSub()
    {
        $sql = "INSERT INTO users (name, email) VALUES (?, ?)";
        $param_arr[] = "ss";
        $param_arr[] = &$this->name;
        $param_arr[] = &$this->email;
        $this->manager->getPreparedResult($sql, $param_arr);
    }

    function getSubId()
    {
        $sql = "SELECT user_id FROM users WHERE email=?";
        $param_arr[] = "s";
        $param_arr[] = &$this->email;
        return $this->manager->getPreparedAssocResult($sql, $param_arr)['user_id'];

    }
}