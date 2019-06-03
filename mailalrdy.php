<?php
require('dbconnection.php');

$email = $_POST['email'];
//validate email
$sql = "SELECT `email` FROM `tbl_login` WHERE `email` = '$email'";
// echo $sql;
// die();
$result = mysqli_query($con, $sql);
if($result && mysqli_num_rows($result)==0){
    echo TRUE;
}else{
    echo FALSE;
}
?>