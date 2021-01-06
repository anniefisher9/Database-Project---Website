<!DOCTYPE html>
<html>
<head>

<title> University Course Database </title>
<link rel="stylesheet" type="text/css" href="index.css">
	<link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">

</head>
<body>
<?php
	include "connectdb.php";
?>

<h1> Western Course Database </h1>
<a name="menu"></a>
<h1>Main Menu:</h1>
<ul>

Search for Western Courses:
<form action="getcourses.php" method="get">
            <table width="280" height="25" >

                <tr><td width="61"><p>Sort by:</p></td>
                <td width="72" height="24"><p>Sort Courses by Number Ascending</p></td>
                <td width="28"><input name="sort" type="radio" value="Course Number Ascending" /></td>

                <td width="75" height="24"><p>Sort Courses by Number Descending</p></td>
                <td width="20"><input name="sort" type="radio" value="Course Number Descending" /></td>
		<td width="72" height="24"><p>Sort Courses by Name Ascending</p></td>
                <td width="28"><input name="sort" type="radio" value="Course Name Ascending" /></td>

                <td width="75" height="24"><p>Sort Courses by Name Descending</p></td>
                <td width="20"><input name="sort" type="radio" value="Course Name Descending" /></td>

            </tr></table>
            
	<input name="searchform1" type="submit" value="Search" class="moreinfobutton" />
</form>   
<br>

<a name="modify_course"></a>
<h2> Modify Course </h2>

<form action="modifycourse.php" method="post"
enctype="multipart/form-data">
Course Number to change: <input type="text" name="courseNum"><br>
Modify course values:<br>
Course Name: <input type="text" name="courseName"><br>
Suffix: <input type="text" name="suffix"><br>
Weight: <input type="text" name="weight"><br>
<input type="submit" value= "Modify Course"><br>

</form>

<a name="delete course"></a>
<h2> Delete a Western Course </h2>
<form action="deletecourse.php" method="post"
enctype="multipart/form-data">
Course Number to Delete: <input type="text" name="courseNumber"><br>
<input type="submit" value="Delete Course"><br>
</form>


<h2> Add a New Western Course </h2>

<form action="addnewcourse.php" method="post"
enctype="multipart/form-data">
Add course values:<br>
Course Number: <input type="text" name="courseNum"><br>
Course Name: <input type="text" name="courseName"><br>
Suffix: <input type="text" name="courseSuffix"><br>
Weight: <input type="text" name="courseWeight"><br>
<input type="submit" value= "Add Course"><br>

</form>


<h2> University Names with no Courses </h2>
<ul>
<?php
$query = 'SELECT DISTINCT officialName, nickname from universities t1 WHERE t1.universityNum NOT IN (SELECT universityNum FROM outsideCourses)';
        
$result = mysqli_query($connection, $query);
        if(!$result){
                die("databases query failed.");
        }
        while ($row = mysqli_fetch_assoc($result)){
                echo "<li>" . $row["officialName"] . ",  " . $row["nickname"] . "  </li>";

        }
        mysqli_free_result($result);

?>
</ul>
<h2> Add an Equivalency </h2>

Outside Course List for Reference 
<br>(Course Number, University Number)
<br>
<?php
$query = 'select * from outsideCourses';
        $result = mysqli_query($connection, $query);
        if(!$result){
                die("databases query failed.");
        }
echo "<ul>";
        while ($row = mysqli_fetch_assoc($result)){
                echo "<li>" . $row["courseCode"] . ",  " . $row["universityNum"] . "  </li>";

        }
echo "</ul>";
?>
<br>

<form action="createeqi.php" method="post"
enctype="multipart/form-data">
What courses do you want to make equivalent? <br>
Western Course Number: <input type="text" name="westernCourse"><br>
Outside Course Number: <input type="text" name="outsideCourse"><br>
University Number of Outside Course: <input type=text' name="universityNum"><br>
<input type="submit" value= "Add Equivalence"><br>


</form>
 
<h2> Find Eqivalencies Created Before a Given Date </h2>
<form action="geteqi.php" method="post"
enctype="multipart/form-data">
Enter a Date (YYYY-MM-DD) : <input type="date" name="date" value="<?php echo date('Y-m-d'); ?>"> <br>
<input type="submit" value="Search Equivalencies"><br>

</form>



<h2> Find Universities Info </h2>

<form action="getuniversityinfo.php" method="post">
Select a University: <br>
<?php
include "getuniversity.php";
?>

<input type="submit" value="Get University Info">
</form>

<h2> See Universities by Province Code </h2>

<form action="getuniversitynames.php" method="post">
Select a Province Code: <br>
<?php
include "getprovincecode.php";
?>

<input type="submit" value="Search">
</form>


<h2> Western Course Information By Course Number </h2>

<form action="getcourseinfo.php" method="post">
Select a Western Course: <br>
<?php
include "getcoursenames.php";
?>

<input type="submit" value="Search">
</form>



</br>
</body>
</html>
