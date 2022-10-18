<?php
    session_start();
    include_once "header.php";
    if (isset($_SESSION['user_name'])) {
        header('location: dashboard.php'); 
    } 

  
?>
       
        <!-- billyPet -->
        <div class="billyPet">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 text-center">
                        <form class="loginForm" action="./incs/login.php" method="POST">
                            <h2>Login</h2>
                            <label for="#">
                                Username
                                <input type="text" placeholder="username.." name="name" id="">
                            </label>
                            <label for="#">
                                Password
                                <input type="password" placeholder="***" name="password" id="">
                            </label>
                            <button type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- billyPet -->
        

<?php 
    include_once "footer.php";
?>