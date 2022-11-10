<?php

namespace Backend;

use PDO;
use PDOException;

require('Database.php');
require('Hash.php');
require('User.php');

class Auth extends Database
{
    /**
     * @param mixed $username
     * @param mixed $password
     * 
     * @return User|null
     */
    public static function login($username, $password): ?User
    {
        try {
            $query = (new self)->conn->query(
                "SELECT * FROM users WHERE username='{$username}'"
            );

            if($user = $query->fetch(PDO::FETCH_OBJ)){
                return Hash::check($password, $user->password) ? new User($user) : null;
            }

        } catch (PDOException $e) {
            return $e->getMessage();
        }

        return null;
    }
}
