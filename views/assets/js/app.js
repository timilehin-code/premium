const myBtn = document.querySelector(".my-btn");
const form = document.querySelector(".verify");

myBtn.addEventListener("click", (e) => {
  myBtn.innerHTML =
    '<i class="fa-solid fa-spinner fa-spin"></i> verifing...';
  // myBtn.disabled = true;

  // Perform any validation if needed
  const userEmail = document.querySelector("#OTP").value;
  if (userEmail.trim() === "") {
    e.preventDefault(); // Prevent default submission to control it manually

    document.querySelector("#username-error").style.display = "block";
    myBtn.disabled = false;
    myBtn.textContent = "verify";
    setTimeout(() => {
      document.querySelector("#username-error").style.display = "none";
    }, 30000);
    return;
  }

  setTimeout(() => {
    myBtn.disabled = false;
    myBtn.textContent = "Register";
  }, 30000);
});

// form validation
  function handleRegister() {
    const usernameInput = document.getElementById("username");
    const emailInput = document.getElementById("email");
    const passwordInput = document.getElementById("password");
    const confirmPasswordInput =
      document.getElementById("confirm-password");
    const usernameError = document.getElementById("username-error");
    const emailError = document.getElementById("email-error");
    const passwordError = document.getElementById("password-error");
    const confirmPasswordError = document.getElementById(
      "confirm-password-error"
    );

    let isValid = true;

    // Username validation
    if (!usernameInput.value.trim()) {
      usernameInput.classList.add("is-invalid");
      usernameError.style.display = "block";
      isValid = false;
    } else {
      usernameInput.classList.remove("is-invalid");
      usernameError.style.display = "none";
    }

    // Email validation
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (
      !emailInput.value.trim() ||
      !emailPattern.test(emailInput.value.trim())
    ) {
      emailInput.classList.add("is-invalid");
      emailError.style.display = "block";
      isValid = false;
    } else {
      emailInput.classList.remove("is-invalid");
      emailError.style.display = "none";
    }

    // Password validation
    if (!passwordInput.value.trim() || passwordInput.value.length < 6) {
      passwordInput.classList.add("is-invalid");
      passwordError.style.display = "block";
      isValid = false;
    } else {
      passwordInput.classList.remove("is-invalid");
      passwordError.style.display = "none";
    }


    if (isValid) {
      console.log("REGISTRATION WAS SUCCESSFUL");
      return true
    }
  }

  const eye = document.querySelector(".eyes");
  const passwordInput = document.querySelector("#password");
  eye.addEventListener("click", () => {
    if (passwordInput.type === "password") {
      passwordInput.type = "text";
      eye.src = "assets/img/icons/close-eye.svg";
    } else {
      passwordInput.type = "password";
      eye.src = "assets/img/icons/open-eye.svg";
    }
  });
