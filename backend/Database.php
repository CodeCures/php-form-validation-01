<?php

namespace Backend;


use PDO;

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
}