<?php

namespace Backend;


use PDO;
use PDOException;

class Database
{
    protected $conn;

    public function __construct()
    {
        $this->conn = new PDO(
            'mysql:'.http_build_query(require('db/config.php'), '', ";"),
            options: [
                PDO::ATTR_ERRMODE =>  PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
    }

    public function register($data)
    {
        try {
            $sql = "INSERT INTO users (username, password) VALUES('{$data['username']}', '{$data['password']}')";

            $this->conn->query($sql);

        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}