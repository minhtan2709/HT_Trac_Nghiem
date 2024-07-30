<?php
session_start(); // bắt đầu phiên làm việc

include "connection.php";

if (isset($_POST['submit'])) { // sử dụng hàm isset($_POST['submit']) kiểm tra xem biểu mẫu đã được gửi đi chưa
    // mysqli_real_escape_string() bảo vệ khỏi tấn công SQL injection và lấy thông tin được gửi từ biểu mẫu
    $lastname = mysqli_real_escape_string($link, $_POST['lastname']);
    $firstname = mysqli_real_escape_string($link, $_POST['firstname']);
    $name = mysqli_real_escape_string($link, $_POST['username']);
    $pass = md5($_POST['password']); // md5() để mã hóa password
    $cpass = md5($_POST['cpassword']);
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $contact = mysqli_real_escape_string($link, $_POST['contact']);
    $birthday = mysqli_real_escape_string($link, $_POST['birthday']);
    $phone_number = mysqli_real_escape_string($link, $_POST['phonenum']);


    //kiem tra xem tồn tại name hay chưa && name = '$name'
    $select = " SELECT * FROM registration WHERE username='$name'"; // truy vấn sql
    $result = mysqli_query($link, $select); // thực hiện truy vấn và lưu thông tin vào biến result

    if (mysqli_num_rows($result) > 0) { // kiểm tra số lượng bản ghi trong kết quả truy vấn 
        // nếu lớn hơn không nghĩa là người dùng đã dùng email này đăng ký trước đó
        $error[] = 'Người dùng đã tồn tại';
    } else {

        if ($pass != $cpass) { // kiểm tra mật khẩu và nhập lại mật khẩu có trùng nhau
            $error[] = 'Mật khẩu không giống nhau !';
        } else {
            // dùng INSERT INTO để thêm thông tin người dùng
            $insert = "INSERT INTO registration(firstname, lastname, username, password,email,contact,birthday,phonenum) VALUES('$firstname','$lastname','$name','$pass','$email','$contact','$birthday','$phone_number')";
            mysqli_query($link, $insert); // thêm dữ liệu mới vào CSDL
            header('location:login.php'); // chuyển hướng người dùng đến trang đăng nhập
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

    <!-- icon title -->
    <link rel="icon" type="image/png" href="/online-quiz/img/User_icon_2.svg.png" />


    <title>Đăng kí người dùng</title>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="/online-quiz/css/loginuser.css">

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
                <input type="text" name="lastname" placeholder="Nhập vào họ">
                <i class="fas fa-user"></i>

                <div class="input-icon-login">
                    <input type="text" name="firstname" required placeholder="Nhập vào tên">
                    <i class="fas fa-user"></i>
                </div>


            </div>
            <div class="input-icon-login">
                <input type="text" name="username" placeholder="Nhập vào tên người dùng">
                <i class="fas fa-user"></i>
            </div>



            <div class="input-icon-login">

                <input type="password" name="password" required placeholder="*********" id="password">
                <i class="fas fa-eye" id="togglePassword"></i>
                <!-- file JS -->
                <script src="/login system admin/js/showorhide.js"></script>
            </div>

            <div class="input-icon-login">

                <input type="password" name="cpassword" required placeholder="*********" id="cpassword">
                <i class="fas fa-eye" id="ctogglePassword"></i>
                <!-- file JS -->
                <script src="/login system admin/js/showorhide2.js"></script>
            </div>

            <div class="input-icon-login">
                <input type="email" name="email" required placeholder="Nhập email">
                <i class="fas fa-envelope"></i>
            </div>

            <div class="input-icon-login">
                <input type="text" name="contact" required placeholder="Nhập địa chỉ liên hệ">
                <i class="fas fa-address-card input-icon"></i>
            </div>

            <div class="input-icon-login">
                <input type="date" name="birthday" placeholder="Ngày sinh" required>
                <i class="fas fa-calendar"></i>
            </div>


            <div class="input-icon-login">
                <!-- onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" giới hạn chỉ nhập được các số từ 0 đến 9 (mã ký tự trong bảng mã ASCII).
                    oninput="this.value=this.value.replace(/[^0-9]/g,'');" loại bỏ các ký tự không phải số khi người dùng paste hoặc nhập vào ô input.(này hơi lỗi nên khỏi) -->
                <input type="text" name="phonenum" placeholder="Nhập số điện thoại" required
                    onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                <i class="fas fa-phone input-icon"></i>
            </div>


            <input type="submit" name="submit" value="Đăng kí" class="form-btn">
            <p>Bạn đã có tài khoản ? <a href="login.php">Đăng nhập tại đây</a></p>
        </form>

    </div>

</body>

</html>