<?php
include "../../classes/registration.php";
$otp = $_SESSION['otp'];
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$name = $_SESSION['name'];
$reg = new Registration($conn);
if (isset($_POST['verify'])) {
    try {
        $names = explode(" ", $name);
        $userName = $names[0];
        $userOtp = $_POST['OTP'];
        if ($otp == $userOtp) {
            $reg->fullName = $userName;
            $reg->userEmail = $email;
            $reg->password = $password;
            $reg->insertUser();
            // check if data is inserted and redirect
            if ($reg->insertUser()) {
                $_SESSION['Login'] = True;
                $_SESSION['userId'] =  $reg->insertUser();
                $_SESSION['userName'] = $userName;
                $_SESSION['email'] = $email;
                header("location:../public/welcome.php");
            }
        } else {
            echo "incorrect otp";
        }
    } catch (Throwable $th) {
        echo $th->getmessage();
    }
}
