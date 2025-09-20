<?php
include '../../includes/header2.php';
include '../../models/authorMail.php';
?>

<body>
    <div class="d-flex">
        <div class="author-bg">
            <img src="../assets/img/author.png" alt="An author writing on a book" loading="lazy">
        </div>
        <form action="" class="author-form m-auto " method="post">
            <h1 class="text-center ">Author Registration</h1>
            <p class="text-center">Join our community of authors and share your stories with the world!</p>
            <div class="w-75">
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
    </div>
</body>