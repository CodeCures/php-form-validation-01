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
    try {
        $conn = new PDO("mysql:host=localhost;dbname=class_db", 'root', '');
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT * FROM users WHERE username='mandate'");
        var_dump($stmt->execute());
        die();
      
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  
        die();
        header('Location: /public');

      } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}else {
    $_SESSION['errors'] = $errors;
    $_SESSION['data'] = $_POST;

    header("Location:http://rawphp.test/");
}


