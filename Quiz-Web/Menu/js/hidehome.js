// Lấy tất cả các thẻ menu trừ thẻ Home
const menuLinks = document.querySelectorAll("nav ul li:not(:first-child) a");

// Lặp qua các thẻ menu và thêm sự kiện khi được bấm
menuLinks.forEach((link) => {
  link.addEventListener("click", () => {
    // Ẩn class "contents"
    document.querySelector(".contents").style.display = "none";
  });
});
