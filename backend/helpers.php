<?php 

use Backend\Session;

require_once "Session.php";

    session_start();

    Session::flush();


    function errors($keyName){
        return isset($_SESSION['errors'][$keyName]) ? "Please Enter $keyName" : "";
    }

    function value($keyName)
    {
        return isset($_SESSION['data'][$keyName]) ? $_SESSION['data'][$keyName] : "";
    }