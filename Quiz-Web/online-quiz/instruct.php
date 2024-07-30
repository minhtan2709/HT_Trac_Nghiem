<?php

session_start(); // bắt đầu phiên làm việc
// nạp tập tin cấu hình cho kết nối tới cơ sở dữ liệu MySQL
include "connection.php";
include "header_instruct.php";

// để cho khi chưa đăng nhập mà vẫn bấm vào link được
if(!isset($_SESSION["username"]))
{
    ?>
<script type="text/javascript">
window.location = "login.php"; // chuyển hướng đến trang đăng nhập
</script>
<?php
}

?>

<div class="tableOption">
    <?php

    // Truy vấn cơ sở dữ liệu để lấy các phần tử của exam_instruct
    $sql = "SELECT instruct FROM exam_instruct"; // truy vấn SQL
    $result = mysqli_query($link, $sql); // thực hiện truy vấn và lưu thông tin vào biến result

    // Đây là một vòng lặp while trong PHP để lấy dữ liệu từ cơ sở dữ liệu thông qua biến $result, 
    // được thực hiện bởi hàm mysqli_fetch_assoc(). Vòng lặp này sẽ chạy cho đến khi không có dữ liệu nào còn để lấy.
    while($row = mysqli_fetch_assoc($result)) {
      echo "<div class='center-box '> <div class='center-txt'>" . $row['instruct'] . "</div></div>";
    }
?>
</div>