﻿<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Регистрация</title>

    <!-- Link to Bootstrap CSS and Bootstrap Icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- Link to custom CSS -->
    <link rel="stylesheet" href="CSS/auth.css">
</head>
<body>
    <h1>Зарегистрируйтесь!</h1>

    <form method="POST" action="registration.php">
        <div class="row form__reg"><input class="form-control" type="text" name="user" placeholder="Никнейм"></div>
        <div class="row form__reg"><input class="form-control" type="email" name="email" placeholder="Почта"></div>
        <div class="row form__reg"><input class="form-control" type="password" name="pass" placeholder="Пароль"></div>
        <div class="row form__reg"><input class="form-control" type="password" name="pwd_check" placeholder="Повторите пароль"></div>
        
        <button type="submit" class="btn btn-primary" name="submit">Подтвердить</button>
    </form>
	
	<a href="login.php"> Уже зарегистрированы?</a>
    <!-- Link to Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Jr4kRk5zoz4PoKLjWnDczpYeFZLmk/jM1AqN9e+uxDxMC+yr1E0TZMZpVKMp4+ewC" crossorigin="anonymous"></script>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $pwd_check = $_POST['pwd_check'];

		if (!$email || !$user || !$pass || !$pwd_check) {
			die('Пожалуйста, введите все значения!');
		}

			if ($pass == $pwd_check) {
				require_once('db.php');
				$link = mysqli_connect('127.0.0.1', 'root', 'kali', 'users');

				if (!$link) {
					die('Ошибка подключения к базе данных: ' . mysqli_connect_error());
				}

				$sql = "INSERT INTO users (email, username, password) VALUES ('$email', '$user', '$pass')";

			   if (!mysqli_query($link, $sql)) {
					echo "Не удалось добавить пользователя: " . mysqli_error($link);
				} else {
					echo "Пользователь успешно зарегистрирован!";
					header('Location: login.php');
				}

			}
			else {
				die("Пароли должны совпадать!");
			}

			mysqli_close($link);
		} 

?>
