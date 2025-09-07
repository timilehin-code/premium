<?php
include '../../includes/header2.php';
require '../../models/giftedBooks.php';
// Hardcoded books array
$books = [
    ['id' => 1, 'title' => 'The Mystery', 'author' => 'John Doe', 'price' => '$12.00', 'cover' => '../assets/img/bookCover1.png'],
    ['id' => 2, 'title' => 'The Oracle', 'author' => 'Jane Smith', 'price' => '$8.00', 'cover' => '../assets/img/bookCover2.png'],
    ['id' => 3, 'title' => 'Whispers of the Forgotten Star', 'author' => 'Elara Vance', 'price' => '$25.00', 'cover' => '../assets/img/bookCover3.png'],
    ['id' => 4, 'title' => 'Echoes of the Forgotten', 'author' => 'A. J. Rivers', 'price' => '$30.00', 'cover' => '../assets/img/bookCover4.png'],
    ['id' => 5, 'title' => 'The Silent Hall', 'author' => 'A. J. Roberts', 'price' => '$17.00', 'cover' => '../assets/img/bookCover5.png'],
    ['id' => 6, 'title' => 'Whispers of Dawn', 'author' => 'Amelia Rose', 'price' => '$10.00', 'cover' => '../assets/img/bookCover6.png'],
    ['id' => 7, 'title' => 'The Wandering Mage', 'author' => 'Alexander Stone', 'price' => '$12.00', 'cover' => '../assets/img/bookCover7.png'],
    ['id' => 8, 'title' => "Dragon's Ascent", 'author' => 'Elara Vance', 'price' => '$10.00', 'cover' => '../assets/img/bookCover8.png'],
];

// Fetch book IDs from the database
$bookIds = [];
if ($resultBooks && $resultBooks->num_rows > 0) {
    while ($row = $resultBooks->fetch_assoc()) {
        $bookIds[] = $row['bookId']; // Assuming the database column is named 'bookId'
    }
}
// https://x.com/OurFavOnlineDoc/status/1964632264576569486
?>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><b>eBook Haven</b></a>
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
                        <?php if (isset($_SESSION['Login']) && $_SESSION['Login'] === true) { ?>
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Hi, <?php echo htmlspecialchars($_SESSION['userName']); ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Gifted Books</a></li>
                                <li><a class="dropdown-item" href="../../models/auth/logout.php">Logout</a></li>
                            </ul>
                        <?php } else { ?>
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Account
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="../auth/login.php">Login</a></li>
                                <li><a class="dropdown-item" href="../index.php">Register</a></li>
                            </ul>
                        <?php } ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <h2 class="mb-4">Gifted Books</h2>
        <div class="row">
            <?php if (empty($bookIds)) { ?>
                <div class="col-12">
                    <p class="text-center">No gifted books found.</p>
                </div>
            <?php
            } else {
            ?>
                <?php
                foreach ($books as $book) {
                    if (in_array($book['id'], $bookIds)) { ?>
                        <div class="col-md-3 mb-4">
                            <div class="card h-100">
                                <img src="<?php echo $book['cover']; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($book['title']); ?>">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title"><?php echo htmlspecialchars($book['title']); ?></h5>
                                    <p class="card-text">By <?php echo htmlspecialchars($book['author']); ?></p>
                                    <p class="card-text mt-auto"><strong><?php echo $book['price']; ?></strong></p>
                                    <a href="#" class="btn btn-primary mt-2">Read Now</a>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
            <?php }
            } ?>
        </div>
    </div>

    <?php include '../../includes/footer2.php'; ?>