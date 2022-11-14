<?php

namespace Backend;

require('Database.php');
require('Hash.php');

use PDOException;

class User extends Database
{
    public static function create($username, $password)
    {

        try {
            $hashPassword = Hash::make($password);
            $sql = "INSERT INTO users (username, password) VALUES('{$username}', '{$hashPassword}')";

            (new static)->conn->query($sql);


        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}


