const ctogglePassword = document.querySelector("#ctogglePassword");
const cpassword = document.querySelector("#cpassword");

ctogglePassword.addEventListener("click", function (e) {
  // Lấy trạng thái hiện tại của input password
  const type =
    cpassword.getAttribute("type") === "password" ? "text" : "password";
  // Thay đổi trạng thái của input password
  cpassword.setAttribute("type", type);
  // Thay đổi icon của toggle password
  this.classList.toggle("fa-eye");
  this.classList.toggle("fa-eye-slash");
});
