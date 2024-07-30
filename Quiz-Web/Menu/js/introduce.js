// Lấy đường dẫn của file intro.html
var introLink = document.getElementById("intro-link");
var introUrl = introLink.getAttribute("href");

// Bắt sự kiện khi người dùng bấm vào liên kết "intro"
introLink.addEventListener("click", function (event) {
  // Ngăn chặn trình duyệt tải lại trang web
  event.preventDefault();

  // Tải nội dung của file intro.html bằng cách sử dụng fetch API
  fetch(introUrl)
    .then(function (response) {
      return response.text();
    })
    .then(function (html) {
      // Đưa nội dung của file intro.html vào div "content"
      var contentDiv = document.getElementById("content");
      contentDiv.innerHTML = html;

      // Thêm lớp "active" vào liên kết "intro" và xoá lớp "active" khỏi liên kết "about" và "Home"
      var homeLink = document.querySelector('a[href=""]');
      homeLink.classList.remove("active");
      var aboutLink = document.getElementById("about-link");
      aboutLink.classList.remove("active");

      introLink.classList.add("active");
    })
    .catch(function (error) {
      console.log(error);
    });
});
