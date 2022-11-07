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
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // $sql = "CREATE TABLE users (
        //     id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        //     username VARCHAR(255) NOT NULL,
        //     password VARCHAR(255) NOT NULL
        //     )";

        // $conn->exec($sql);
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