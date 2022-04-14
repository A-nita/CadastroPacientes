<?php

namespace Source\Models;

class Connection
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    public static $instance;


    public function __construct () {

    }

    public static function getInstance() {
        if(!isset(self::$instance)){
            self::$instance = mysqli_connect("localhost", "root", "", "sysexamesmedicos");
        }

        return self::$instance;
    }
}