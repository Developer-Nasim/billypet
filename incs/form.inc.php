<?php 
    $name       = isset($_POST['name']) ? $_POST['name'] : "";
    $email      = isset($_POST['email']) ? $_POST['email'] : "";
    $pets       = isset($_POST['pets']) ? $_POST['pets'] : "";
    $order      = isset($_POST['order']) ? $_POST['order'] : "";
    $size       = isset($_POST['size']) ? $_POST['size'] : "";
    $clr        = isset($_POST['clr']) ? $_POST['clr'] : "";
    $i_agree    = isset($_POST['i_agree']) ? $_POST['i_agree'] : "";
    $petFile    = isset($_POST['petFile']) ? $_POST['petFile'] : "";
    $namepets   = isset($_POST['namepets']) ? $_POST['namepets'] : "";  
    $petname    = isset($_POST['petname']) ? $_POST['petname'] : "";
    $introduction = isset($_POST['introduction']) ? $_POST['introduction'] : "";


    $keepNames = [];
    if (isset($_FILES['petFile']['name'])) {
         
        $fileNames = $_FILES['petFile']['name'];
        $inOrder = (int)$order;
        
        if (count($fileNames) >= $pets) {
            for ($i=0; $i < $pets ; $i++) { 
                $tmp = $_FILES['petFile']["tmp_name"][$i];
                $fileSystem = uniqid(10000000000).$fileNames[$i];
                $location     = "../assets/img/uploaded_photo/".$fileSystem;
                array_push($keepNames,$fileSystem);
                
                move_uploaded_file($tmp,$location);
            }
        }else { 
            foreach ($fileNames as $key => $value) {
                $tmp = $_FILES['petFile']["tmp_name"][$key];
                $fileSystem = uniqid(10000000000).$fileNames[$key];
                $location     = "../assets/img/uploaded_photo/".$fileSystem;
                array_push($keepNames,$fileSystem);
                
                move_uploaded_file($tmp,$location);
            } 
        }
    }
      

    $serverName = "localhost";
    $username = "root";
    $password = "";
    $dbname   = "sidahmed437";

    $conn = mysqli_connect($serverName,$username,$password,$dbname);
    if (!$conn) {
        die('Connection Failed: '.mysqli_connect_error());
    }else{
        $jsn = json_encode($keepNames);
        $sql = "INSERT INTO pet_form (user_name, user_email,pets, order_amount,size, color,i_agree, pet_file, namepets, petname, introduction) 
        VALUES 
        ('$name', '$email','$pets', '$order','$size', '$clr','$i_agree', '$jsn','$namepets', '$petname', '$introduction')"; 
        if (mysqli_query($conn,$sql)) {
            header('location: ../index.php');
        }else{
            echo "Error: ". $sql ."<br>". mysqli_error($conn);
        }

        mysqli_close($conn);
    }

 