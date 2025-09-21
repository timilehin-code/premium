<?php

function SelectCategories($conn){
    $selectCategories = "SELECT * FROM category";
    $prepareCategories = $conn->prepare($selectCategories);
    $prepareCategories->execute();
    $categoryResult = $prepareCategories->get_result();
    if ($categoryResult) {
        return $categoryResult;
    }
}

$authorId = $_SESSION['authorId'];
if (isset($_POST['upload'])) {
    $bookTitle = $_POST['bookTitle'];
    $bookDescription = $_POST['bookDescription'];
    $bookCover = $_POST['bookCover'];
    $bookFile = $_FILES['bookFile'];
    $bookCategory = $_POST['bookCategory'];
    $bookPrice = $_POST['bookPrice'];
    date_default_timezone_set("Africa/Lagos");
    $dateUploaded = $conn->real_escape_string(date('M d, Y'));
    $timeUploaded = $conn->real_escape_string(date('h:i:sA'));
    // Handle file upload
    // uploading of the book file begings
    $site_dir = '../../uploads/pdf/';
    if (!is_dir($site_dir)) {
        mkdir($site_dir, 0777, true);
    }
    $checkFile = $site_dir . basename($_FILES['bookFile']['name']);
        $breakPart = pathinfo($_FILES['bookFile']['name']);
        $fileName = $breakPart['filename'];
        $fileExt = $breakPart['extension'];
        $tempfile = $_FILES['bookFile']['tmp_name'];

        // check if the file name already exist before

        if (file_exists($checkFile)) {
            $rand = rand(00, 99);
            $NewFileName = $fileName . '-' . $rand . '.' . $fileExt;
        } else {
            $NewFileName = $fileName . '.' . $fileExt;
        }
        // checking if file exist ends
        $preparedFile = '../../uploads/pdf/' . $NewFileName;
        // uploading of the book ends
        $moveBook = move_uploaded_file($tempfile, $preparedFile);

        if ($moveBook) {
            $insertbook = "INSERT INTO book(bookName, bookDesc, bookCover, bookFile, categoryId) VALUES (?,?,?,?,?)";
            $prepareBook = $conn->prepare($insertbook);
            $prepareBook->bind_param("ssssi", $bookTitle, $bookDescription, $bookCover, $NewFileName, $bookCategory);
            $executeBook = $prepareBook->execute();
            $bookId = $conn->insert_id;
            if ($executeBook) {
                $insertPrice = "INSERT INTO bookinfo(bookId, bookPrice, authorId, dateUploaded, timeUploaded) VALUES (?,?,?,?,?)";
                $preparePrice = $conn->prepare($insertPrice);
                $preparePrice->bind_param("idiss", $bookId, $bookPrice, $authorId, $dateUploaded, $timeUploaded);
                $executePrice = $preparePrice->execute();
                if ($executePrice) {
                    echo "<script>alert('Book uploaded successfully');</script>";
                } else {
                    echo "<script>alert('Failed to upload book price');</script>";
                }
            } else {
                echo "<script>alert('Failed to upload book details');</script>";
            }
        } else {
            echo "<script>alert('Failed to upload book file');</script>";
        }
}


