<?php
session_start(); // bắt đầu phiên làm việc
// nạp tập tin cấu hình cho kết nối tới cơ sở dữ liệu MySQL
include "header-result.php";
include "connection.php";

if(!isset($_SESSION["username"])) // kiểm tra xem biến SESSION có tên "username" đã được đặt hay chưa
{
    ?>
<script type="text/javascript">
window.location = "login.php"; // chuyển hướng đến trang đăng nhập
</script>
<?php
}
?>



<div class="rowz">
    <div style="margin-top:60px">
        <center>
            <h1 style="color: #059862">BẢNG KẾT QUẢ</h1>
        </center>
        <?php
        $count=0;
// truy vấn để lấy tất cả các kết quả thi của người dùng đã đăng nhập ($_SESSION[username])
// sắp xếp chúng theo thứ tự giảm dần của trường id
$res=mysqli_query($link,"select * from exam_results where username='$_SESSION[username]' order by id desc");
// mysqli_num_rows() để đếm số lượng kết quả trả về từ truy vấn trên và lưu vào biến $count
$count=mysqli_num_rows($res);

if($count==0) // nếu biến count bằng 0 (người dùng chưa làm bài nào)
{
    ?>
        <center>
            <h1>Chưa có kết quả nào vì bạn chưa làm bài</h1>
        </center>
        <?php
}
else{
    echo "<table class='tables'>";
    echo "<tr class='trz'>";
    echo "<th>"; echo "Tên tài khoản"; echo "</th>";
    echo "<th>"; echo "Chủ đề thi"; echo "</th>";
    echo "<th>";echo "Tổng câu hỏi"; echo "</th>";
    echo "<th>";echo "Đáp án đúng"; echo "</th>";
    echo "<th>"; echo "Đáp án sai";echo "</th>";
    echo "<th>"; echo "Thời gian làm bài";echo "</th>";
    echo "</tr>";
    
    // hiển thị thông tin bài thi người dùng
    while($row=mysqli_fetch_array($res))
    {
        echo "<tr>";
        echo "<td style='text-align:center;'>"; echo $row["username"]; echo "</td>";
        echo "<td style='text-align:center;'>"; echo $row["exam_type"]; echo "</td>";
        echo "<td style='text-align:center;'>";echo $row["total_question"]; echo "</td>";
        echo "<td style='text-align:center;'>";echo $row["correct_answer"]; echo "</td>";
        echo "<td style='text-align:center;'>"; echo $row["wrong_answer"];echo "</td>";
        echo "<td style='text-align:center;'>"; echo $row["exam_time"];echo "</td>";
        echo "</tr>";
    }

    echo "</table>";

}

?>
    </div>

</div>