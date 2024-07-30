<?php
session_start();// bắt đầu phiên làm việc

if(!isset($_SESSION["username"])) // kiểm tra xem biến SESSION có tên "username" đã được đặt hay chưa
{
    ?>
<script type="text/javascript">
window.location = "login.php"; // chuyển hướng đến trang đăng nhập
</script>
<?php
}
// nạp tập tin cấu hình cho kết nối tới cơ sở dữ liệu MySQL
include "connection.php";
include "header-register-update.php";

if (isset($_POST['submit'])) { // sử dụng hàm isset($_POST['submit']) kiểm tra xem biểu mẫu đã được gửi đi chưa
    // mysqli_real_escape_string() bảo vệ khỏi tấn công SQL injection
    // và lấy thông tin được gửi từ biểu mẫu
    $lastname = mysqli_real_escape_string($link, $_POST['lastname']);
    $firstname = mysqli_real_escape_string($link, $_POST['firstname']);
    $pass = md5($_POST['password']); // md5() để mã hóa password
    $cpass = md5($_POST['cpassword']);
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $contact = mysqli_real_escape_string($link, $_POST['contact']);
    $birthday = mysqli_real_escape_string($link, $_POST['birthday']);
    $phone_number = mysqli_real_escape_string($link, $_POST['phonenum']);


    //
    if (isset($_POST["submit"])) { // sử dụng hàm isset($_POST['submit']) kiểm tra xem biểu mẫu đã được gửi đi chưa
        if ($pass != $cpass) { // kiểm tra mật khẩu và nhập lại mật khẩu có trùng nhau
            $error[] = 'Mật khẩu không giống nhau !';
            $res = mysqli_query($link, "SELECT * FROM registration WHERE username='" . $_SESSION["username"] . "'") or die(mysqli_error($link));
            //biến $row sẽ lấy lại thông tin của người dùng từ cơ sở dữ liệu và gán vào các ô input để hiển thị lại các giá trị đã nhập của người dùng. Nếu không có lỗi, code sẽ tiếp tục xử lý như bình thường và chuyển
            $row = mysqli_fetch_assoc($res); 
        } 
        else{
        // thực hiện truy vấn và lưu thông tin vào biến res
        $res = mysqli_query($link, "SELECT * FROM registration WHERE username='" . $_SESSION["username"] . "'") or die(mysqli_error($link));
        $pass = md5($_POST['password']); // md5() để mã hóa password
        // thực hiện truy vấn và cập nhật thông tin
        mysqli_query($link, "UPDATE registration SET firstname='$_POST[firstname]', lastname='$_POST[lastname]', password='$pass', email='$_POST[email]', contact='$_POST[contact]',birthday='$_POST[birthday]',phonenum='$_POST[phonenum]' WHERE username='" . $_SESSION["username"] . "'") or die(mysqli_error($link));

        header("Location: login.php"); // chuyển hướng đến trang login
        exit(); // dừng toàn bộ quá trình và chuyển hướng đến trang khác
        }
    }
}
else {
    $res = mysqli_query($link, "SELECT * FROM registration WHERE username='" . $_SESSION["username"] . "'") or die(mysqli_error($link));
    $row = mysqli_fetch_assoc($res);
}


?>


<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">


    <!-- custom css file link  -->
    <link rel="stylesheet" href="/online-quiz/css/change_info.css">

    <!-- Thư viện icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">



</head>

<body>

    <div class="form-container">

        <form action="" method="post">
            <h3>Cập nhật thông tin</h3>
            <?php
            if (isset($error)) { // sử dụng hàm isset() để kiểm tra xem biến $error đã được khởi tạo hay chưa
                foreach ($error as $error) { // vòng lặp foreach sẽ lặp qua mỗi phần tử trong mảng $error 
                    // và hiển thị nó dưới dạng một thông báo lỗi
                    echo '<span class="error-msg">' . $error . '</span>';
                };
            };
            ?>

            <div class="input-icon-login">
                <input type="text" name="lastname" placeholder="Cập nhật họ" value="<?php echo $row['lastname']; ?>">
                <i class="fas fa-user"></i>

                <div class="input-icon-login">
                    <input type="text" name="firstname" required placeholder="Cập nhật tên"
                        value="<?php echo $row['firstname']; ?>">
                    <i class="fas fa-user"></i>
                </div>


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
                <input type="email" name="email" required placeholder="Cập nhật email"
                    value="<?php echo $row['email']; ?>">
                <i class="fas fa-envelope"></i>
            </div>

            <div class="input-icon-login">
                <input type="text" name="contact" required placeholder="Cập nhật địa chỉ liên hệ và số điện thoại"
                    value="<?php echo $row['contact']; ?>">
                <i class="fas fa-address-card input-icon"></i>

            </div>

            <div class="input-icon-login">
                <input type="date" name="birthday" placeholder="Ngày sinh" required
                    value="<?php echo $row['birthday']; ?>">
                <i class="fas fa-calendar"></i>
            </div>

            <div class="input-icon-login">
                <!-- onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" giới hạn chỉ nhập được các số từ 0 đến 9 (mã ký tự trong bảng mã ASCII).-->
                <input type="text" name="phonenum" required placeholder="Nhập số điện thoại"
                    onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"
                    value="<?php echo $row['phonenum']; ?>">
                <i class="fas fa-phone input-icon"></i>
            </div>

            <input type="submit" name="submit" value="Cập nhật" class="form-btn">
        </form>

    </div>

</body>