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

$id = $_GET["id"];
$idl=$_GET["idl"];

$question="";
$opt1="";
$opt2="";
$opt3="";
$opt4="";
$answer="";


$res=mysqli_query($link,"select * from questions where id=$id");
while($row=mysqli_fetch_array($res))
{
    $question=$row["question"];
    $opt1=$row["opt1"];
    $opt2=$row["opt2"];
    $opt3=$row["opt3"];
    $opt4=$row["opt4"];
    $answer=$row["answer"];

}

?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Cập nhật câu hỏi loại văn bản</h1>
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

                        <!-- Quest text -->
                        <div class="col-lg-12">
                            <form name="forml" action="" method="post" enctype="multipart/form-data">
                                <div class="card">
                                    <div class="card-header"><strong>Cập nhật</strong></div>
                                    <div class="card-body card-block">
                                        <div class="form-group"><label for="company" class=" form-control-label">Cập
                                                nhật câu hỏi
                                            </label><input type="text" name="question" placeholder="câu hỏi"
                                                class="form-control" value="<?php echo $question; ?>"></div>

                                        <!-- op1 -->
                                        <div class="form-group"><label for="company" class=" form-control-label">Cập
                                                nhật lựa chọn 1
                                            </label><input type="text" name="opt1" placeholder="Lựa chọn 1"
                                                class="form-control" value="<?php echo $opt1; ?>"></div>

                                        <!-- op2 -->
                                        <div class="form-group"><label for="company" class=" form-control-label">Cập
                                                nhật lựa chọn 2
                                            </label><input type="text" name="opt2" placeholder="Lựa chọn 2"
                                                class="form-control" value="<?php echo $opt2; ?>"></div>

                                        <!-- op3 -->
                                        <div class="form-group"><label for="company" class=" form-control-label">Cập
                                                nhật lựa chọn 3
                                            </label><input type="text" name="opt3" placeholder="Lựa chọn 3"
                                                class="form-control" value="<?php echo $opt3; ?>"></div>

                                        <!-- op4 -->
                                        <div class="form-group"><label for="company" class=" form-control-label">Cập
                                                nhật lựa chọn 4
                                            </label><input type="text" name="opt4" placeholder="Lựa chọn 4"
                                                class="form-control" value="<?php echo $opt4; ?>"></div>

                                        <!-- Answer -->
                                        <div class="form-group"><label for="company" class=" form-control-label">Cập
                                                nhật đáp án
                                            </label><input type="text" name="answer" placeholder="Câu trả lời"
                                                class="form-control" value="<?php echo $answer; ?>"></div>

                                        <!-- Add Quest -->
                                        <div class="form-group">
                                            <input type="submit" name="submitl" value="Cập nhật câu hỏi"
                                                class="btn btn-success">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <!--/.col-->


        </div>
    </div><!-- .animated -->
</div><!-- .content -->


<?php
if(isset($_POST["submitl"]))
{
    mysqli_query($link,"update questions set question='$_POST[question]',opt1='$_POST[opt1]',opt2='$_POST[opt2]',opt3='$_POST[opt3]',opt4='$_POST[opt4]',answer='$_POST[answer]' where id=$id");
?>
<script type="text/javascript">
alert("Cập nhật câu hỏi thành công");
window.location = "add_edit_quest.php?id=<?php echo $idl ?>";
</script>
<?php
}
?>