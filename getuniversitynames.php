<!DOCTYPE html>
<html>
<head>

<title>University Names</title>
<link rel="stylesheet" type="text/css" href="index.css">
        <link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">


</head>
<body>
<?php
        include 'connectdb.php';
?>

<?php
include "connectdb.php";

        $province = $_POST['provincecode'];
        echo $province;
        $query = 'SELECT officialName, nickname FROM universities WHERE provinceCode = "' . $province .'"';
        $result = mysqli_query($connection, $query);

        if(!$result){
                die("databases query failed.");
        }
        echo "<ul>";
        while ($row = mysqli_fetch_assoc($result)){
                echo "<li>" . $row["officialName"] . ",  " . $row['nickname'] . "  </li>";
        }
echo "<br>";
echo "</ul>";
        mysqli_free_result($result);
?>

<p>
<br>
<a href="index.php">Back to Main Menu</a>
</p>
</body>
</html>


