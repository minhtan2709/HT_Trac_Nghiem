<?php
session_start();
include "header_add_edit_exam_quest.php";
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
    <div class="col-sm-12">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Chọn danh mục bài kiểm tra để thêm và chỉnh sửa câu hỏi</h1>
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
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">Chủ đề đã được thêm
                                    </strong>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">STT</th>
                                                <th scope="col">Chủ đề</th>
                                                <th scope="col">Thời gian</th>
                                                <th scope="col">Chọn chủ đề</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php 
                                                $count=0;
                                            $res=mysqli_query($link,"select * from exam_category");
                                            while($row=mysqli_fetch_array($res))
                                            {
                                                $count=$count+1;
                                                ?>
                                            <tr>
                                                <th scope="row"><?php echo $count; ?></th>
                                                <td><?php echo $row["category"]; ?></td>
                                                <td><?php echo $row["exam_time_in_minutes"]; ?></td>
                                                <td><a href="add_edit_quest.php?id=<?php echo $row["id"]; ?>"> Chọn
                                                    </a>
                                                </td>


                                            </tr>
                                            <?php
                                            }
                                            ?>



                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <!--/.col-->


        </div>
    </div><!-- .animated -->
</div><!-- .content -->