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
//        $this->servername = "localhost";
//        $this->username = "root";
//        $this->password = "root";
//        $this->dbname = "sysexamesmedicos";
//        $this->conn = new \mysqli();
    }
    public static function getInstance() {
        if(!isset(self::$instance)){
            self::$instance = mysqli_connect("localhost", "root", "", "sysexamesmedicos");
        }

        return self::$instance;
    }

//    public function getConn() {
//        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
//
//        return $this->conn;
//    }
//
//    public function closeConn() {
//        mysqli_close($this->conn);
//    }
}