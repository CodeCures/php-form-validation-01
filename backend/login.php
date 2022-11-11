<?php

use Backend\Auth;
use Backend\Session;

require_once './Auth.php';
require_once './Session.php';


['username' => $username, 'password' => $password] = $_POST;

$errors = [];

if (empty($username)) {
    $errors['username'] = "Please Enter a username";
}

if (empty($password)) {
    $errors['password'] = "Please Enter a Password";
}


// checking if validation is successfull
if (empty($errors)) {
    Auth::login($username, $password);
    var_dump(Auth::user());
} else {
    Session::put('errors', $errors);
    Session::put('data', $_POST);

    header("Location:http://rawphp.test/");
}


