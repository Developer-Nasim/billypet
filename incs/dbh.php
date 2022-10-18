<?php

    $serverName = "localhost";
    $username = "u7cishq6mgylg";
    $password = "$7c2bb&&32?1";
    $dbname   = "dbklast5fyb3ps";

    $conn = mysqli_connect($serverName,$username,$password,$dbname);

    if (!$conn) {
        die('connection failed: '. mysqli_connect_error());
    }





