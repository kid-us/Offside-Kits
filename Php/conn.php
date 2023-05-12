<?php

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "ecommerce-store";
// $dbName = "db_test";


$conn = mysqli_connect ($serverName, $userName, $password, $dbName);
if($conn){
}
else{
    echo "Not Connected";
}

?>