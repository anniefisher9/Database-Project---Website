
<?php

include "connectdb.php";

$query = 'SELECT courseNum, courseName FROM westernCourses ORDER BY courseNum';
$result = mysqli_query($connection, $query);

if(!result){
        die("Failed query");
}

while($row = mysqli_fetch_assoc($result)){

        echo '<input type = "radio" name = "course" value = "';
        echo $row["courseNum"];
        echo '">'.$row["courseNum"].' '.'<br>';


}
mysqli_free_result($result);
?>
