<?php

namespace Backend;

class Session
{
    public static function put($key, $value)
    {
        session_start();
        $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        return $_SESSION[$key];
    }
}