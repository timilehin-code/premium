<?php
include '../../includes/header2.php';
if (!$_SESSION['email']) {
    header("location:../index.php");
}
//  echo $_SESSION['otp'];
echo $_SESSION['email'];
echo$_SESSION['password'];
echo $_SESSION['name'];
include "../../models/auth/completereg.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>

<body>

    <form action="" class="my-form verify" method="POST">
        <div class="login-container border border-primary-subtle">
            <div class="d-flex justify-content-center mb-3">
                <h3 class="text-success">OTP Verfication</h3>
            </div>
            <div class="alert alert-info" role="alert">
                we've sent a verfication code to your email: <b><?php echo $_SESSION['email']; ?></b>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">OTP</label>
                <input type="text" class="form-control" id="OTP" name="OTP" placeholder="Enter the OTP" />
                <div class="invalid-feedback" id="username-error">
                    Otp can't be empty
                </div>
            </div>
            <button type="submit" name="verify" class="my-btn p-2 w-100">
                verify
            </button>
        </div>
    </form>
    <?php
    include '../../includes/footer2.php';
    ?>