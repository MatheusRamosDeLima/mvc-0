<?php

require_once 'Connection.php';

class User {
    private PDO $con;

    public function __construct() {
        $this->con = Connection::getConnection();
    }

    public function getAllUsers() : array|false {
        $query = $this->con->query("SELECT rowid, * FROM users");
        return $query->fetchAll();
    }
    public function getUser($id) : stdClass|null {
        $query = $this->con->query("SELECT rowid, * FROM users WHERE rowid=$id");
        return $query->fetchObject();
    }
}