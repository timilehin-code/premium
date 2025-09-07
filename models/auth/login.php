<?php
$msg = "";
if (isset($_POST['submit'])) {
    $userEmail = $_POST['userEmail'];
    $userPassword = $_POST['userPassword'];
    if (empty($userEmail)) {
        $msg = "Email is required";
        $_SESSION["msg"] = $msg;
        // header("location:../../views/auth/login.php");
    } elseif (empty($userPassword)) {
        $msg = "Password is required";
        $_SESSION["msg"] = $msg;
        session_write_close();
        // header("location:../../views/auth/login.php");
    } else {
        $selectUser = "SELECT * FROM users WHERE email=?";
        $prepareUser = $conn->prepare($selectUser);
        $prepareUser->bind_param("s", $userEmail);
        $prepareUser->execute();
        $result = $prepareUser->get_result();
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $hashed_password = $row['password'];
            if (password_verify($userPassword, $hashed_password)) {
                $_SESSION['Login'] = True;
                $_SESSION['userId'] = $row['id'];
                $_SESSION['userName'] = $row['userName'];
                $_SESSION['email'] = $row['email'];
                header("location:../../views/public/welcome.php");
            } else {
                $msg = "Incorrect Password";
                $_SESSION["msg"] = $msg;
                // header("location:../../views/auth/login.php");
            }
        } else {
            $msg = "User not found";
            $_SESSION["msg"] = $msg;
            // header("location:../../views/auth/login.php");
        }
    }
}
