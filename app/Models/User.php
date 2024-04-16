<?php

require_once 'Connection.php';

class User {
    private PDO $con;

    public function __construct() {
        $this->con = Connection::getConnection();
    }

    public function getUsers() {
        $query = $this->con->query("SELECT * FROM users");
        return $query->fetchAll();
    }
}