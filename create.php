<?php
 require 'conn.php';

if (isset($_POST['submit'])) {
    $userName = $conn ->real_escape_string($_POST['userName']);
    $email = $conn -> real_escape_string($_POST['email']);
    $password = $conn -> real_escape_string($_POST['password']);
    $confirm = $conn -> real_escape_string($_POST['confirmpassword']);
    $hashed_password = password_hash($Password,PASSWORD_DEFAULT);

    if ($userName == 1) {
        echo 'userame already exist';
    }else{
        if ($Password = $confirm) {
            $insertUser = "INSERT INTO users(userName, email, password ) VALUES ('$userName','$email','$hashed_password')";
            
            $queryUser = mysqli_query($conn, $insertUser);

            if ($queryUser == TRUE) {
                header('location:login.php');
            }
        }else{
            echo 'password does not match';
        }
    }
}
?>
<!DOCTYPE html>

<html>
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>Registration</title>
            <meta name="description" content="">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="css/bootstrap.css  ">
            <link rel="stylesheet" href="css/style.css">
        </head>
        <body>
            <div class="container">
                    <div class="log-form text-center">
                        <form action="" method="post" class="form">
                            <div class="text-center">
                            <a href="#" class="navbar-brand text-dark"> TIMI <span>Academy</span> </a>
                              <div class="d-block">
                              <input type="text" name="userName" id="userName" class="form-control mt-3" placeholder="Username">
                              <input type="email" name="email" id="email" class="form-control mt-3" placeholder="Email ">
                                <input type="password" name="password" id="password" class="form-control mt-3" placeholder="password">
                                <input type="password" name="confirmpassword" id="password" class="form-control mt-3" placeholder="confirm password">
                              </div>
                              <button type="submit" name="submit" id="submit" class="w-100 mt-3 "> Sign up</button>
                            </div>
                        </form>
                    </div>
            </div>
            <script src="" async defer></script>
        </body>
</html>