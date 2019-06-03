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

<?php
$sql="SELECT  `photo`,  FROM `tbl_room` WHERE status=1";
$data=mysqli_query($con,$sql) or die (mysqli_error($con));
?>


<?php
include 'components/footer.php';
?>