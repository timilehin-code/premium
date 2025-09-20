<?php
$otp = $_SESSION['otp'];
var_dump($otp);
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$name = $_SESSION['name'];
if (isset($_POST['verify'])) {
    $names = explode(" ", $name);
    $userName = $names[0] . "_". rand(111, 999);
    $userOtp = $_POST['OTP'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    if ($otp == $userOtp) {
        $insertUser = "INSERT INTO authors(authorName, authorUserName,authorMail ,authorPassword) VALUES(?,?,?,?)";
        $prepareUser = $conn->prepare($insertUser);
        $prepareUser->bind_param("ssss", $name, $userName, $email, $hashed_password);
        $execute = $prepareUser->execute();
        $userId = $conn->insert_id;
        if ($execute) {
            $_SESSION['AuthorLogin'] = True;
            $_SESSION['authorId'] = $userId;
            $_SESSION['authorUserName'] = $userName;
            $_SESSION['authorMail'] = $email;
            header("location:../public/authorDashboard.php");
        }
    } else {
        echo "incorrect Otp";
    }
}