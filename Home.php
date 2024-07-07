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
            <div class="row form__reg mb-3">
                <div class="col">
                    <select class="form-control" name="game">
                        <option value="">Выберите игру</option>
                        <?php
                        require_once('db.php'); // Including the database connection file
                        $link = mysqli_connect('127.0.0.1', 'root', 'kali', 'mods'); // Connecting to the database
                        $games_result = mysqli_query($link, "SELECT DISTINCT game FROM mods");
                        while ($game_row = mysqli_fetch_assoc($games_result)) {
                            echo "<option value=\"{$game_row['game']}\">{$game_row['game']}</option>";
                        }
                        ?>
						
						<div class="col"><input class="form-control" type="number" name="min_rating" placeholder="Рейтинг от (0-5)"></div>
                <div class="col"><input class="form-control" type="number" name="max_rating" placeholder="Рейтинг  до (0-5)"></div>
                <div class="col"><input class="form-control" type="number" name="down_count" placeholder="Кол-во скачиваний"></div>
                <div class="col"><input class="form-control" type="number" name="size" placeholder="Вес в МБ"></div>
                <div class="col">
						
                    </select>
                </div>
                
                    <button type="submit" class="btn btn-primary w-100" name="search">Искать!</button>
                </div>
            </div>
        </form>
    </div>

    <!-- PHP code for handling form submission and displaying results -->
    <?php
    if (isset($_POST['search'])) { // Checking if the search button was clicked
        $min_rating = $_POST['min_rating'];
        $max_rating = $_POST['max_rating'];
        $down_count = $_POST['down_count'];
        $size = $_POST['size'];
        $game = $_POST['game'];

        // SQL query to fetch data from the database
        $sql = "SELECT * FROM mods WHERE 1=1";

        // Adding conditions to the SQL query based on user input
        if (!empty($min_rating)) {
            $sql .= " AND rating >= $min_rating";
        }
        if (!empty($max_rating)) {
            $sql .= " AND rating <= $max_rating";
        }
        if (!empty($down_count)) {
            $sql .= " AND down_count >= $down_count";
        }
        if (!empty($size)) {
            $sql .= " AND size <= $size";
        }
        if (!empty($game)) {
            $sql .= " AND game = '$game'";
        }

        $result = mysqli_query($link, $sql); // Executing the SQL query

        if (mysqli_num_rows($result) > 0) { // Checking if any results were returned
            echo "<div class='container mt-4'>";
            echo "<table class='table table-dark table-bordered'>";
            echo "<thead><tr><th>Игра</th><th>Название мода</th><th>Описание</th><th>Размер (МБ)</th></tr></thead><tbody>";
            while ($row = mysqli_fetch_assoc($result)) { // Displaying the results in a table
                echo "<tr><td>{$row['game']}</td><td><a href='/Mod.php?id={$row['id']}'>{$row['name']}</a></td><td>{$row['discription']}</td><td>{$row['size']}</td></tr>";
            }
            echo "</tbody></table></div>";
        } else {
            echo "<div class='container mt-4'><p>Нет результатов по заданным критериям.</p></div>";
        }
    }
    ?>
</body>
</html>
