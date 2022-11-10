<?php

namespace Backend;

class Hash
{
    /**
     * @param String $password
     * 
     * @return String
     */
    public static function make(String $password): String
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    /**
     * @param String $password
     * @param String $hash
     * 
     * @return bool
     */
    public static function check(String $password, String $hash): bool
    {
        return password_verify($password, $hash);
    }
}