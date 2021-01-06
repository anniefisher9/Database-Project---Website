<!DOCTYPE html>
<html>
<head>
<title>Course Added!</title>
<link rel="stylesheet" type="text/css" href="index.css">
        <link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">


</head>
<body>
<?php
        include 'connectdb.php';
?>

<?php
   $outsideCourse = $_POST["outsideCourse"];
   $westernCourse = $_POST["westernCourse"];
   $date  = date("Y-m-d"); 
   $universityNum = $_POST["universityNum"];
   
	
   $query2 = 'SELECT * FROM equivalent WHERE westernCourseNum = "' . $westermCourse . '" AND universityNum = "' . $universityNum . '" AND  outsideCourseCode = "' . $outsideCourse . '"';
	
   $result2 = mysqli_query($connection, $query2);

   $query3 = 'SELECT * FROM westernCourses WHERE courseNum = "' . $westernCourse . '"';

   $result3 = mysqli_query($connection, $query3);

   $query4 = 'SELECT * FROM outsideCourses WHERE courseCode = "' . $outsideCourse . '" AND universityNum = "' . $universityNum .' "';
	
   $result4 = mysqli_query($connection, $query4);

   if($result3->num_rows == 0 || $result4->num_rows == 0){
        echo "ERROR: the course is not a valid course!" ."<br>";
   }
   else if($result2->num_rows != 0){
	$queryUpdate = 'UPDATE equivalent SET date = "'. $date . ' " WHERE westernCourseNum = "'. $westernCourse . '" AND outsideCourseCode = "' . $outsideCourse . '" AND universityNum = "' . $universityNum . '"';
	$resultUpdate = mysqli_query($connection, $queryUpdate);
	echo "Updated the date of an already existing equivalency" . "<br>";
   }
   else {
	$query = 'INSERT INTO equivalent (westernCourseNum, outsideCourseCode, universityNum, date) values ("' . $westernCourse . '","' . $outsideCourse . '" , " ' . $universityNum . '" , " ' . $date . ' ")';

   $result = mysqli_query($connection, $query);
	echo 'Equivalency was added!' ."<br>";
}

echo "<br>". 'FORMAT - Western Course, Outside Course, University Number, Date Created' . "<br>";
$query = 'select * from equivalent';
        $result = mysqli_query($connection, $query);
        if(!$result){
                die("databases query failed.");
        }
echo "<br>";
echo "Equivalent Courses" . "<br>";
        while ($row = mysqli_fetch_assoc($result)){
                echo '<input type ="radio" name = "course" value= "';
                echo $row["westernCourseNum"];
                echo '">' . $row["westernCourseNum"] . ", " . $row["outsideCourseCode"] . ", ". $row["universityNum"] ." , " . $row['date'] . " </br>";
        }


   mysqli_close($connection);
?>


<!-- Hyperlink to take back to main menu. -->
<p>
<br>
<a href="index.php">Back to Main Menu</a>
</p>
</body>
</html>

