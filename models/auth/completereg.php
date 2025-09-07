<?php
$otp = $_SESSION['otp'];
var_dump($otp);
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$name = $_SESSION['name'];
if (isset($_POST['verify'])) {
    $names = explode(" ", $name);
    $userName = $names[0];
    $userOtp = $_POST['OTP'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    if ($otp == $userOtp) {
        $insertUser = "INSERT INTO users(userName,email,password) VALUES(?,?,?)";
        $prepareUser = $conn->prepare($insertUser);
        $prepareUser->bind_param("sss", $userName, $email, $hashed_password);
        $execute = $prepareUser->execute();
        $userId = $conn->insert_id;
        if ($execute) {
            $_SESSION['Login'] = True;
            $_SESSION['userId'] = $userId;
            $_SESSION['userName'] = $userName;
            $_SESSION['email'] = $email;
            header("location:public/welcome.php");
        }
    } else {
        echo "incorrect Otp";
    }
}