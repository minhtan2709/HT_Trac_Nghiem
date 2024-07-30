<?php
session_start(); // bắt đầu phiên làm việc của người dùng trên trang web
session_destroy(); // hủy bỏ phiên làm việc đó. Tất cả các biến phiên và thông tin phiên sẽ bị xóa khỏi bộ nhớ 
// và người dùng sẽ phải đăng nhập lại nếu muốn sử dụng trang web
?>

<script type="text/javascript">
window.location = "/Menu/index.html"; // chuyển hướng đến trang menu
</script>