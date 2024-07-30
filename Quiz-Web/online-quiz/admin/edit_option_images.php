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
                <h1>Cập nhật câu hỏi loại hình ảnh</h1>
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

                            <!-- Quest images -->
                            <div class="col-lg-12">
                                <!-- <form name="form2" action="" method="post"> -->
                                <div class="card">
                                    <div class="card-header"><strong>Cập nhật<table></table></strong></div>
                                    <div class="card-body card-block">
                                        <div class="form-group"><label for="company" class=" form-control-label">Cập
                                                nhật câu hỏi
                                            </label><input type="text" name="fquestion" placeholder="Câu hỏi"
                                                class="form-control" value="<?php echo $question; ?>"></div>

                                        <!-- op1 -->
                                        <div class="form-group">
                                            <img src=" <?php echo $opt1; ?>" height="50" width="50"><br>

                                            <label for="company" class=" form-control-label">Cập nhật lựa chọn 1
                                            </label><input type="file" name="fopt1" class="form-control"
                                                style="padding-bottom: 35px;">
                                        </div>

                                        <!-- op2 -->
                                        <div class="form-group">
                                            <img src=" <?php echo $opt2; ?>" height="50" width="50"><br>

                                            <label for="company" class=" form-control-label">Cập nhật lựa chọn 2
                                            </label><input type="file" name="fopt2" class="form-control"
                                                style="padding-bottom: 35px;">
                                        </div>

                                        <!-- op3 -->
                                        <div class="form-group">
                                            <img src=" <?php echo $opt3; ?>" height="50" width="50"><br>

                                            <label for="company" class=" form-control-label">Cập nhật lựa chọn 3
                                            </label><input type="file" name="fopt3" class="form-control"
                                                style="padding-bottom: 35px;">
                                        </div>

                                        <!-- op4 -->
                                        <div class="form-group">
                                            <img src=" <?php echo $opt4; ?>" height="50" width="50"><br>

                                            <label for="company" class=" form-control-label">Cập nhật lựa chọn 4
                                            </label><input type="file" name="fopt4" class="form-control"
                                                style="padding-bottom: 35px;">
                                        </div>


                                        <!-- Answer -->
                                        <div class="form-group">

                                            <img src=" <?php echo $answer; ?>" height="50" width="50"><br>

                                            <label for="company" class=" form-control-label">Cập nhật đáp án
                                            </label><input type="file" name="fAnswer" class="form-control"
                                                style="padding-bottom: 35px;">
                                        </div>


                                        <!-- Add Quest -->
                                        <div class="form-group">
                                            <input type="submit" name="submit2" value="Cập nhật câu hỏi"
                                                class="btn btn-success">
                                        </div>
                                    </div>
                                    <!-- </form> -->
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
if(isset($_POST["submit2"]))
{
    $opt1=$_FILES["fopt1"]["name"];
    $opt2=$_FILES["fopt2"]["name"];
    $opt3=$_FILES["fopt3"]["name"];
    $opt4=$_FILES["fopt4"]["name"];
    $answer=$_FILES["fAnswer"]["name"];
    
    $tm=md5 (time());

    // opt1
    if($opt1!="")
    {

    $dst1="./opt_images/" .$tm .$opt1;
    $dst_db1 = "opt_images/".$tm .$opt1;
    move_uploaded_file($_FILES["fopt1"]["tmp_name"],$dst1);

    mysqli_query($link,"update questions set question='$_POST[fquestion]',opt1='$dst_db1' where id=$id") or die(mysqli_error($link));
    }   

    // opt2
    if($opt2!="")
    {
    
    $dst2="./opt_images/" .$tm .$opt2;
    $dst_db2 = "opt_images/".$tm .$opt2;
    move_uploaded_file($_FILES["fopt2"]["tmp_name"],$dst2);

    mysqli_query($link,"update questions set question='$_POST[fquestion]',opt2='$dst_db2' where id=$id") or die(mysqli_error($link));
    }   
    
    // opt3
    if($opt3!="")
    {

    $dst3="./opt_images/" .$tm .$opt3;
    $dst_db3 = "opt_images/".$tm .$opt3;
    move_uploaded_file($_FILES["fopt3"]["tmp_name"],$dst3);

    mysqli_query($link,"update questions set question='$_POST[fquestion]',opt3='$dst_db3' where id=$id") or die(mysqli_error($link));
    }   

        // opt4
        if($opt4!="")
        {
    
        $dst4="./opt_images/" .$tm .$opt4;
        $dst_db4 = "opt_images/".$tm .$opt4;
        move_uploaded_file($_FILES["fopt4"]["tmp_name"],$dst4);
    
        mysqli_query($link,"update questions set question='$_POST[fquestion]',opt4='$dst_db4' where id=$id") or die(mysqli_error($link));
        } 


    // answer
    if($answer!="")
    {

    $dst5="./opt_images/" .$tm .$answer;
    $dst_db5 = "opt_images/".$tm .$answer;
    move_uploaded_file($_FILES["fAnswer"]["tmp_name"],$dst5);

    mysqli_query($link,"update questions set question='$_POST[fquestion]',answer='$dst_db5' where id=$id") or die(mysqli_error($link));
    } 

    mysqli_query($link,"update questions set question='$_POST[fquestion]' where id=$id") or die(mysqli_error($link));


    ?>
<script type="text/javascript">
alert("Cập nhật câu hỏi thành công");
window.location = "add_edit_quest.php?id=<?php echo $idl ?>";
</script>
<?php
    }
?>