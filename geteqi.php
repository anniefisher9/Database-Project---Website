<!DOCTYPE html>
<html>
<head>
<title>Get Eqivalencies</title>
<link rel="stylesheet" type="text/css" href="index.css">
        <link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">


</head>
<body>
<?php
   include 'connectdb.php';
?>

<?php

$date = $_POST['date'];

$query = 'SELECT t1.westernCourseNum, 
		t2.courseName, 
		t2.weight, 
		t1.outsideCourseCode, 
		t3.courseName,
		t3.weight, 
		t1.universityNum, 
		t1.date FROM equivalent 
t1 INNER JOIN westernCourses t2 ON t1.westernCourseNum = t2.courseNum 
INNER JOIN outsideCourses t3 ON t1.outsideCourseCode = t3.courseCode WHERE t1.date <= "' . $date .'"';

$result = mysqli_query($connection,$query);

if($result->num_rows == 0){
	echo "No equivalences made on or before the date selected" ."<br>";
}
else{
	echo "<h2>Equivalencies Before Given Date : </h2>" . "<br>";
	echo "Date Selected : " . $date;
	echo "<br>" .'FORMAT - Western Course INFO - Outside Course INFO - Date of Equivalence' . "<br>";
	echo "<br>";
	echo "<ul>";
	while ($row = mysqli_fetch_assoc($result)){
		echo '<li>' . $row["westernCourseNum"] . ", " . $row["courseName"] . ", ". $row["weight"] .", " . $row["outsideCourseCode"] . ", " . $row["courseName"] . ", " . $row['weight'] . ", " . $row["universityNum"] . ", " . $row["date"] .  "</li>" ." </br>";
	}
echo "<ul>";
}

mysqli_free_result($result);

?>

<p>
<a href="index.php">Back to Menu</a>
<br><br><br>
</p>

</body>
</html>
