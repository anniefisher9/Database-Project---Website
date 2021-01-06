<!DOCTYPE html>
<html>
<head>

<title>Grad Secretary Control Panel</title>
<link rel="stylesheet" type="text/css" href="index.css">
        <link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">


</head>
<body>
<?php 
include 'connectdb.php';
?>


<?php
session_start();
$courseNumber = $_SESSION['courseNumber'];
$answer = $_POST['answer'];

if ($answer == 'n' || $answer == 'N' || $answer == 'no' || $answer == ' NO' || $answer == 'No'){
        echo 'Deletion cancelled'."<br>";
}
else if($answer == 'y' || $answer == 'Y' || $answer == 'Yes' || $answer == 'yes' || $answer == 'YES'){
        $query = 'DELETE FROM westernCourses WHERE courseNum = "' . $courseNumber . '" ';
        $result = mysqli_query($connection,$query);

	 echo "Course was successfully deleted" . "<br>";
}
else{
        echo "Not a valid input - Deletion Cancelled" . "<br>";
}

$query2 = 'SELECT * FROM westernCourses';
$result2 = mysqli_query($connection,$query2);

echo "<br>";
echo "Current List of Western Courses: " . "<br>";
echo "<ul>";
while ($row = mysqli_fetch_assoc($result2)){
                echo '' . $row["courseNum"] . ", " . $row["courseName"] . ", ". $row["suffix"] ." , " . $row["weight"] . " </br>";
        }
echo "</ul>";



?>

<p>
<a href="index.php">Back to Menu</a>
<hr>
</p>

</body>
</html>
