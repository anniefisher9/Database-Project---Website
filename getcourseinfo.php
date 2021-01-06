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

        $course = $_POST['course'];
        echo $course;
        $query = 'SELECT courseNum, courseName, weight FROM westernCourses WHERE courseNum = "' . $course . '"';
        $result = mysqli_query($connection, $query);

        
	 $query2 = 'SELECT t1.outsideCourseCode, 
			t2.courseName, 
			t2.weight, 
			t1.date, 	
			t3.officialName FROM equivalent t1 
INNER JOIN outsideCourses t2 ON t1.outsideCourseCode = t2.courseCode 
INNER JOIN universities t3 ON t2.universityNum = t3.universityNum WHERE t1.westernCourseNum = "' . $course . '"';

        $result2 = mysqli_query($connection,$query2);

	if(!$result || !$result2){
                die("databases query failed.");
        }
        echo "<ul>";
        while ($row = mysqli_fetch_assoc($result)){
                echo "<li>" . $row["courseNum"] . ",  " . $row['courseName'] . ", " . $row["weight"] . "  </li>";
        }
echo "<br>";
echo "</ul>";

Echo "Equivalent Courses: " . "<br>";
echo "<br>";
if ($result2->num_rows == 0){
	echo "No equivalent courses" . "<br>";
}
	
echo "<ul>";
        while ($row = mysqli_fetch_assoc($result2)){
                echo "<li>" . $row["outsideCourseCode"] . ",  " . $row['courseName'] . ", " . $row["weight"] . ", " . $row["date"] . ", " . $row["officialName"] . "   </li>";
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


