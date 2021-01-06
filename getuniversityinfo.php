<!DOCTYPE html>
<html>
<head>

<title>Get University Info</title>
<link rel="stylesheet" type="text/css" href="index.css">
        <link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">



</head>
<body>
<?php
        include 'connectdb.php';
?>




<?php
include "connectdb.php";
	
	$pick = $_POST['code'];
	echo $pick;
	$query = 'SELECT * FROM universities WHERE officialName = "' . $pick .'"';
	$result = mysqli_query($connection, $query);
	
	$query2 = 'SELECT * FROM outsideCourses t1 INNER JOIN universities t2 ON t1.universityNum = t2.universityNum WHERE t2.officialName = "' . $pick . '"';
	$result2 = mysqli_query($connection, $query2);
	if(!$result || !result2){
		die("databases query failed.");
	}
	echo "<ul>";
	while ($row = mysqli_fetch_assoc($result)){
		echo "<li>" . $row["officialName"] . ", " . $row["universityNum"] . ", ". $row["city"] ." , ". $row['provinceCode'] . " , " . $row['nickname'] . "  </li>";
	}
echo "<br>";
echo "</ul>";

echo "Courses at the University: " . "<br>";

if($result2->num_rows == 0){
	echo "There are no courses at this university" ."<br>";
}

echo "<ul>";
	while ($row = mysqli_fetch_assoc($result2)){
                echo "<li>" . $row["courseCode"] . ", " . $row["courseName"] . ", ". $row["weight"] ." , ". $row['yearOfStudents'] . " , " . $row['universityNum'] . "  </li>";
        }
        
	
echo "</ul>";
	mysqli_free_result($result);
?>

<p>
<br>
<a href="index.php">Back to Main Menu</a>
</p>
</body>
</html>



