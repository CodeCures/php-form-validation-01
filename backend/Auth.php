<?php

namespace Backend;

use PDO;
use PDOException;

require('Database.php');
require('Hash.php');
require('Session.php');

class Auth extends Database
{
    /**
     * @param mixed $username
     * @param mixed $password
     * 
     * @return User|null
     */
    public static function login($username, $password): bool
    {
        try {
            $query = (new self)->conn->query(
                "SELECT * FROM users WHERE username='{$username}'"
            );

            if ($user = $query->fetch(PDO::FETCH_OBJ)) {

                if (Hash::check($password, $user->password)) {
                    Session::put('user', $user);
                    return true;
                }
            }
        } catch (PDOException $e) {
            return $e->getMessage();
        }

        return false;
    }

    /**
     * @return [type]
     */
    public static function user()
    {
        return Session::get('user');
    }

    /**
     * @return bool
     */
    public static function logout(): bool
    {
        session_destroy();
        return true;
    }
}
