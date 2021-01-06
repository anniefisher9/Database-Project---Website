<!DOCTYPE html>
<html>
<head>

<title> Delete a Western Course </title>
<link rel="stylesheet" type="text/css" href="index.css">
        <link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">


</head>
<body>
<?php
   include 'connectdb.php';
?>



<?php
session_start();
$courseNumber = $_POST['courseNumber'];
$_SESSION['courseNumber'] = $courseNumber;


$query2 = 'SELECT * FROM equivalent WHERE westernCourseNum = "' . $courseNumber . ' " ';

$result = mysqli_query($connection,$query2);

$query3 = 'SELECT * FROM westernCourses WHERE courseNum = "' . $courseNumber . ' " ';

$result3 = mysqli_query($connection,$query3);

if($result->num_rows != 0){
        echo "This course has equivalent courses at other universities" ."<br>";
}
else if($result3->num_rows == 0){
	die("ERROR course is not a valid course number");
}
?>


<form action="deletecourse2.php" method="post"
enctype="multipart/form-data">
Are you sure you want to delete this course? (Y/N): <input type="text" name="answer"><br>
<input type='hidden' name='courseNumber' value='<? php echo "$courseNumber";?>'/> 
<input type="submit" value= "Delete Course"><br>

</form>


<p>
<br>
<a href="index.php">Back to Main Menu</a>
</p>


</body>
</html>



