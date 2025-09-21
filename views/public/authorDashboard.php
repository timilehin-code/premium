<?php

include '../../includes/header2.php';
if (!$_SESSION['AuthorLogin']) {
    header("location:../index.php");
}
include "../../models/selectauthorBooks.php";

?>

<body class="dashboard-body">
    <button class="toggle-sidebar" id="toggleSidebar"><i class="fas fa-bars"></i></button>
    <nav class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            eBook Haven
        </div>
        <ul class="sidebar-nav nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="#"><i class="fas fa-home"></i> Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="upload.php"><i class="fas fa-upload"></i> Upload Book</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-user"></i> Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../../models/auth/authorlogout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </li>
        </ul>
    </nav>

    <div class="main-content" id="mainContent">
        <div class="container dashboard-container">
            <div class="stats-row">
                <div class="stats-card">
                    <i class="fas fa-book"></i>
                    <h4>Total Published </h4>
                    <p>10 Published </p>
                </div>
                <div class="stats-card">
                    <i class="fas fa-users"></i>
                    <h4>Readers</h4>
                    <p>8,421 <span style="font-size: 1rem; font-weight: 400;">Monthly Active</span></p>
                </div>
                <div class="stats-card">
                    <i class="fas fa-shopping-cart"></i>
                    <h4>Sales</h4>
                    <p>2,315 <span style="font-size: 1rem; font-weight: 400;">Total Copies Sold</span></p>
                </div>
                <div class="stats-card">
                    <i class="fas fa-star"></i>
                    <h4>Rating</h4>
                    <p>4.7 ★ <span style="font-size: 1rem; font-weight: 400;">Average Reader Rating</span></p>
                </div>
            </div>

            <div class="welcome-card">
                <h2>Welcome, <?php echo $_SESSION['authorUserName'] ?>!</h2>
                <p>Manage your literary creations or publish a new bestseller.</p>
                <a href="upload.php" class="btn btn-upload"><i class="fas fa-plus-circle"></i> Upload New Book</a>
            </div>

            <h3>Your Books</h3>
            <div class="table-responsive">
                <table id="booksTable" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Cover</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Date Uploaded</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php
                        $resultBooks = SelectAuthorBooks($conn, $authorId);
                        if ($resultBooks->num_rows > 0) {
                            while ($row = $resultBooks->fetch_assoc()) {
                                ?>
                             <tr>
                            <td><img src="<?php echo $row['bookCover']; ?>" class="book-cover" alt="Book Cover" loading="lazy"></td>
                            <td><?php echo $row['bookName']; ?></td>
                            <td><?php echo $row['categoryName']; ?></td>
                            <td>₦ <?php echo number_format($row['bookprice'],2); ?></td>
                            <td><?php echo $row['dateUploaded'];?></td>
                            <td><?php echo statusColor($row['bookStatus']);?></td>
                            <td>
                                <a href="edit-book.php?id=1" class="btn btn-sm btn-primary btn-action"><i class="fas fa-edit"></i> Edit</a>
                                <a href="delete-book.php?id=1" class="btn btn-sm btn-danger btn-action" onclick="return confirm('Are you sure you want to delete this book?')"><i class="fas fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                            <?php
                            }
                        }
                       ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
    include '../../includes/footer2.php';
    ?>