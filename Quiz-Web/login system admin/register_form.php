<?php

@include 'config.php'; // nạp tập tin cấu hình cho kết nối tới cơ sở dữ liệu MySQL

if (isset($_POST['submit'])) { // sử dụng hàm isset($_POST['submit']) kiểm tra xem biểu mẫu đã được gửi đi chưa

    // mysqli_real_escape_string() bảo vệ khỏi tấn công SQL injection
    // và lấy thông tin email và password được gửi từ biểu mẫu
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']); // md5() để mã hóa password
    $cpass = md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];

    //kiem tra xem tồn tại name hay chưa && name = '$name'
    $select = " SELECT * FROM user_form WHERE email='$email'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) { // kiểm tra số lượng bản ghi trong kết quả truy vấn 
        // nếu lớn hơn không nghĩa là người dùng đã dùng email này đăng ký trước đó 
        $error[] = 'Người dùng đã tồn tại';
    } else {

        if ($pass != $cpass) { // kiểm tra mật khẩu và nhập lại mật khẩu có trùng nhau
            $error[] = 'Mật khẩu không giống nhau !';
        } else {
            // dùng INSERT INTO để thêm thông tin người dùng
            $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
            mysqli_query($conn, $insert); // thêm dữ liệu mới vào CSDL
            header('location:login_form.php'); // chuyển hướng người dùng đến trang đăng nhập
        }
    }
};


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tên web -->
    <title>Đăng kí admin</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Thư viện icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">



</head>

<body>

    <div class="form-container">

        <form action="" method="post">
            <h3>Đăng kí</h3>
            <?php
            if (isset($error)) { // sử dụng hàm isset() để kiểm tra xem biến $error đã được khởi tạo hay chưa
                foreach ($error as $error) { // vòng lặp foreach sẽ lặp qua mỗi phần tử trong mảng $error 
                    // và hiển thị nó dưới dạng một thông báo lỗi
                    echo '<span class="error-msg">' . $error . '</span>';
                };
            };
            ?>
            <div class="input-icon-login">
                <input type="text" name="name" required placeholder="Nhập vào họ tên">
                <!-- Thêm icon vào bên phải của input -->
                <i class="fas fa-user"></i>
            </div>

            <div class="input-icon-login">
                <input type="email" name="email" required placeholder="Nhập email">
                <i class="fas fa-envelope"></i>
            </div>

            <div class="input-icon-login">

                <input type="password" name="password" required placeholder="*********" id="password">
                <i class="fas fa-eye" id="togglePassword"></i>
                <!-- file JS -->
                <script src="js/showorhide.js"></script>
            </div>

            <div class="input-icon-login">

                <input type="password" name="cpassword" required placeholder="*********" id="cpassword">
                <i class="fas fa-eye" id="ctogglePassword"></i>
                <!-- file JS -->
                <script src="js/showorhide2.js"></script>
            </div>

            <select name="user_type">
                <!-- <option value="user">user</option> -->
                <option value="admin">admin</option>
            </select>

            <input type="submit" name="submit" value="Đăng kí" class="form-btn">
            <p>Bạn đã có tài khoản ? <a href="login_form.php">Đăng nhập tại đây</a></p>
        </form>

    </div>

</body>

</html>