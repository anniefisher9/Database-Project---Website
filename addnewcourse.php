<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Adding Courses</title>
<link rel="stylesheet" type="text/css" href="index.css">
        <link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">


</head>
<body>
<?php
        include 'connectdb.php';
?>

<?php
   $courseName = $_POST["courseName"];
   $courseNum = $_POST["courseNum"];
   $courseSuffix = $_POST["courseSuffix"];
   $courseWeight = $_POST["courseWeight"];	

$query2 = 'SELECT * FROM westernCourses WHERE courseNum = "' . $courseNum . '" ';
$result2 = mysqli_query($connection,$query2);

if ($courseName == NULL || $courseNum == NULL || $courseSuffix == NULL || $courseWeight == NULL){
        echo "WARNING FAILED INSERT: All course feilds must be filled in to add a new course"."<br>" . "<br>";
}
else  if((substr($courseNum, 0,2) != "cs") && (substr($courseNum,0,2) != "CS")){
        echo "WARNING FAILED INSERT: The course number must begin with cs \n"."<br>" . "<br>";
   }
else if($result2->num_rows != 0){
        echo "WARNING FAILED INSERT: The course is already in the database \n"."<br>" . "<br>";
   }
else{	
		
   $query = 'INSERT INTO westernCourses (courseName, weight, suffix, courseNum) values ("' . $courseName . '","' . $courseWeight . '" , "' . $courseSuffix . ' " , "' . $courseNum . ' ")';
   
   if (!mysqli_query($connection, $query)) {
      die("Error: insert failed " . mysqli_error($connection));
   }
   else {
      echo "Course was added!"."<br>";
   }
}
    $query2 = 'select * from westernCourses';
        $result = mysqli_query($connection, $query2);

echo "Current List of Western Courses: " . "<br>"; 
echo "<ul>";        
while ($row = mysqli_fetch_assoc($result)){
                echo '' . $row["courseNum"] . ", " . $row["courseName"] . ", ". $row["suffix"] ." , " . $row["weight"] . " </br>";
        }
echo "</ul>";

   mysqli_close($connection);
?>

<p>
<br>
<a href="index.php">Back to Main Menu</a>
</p>
</body>
</html>

