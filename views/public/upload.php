<?php

include '../../includes/header2.php';
include "../../models/upload.php";
if (!$_SESSION['AuthorLogin']) {
    header("location:../index.php");
}
?>

</head>

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
        <form action="" class="form-container" method="post" enctype="multipart/form-data">
            <h2 class="text-center mb-4">Upload Your Book</h2>
            <div class="mb-3">
                <label for="bookTitle" class="form-label">Book Title</label>
                <input type="text" class="form-control" name="bookTitle" placeholder="Enter book title" required>
            </div>
            <div class="mb-3">
                <label for="bookDescription" class="form-label">Description</label>
                <textarea class="form-control" name="bookDescription" rows="4" placeholder="Enter book description" required></textarea>
            </div>
            <div class="mb-3">
                <label for="bookCover" class="form-label">Book Cover Image</label>
                <input type="website" class="form-control" name="bookCover" accept="image/*" required placeholder="Enter image URL">
            </div>
            <div class="mb-3">
                <label for="bookFile" class="form-label">Book File (EPUB/PDF)</label>
                <input type="file" class="form-control" name="bookFile" accept=".epub,.pdf" required>
            </div>
            <div class="mb-3">
                <label for="bookCategory" class="form-label">Category</label>
                <select class="form-select" name="bookCategory" required>
                    <option selected disabled>Select a category</option>
                    <option value="fiction">Fiction</option>
                    <option value="non-fiction">Non-Fiction</option>
                    <option value="mystery">Mystery</option>
                    <option value="sci-fi">Science Fiction</option>
                    <option value="biography">Biography</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="bookPrice" class="form-label">Price (₦)</label>
                <input type="number" class="form-control" name="bookPrice" placeholder="Enter price" step="0.01" min="0" required>
            </div>
            <button type="submit" name="upload" class="p-2 my-btn btn-lg w-100">Upload Book</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>