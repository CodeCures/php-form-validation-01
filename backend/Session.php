<?php

namespace Backend;

class Session
{
    public static function put($key, $value)
    {
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }

        $_SESSION[$key] = $value;
        $_SESSION['timeout'] = time();
    }

    public static function get($key)
    {
        session_start();
        return $_SESSION[$key];
    }

    public static function flush()
    {
        if (isset($_SESSION['timeout'])) {
            if (time() - $_SESSION['timeout'] > 0.5) {
                session_unset();
                session_destroy();
            }
        }
    }
}
