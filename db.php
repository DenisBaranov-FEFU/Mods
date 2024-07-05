<?php
$servername = "127.0.0.1";
$username = "root";
$password = "kali";
$dbName = "mods";

$link = mysqli_connect($servername, $username, $password);

if (!link) {
  die("Ошибка подключения: " . mysqli_connection_error());
}

$sql = "CREATE DATABASE IF NOT EXIST $dbName";

if (!mysqli_query($link, $sql)) {
  echo "Не удалось создать БД";
}

mysqli_close($link);

$link = mysqli_connect($servername, $username, $password, $dbName);

$sql = "CREATE TABLE IF NOT EXISTS mods(
  game  INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name VARCHAR(30) NOT NULL,
  rating VARCHAR(10) NOT NULL,
  downloads VARCHAR(10) NOT NULL
)";


if(!mysqli_qyery($link, $sql)) {
  echo "Не удалось создать таблицу mods";
}

mysqli_close($link);


?>