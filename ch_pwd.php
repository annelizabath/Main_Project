<?php
//include 'components/session.php';
include 'dbconnection.php';
include 'connect1.php';
$db = new DbConnection;
session_start();
if(!(isset($_SESSION['userid']))){
    header('location:index.php');
}
$id=$_SESSION['userid'];

if(isset($_POST["submit"])){

	$old_pwd=$_POST["password"];
	$new_pwd=$_POST["npassword"];
	//$cpwd=$_POST["cpassword"];
	$sql="select * from tbl_login where lid='$id' and password='$old_pwd' ";
	$exe = ($db->executeQuery($sql));
    $no = mysqli_num_rows($exe);
    if ($no > 0) {
       $sqll = "update tbl_login set password='$new_pwd' where lid='$id'";
         $up = ($db->executeNonQuery($sqll));
         if ($up) {
            ?>
            <script> alert("password changed sucessfully");  window.location='index.php'</script>";</script>
          <?php
                }
                 
                else {
            ?> 
           <script> alert("Your new and Retype Password is not match!!");  window.location='index.php'</script>";</script>
            <?php      }
            
     } else {
       ?>
         <script> alert("current password is wrong");  window.location='index.php'</script>";</script>
         <?php
   }
 }
?>


