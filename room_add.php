<?php
//include 'components/session.php';
include 'dbconnection.php';
session_start();
if(!(isset($_SESSION['userid']))){
    header('location:index.php');
}
$id=$_SESSION['userid'];

if(isset($_POST['submit'])){

    $rt=$_POST['room'];
    $nr=$_POST['noroom'];
    $rnt=$_POST['roomrent'];

    $target="image/";

    $room_img=$target. basename($_FILES['img']['name']);
    move_uploaded_file($_FILES['img']['tmp_name'],$room_img);
    

     $sql="SELECT `o_id` FROM `tbl_owner` WHERE lid='$id'";
    $res=mysqli_query($con,$sql) or die(mysqli_error($con));
    //print_r($res);
    while($r=mysqli_fetch_array($res)){
        $o_id=$r['o_id'];
    }
    print_r($o_id);
    $query="INSERT INTO `tbl_room`(`room_id`, `lid`, `room_typeid`, `no_rooms`, `rent`, `photo`, `status`)
     VALUES (NULL,'$o_id','$rt','$nr','$rnt','$room_img','1')";

     $data=mysqli_query($con,$query) or die(mysqli_error($con));

     echo "<script> alert('inserted successfully')</script>";
     header("location:add_rooms.php");

}

?>