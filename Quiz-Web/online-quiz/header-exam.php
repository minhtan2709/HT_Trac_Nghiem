<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <link rel="icon" type="image/png" href="/Menu/Picture/icon-tab.png" />

    <title>THI TRẮC NGHIỆM</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- <link rel="stylesheet" href="/online-quiz/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="css1/font-awesome.min.css"> -->

    <!-- <link rel="stylesheet" href="/online-quiz/css/style.css"> -->
    <link rel="stylesheet" href="/online-quiz/css/homeinexam.css">

</head>

<body>




    <div class="menu-container">
        <ul class="menu">
            <li><a href="select_exam.php">TRANG CHỦ</a>
            </li>
            <li><a href="instruct.php">HƯỚNG DẪN SỬ DỤNG</a>
            </li>
            <li><a href="update_registration.php">CẬP NHẬT THÔNG TIN</a>
            </li>
            <li><a href="old_exam_results.php">KẾT QUẢ</a>
            </li>
            <li><a href="logout.php">ĐĂNG XUẤT</a>
            </li>
        </ul>
        <div class="user-info">
            <img src="/online-quiz/admin/images/360_F_349497933_Ly4im8BDmHLaLzgyKg2f2yZOvJjBtlw5.jpg" alt="Avatar"
                class="avatar">
            <!-- Biến $_SESSION["username"] lưu trữ thông tin tên đăng nhập của người dùng -->
            <span class="username"><?php echo $_SESSION["username"]; ?></span>
        </div>
    </div>
    <!-- Mobile Menu start -->

    <!-- Mobile Menu end -->

    <!-- <div class="timez" id="countdowntimer" style="display: block;"></div> -->

    <script type="text/javascript">
    setInterval(function() { // thực hiện một hành động lặp lại sau một khoảng thời gian nhất định
        timer(); // hàm timer() được gọi mỗi giây một lần để lấy thời gian còn lại trong bài kiểm tra
    }, 1000);

    function timer() {
        // dùng XMLHttpRequest để gửi một yêu cầu tới một tệp PHP load_timer.php để lấy thời gian còn lại trong bài kiểm tra
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                if (xmlhttp.responseText == "00:00:01") { // Nếu kết quả trả về là "00:00:01"
                    window.location = "result.php"; // chuyển hướng đến trang kết quả
                }
                // Nếu không, thời gian còn lại sẽ được hiển thị trên trang web bằng cách cập nhật phần tử HTML có id="countdowntimer"
                document.getElementById("countdowntimer").innerHTML = xmlhttp.responseText;

            }
        };
        // một yêu cầu HTTP GET được tạo để tải nội dung từ tệp PHP "load_timer.php"
        xmlhttp.open("GET", "forajax/load_timer.php", true);
        // true để bật chế độ bất đồng bộ cho yêu cầu GET
        xmlhttp.send(null); // hàm send(null) dùng để gửi yêu cầu đến máy chủ 
    }
    </script>