<?php 
    $name       = isset($_POST['name']) ? $_POST['name'] : "";
    $email      = isset($_POST['email']) ? $_POST['email'] : "";
    $characters = isset($_POST['characters']) ? $_POST['characters'] : "";
    $order      = isset($_POST['order']) ? $_POST['order'] : "";
    $size       = isset($_POST['size']) ? $_POST['size'] : "";
    $clr        = isset($_POST['bgClrs']) ? $_POST['bgClrs'] : "";
    $i_agree    = isset($_POST['i_agree']) ? $_POST['i_agree'] : ""; 
    $notes      = isset($_POST['note']) ? $_POST['note'] : "";


    $keepNames = [];
    if (isset($_FILES['files']['name'])) {
         
        $fileNames = $_FILES['files']['name'];
        $inOrder = (int)$order;
        
        if (count($fileNames) >= $characters) {
            for ($i=0; $i < $characters ; $i++) { 
                $tmp = $_FILES['files']["tmp_name"][$i];
                $fileSystem = uniqid(10000000000).$fileNames[$i];
                $location     = "../assets/img/faceless/".$fileSystem;
                array_push($keepNames,$fileSystem);
                
                move_uploaded_file($tmp,$location);
            }
        }else { 
            foreach ($fileNames as $key => $value) {
                $tmp = $_FILES['files']["tmp_name"][$key];
                $fileSystem = uniqid(10000000000).$fileNames[$key];
                $location     = "../assets/img/faceless/".$fileSystem;
                array_push($keepNames,$fileSystem);
                
                move_uploaded_file($tmp,$location);
            } 
        }
    }
      

    $serverName = "localhost";
    $username = "u7cishq6mgylg";
    $password = "$7c2bb&&32?1";
    $dbname   = "dbklast5fyb3ps";

    $conn = mysqli_connect($serverName,$username,$password,$dbname);
    if (!$conn) {
        die('Connection Failed: '.mysqli_connect_error());
    }else{
        $jsn = json_encode($keepNames);
        $sql = "INSERT INTO faceless (user_name, user_email, characters, order_amount, size, color, i_agree, files, notes, status) 
        VALUES 
        ('$name', '$email','$characters', '$order','$size', '$clr','$i_agree', '$jsn', '$notes', 'Submit')"; 
        if (mysqli_query($conn,$sql)) {
            header('location: ../index.php');
        }else{
            echo "Error: ". $sql ."<br>". mysqli_error($conn);
        }

        mysqli_close($conn);
    }

 