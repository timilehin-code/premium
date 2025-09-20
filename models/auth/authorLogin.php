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
        $selectUser = "SELECT * FROM authors WHERE authorMail =?";
        $prepareUser = $conn->prepare($selectUser);
        $prepareUser->bind_param("s", $userEmail);
        $prepareUser->execute();
        $result = $prepareUser->get_result();
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $hashed_password = $row['authorPassword'];
            if (password_verify($userPassword, $hashed_password)) {
                $_SESSION['AuthorLogin'] = True;
                $_SESSION['authorId'] = $row['authorId'];
                $_SESSION['authorUserName'] = $row['authorUserName'];
                $_SESSION['authorMail'] = $row['authorMail'];
                header("location:../../views/public/authorDashboard.php");
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
