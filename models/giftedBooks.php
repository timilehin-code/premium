<?php
$email = $_SESSION['email'];
$selectBooks = "SELECT * FROM gifting WHERE gifteeEmail=?";
$prepareBooks = $conn->prepare($selectBooks);
$prepareBooks->bind_param("s", $email);
$prepareBooks->execute();
$resultBooks = $prepareBooks->get_result();
