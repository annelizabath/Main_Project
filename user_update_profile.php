<?php
//include 'components/session.php';
include 'dbconnection.php';
session_start();
if(!(isset($_SESSION['userid']))){
    header('location:index.php');
}
$id=$_SESSION['userid'];
include 'components/nav/user_header.php';
?>



<html>
<head>
                             <style>
                                        .table{
                                            width:50%;
                                        }
                                        .button{
                                            background-color:green;
                                            color:white;
                                        }
                                    </style> 
                            </head>
                            <body>
                            	<?php
                            	$sql="SELECT * FROM `tbl_user_reg` WHERE lid='$id'";
                            	$data=mysqli_query($con,$sql) or die(mysqli_error($con));
                            	while($result=mysqli_fetch_array($data)){
                                    $sql1="SELECT * FROM `tbl_login` WHERE lid='$result[lid]'";
                                    $data2=mysqli_query($con,$sql1);
                                    $d1=mysqli_fetch_array($data2);
                            	?>
                            <form method="post" onsubmit="return" class="oh-autoval-form">
                                <table class="table" align="center">
                        <tr><th><label> NAME</label></th><td><input type="text" name="name" id="name" class="av-name" av-message="Minimum 3 characters and alphabets only" placeholder="Your Name" required="" value="<?php echo $result['name'];?>"></td></tr>
                        <tr><th><label>ADDRESS</label></th><td><input type="text" name="aname" value="<?php echo $result['address'];?>"></td></tr>
                        <tr><th><label>CONTACT NUMBER</label></th><td><input type="text" name="cno" class="av-mobile verify-u" av-message="Must contain 10 Digits (Does't contain alphabets) "  placeholder="Your Mobile Number" required="" value="<?php echo $result['phone'];?>"></td></tr>
                        <tr><th><label>OCCUPATION</label></th><td><input type="text" name="occu" id="name" class="av-name" av-message="Minimum 3 characters and alphabets only" value="<?php echo $result['occupation'];?>"></td></tr>
                        <tr><td><button class="button" type="submit" name="update"><b>Update</b></button></td></tr>
                                </table>
                            </form>
                            </body>
                            <?php
                        }
   ?>
</html>
<?php
if(isset($_POST['update'])){
    $name=$_POST['name'];
    $addr=$_POST['aname'];
    $cont_no=$_POST['cno'];
    $occupation=$_POST['occu'];

    $sqlUpdate="UPDATE `tbl_user_reg` SET `name`='$name',`address`='$addr',`phone`='$cont_no',
    `occupation`='$occupation' WHERE lid='$id'";

    $exeData=mysqli_query($con,$sqlUpdate);

    echo "<script>alert('Update sucess')</script>";
		    echo "<script>window.location='user_profile.php'</script>";

}

?>

<?php
include 'components/footer.php';
?>