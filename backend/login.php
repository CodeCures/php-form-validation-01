<?php

use Backend\Auth;
use Backend\Validator;

require_once './Auth.php';
require_once './Session.php';
require_once './Validator.php';

$validator = Validator::validate([
    'username' => 'required',
    'password' => 'required'
]);

Auth::login(...array_values($validator->validated())); 

var_dump(Auth::user());



