<?php 
    $name       = isset($_POST['name']) ? $_POST['name'] : "";
    $email      = isset($_POST['email']) ? $_POST['email'] : "";
    $pets       = isset($_POST['pets']) ? $_POST['pets'] : "";
    $order      = isset($_POST['order']) ? $_POST['order'] : "";
    $size       = isset($_POST['size']) ? $_POST['size'] : "";
    $clr        = isset($_POST['clr']) ? $_POST['clr'] : "";
    $i_agree    = isset($_POST['i_agree']) ? $_POST['i_agree'] : "";  
    $petname    = isset($_POST['petname']) ? $_POST['petname'] : "";
    $introduction = isset($_POST['introduction']) ? $_POST['introduction'] : "";
 

    $keepPetNames   = [];
    $keepNames      = [];
    for ($i=0; $i < (int)$_POST['pets']; $i++) {  
        $fileNames      = $_FILES['petfile'.$i]['name']; 
        $tmp            = $_FILES['petfile'.$i]["tmp_name"];
        $fileSystem     = uniqid(10000000000).$fileNames;
        $location       = "../assets/img/pets/".$fileSystem; 
        array_push($keepNames,$fileSystem);
        array_push($keepPetNames,$_POST['namepets'.$i]);
        move_uploaded_file($tmp,$location);
    }  

  
    $serverName = "localhost";
    $username = "root";
    $password = "";
    $dbname   = "sidahmed437";

    $conn = mysqli_connect($serverName,$username,$password,$dbname);
    if (!$conn) {
        die('Connection Failed: '.mysqli_connect_error());
    }else{
        $kpN  = json_encode($keepNames);
        $kptN = json_encode($keepPetNames);
        $sql = "INSERT INTO pet_form (user_name, user_email,pets, order_amount,size, color,i_agree, pet_file, namepets, petname, introduction,status) 
        VALUES 
        ('$name', '$email','$pets', '$order','$size', '$clr','$i_agree', '$kpN','$kptN', '$petname', '$introduction', 'Submit')"; 
        if (mysqli_query($conn,$sql)) {
            header('location: ../index.php');
        }else{
            echo "Error: ". $sql ."<br>". mysqli_error($conn);
        }

        mysqli_close($conn);
    }

 