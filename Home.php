<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Моды</title>

    <!-- Link to Bootstrap CSS and Bootstrap Icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- Link to custom CSS -->
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <!-- Page title -->
    <h1>Сортировка модификаций</h1>
    <div class="container">
        <!-- Search form -->
        <form method="POST">
            <div class="row form__reg"><input class="form-control" type="number" name="min_rating" placeholder="Минимальный рейтинг (0-5)"></div>
            <div class="row form__reg"><input class="form-control" type="number" name="max_rating" placeholder="Максимальный рейтинг (0-5)"></div>
            <div class="row form__reg"><input class="form-control" type="number" name="url" placeholder="Ссылка"></div>
            <div class="row form__reg"><input class="form-control" type="number" name="size" placeholder="Вес в МБ"></div>
            <button type="submit" class="btn btn-primary" name="search">Искать!</button>
        </form>
    </div>

    <!-- PHP code for handling form submission and displaying results -->
    <?php
    require_once('db.php'); // Including the database connection file

    $link = mysqli_connect('127.0.0.1', 'root', 'kali', 'mods'); // Connecting to the database

    if (isset($_POST['search'])) { // Checking if the search button was clicked
        $min_rating = $_POST['min_rating'];
        $max_rating = $_POST['max_rating'];
        $url = $_POST['url'];
        $size = $_POST['size'];

        // SQL query to fetch data from the database
        $sql = "SELECT * FROM mods WHERE 1=1";

        // Adding conditions to the SQL query based on user input
        if (!empty($min_rating)) {
            $sql .= " AND rating >= $min_rating";
        }
        if (!empty($max_rating)) {
            $sql .= " AND rating <= $max_rating";
        }
        if (!empty($url)) {
            $sql .= " AND url >= $url";
        }
        if (!empty($size)) {
            $sql .= " AND size <= $size";
        }

        $result = mysqli_query($link, $sql); // Executing the SQL query

        if (mysqli_num_rows($result) > 0) { // Checking if any results were returned
            echo "<div class='container mt-4'>";
            echo "<table class='table table-bordered'>";
            echo "<thead><tr><th>Игра</th><th>Название мода</th><th>Ссылка на скачивание</th><th>Размер (МБ)</th></tr></thead><tbody>";
            while ($row = mysqli_fetch_assoc($result)) { // Displaying the results in a table
                echo "<tr><td>{$row['<a href='/Mod.php?id=" . $post["id"] . "'>" . $post['game'] . "</a><br>']}</td><td>{$row['name']}</td><td>{$row['url']}</td><td>{$row['size']}</td></tr>";
            }
            echo "</tbody></table></div>";
        } else {
            echo "<div class='container mt-4'><p>Нет результатов по заданным критериям.</p></div>";
        }
    }
    ?>
</body>
</html>
