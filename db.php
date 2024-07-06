<?php
$servername = "127.0.0.1";
$username = "root";
$password = "kali";
$dbName = "mods";

$link = mysqli_connect($servername, $username, $password);

if (!$link) {
  die("Ошибка подключения: " . mysqli_connect_error());
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbName";

if (!mysqli_query($link, $sql)) {
  echo "Не удалось создать БД";
}

mysqli_close($link);

$link = mysqli_connect($servername, $username, $password, $dbName);

$sql = "CREATE TABLE IF NOT EXISTS mods(
  id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  game VARCHAR(50) NOT NULL,
  name VARCHAR(30) NOT NULL,
  size VARCHAR(10) NOT NULL,
  url VARCHAR(100) NOT NULL
)";

if (!mysqli_query($link, $sql)) {
  echo "Не удалось создать таблицу mods";
}

mysqli_close($link);
?>
