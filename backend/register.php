<?php 

['username' => $username, 'password' => $password] = $_POST;

$errors = [];

if (empty($username)) {
    $errors['username'] = "Please Enter a username";
}

if (empty($password)) {
    $errors['password'] = "Please Enter a Password";
}


if (empty($errors)) {
    try {
        $conn = new PDO("mysql:host=localhost;dbname=class_db", 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $hashedPs = password_hash($password, PASSWORD_DEFAULT);
        $insertSql = "
            INSERT INTO users (username, password) VALUES ('$username', '$hashedPs')
        ";


        $conn->exec($insertSql);
        header('Location: /public');

      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    
}else {
    var_dump($errors);
}