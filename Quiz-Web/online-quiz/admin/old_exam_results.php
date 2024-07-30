<?php
session_start();
include "header_old_exam_results.php";
include "../connection.php";






if(!isset($_SESSION["admin_name"]))
{
    ?>
<script type="text/javascript">
window.location = "/login system admin/login_form.php";
</script>
<?php
}

?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Tất cả kết quả thi</h1>
            </div>
        </div>
    </div>

</div>

<div class="content mt-3">
    <div class="animated fadeIn">


        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-body">
                        <center>
                            <h1 style="margin-bottom: 10px;">Bảng kết quả thi</h1>
                        </center>

                        <button onclick="location.href='export_pdf.php'">
                            <div class="button-text">Xuất bảng kết quả<div>
                        </button>


                        <?php
                                $count=0;
                        $res=mysqli_query($link,"select * from exam_results order by id desc");
                        $count=mysqli_num_rows($res);

                        if($count==0)
                        {
                            ?>
                        <center>
                            <h1>Không có kết quả nào</h1>
                        </center>
                        <?php
}
else{
    echo "<table class='table table-bordered'>";
    echo "<tr style='background-color:#059862; color:white;'>";
    echo "<th style='text-align:center;'>"; echo "Tên tài khoản"; echo "</th>";
    echo "<th style='text-align:center;'>"; echo "Chủ đề thi"; echo "</th>";
    echo "<th style='text-align:center;'>";echo "Tổng câu hỏi"; echo "</th>";
    echo "<th style='text-align:center;'>";echo "Đáp án đúng"; echo "</th>";
    echo "<th style='text-align:center;'>"; echo "Đáp án sai";echo "</th>";
    echo "<th style='text-align:center;'>"; echo "Thời gian làm bài";echo "</th>";
    echo "</tr>";

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

            </div>
            <!--/.col-->


        </div>
    </div><!-- .animated -->
</div><!-- .content -->