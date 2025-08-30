<?php
require 'conn.php';

if (isset($_POST['submit'])) {
    $site_dir = 'uploads/';
    $userName = $conn -> real_escape_string($_POST['userName']);
    $email = $conn -> real_escape_string($_POST['email']);
    $checkFile = $site_dir . basename($_FILES['image']['name']);
    $breakPart = pathinfo($_FILES['image']['name']);
    $file_Name =  $breakPart['filename'];
    $file_ext =  $breakPart['extension'];
    $tempfile = $_FILES['image']['tmp_name'];    
    
    if (file_exists($checkFile)) {
        $rand = rand(00, 99);
        $NewFileName = $file_Name . '-' . $rand . '.' . $file_ext ;
    } else {
        $NewFileName = $file_Name . '.' . $file_ext;
    }
    $preparedFile = 'uploads/' . $NewFileName;
    if (move_uploaded_file($tempfile, $preparedFile)) {
        $insertusers = "INSERT INTO users(userName, email, image) VALUES ('$userName', '$email', '$NewFileName')";
        if (mysqli_query($conn, $insertusers)) {
            echo 'submited';
        } else {
            echo 'failed';
        }
    }
} 

?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="">Name :</label>
        <input type="text" name ="userName" id="userName"><br>
        <label for="">email :</label>
        <input type="email" name="email" id="email"><br>
        <label for="">Image :</label>
        <input type="file" name ="image" id="image  "><br>
        <button type="submit" name="submit">submit</button>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">email</th>
                <th scope="col">image</th>
            </tr>
        </thead>
        <tbody>
            <?php
            ?>
            <tr>
                <td scope="row">Blue</td>
                <td>Leonardo</td>
                <td>da Vinci</td>
            </tr>
          
        </tbody>
    </table>
</body>

</html>