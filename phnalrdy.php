<?php
require('dbconnection.php');

$num = $_POST['phone'];
//validate email
$sql = "SELECT `phone` FROM `tbl_user_reg` WHERE `phone` = '$num'";
// echo $sql;
// die();
$result = mysqli_query($con, $sql);
if($result && mysqli_num_rows($result)==0){
    echo TRUE;
}else{
    echo FALSE;
}
?>