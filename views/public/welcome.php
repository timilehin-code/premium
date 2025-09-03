<?php

include '../../includes/header2.php';
$books = [1, 2, 3, 4, 5, 6, 7, 8];
// var_dump($books);
?>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><b>eBook Haven<b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Browse Books</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Deals</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Account
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Login</a></li>
                            <li><a class="dropdown-item" href="#">Register</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="col-md-2">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                    Categories
                </a>
                <a href="#" class="list-group-item list-group-item-action">Fiction</a>
                <a href="#" class="list-group-item list-group-item-action">Non-Fiction</a>
                <a href="#" class="list-group-item list-group-item-action">Science</a>
                <a href="#" class="list-group-item list-group-item-action">History</a>
                <a href="#" class="list-group-item list-group-item-action">Biography</a>
                <a href="#" class="list-group-item list-group-item-action">Children's Books</a>
            </div>
        </div>
        <div class="col-md-10">
            <div class="container mt-4">
                <div class="row">
                    <?php foreach ($books as $book) {
                        switch ($book) {
                            case 1:
                                $bookTitle = "The Mystery ";
                                $authorName = "John Doe";
                                $Price = "$12.00";
                                $bookCover = "../assets/img/bookCover1.png";
                                break;
                            case 2:
                                $bookTitle = "The Oracle";
                                $authorName = "Jane Smith";
                                $Price = "$8.00";
                                $bookCover = "../assets/img/bookCover2.png";
                                break;
                            case 3:
                                $bookTitle = "Whisprers of the forgoting star";
                                $authorName = "Elara vance";
                                $Price = "$25.00";
                                $bookCover = "../assets/img/bookCover3.png";
                                break;
                            case 4:
                                $bookTitle = "Echoes of the Forgotten";
                                $authorName = "A. J. Rivers";
                                $Price = "$30.00";
                                $bookCover = "../assets/img/bookCover4.png";
                                break;
                            case 5:
                                $bookTitle = "The Silent Hall";
                                $authorName = "A. J. Roberts";
                                $Price = "$17.00";
                                $bookCover = "../assets/img/bookCover5.png";
                                break;
                            case 6:
                                $bookTitle = "Whispers of dawn";
                                $authorName = "Amelia Rose";
                                $Price = "$10.00";
                                $bookCover = "../assets/img/bookCover6.png";
                                break;
                            case 7:
                                $bookTitle = "The wandering mage";
                                $authorName = "Alexander Stone";
                                $Price = "$12.00";
                                $bookCover = "../assets/img/bookCover7.png";
                                break;

                            case 8:
                                $bookTitle = "Dragon's Ascent";
                                $authorName = "Elara Vance";
                                $Price = "$10.00";
                                $bookCover = "../assets/img/bookCover8.png";
                                break;
                            default:
                                echo "No books found.";
                                break;
                        }
                    ?>

                        <div class="col-md-3 mb-4">
                            <div class="card h-100">
                                <img src="<?php echo $bookCover ?>" class="card-img-top" alt="Book Cover" height="380px">
                                <div class="card-body d-flex flex-column">
                                    <h6 class="card-title"><?php echo $bookTitle; ?></h5>
                                        <p class="card-text"><?php echo $authorName; ?></p>
                                        <p class="card-text"><?php echo $Price; ?></p>
                                        <a href="details.php?id=<?php echo $book ?>" class="p-2 text-center text-decoration-none my-btn mt-auto">View Details</a>
                                </div>
                            </div>
                        </div>
                    <?php }; ?>
                    <?php
                    include '../../includes/footer2.php';
                    ?>