<?php
$servername = "127.0.0.1";
$username = "root";
$password = "kali";
$dbName1 = "mods";
$dbName2 = "users";

// Подключение к MySQL
$link = mysqli_connect($servername, $username, $password);

if (!$link) {
    die("Ошибка подключения: " . mysqli_connect_error());
}

// Создание базы данных mods
$sql = "CREATE DATABASE IF NOT EXISTS $dbName1";
if (!mysqli_query($link, $sql)) {
    die("Не удалось создать БД $dbName1: " . mysqli_error($link));
}

// Подключение к базе данных mods
$link_mods = mysqli_connect($servername, $username, $password, $dbName1);

// Создание таблицы mods
$sql = "CREATE TABLE IF NOT EXISTS mods (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    game VARCHAR(50) NOT NULL,
    name VARCHAR(30) NOT NULL,
    size VARCHAR(10) NOT NULL,
    url VARCHAR(100) NOT NULL,
    discription VARCHAR(1000) NOT NULL
)";
if (!mysqli_query($link_mods, $sql)) {
    die("Не удалось создать таблицу mods: " . mysqli_error($link_mods));
}

mysqli_close($link_mods);

// Создание базы данных users
$sql = "CREATE DATABASE IF NOT EXISTS $dbName2";
if (!mysqli_query($link, $sql)) {
    die("Не удалось создать БД $dbName2: " . mysqli_error($link));
}

// Подключение к базе данных users
$link_users = mysqli_connect($servername, $username, $password, $dbName2);

// Создание таблицы users
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(15) NOT NULL,
    password VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL
)";
if (!mysqli_query($link_users, $sql)) {
    die("Не удалось создать таблицу users: " . mysqli_error($link_users));
}

mysqli_close($link_users);
mysqli_close($link);
?>
