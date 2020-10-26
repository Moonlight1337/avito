<?php
session_start();
require_once 'Logic/Db/Db.php';
require_once 'Logic/SubscribePage.php';
require_once 'Logic/Subject.php';



if($_POST['name']){
    Logic\SubscribePage::getConfPage();
}
elseif ($_POST['conf_code']){
    Logic\SubscribePage::checkCode($_POST['conf_code']);
}
else{
    Logic\SubscribePage::getPage();
}
