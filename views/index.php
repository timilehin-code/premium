<?php
include '../includes/header.php';
include '../models/mail.php';
?>



<body>
    <form action="" class="my-form" method="POST">
        <div class="login-container border border-primary-subtle">
            <div class="d-flex justify-content-center mb-3">
                <h1 class="text-success">Registration</h1>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Email</label>
                <input type="text" class="form-control" id="username" name="userEmail" placeholder="Enter YOUR Email" />
                <div class="invalid-feedback" id="username-error">
                    Username is required
                </div>
            </div>
            <button type="submit" name="submit" class="my-btn p-2 w-100">
                Register
            </button>
        </div>
    </form>

    <?php
    include '../includes/footer.php';
    ?>