<?php

use Backend\Auth;
use Backend\Session;

require_once './Auth.php';
require_once './Session.php';

// create Validator class with two methods: validate and validated;
// validate shoud validate your inpute records 
// if wrong store the error message in a session usin our session class
// if data is correct put them in data property as an array
Validator::validate([
    'username' => 'required',
    'password' => 'required'
]);


// return the array here
Validator::validated(); //[username => "courage", password => 'pass123'];
Auth::login($username, $password);


// checking if validation is successfull
// if (empty($errors)) {
    
//     var_dump(Auth::user());
// } else {
//     Session::put('errors', $errors);
//     Session::put('data', $_POST);

//     header("Location:http://rawphp.test/");
// }


