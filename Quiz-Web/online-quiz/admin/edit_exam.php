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

$id=$_GET["id"];


$logo="";
$res=mysqli_query($link, "select * from exam_category where id=$id");
while($row=mysqli_fetch_array($res))
{
    $exam_category=$row["category"];
    $exam_time=$row["exam_time_in_minutes"];
    $exam_logo=$row["logo"];

}
?>
<div class="breadcrumbs">
    <div class="col-sm-6">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Chỉnh sửa chủ đề, thời gian kiểm tra, logo</h1>
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
                                    <div class="card-header"><strong>Chỉnh sửa</strong></div>
                                    <div class="card-body card-block">
                                        <div class="form-group"><label for="company" class=" form-control-label">Chủ đề
                                            </label><input type="text" name="examname" placeholder="Cập nhật chủ đề"
                                                class="form-control" value="<?php echo $exam_category;?>"></div>
                                        <div class=" form-group"><label for="vat" class=" form-control-label">Thời gian
                                            </label><input type="text" placeholder="Cập nhật thời gian"
                                                class="form-control" name="examtime" value="<?php echo $exam_time;?>">
                                        </div>

                                        <div class="form-group">

                                            <label for="company" class=" form-control-label">Logo
                                            </label><input type="file" name="flogoi" class="form-control"
                                                style="padding-bottom: 40px; margin-bottom: 10px">
                                            <img src="<?php echo $exam_logo; ?>" height="50" width="50"><br>

                                        </div>


                                        <div class=" form-group">
                                            <input type="submit" name="submitl" value="Cập nhật chủ đề, thời gian, logo"
                                                class="btn btn-success">
                                        </div>
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
    $logo=$_FILES["flogoi"]["name"];
    
    $tm=md5 (time());

    // logo
    $dst_db1 = "";
    if ($logo != "") {
        $dst1 = "./logoimg/" . $tm . $logo;
        $dst_db1 = "logoimg/" . $tm . $logo;
        move_uploaded_file($_FILES["flogoi"]["tmp_name"], $dst1);
    }
    if ($dst_db1 != "") {
        mysqli_query($link, "update exam_category set category='$_POST[examname]', exam_time_in_minutes='$_POST[examtime]', logo='$dst_db1' where id=$id") or die(mysqli_error($link));
    } else {
        mysqli_query($link, "update exam_category set category='$_POST[examname]', exam_time_in_minutes='$_POST[examtime]' where id=$id") or die(mysqli_error($link));
    }
    
    
    ?>
<script type="text/javascript">
alert("Cập nhật chủ đề câu hỏi thành công");
window.location = "exam_category.php";
</script>
<?php
}
?>