<?php
session_start();
include "../connection.php";

if(!isset($_SESSION["admin_name"])) {
    // nếu chưa đăng nhập, chuyển hướng về trang đăng nhập
    header("Location: /login system admin/login_form.php");
    exit();
}

if(isset($_GET["id"])) {
    $id = $_GET["id"];
    $idl = $_GET["idl"];

    $result = mysqli_query($link, "SELECT * FROM questions WHERE id=$id");

    if(mysqli_num_rows($result) == 1) {
        // nếu tìm thấy dòng dữ liệu muốn xoá, hiển thị thông báo và tùy chọn xoá hoặc huỷ
        echo "
            <script>
                if(confirm('Bạn có chắc muốn xoá câu hỏi ?')) {
                    window.location.href = 'delete_option.php?id=$id&action=delete&idl=$idl';
                } else {
                    window.location.href = 'add_edit_quest.php?id=$idl';
                }
            </script>";
    } else {
        // nếu không tìm thấy dòng dữ liệu muốn xoá, hiển thị thông báo lỗi
        echo "<p>Lỗi: Không tìm thấy câu hỏi này.</p>";
    }
}

if(isset($_GET["action"]) && $_GET["action"] == "delete") {
    $id = $_GET["id"];
    $idl = $_GET["idl"];

    mysqli_query($link, "DELETE FROM questions WHERE id=$id");
    header("Location: add_edit_quest.php?id=$idl");
}
?>