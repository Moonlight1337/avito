<?php


namespace Logic;
require_once 'Manager.php';
require_once 'Subscriber.php';
require_once 'Subject.php';

class Subscribe
{
    protected $user_id;
    protected $pos_id;
    protected $manager;

    function __construct($post)
    {
        $subject = new Subject($post['subject']);
        $subject->savePos();
        $this->pos_id = $subject->getPosId();
        $subscriber = new Subscriber($post);
        $subscriber->saveSub();
        $this->user_id = $subscriber->getSubId();

        $this->manager = new Manager();
    }

    function subscribe(){
        $sql = "INSERT INTO user_to_pos (user_id, pos_id) VALUES (?, ?)";
        $param_arr[] = "ss";
        $param_arr[] = &$this->user_id;
        $param_arr[] = &$this->pos_id;
        $this->pos_id = $this->manager->getPreparedResult($sql, $param_arr);
        return 1;
    }
}