function checkForm(event) {
  const passwordField = document.getElementById("password");
  const confirmPasswordField = document.getElementById("confirm_password");
  if (passwordField.value === "" || confirmPasswordField.value === "") {
    event.preventDefault();
    alert("error");
  }
  else if (passwordField.value !== confirmPasswordField.value) {
    event.preventDefault();
    alert("Passwords do not match.");
  }
}