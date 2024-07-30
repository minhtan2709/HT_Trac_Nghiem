<?php

@include '../login system/config.php'; // nạp tập tin cấu hình cho kết nối tới cơ sở dữ liệu MySQL

session_start(); // bắt đầu phiên làm việc
session_unset(); // xóa tất cả các phiên làm việc đã lưu trữ trong phiên làm việc hiện tại
session_destroy(); // hủy toàn bộ phiên làm việc đang hoạt động và xóa toàn bộ dữ liệu liên quan đến phiên đó khỏi bộ nhớ

header('location:/Menu/index.html'); // chuyển hướng về trang chủ