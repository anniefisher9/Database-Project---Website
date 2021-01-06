<!DOCTYPE html>
<html>
<head>

<title>Get Courses</title>
<link rel="stylesheet" type="text/css" href="index.css">
        <link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">


</head>
<body>
<?php
   include 'connectdb.php';
?>

<?php
		
include ("connectdb.php");
	
if($_GET['sort'] == 'Course Name Ascending'){
	$query = "SELECT * FROM westernCourses ORDER BY courseName ASC";       
	$result = mysqli_query($connection,$query);

echo "Courses by Name in Ascending Order" ."<br>";
	while ($row = mysqli_fetch_assoc($result)){
		echo '<input type ="radio" name = "course" value= $row["courseNum"] ';
		echo $row["courseNum"];
		echo '">' . $row["courseName"] . ", " . $row["courseNum"] . ", " . $row["weight"] . " ,  ". $row["suffix"] ." </br>";
	}		

}
else if($_GET['sort'] == 'Course Name Descending'){
        $query = "SELECT * FROM westernCourses ORDER BY courseName DESC";
        $result = mysqli_query($connection,$query);

echo "Courses by Name in Descending Order" ."<br>";
        while ($row = mysqli_fetch_assoc($result)){
                echo '<input type ="radio" name = "course" value=$row["courseNum"] ';
                echo $row["courseNum"];
                echo '">' . $row["courseName"] . ", " . $row["courseNum"] . ", ". $row["suffix"] ." , " . $row["weight"] . "  </br>";
  }
}
else if($_GET['sort'] == 'Course Number Ascending'){
        $query = "SELECT * FROM westernCourses ORDER BY courseNum ASC";
        $result = mysqli_query($connection,$query);

echo "Courses by Number in Ascending Order" ."<br>";
        while ($row = mysqli_fetch_assoc($result)){
        	echo '<input type ="radio" name = "course" value=$row["courseNum"] ';
                echo $row["courseNum"];
                echo '">' . $row["courseNum"] . ", " . $row["courseName"] . ", ". $row["suffix"] ." , " . $row["weight"] . " </br>";
 }
        
}
else if($_GET['sort'] == 'Course Number Descending'){
        $query = "SELECT * FROM westernCourses ORDER BY courseNum DESC";
        $result = mysqli_query($connection,$query);

echo "Course by Number in Descending Order" ."<br>";
        while ($row = mysqli_fetch_assoc($result)){
                echo '<input type ="radio" name = "course" value=$row["courseNum"] ';
                echo $row["courseNum"];
                echo '">' . $row["courseNum"] . ", " . $row["courseName"] . ", ". $row["suffix"] ." , " . $row["weight"] . " </br>";
}
                
}
?>

<p>
<br>
<a href="index.php">Back to Main Menu</a>
</p>
</body>
</html>
