<?php
include "../../classes/registration.php";

if (isset($_POST['submit'])) {
    $userEmail = $_POST['userEmail'];
    $userPassword = $_POST['userPassword'];
    try {
        $reg = new Registration($conn);
        $reg->userEmail = $userEmail;
        $reg->password = $userPassword;
        $reg->loginUser();
        if ($reg->loginUser()) {
            header("location:../../views/public/welcome.php");
        }
    } catch (Throwable $th) {
        $msg = $th->getmessage();
        $_SESSION["msg"] = $msg;
    }
}
