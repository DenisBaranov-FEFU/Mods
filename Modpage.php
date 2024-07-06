

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Мод</title>

    <!-- Link to Bootstrap CSS and Bootstrap Icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- Link to custom CSS -->
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
   
<?php 
	$link = mysqli_connect('127.0.0.1', 'root', 'kali', 'mods');

	$sql = "SELECT * FROM mods";
	$res = mysqli_query($link, $sql);

		if (mysqli_num_rows($res) >  0) {
            while ($post = mysqli_fetch_array($res)) {
                echo "<a href='/Mod.php?id=" . $post["id"] . "'>" . $post['game'] . "</a><br>";
            }
           } else {
                echo "Записей пока нет";
           }

?>
   
</body>
</html>

 