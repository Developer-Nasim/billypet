<?php


    session_start();
    
    $serverName = "localhost";
    $username = "u7cishq6mgylg";
    $password = "$7c2bb&&32?1";
    $dbname   = "dbklast5fyb3ps";

    $conn = mysqli_connect($serverName,$username,$password,$dbname);
    if (!$conn) {
        die('Connection Failed: '.mysqli_connect_error());
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $name = $_POST['name'];
        $password = $_POST['password'];
        $sql = "select *from users where name = '$name' and password = '$password'";  
        $result = mysqli_query($conn, $sql);   
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);
        if ($count > 0) { 
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_email'] = $row['img'];
            $_SESSION['user_email'] = $row['password'];
            header("Location: ../dashboard.php");
        }else{
            echo "failed";
        }
    }


 





