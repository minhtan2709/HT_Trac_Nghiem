// Lấy đường dẫn của file about.html
var aboutLink = document.getElementById("about-link");
var aboutUrl = aboutLink.getAttribute("href");

// Bắt sự kiện khi người dùng bấm vào liên kết "About"
aboutLink.addEventListener("click", function (event) {
  // Ngăn chặn trình duyệt tải lại trang web
  event.preventDefault();

  // Tải nội dung của file about.html bằng cách sử dụng fetch API
  fetch(aboutUrl)
    .then(function (response) {
      return response.text();
    })
    .then(function (html) {
      // Đưa nội dung của file about.html vào div "content"
      var contentDiv = document.getElementById("content");
      contentDiv.innerHTML = html;

      // Thêm lớp "active" vào liên kết "About" và xoá lớp "active" khỏi liên kết "Home"
      var homeLink = document.querySelector('a[href=""]');
      homeLink.classList.remove("active");
      var introLink = document.getElementById("intro-link");
      introLink.classList.remove("active");

      aboutLink.classList.add("active");
    })
    .catch(function (error) {
      console.log(error);
    });
});
