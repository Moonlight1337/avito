<?php


class Db {
    static function getConnection() {
        $db = "avito_test";
        $host = "localhost";
        $login = "admin";
        $password = "VZcIsxMSWsUS4Z4j";
        static $conn = null;
        if ($conn == null) {
            try {
                $conn = new mysqli($host, $login, $password, $db, 3306);
                return $conn;
            } catch (mysqli_sql_exception $e) {
                echo $e;
                exit;
            }
        }
        return $conn;
    }
}