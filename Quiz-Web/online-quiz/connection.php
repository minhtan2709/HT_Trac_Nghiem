<?php
$link = mysqli_connect("localhost", "root", "");
// kết nối với mysql, trên máy chủ localhost
// sử dụng tài khoản đăng nhập là 'root', không có mật khẩu
mysqli_select_db($link, "online_quiz"); // chọn CSDL "online_quiz"