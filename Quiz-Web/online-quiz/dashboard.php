<?php

session_start(); // bắt đầu phiên làm việc

include "connection.php";
include "header-exam.php";

// để cho khi chưa đăng nhập mà vẫn bấm vào link được
if(!isset($_SESSION["username"])) // kiểm tra xem biến $_SESSION["username"] đã được đặt hay chưa
{
    ?>
<script type="text/javascript">
window.location = "login.php"; // chuyển hương đến trang login
</script>
<?php
}

?>

<div class="tableOption">

    <!-- Start editing -->
    <br>
    <div class="timez" id="countdowntimer" style="display: block; float:left; margin-left:10px"></div>

    <br>
    <div class="timemin">
        <div style="float:right; font-weight: bold;">Số câu: &nbsp;</div>
        <div id="current_que" style="float:right; font-weight: bold;">0</div>
        <div style="float:right; font-weight: bold;"> &nbsp;/ &nbsp;</div>

        <div id="total_que" style="float:right; font-weight: bold;">0</div>

    </div>

    <div id="load_questions"></div>

    <div class="button-container">
        <input type="button" class="buttonnext" value="Câu trước" onclick="load_previous();">&nbsp;
        <input type="button" class="buttonprev" value="Câu tiếp theo" onclick="load_next();">
    </div>


    <!-- end editing -->
</div>



<script type="text/javascript">
function load_total_que() {
    var xmlhttp = new XMLHttpRequest(); // XMLHttpRequest để tương tác với máy chủ
    xmlhttp.onreadystatechange = function() {
        // nếu trạng thái của yêu cầu là 4 và trạng thái HTTP là 200, 
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            // nội dung phản hồi sẽ được gán vào phần tử HTML có id là "total_que"
            document.getElementById("total_que").innerHTML = xmlhttp.responseText;
        }
    };
    // một yêu cầu HTTP GET được tạo để tải nội dung từ tệp PHP "load_total_que.php"
    xmlhttp.open("GET", "forajax/load_total_que.php", true);
    xmlhttp.send(null); // hàm send(null) dùng để gửi yêu cầu đến máy chủ 
}


var questionno = "1"; // khởi tạo biến questionno và gán bằng 1
load_questions(questionno); // gọi hàm load_questions(questionno) để tải câu hỏi đầu tiên

// Hàm load_questions(questionno) được sử dụng để gửi yêu cầu Ajax đến một trang PHP để lấy câu hỏi từ CSDL
// Tham số questionno được truyền vào để chỉ định số thứ tự của câu hỏi được yêu cầu
function load_questions(questionno) {

    // đưa giá trị của biến questionno vào phần tử HTML có id là "current_que"
    // và hiển thị số câu hỏi hiện tại trên giao diện
    document.getElementById("current_que").innerHTML = questionno;
    // XMLHttpRequest để gửi yêu cầu HTTP đến server và nhận lại kết quả từ server mà không cần tải lại trang
    var xmlhttp = new XMLHttpRequest(); 
    xmlhttp.onreadystatechange = function() { // theo dõi trạng thái của đối tượng XMLHttpRequest
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) { // kiểm tra trạng thái của XMLHttpRequest
            if (xmlhttp.responseText == "over") { // nếu phản hồi trả về là "over"
                window.location = "result.php"; // chuyển hướng đến trang kết quả 
            } else { // nếu không phản hồi over thì hiển thị câu hỏi tiếp theo
                document.getElementById("load_questions").innerHTML = xmlhttp.responseText;
                load_total_que(); // hiển thị số lượng câu hỏi
            }

        }
    };
    // sử dụng xmlhttp để tạo một yêu cầu GET HTTP đến tệp load_questions.php nằm trong thư mục forajax trên server
    xmlhttp.open("GET", "forajax/load_questions.php? questionno=" + questionno, true);
    // chuỗi kết hợp của địa chỉ tệp và tham số questionno để truy vấn thông tin câu hỏi cần tải
    // true để bật chế độ bất đồng bộ cho yêu cầu GET
    xmlhttp.send(null); // hàm send(null) dùng để gửi yêu cầu đến máy chủ 
}

//Hàm radioclick được sử dụng để lưu câu trả lời của ngdùng vào session khi họ chọn câu trả lời cho một câu hỏi trắc nghiệm.
function radioclick(radiovalue, questionno) { // radiovalue là câu trả lời được chọn, questionno là stt câu hỏi

    // hàm sử dụng đối tượng XMLHttpRequest để gửi yêu cầu đến trang save_answer_in_session.php
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

        }
    };
    // sử dụng xmlhttp để tạo một yêu cầu GET HTTP đến tệp save_answer_in_session.php nằm trong thư mục forajax trên server
    xmlhttp.open("GET", "forajax/save_answer_in_session.php?questionno=" + questionno + "&value1=" + radiovalue, true);
    // true để bật chế độ bất đồng bộ cho yêu cầu GET
    xmlhttp.send(null); // hàm send(null) dùng để gửi yêu cầu đến máy chủ 

}

// Hàm load_previous được sử dụng để tải câu hỏi trước
function load_previous() {
    if (questionno == "1") { // nếu bằng 1
        load_questions(questionno); // load lại câu hỏi đầu tiên
    } else { // nếu lớn hơn 1
        questionno = eval(questionno) - 1; // giảm questionno xuống 1
        load_questions(questionno); // load câu hỏi vừa được tính
    }
}

// Hàm load_previous được sử dụng để tải câu hỏi sau
function load_next() {

    questionno = eval(questionno) + 1; // tăng questionno lên 1
    load_questions(questionno); // load câu hỏi vừa được tính

}
</script>