<!DOCTYPE html>

<!-- PHP code for handling form submission and displaying results -->
    <?php
    require_once('db.php'); // Including the database connection file

    $link = mysqli_connect('127.0.0.1', 'root', 'kali', 'mods'); // Connecting to the database
	
	$id = $_GET['id'];

	$sql = "SELECT * FROM posts WHERE id=$id";

	$res = mysqli_query($link, $sql);
  
	$rows = mysqli_fetch_array($res);
	$name = $rows['name'];
	$discription = $rows['discription'];

    ?>

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
   
<? php 
		echo "<h1>$name</h1>";
		echo "<p>$discription</p>";
?>
   
</body>
</html>

 