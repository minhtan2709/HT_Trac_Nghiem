<?php
session_start(); // bắt đầu phiên làm việc

if(!isset($_SESSION["username"])) // kiểm tra xem biến SESSION có tên "username" đã được đặt hay chưa
{
    ?>
<script type="text/javascript">
window.location = "login.php"; // chuyển hướng đến trang đăng nhập
</script>
<?php
}
?>
<?php
include "connection.php";
include "header.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <link rel="stylesheet" href="/online-quiz/css/homeinexam.css">
</head>

<body>




    <div class="rowz">


        <?php
// Truy vấn cơ sở dữ liệu để lấy các phần tử của exam_category
$sql = "SELECT * FROM exam_category";
$result = mysqli_query($link, $sql);


?>

        <div class="rowz">
            <div class="button-container">
                <?php
    // Sử dụng vòng lặp để tạo các nút theo mỗi phần tử của mảng
    for ($i=0;$row = mysqli_fetch_array($result);$i++) {
        $category_name = $row['category'];
        $exam_logo = $row['logo'];

        ?>

                <button class="my-btn" onclick="set_exam_type_session('<?php echo $category_name; ?>')">
                    <br>

                    <!-- Hình ảnh -->
                    <img style="height:250px;width:250px" src="admin/<?php echo $exam_logo; ?>" alt="Logo">

                    <span><?php echo $category_name ?></span>

                </button>

                <?php


    }
    ?>
            </div>
        </div>

    </div>



    </div>
</body>

</html>




<script type="text/javascript">
function set_exam_type_session(exam_category) {
    // XMLHttpRequest để gửi yêu cầu HTTP đến server và nhận lại kết quả từ server mà không cần tải lại trang
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() { // theo dõi trạng thái của đối tượng XMLHttpRequest
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { // kiểm tra trạng thái của XMLHttpRequest
            window.location = "dashboard.php"; // chuyển hướng đến trang thi
        }
    };
    // sử dụng xmlhttp để tạo một yêu cầu GET HTTP đến tệp set_exam_type_session.php nằm trong thư mục forajax trên server
    xmlhttp.open("GET", "forajax/set_exam_type_session.php?exam_category=" + exam_category, true);
    // chuỗi kết hợp của địa chỉ tệp và tham số exam_category để truy vấn bài thi
    // true để bật chế độ bất đồng bộ cho yêu cầu GET
    xmlhttp.send(null); // hàm send(null) dùng để gửi yêu cầu đến máy chủ 
}
</script>