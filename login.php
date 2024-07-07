	<?php 
	if (isset($_COOKIE['User'])) {
		header("Location: Home.php");
	}

	?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Вход</title>

    <!-- Link to Bootstrap CSS and Bootstrap Icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- Link to custom CSS -->
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <h1>Авторизуйтесь!</h1>

    <form method="POST" action="login.php">
        <div class="row form__reg"><input class="form-control" type="email" name="email" placeholder="Почта"></div>
        <div class="row form__reg"><input class="form-control" type="password" name="pass" placeholder="Пароль"></div>
        
        <button type="submit" class="btn btn-primary" name="submit">Войти</button>
    </form>

    <!-- Link to Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Jr4kRk5zoz4PoKLjWnDczpYeFZLmk/jM1AqN9e+uxDxMC+yr1E0TZMZpVKMp4+ewC" crossorigin="anonymous"></script>
</body>
</html>
<?php
	require_once('db.php');
	
	$link = mysqli_connect('127.0.0.1', 'root', 'kali', 'users');
	
	if (isset($_POST['submit'])) {
		$email = $_POST['email'];
		$pass = $_POST['pass'];

		if (!$email || !$pass ) {
			die('Пожалуйста, введите все значения!');
		}
	
		$sql = "SELECT * FROM users WHERE email='$email' AND password='$pass'";

		$result = mysqli_query($link, $sql);
		
		if (mysqli_num_rows($result) == 1) {
		  setcookie("User", $user, time()+7200);
		  header('Location: Home.php');
		} else {
		  echo "не правильное имя или пароль";
		}

	}
?>
