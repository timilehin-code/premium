<?php
include '../includes/header.php';
include '../models/mail.php';
?>



<body>
    <form action="" class="my-form" method="post">
        <div class="register-container border border-primary-subtle">
            <div class="d-flex justify-content-center mb-3">
                <img src="https://placehold.co/300x50.png" alt="">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="username" name="name" placeholder="Enter your full name" />
                <div class="invalid-feedback" id="username-error">
                    Name is required
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" />
                <div class="invalid-feedback" id="email-error">
                    Valid email is required
                </div>
            </div>
            <div class="mb-3 input-field">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password"
                    placeholder="Enter password" />
                <img src="assets/img/icons/open-eye.svg" class="eyes" alt="">
                <div class="invalid-feedback" id="password-error">
                    Password must be at least 6 characters
                </div>
            </div>
            <button type="submit" name="submit" class="my-btn p-2 w-100" onclick="handleRegister()">
                Register
            </button>
        </div>
    </form>
    <?php
    include '../includes/footer.php';
    ?>