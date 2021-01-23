<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "users";

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn){
    die("Error: Connecting with the database" . mysqli_connect_error());
}
else{
    // echo "Connection established successfully.";
}


?>