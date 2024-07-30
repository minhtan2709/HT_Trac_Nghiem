<?php

session_start(); // bắt đầu phiên làm việc
include "connection.php";


if (isset($_POST['submit'])) { // sử dụng hàm isset($_POST['submit']) kiểm tra xem biểu mẫu đã được gửi đi chưa

    // mysqli_real_escape_string() bảo vệ khỏi tấn công SQL injection
    // và lấy thông tin email và password được gửi từ biểu mẫu
    $name = mysqli_real_escape_string($link, $_POST['username']);
    $pass = md5($_POST['password']);

    $select = " SELECT * FROM registration WHERE username = '$name' && password = '$pass' "; // truy vấn sql

    $result = mysqli_query($link, $select); // thực hiện truy vấn và lưu thông tin vào biến result
    
    // kiểm tra có bản ghi nào phù hợp với thông tin đăng nhập hay không
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result); // mysqli_fetch_array() để lấy bản ghi đầu tiên từ kết quả truy vấn và lưu trữ nó trong biến $row
        $_SESSION['username'] = $row['username']; //  lưu tên đăng nhập của người dùng vào biến phiên làm việc
         // chuyển hướng người dùng tới trang select_exam.php
        header('location: select_exam.php');
        exit(); // dừng toàn bộ quá trình và chuyển hướng đến trang khác
    } else {
        $error[] = 'Không đúng tên người dùng hoặc mật khẩu';
    }
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- icon title -->
    <link rel="icon" type="image/png" href="/online-quiz/img/User_icon_2.svg.png" />


    <!-- Tên web -->
    <title>Đăng nhập người dùng</title>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/loginuser.css">

    <!-- Thư viện icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>


    <div class="form-container">

        <form action="" method="post">
            <h3>Đăng nhập</h3>
            <?php
            if (isset($error)) { // sử dụng hàm isset() để kiểm tra xem biến $error đã được khởi tạo hay chưa
                foreach ($error as $error) { // vòng lặp foreach sẽ lặp qua mỗi phần tử trong mảng $error 
                    // và hiển thị nó dưới dạng một thông báo lỗi
                    echo '<span class="error-msg">' . $error . '</span>';
                };
            };
            ?>

            <div class="input-icon-login">
                <input type="text" name="username" required placeholder="Nhập tên người dùng">
                <!-- Thêm icon vào bên phải của input -->
                <i class="fas fa-envelope"></i>
            </div>

            <div class="input-icon-pass-use">

                <input type="password" name="password" required placeholder="********" id="password">
                <i class="fas fa-eye" id="togglePassword"></i>
                <!-- file JS -->
                <script src="/login system admin/js/showorhide.js"></script>
            </div>

            <input type="submit" name="submit" value="Đăng nhập" class="form-btn">

            <p>Bạn chưa có tài khoản ? <a href="register.php">Đăng kí tại đây!</a></p>
        </form>

    </div>

</body>

</html>