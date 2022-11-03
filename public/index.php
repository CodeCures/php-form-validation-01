<?php
    session_start();

    // session_destroy();

    function errors($keyName){
        return isset($_SESSION['errors'][$keyName]) ? "Please Enter $keyName" : "";
    }

    function value($keyName)
    {
        return isset($_SESSION['data'][$keyName]) ? $_SESSION['data'][$keyName] : "";
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../backend/login.php" method="POST">
        <input type="text" name="username" value="<?= value('username') ?>" placeholder="Enter USername" > <br> 

        <span style="font-size: 10px; color: red;"><?= errors('username') ?></span>

        <br>
        <input type="password" name="password" id="" placeholder="***"> <br>
        <span style="font-size: 10px; color: red;"><?= errors('password') ?></span>
        <br>
        <input type="submit" value="Login">
    </form>
</body>
</html>