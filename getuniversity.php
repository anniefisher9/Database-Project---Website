


<?php
include "connectdb.php";

$query = 'SELECT * FROM universities ORDER BY provinceCode';
$result = mysqli_query($connection, $query);

if(!result){
	die("Failed query");
}

while($row = mysqli_fetch_assoc($result)){
	
	echo '<input type = "radio" name = "code" value = "';
	echo $row["officialName"];
  	echo '">'.$row["officialName"].' '.'<br>';

}
mysqli_free_result($result);
?>
