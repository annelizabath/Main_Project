<?php
include 'dbconnection.php';
session_start();
if(!(isset($_SESSION['userid']))){
    header('location:index.php');
}
$id=$_SESSION['userid'];
if(isset($_GET['o_id']))
{
    $oid=$_GET["o_id"];
    $_SESSION['o_iid'] = $oid;
    
}
if(isset($_POST['submit']))
{
    $leave_type=$_POST["leave_type"];
    $duration=$_POST["duration"];
    $leave_frm=$_POST["datef"];
    $leave_to=$_POST["datet"];
    $reason=$_POST["reason"];

    $sqlQuery="INSERT INTO `tbl_leave`(`leave_id`, `emp_id`, `o_id`, `leave_type`, `duration`, 
    `leave_from`, `leave_to`, `reason`, `status`) 
    VALUES (NULL,'$id','$oid','$leave_type','$duration','$leave_frm','$leave_to','$reason','pending')";

    $exequery=mysqli_query($con,$sqlQuery) or die (mysqli_error($con));
}
?>