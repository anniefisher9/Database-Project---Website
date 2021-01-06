<?php

$query = 'select * from universities t1 OUTER JOIN outsideCourses t2 ON t1.universityNum=t2.universityNum';
	$result = mysqli_query($connection, $query);
	if(!$result){
		die("databases query failed.");
	}
	while ($row = mysqli_fetch_assoc($result)){
		echo '<input type ="radio" name = "names" value= "';
		echo $row["officialName"];
		echo '">' . $row["officialName"] . ", " . $row["nickname"] . " </br>";
	}
	mysqli_free_result($result);
?> 
