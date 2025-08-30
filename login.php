<?php
 require 'conn.php';



?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css  ">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <div class="log-form text-center">
            <form action="" method="post" class="form">
                <?php
                echo $errorMsg;
                ?>
                <div class="text-center">
                    <a href="#" class="navbar-brand text-dark"> TIMI <span>Academy</span> </a>
                    <div class="d-block form-group">
                        <input type="text" name="username" id="username" class="form-control mt-3"
                            placeholder="user name">
                        <input type="password" name="password" id="password" class="form-control mt-3"
                            placeholder="password">
                    </div>
                    <button type="submit" name="submit" id="submit" class="w-100 mt-3 ">Log in</button>
                </div>
                <a href="user_reg.php">create account</a>
            </form>
        </div>
    </div>
    <script src="" async defer></script>
</body>

</html>