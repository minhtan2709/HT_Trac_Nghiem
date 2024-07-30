<?php
session_start();
include "header_user_acc.php";
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
                <h1>Tài khoản</h1>
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
                            <h1 style="margin-bottom: 10px;">Tất cả tài khoản</h1>
                        </center>
                        <?php
        $count=0;
$res=mysqli_query($link,"select * from registration order by id desc");
$count=mysqli_num_rows($res);

if($count==0)
{
    ?>
                        <center>
                            <h1>Không có tài khoản nào</h1>
                        </center>
                        <?php
}
else{
    echo "<table class='table table-bordered'>";
    echo "<tr style='background-color:#059862; color:white;'>";
    echo "<th style='text-align:center;'>"; echo "Họ"; echo "</th>";
    echo "<th style='text-align:center;'>"; echo "Tên"; echo "</th>";
    echo "<th style='text-align:center;'>"; echo "Tên tài khoản"; echo "</th>";
    echo "<th style='text-align:center;'>"; echo "Gmail"; echo "</th>";
    echo "<th style='text-align:center;'>";echo "Địa chỉ"; echo "</th>";
    echo "<th style='text-align:center;'>";echo "Ngày sinh"; echo "</th>";
    echo "<th style='text-align:center;'>";echo "Điện thoại"; echo "</th>";
    echo "<th style='text-align:center;'>";echo "Xoá tài khoản"; echo "</th>";


    echo "</tr>";

    while($row=mysqli_fetch_array($res))
    {
        
        echo "<tr>";
        echo "<td>"; echo $row["lastname"]; echo "</td>";
        echo "<td>"; echo $row["firstname"]; echo "</td>";
        echo "<td style='text-align:center;'>"; echo $row["username"]; echo "</td>";
        echo "<td>"; echo $row["email"]; echo "</td>";
        
        echo "<td style='text-align:center;'>";echo $row["contact"]; echo "</td>";
        echo "<td style='text-align:center;'>";echo date('d/m/Y', strtotime($row["birthday"]));echo "</td>";
        echo "<td style='text-align:center;'>";echo $row["phonenum"]; echo "</td>";

        // Delete

         echo "<td style='text-align:center;'>";
        ?>
                        <a href="delete_acc.php?id=<?php echo $row['id'];?>">Xoá</a>

                        <?php
        echo "</td>";
        
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