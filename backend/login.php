<?php

use Backend\Auth;

require_once './Auth.php';
require_once './Session.php';

$validator = Validator::validate([
    'username' => 'required',
    'password' => 'required'
]);

Auth::login(...array_values($validator->validated()));

var_dump(Auth::user());



