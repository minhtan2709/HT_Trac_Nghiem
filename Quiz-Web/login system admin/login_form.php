<?php

session_start(); // bắt đầu phiên làm việc
// nạp tập tin cấu hình cho kết nối tới cơ sở dữ liệu MySQL
@include 'config.php'; 
@include './online-quiz/connection.php';


if (isset($_POST['submit'])) { // sử dụng hàm isset($_POST['submit']) kiểm tra xem biểu mẫu đã được gửi đi chưa

    // mysqli_real_escape_string() bảo vệ khỏi tấn công SQL injection
    // và lấy thông tin email và password được gửi từ biểu mẫu
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']); // md5() để mã hóa password

    // truy vấn SQL
    $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

    $result = mysqli_query($conn, $select); // thực hiện truy vấn và lưu thông tin vào biến result

    // kiểm tra có bản ghi nào phù hợp với thông tin đăng nhập hay không
    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_array($result); // mysqli_fetch_array() để lấy bản ghi đầu tiên từ kết quả truy vấn và lưu trữ nó trong biến $row

        if ($row['user_type'] == 'admin') { // kiểm tra xem giá trị của trường user_type có bằng admin không 

            $_SESSION['admin_name'] = $row['name']; // lưu tên quản trị viên vào session với giá trị của trường name
            // chuyển hướng người dùng tới trang quản lý (tức là file exam_category.php trong thư mục admin
            header('location:../online-quiz/admin/exam_category.php'); 
            exit(); // dừng toàn bộ quá trình và chuyển hướng đến trang khác
        }
    } else { // nếu thông tìm thấy
        $error[] = 'Không đúng email hoặc mật khẩu';
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
    <link rel="icon" type="image/png" href="/login system admin/img/admin_title.png" />

    <!-- Tên web -->
    <title>Đăng nhập admin</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

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
                <input type="email" name="email" required placeholder="Nhập email">
                <!-- Thêm icon vào bên phải của input -->
                <i class="fas fa-envelope"></i>
            </div>

            <div class="input-icon-pass-use">

                <input type="password" name="password" required placeholder="********" id="password">
                <i class="fas fa-eye" id="togglePassword"></i>
                <!-- file JS -->
                <script src="js/showorhide.js"></script>
            </div>

            <input type="submit" name="submit" value="Đăng nhập" class="form-btn">

            <p>Bạn chưa có tài khoản ? <a href="register_form.php">Đăng kí tại đây!</a></p>
        </form>

    </div>

</body>

</html>