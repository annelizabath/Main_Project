<?php
include 'dbconnection.php';
session_start();
if (!(isset($_SESSION['userid']))) {
    header('location:index.php');
}
$id = $_SESSION['userid'];

if(isset($_POST['submit'])){
	//$homename=$_POST['hname'];
	$location=$_POST['location'];


	$target="uploads/";

	$file_name=$target. basename($_FILES['file1']['name']);
	// $file_tmp=$_FILES['file1']['tmp_name'];
	move_uploaded_file($_FILES['file1']['tmp_name'],$file_name);


	
	$file_name2=$target.basename($_FILES['file2']['name']);
	// $file_tmp2=$_FILES['file2']['tmp_name'];
	move_uploaded_file($_FILES['file2']['tmp_name'],$file_name2);

	$target="uploads/";

	$file_name3=$target.basename($_FILES['file3']['name']);
	//$file_tmp3=$_FILES['file3']['tmp_name'];
	move_uploaded_file($_FILES['file3']['tmp_name'],$file_name3);

	$msg=$_POST['message'];


	$sql="UPDATE `tbl_owner` SET `location`='$location',`proof`='$file_name',`photo`='$file_name2',
	`signature`='$file_name3',`message`='$msg' WHERE lid='$id'";

	if(mysqli_query($con,$sql)){
		$var="update tbl_login set pr_complete=0 where lid='$id'";
		$data=mysqli_query($con,$var);
		echo "record updated successfully";
		$URL="owner_main_home.php";
		echo ("<script>location.href='$URL'</script>");
	}
	else{
		echo "ERROR! Couldn't be updated";
	}
}
?>