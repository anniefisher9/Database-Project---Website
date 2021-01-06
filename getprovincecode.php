
<?php

include "connectdb.php";

$query = 'SELECT DISTINCT provinceCode FROM universities ORDER BY provinceCode';
$result = mysqli_query($connection, $query);

if(!result){
        die("Failed query");
}

while($row = mysqli_fetch_assoc($result)){

        echo '<input type = "radio" name = "provincecode" value = "';
        echo $row["provinceCode"];
        echo '">'.$row["provinceCode"].' '.'<br>';

}
mysqli_free_result($result);
?>

