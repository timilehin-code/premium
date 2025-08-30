<?php
function db_connect()
{
    $Servername = "localhost";
    $Username = "root";
    $Password = "";
    $Dbname = "login";

    // Create connection
    $conn = mysqli_connect($Servername, $Username, $Password, $Dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}
$conn = db_connect();