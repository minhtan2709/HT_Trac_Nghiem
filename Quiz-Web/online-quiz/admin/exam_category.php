<?php
session_start();
include "header.php";
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
                <h1>Chủ đề thi</h1>
            </div>
        </div>
    </div>

</div>

<div class="content mt-3">
    <div class="animated fadeIn">


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <form name="forml" action="" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header"><strong>Chủ đề</strong></div>
                                    <div class="card-body card-block">
                                        <div class="form-group"><label for="company" class=" form-control-label">Chủ đề
                                                mới</label><input type="text" name="examname" placeholder="Nhập chủ đề"
                                                class="form-control"></div>

                                        <div class="form-group"><label for="vat" class=" form-control-label">Thời
                                                gian làm bài</label><input type="text" placeholder="Nhập thời gian"
                                                class="form-control" name="examtime"></div>

                                        <div class="form-group"><label for="company" class=" form-control-label">Logo
                                            </label><input type="file" name="logoi" class="form-control"
                                                style="padding-bottom: 35px;"></div>
                                        <div class="form-group">
                                            <input type="submit" name="submitl" value="Thêm chủ đề"
                                                class="btn btn-success">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">Chủ đề đã được thêm</strong>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">STT</th>
                                                    <th scope="col">Chủ đề</th>
                                                    <th scope="col">Thời gian</th>
                                                    <th scope="col">Logo</th>
                                                    <th scope="col">Chỉnh sửa</th>
                                                    <th scope="col">Xoá câu hỏi</th>

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

                                                    <?php
                                                    echo "<td>";

                                                    if(strpos($row["logo"],'logoimg')!==false)
                                                    {
                                                    ?>
                                                    <img src="<?php echo $row["logo"];?> " height="40" width="40">
                                                    <?php
                                                    }

                                                    echo "</td>";
                                                    ?>
                                                    <td><a href="edit_exam.php?id=<?php echo $row["id"]; ?>"> Chỉnh sửa
                                                        </a>
                                                    </td>
                                                    <td><a href="delete.php?id=<?php echo $row["id"]; ?>">Xoá</a>
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
                    </form>
                </div>

            </div>
            <!--/.col-->


        </div>
    </div><!-- .animated -->
</div><!-- .content -->



<?php 
if(isset($_POST["submitl"])){

    
    $tm=md5 (time());

    //logo
    $fnm1=$_FILES["logoi"]["name"];
    $dst1="./logoimg/".$tm.$fnm1;
    $dst_db = "logoimg/".$tm.$fnm1;
    move_uploaded_file($_FILES["logoi"]["tmp_name"],$dst1);

    mysqli_query($link,"insert into exam_category value(NULL, '$_POST[examname]','$_POST[examtime]','$dst_db')") or die(mysqli_error($link));

    ?>
<script type="text/javascript">
alert("Thêm chủ đề thành công");
window.location.href = window.location.href;
</script>
<?php

}

?>