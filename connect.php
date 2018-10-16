<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "telefoni";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

//utf-8
mysqli_set_charset($conn,'utf8');

// Check connection
if (mysqli_connect_errno($conn)) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>