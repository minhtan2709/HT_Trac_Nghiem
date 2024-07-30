const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#password");

togglePassword.addEventListener("click", function (e) {
  // Lấy trạng thái hiện tại của input password
  const type =
    password.getAttribute("type") === "password" ? "text" : "password";
  // Thay đổi trạng thái của input password
  password.setAttribute("type", type);
  // Thay đổi icon của toggle password
  this.classList.toggle("fa-eye");
  this.classList.toggle("fa-eye-slash");
});
