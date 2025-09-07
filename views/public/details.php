<?php

include '../../includes/header2.php';

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
$bookId = $_GET['id'] ?? 0;

$book = null;
foreach ($books as $b) {
    if ($b['id'] == $bookId) {
        $book = $b;
        break;
    }
}
if (!$book) {
    echo "<div class='container my-5'><div class='alert alert-danger'>Book not found.</div></div>";
    include '../../includes/footer2.php';
    exit;
}

$paid = isset($_GET['paid']) && $_GET['paid'] === 'true';


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

    <div class="container my-5">
        <div class="row">
            <div class="col-md-4">
                <img src="<?php echo $b['cover'] ?>" class="img-fluid" alt="Book Cover">
            </div>
            <div class="col-md-8">
                <h1 class="mb-3"><?php echo $b['title'] ?></h1>
                <p class="lead">By <?php echo $b['author'] ?></p>
                <div class="d-flex align-items-center mb-3">
                    <span class="h4 me-3"><?php echo $b['price'] ?></span>
                    <span class="badge bg-success">In Stock</span>
                </div>
                <p class="mb-4">This is a detailed description of the eBook. It includes a synopsis, key features, and why you should read it. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <form id="paymentForm">
                    <input type="hidden" value="timi@gmail.com" id="email-address">
                    <input type="hidden" value="<?php echo $b['price'] ?>" id="amount">
                    <input type="hidden" value="<?php echo $b['id'] ?>" id="bookId">
                    <?php if ($paid): ?>
                        <button id="payBtn" type="button" class=" my-btn p-3 fw-bold"
                            onclick="window.location.href='filedownload.zip'">
                            DOWNLOAD NOW
                        </button>

                    <?php else: ?>
                        <button id="payBtn" type="submit" class="btn btn-warning w-50 mx-auto p-3 fw-bold">
                            BUY NOW
                        </button>
                    <?php endif; ?>
                </form>
                <!-- buy for someone -->
                <form action="">
                    <div class="mt-3">
                        <input type="hidden" value="timi@gmail.com" id="email-address">
                        <input type="hidden" value="<?php echo $b['price'] ?>" id="amount">
                        <input type="hidden" value="<?php echo $b['id'] ?>" id="bookId">
                        <label for="giftEmail" class="form-label">Buy as a Gift for Someone</label>
                        <input type="email" class="form-control" id="giftEmail" placeholder="Recipient's Email">
                        <button id="payBtn" type="submit" class="btn btn-secondary w-50 mx-auto p-3 fw-bold mt-2">
                            BUY AS GIFT
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <h2>Product Details</h2>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Format:</strong> eBook (EPUB, PDF)</li>
                    <li class="list-group-item"><strong>Pages:</strong> 300</li>
                    <li class="list-group-item"><strong>Publication Date:</strong> January 1, 2023</li>
                    <li class="list-group-item"><strong>ISBN:</strong> 978-1234567890</li>
                </ul>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <h2>Customer Reviews</h2>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Great Read!</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <p class="card-text"><small class="text-muted">By User1 on March 15, 2023</small></p>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Highly Recommend</h5>
                        <p class="card-text">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
                        <p class="card-text"><small class="text-muted">By User2 on April 20, 2023</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script>
        const payBtns = document.querySelectorAll("#payBtn")
        payBtns.forEach(payBtn => {
            payBtn.addEventListener("click", function(e) {
                e.preventDefault();

                let email = document.getElementById("email-address").value;
                let rawAmount = document.getElementById("amount").value;
                let bookId = document.getElementById("bookId").value;
                let giftEmail = document.getElementById("giftEmail").value;

                // 🔹 Clean up format (# and commas)
                let cleanAmount = rawAmount.replace(/[^0-9.]/g, '');

                let handler = PaystackPop.setup({
                    key: 'pk_test_e8679d4be88ed135325d4542b1ae89103a22321f',
                    email: email,
                    amount: cleanAmount * 100,
                    currency: 'NGN',
                    ref: 'TEST_' + Math.floor((Math.random() * 1000000000) + 1),

                    onClose: function() {
                        alert('Transaction Cancelled.');
                    },

                    callback: function(response) {
                        // ✅ Send to PHP verify page
                        if (giftEmail != '') {
                            window.location.href = `../../models/gateway/payStack.php?reference=${response.reference}&id=${bookId}&giftEmail=${giftEmail}`;
                        } else {
                            window.location.href = `../../models/gateway/payStack.php?reference=${response.reference}&id=${bookId}`;
                        }
                    }
                });


                handler.openIframe();
            });
        });
    </script>

    <?php
    include '../../includes/footer2.php';
    ?>