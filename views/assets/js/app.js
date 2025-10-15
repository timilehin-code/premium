(function () {
  if (window.appJsInitialized) {
    console.log("app.js already initialized; skipping re-execution");
    return;
  }
  window.appJsInitialized = true;

  function getElement(selector, method = "querySelector") {
    const el =
      method === "id"
        ? document.getElementById(selector)
        : document.querySelector(selector);
    if (!el) {
      console.warn(`Element not found: ${selector}`);
    }
    return el;
  }

  // Verification button logic
  var myBtn = getElement(".my-btn");
  var otpInput = getElement("#OTP");
  var usernameError = getElement("#username-error");

  if (myBtn && otpInput && usernameError) {
    // Define handler (named for removal)
    function verifyHandler(e) {
      myBtn.innerHTML =
        '<i class="fa-solid fa-spinner fa-spin"></i> verifying...';

      var userEmail = otpInput.value;
      if (userEmail.trim() === "") {
        e.preventDefault();
        usernameError.style.display = "block";
        myBtn.disabled = false;
        myBtn.textContent = "verify";

        setTimeout(function () {
          usernameError.style.display = "none";
        }, 30000);
        return;
      }

      setTimeout(function () {
        myBtn.disabled = false;
        myBtn.textContent = "Register";
      }, 30000);
    }

    myBtn.removeEventListener("click", verifyHandler);
    myBtn.addEventListener("click", verifyHandler);
  }

  window.handleRegister = function () {
    var usernameInput = getElement("username", "id");
    var emailInput = getElement("email", "id");
    var passwordInput = getElement("password", "id");
    var confirmPasswordInput = getElement("confirm-password", "id");
    var usernameError = getElement("username-error", "id");
    var emailError = getElement("email-error", "id");
    var passwordError = getElement("password-error", "id");
    var confirmPasswordError = getElement("confirm-password-error", "id");

    if (
      ![
        usernameInput,
        emailInput,
        passwordInput,
        confirmPasswordInput,
        usernameError,
        emailError,
        passwordError,
        confirmPasswordError,
      ].every(Boolean)
    ) {
      console.warn("Form elements missing; skipping");
      return false;
    }

    var isValid = true;

    // Username
    if (!usernameInput.value.trim()) {
      usernameInput.classList.add("is-invalid");
      usernameError.style.display = "block";
      isValid = false;
    } else {
      usernameInput.classList.remove("is-invalid");
      usernameError.style.display = "none";
    }

    // Email
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
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

    // Password
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
    }
    return isValid;
  };

  // Password toggle
  var eye = getElement(".eyes");
  var passwordInputForToggle = getElement("#password");

  if (eye && passwordInputForToggle) {
    function toggleHandler() {
      if (passwordInputForToggle.type === "password") {
        passwordInputForToggle.type = "text";
        eye.src = "assets/img/icons/close-eye.svg";
      } else {
        passwordInputForToggle.type = "password";
        eye.src = "assets/img/icons/open-eye.svg";
      }
    }

    eye.removeEventListener("click", toggleHandler);
    eye.addEventListener("click", toggleHandler);
  }

  // Alert removal
  function removeMessage() {
    var msg = getElement(".alert-msg");
    if (!msg) return;

    setTimeout(function () {
      msg.classList.add("fade-out");
      setTimeout(function () {
        msg.style.display = "none";
      }, 500);
    }, 2800);
  }

  // DOM ready for removeMessage
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", removeMessage);
  } else {
    removeMessage();
  }

  console.log("app.js initialized successfully");
})();
