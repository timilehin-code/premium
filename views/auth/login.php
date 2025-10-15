<?php
include '../../includes/header2.php';
include "../../models/auth/login.php";
?>

<body>
    <form action="" class="my-form" method="POST">
        <div class="login-container border border-primary-subtle">
            <div class="d-flex justify-content-center mb-3">
                <img src="https://placehold.co/300x50.png" alt="">
            </div>
            <?php
            if (isset($_SESSION["msg"])) {
            ?>
                <div class="alert alert-msg alert-primary text-center">
                    <?php
                    echo htmlspecialchars($_SESSION["msg"]); // Use htmlspecialchars for security!
                    unset($_SESSION["msg"]);
                    ?>
                </div>

                <!-- JS here runs after the div -->
                <script>
                    // Paste the JS function from above here
                // </script>
            <?php
            }
            ?>
            <div class="mb-3">
                <label for="username" class="form-label">Email</label>
                <input type="text" class="form-control" id="username" name="userEmail" placeholder="Enter YOUR Email" />
                <div class="invalid-feedback" id="username-error">
                    Username is required
                </div>
            </div>
            <div class="mb-3 input-field">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="userPassword" placeholder="Enter password" />
                <img src="../assets/img/icons/open-eye.svg" class="eyes" alt="">

                <div class="invalid-feedback" id="password-error">
                    Password is required
                </div>
            </div>
            <button type="submit" name="submit" class="my-btn p-2 w-100" onclick="handleLogin()">
                Login
            </button>
        </div>
    </form>
    <script>
        function handleLogin() {
            const usernameInput = document.getElementById("username");
            const passwordInput = document.getElementById("password");
            const usernameError = document.getElementById("username-error");
            const passwordError = document.getElementById("password-error");

            let isValid = true;

            if (!usernameInput.value.trim()) {
                usernameInput.classList.add("is-invalid");
                usernameError.style.display = "block";
                isValid = false;
            } else {
                usernameInput.classList.remove("is-invalid");
                usernameError.style.display = "none";
            }

            if (!passwordInput.value.trim()) {
                passwordInput.classList.add("is-invalid");
                passwordError.style.display = "block";
                isValid = false;
            } else {
                passwordInput.classList.remove("is-invalid");
                passwordError.style.display = "none";
            }

            if (isValid) {
                console.log("success was achived when authenticating");

            }
        }

        const eye = document.querySelector(".eyes");
        const passwordInput = document.querySelector("#password");
        eye.addEventListener("click", () => {
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eye.src = "../assets/img/icons/close-eye.svg";
            } else {
                passwordInput.type = "password";
                eye.src = "../assets/img/icons/open-eye.svg";
            }
        });
    </script>
    <?php
    include '../../includes/footer2.php';
    ?>