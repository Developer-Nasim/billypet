<?php


$serverName = "localhost";
$username = "root";
$password = "";
$dbname   = "sidahmed437";

    $conn = mysqli_connect($serverName,$username,$password,$dbname);

    if (!$conn) {
        die('connection failed: '. mysqli_connect_error());
    }





