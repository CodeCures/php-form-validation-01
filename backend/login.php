<?php 
session_start();

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

    print_r([
        "username" => $username,
        "password" => $password,
    ]);

}else {
    $_SESSION['errors'] = $errors;
    $_SESSION['data'] = $_POST;

    header("Location:http://rawphp.test/");
}


