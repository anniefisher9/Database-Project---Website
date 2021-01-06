<!DOCTYPE html>
<html>
<head>

<title> Western Courses </title>
<link rel="stylesheet" type="text/css" href="index.css">
        <link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">


</head>
<body>

<?php
	include 'connetdb.php';
?>

<h1> Courses at Western </h1>

<form action = "westerncourses.php" method="post"
enctype = "multipart/form-data">
<br>
<?php
	include "getcourses.php';
?>

<input type="submit" value = "Find Course">
</form>
<?php>
mysqli_close($connection);
?>

</body>
</html>
