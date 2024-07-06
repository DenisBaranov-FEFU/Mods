<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Admin Panel</title>
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	
	<link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <h1>Загрузка модификаций</h1>
   <div class="container">
        <!-- Search form -->
        <form method="POST" action="AdmPanel.php">
            <div class="row form__reg"><input class="form-control" type="text" name="game" placeholder="Название игры"></div>
            <div class="row form__reg"><input class="form-control" type="text" name="name" placeholder="Название мода"></div>
            <div class="row form__reg"><input class="form-control" type="url" name="url" placeholder="Ссылка на скачивание"></div>
            <div class="row form__reg"><input class="form-control" type="number" name="size" placeholder="Вес в МБ"></div>
            <button type="submit" class="btn_red btn__reg" name="submit">Добавить</button>
        </form>
    </div>
</body>
</html>



 <?php
require_once('db.php'); // Including the database connection file

$link = mysqli_connect('127.0.0.1', 'root', 'kali', 'mods'); // Connecting to the database

if (isset($_POST['submit'])) { // Checking if the submit button was clicked
    $game = $_POST['game'];
    $name = $_POST['name'];
    $url = $_POST['url'];
    $size = $_POST['size'];

    if (!$game || !$name || !$url || !$size) {
        die('Пожалуйста введите все значения!');
    }

    $sql = "INSERT INTO mods (game, name, url, size) VALUES ('$game', '$name', '$url', '$size')";

    if (!mysqli_query($link, $sql)) {
        echo "Не удалось добавить мод";
    } else {
        echo "Мод успешно добавлен";
    }
}

mysqli_close($link);
?>
