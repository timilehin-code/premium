const myBtn = document.querySelector(".my-btn");
const form = document.querySelector(".my-form");

myBtn.addEventListener("click", (e) => {
  myBtn.innerHTML =
    '<i class="fa-solid fa-spinner fa-spin"></i> Registering...';
  // myBtn.disabled = true;

  // Perform any validation if needed
  const userEmail = document.querySelector("#username").value;
  if (userEmail.trim() === "") {
    e.preventDefault(); // Prevent default submission to control it manually

    document.querySelector("#username-error").style.display = "block";
    myBtn.disabled = false;
    myBtn.textContent = "Register";
    setTimeout(() => {
      document.querySelector("#username-error").style.display = "none";
    }, 3000);
    return;
  }

  // Submit the form programmatically
  // form.submit();

  setTimeout(() => {
    myBtn.disabled = false;
    myBtn.textContent = "Register";
  }, 3000);
});
