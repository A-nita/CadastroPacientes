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
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "sysexamesmedicos";
        $this->conn = "";
    }

    public function getConn() {
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

        return $this->conn;
    }

    public function closeConn() {
        mysqli_close($this->conn);
    }
}