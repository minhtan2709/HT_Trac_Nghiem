<?php
session_start();
include "header_instruct.php";
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

<?php
// lấy cột của sql
$res=mysqli_query($link, "select * from exam_instruct");
while($row=mysqli_fetch_array($res))
{
    $exam_instruct=$row["instruct"];

}
?>


<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Chỉnh sửa hướng dẫn</h1>
            </div>
        </div>
    </div>

</div>

<div class="content mt-3">
    <div class="animated fadeIn">


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <form name="forml" action="" method="post">
                        <div class="card-body">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header"><strong>Chỉnh sửa</strong></div>
                                    <div class="card-body card-block">
                                        <div class="form-group">

                                            <textarea type="text" name="instruct" placeholder="Cập nhật chủ đề"
                                                class="form-control"
                                                style="height: 350px"><?php echo $exam_instruct;?></textarea>
                                        </div>


                                        <div class="form-group">
                                            <input type="submit" name="submitl" value="Cập nhật hướng dẫn"
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
    mysqli_query($link,"update exam_instruct set instruct='$_POST[instruct]'") or die(mysqli_error($link));

    ?>
<script type="text/javascript">
alert("Cập nhật hướng dẫn thành công");
window.location.href = "instruct_exam.php";
</script>
<?php
}
?>