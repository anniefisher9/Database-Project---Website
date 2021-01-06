<!DOCTYPE html>
<html>
<head>

<title>Modify Course</title>
<link rel="stylesheet" type="text/css" href="index.css">
        <link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">


</head>
<body>
<?php
   include 'connectdb.php';
?>

<?php

	$name = $_POST["courseName"];
	$suffix = $_POST["suffix"];
	$weight = $_POST["weight"];
	$courseNum = $_POST["courseNum"];
	

	$query = 'UPDATE westernCourses SET ';

	if (($suffix != NULL) && ($weight == NULL) && ($name == NULL)) {
 		$query = $query.'suffix= "'.$suffix.'" where courseNum = "' . $courseNum . ' "';
	}
	else if (($suffix != NULL) && ($weight != NULL) && ($name == NULL)) {
  		$query = $query.'weight= "'.$weight.'", suffix = "' .$suffix. ' "  where courseNum = "' . $courseNum .' "';
	}
	 else if (($suffix != NULL) && ($weight != NULL) && ($name != NULL)) {
                $query = $query.'weight= "'.$weight.'", suffix = "' .$suffix. ' ", courseName = " ' . $name . ' "  WHERE courseNum = "' . $courseNum . ' " ';

        }
	else if (($weight != NULL) && ($suffix == NULL) && ($name == NULL)) {
                $query = $query.'weight= "'.$weight.'" where courseNum = "' . $courseNum . ' "';
        }       
        else if (($name != NULL) && ($weight != NULL) && ($suffix == NULL)) {
                $query = $query.'weight= "'.$weight.'",courseName = "' .$name.' "  where courseNum = "' . $courseNum .' "';
        }

	else if (($name != NULL) && ($suffix == NULL) && ($weight == NULL)) {
                $query = $query.'courseName= "'.$name.'" where courseNum = "' . $courseNum . ' "';
        }       
        else if (($name != NULL) && ($suffix != NULL) && ($weight == NULL)) {
                $query = $query.'courseName= "'.$name.'", suffix = "' .$suffix.' "  where courseNum = "' . $courseNum .' "';
        }

	else{
		die("");

	}	
	if($result = mysqli_query($connection,$query)){
		echo "Course successfull modified!" ."<br>" ."<br>";
			
	}
	else{

		die("Error: update failed");
	}

 
	$query2 = 'select * from westernCourses';
	$result = mysqli_query($connection, $query2);

echo "List of Western Courses" . "<br>";
	while ($row = mysqli_fetch_assoc($result)){
		echo '<input type ="radio" name = "courseNum" value= $row["courseNum"] ';
                echo $row["courseNum"];
                echo '">' . $row["courseName"] . ", " . $row["courseNum"] . ", ". $row["suffix"] ." , " . $row["weight"] . " </br>";
	}


	mysqli_close($connection);
?>

<p>
<br>
<a href="index.php">Back to Main Menu</a>
</p>

</body>

</html>
