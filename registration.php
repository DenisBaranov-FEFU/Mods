<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Регистрация</title>

    <!-- Link to Bootstrap CSS and Bootstrap Icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- Link to custom CSS -->
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <h1>Зарегистрируйтесь!</h1>

    <form method="POST" action="registration.php">
            <div class="row form__reg"><input class="form-control" type="text" name="username" placeholder="Никнейм"></div>
            <div class="row form__reg"><input class="form-control" type="email" name="email" placeholder="Почта"></div>
            <div class="row form__reg"><input class="form-control" type="text" name="password" placeholder="Пароль"></div>
            <div class="row form__reg"><input class="form-control" type="text" name="pwd_check" placeholder="Повторите паоль"></div>
            
            <button type="submit" class="btn btn-primary" name="search">Подтвердить</button>
    </form>


</body>
</html>


<?php

    if (!$email || !$username || !$password) die ('Пожалуйста введите все значения!');

    if ($password == $pwd_check){
        require_once('db.php');
        $link = mysqli_connect('127.0.0.1', 'root', 'kali', 'users');

        if (isset($_POST['submit'])) {
          $email = $_POST['email'];
          $username = $_POST['username'];
          $password = $_POST['password'];
        }
        $sql = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$password')";

        if(!mysqli_query($link, $sql)) {
          echo "Не удалось добавить пользователя";
        }




    }

    else{
        die ("Пароли должны совпадать!")

    }
?>