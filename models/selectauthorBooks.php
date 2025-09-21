<?php
$authorId = $_SESSION['authorId'];
 function selectAuthorBooks($conn, $authorId) {
        $selectBooks = "SELECT * FROM book INNER JOIN bookinfo ON book.book_id = bookinfo.bookId INNER JOIN category ON category.categoryId = book.categoryId WHERE bookinfo.authorId = ?";
        $prepareBooks = $conn->prepare($selectBooks);
        $prepareBooks->bind_param("i", $authorId);
        $prepareBooks->execute();
        $booksResult = $prepareBooks->get_result();
        if ($booksResult) {
            return $booksResult;
        }
 }

 function statusColor( $status) {
    // $status = "Published";
    if($status == "Published"){
        return "<span class='badge bg-info'>Published</span>";
    } elseif($status == "Pending"){
        return "<span class='badge bg-warning text-dark'>Pending</span>";
    } else {
        return "<span class='badge bg-danger'>Rejected</span>";
    }
 }