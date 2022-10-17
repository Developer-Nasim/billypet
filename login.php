<?php
    include_once "header.php";
    
 for ($i=0; $i < 2; $i++) { 
    echo $i;
 }

?>
       
        <!-- billyPet -->
        <div class="billyPet">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 text-center">
                        <form class="loginForm">
                            <h2>Login</h2>
                            <label for="#">
                                Username
                                <input type="text" placeholder="username.." name="" id="">
                            </label>
                            <label for="#">
                                Password
                                <input type="password" placeholder="***" name="" id="">
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