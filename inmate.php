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
	$name=$_POST["name"];
	$gender=$_POST["gender"];
	$dob=$_POST["dob"];
	$age=$_POST["age"];
	$address=$_POST["address"];
	$district=$_POST["district"];
	$adno=$_POST["adno"];
	$idno=$_POST["idno"];
	$religion=$_POST["religion"];
	$cast=$_POST["cast"];
	$height=$_POST["height"];
	$weight=$_POST["weight"];
	$id1=$_POST["id1"];
	$id2=$_POST["id2"];
	$relation=$_POST["relationship"];

	$target_directory="doc/";

	$target_fileone=$target_directory.basename($_FILES['f1']['name']);
	move_uploaded_file($_FILES['f1']['tmp_name'],$target_fileone);

	$target_filetwo=$target_directory.basename($_FILES['f2']['name']);
	move_uploaded_file($_FILES['f2']['tmp_name'],$target_filetwo);
	
	$asset=$_POST["asset"];
	
	$target_directory="doc/";

	$target_filethree=$target_directory.basename($_FILES['f3']['name']);
	move_uploaded_file($_FILES['f3']['tmp_name'],$target_filethree);

	$target_filefour=$target_directory.basename($_FILES['f4']['name']);
	move_uploaded_file($_FILES['f4']['tmp_name'],$target_filefour);

	$sql="INSERT INTO `tbl_inmate_reg`(`id`, `lid`, `o_id`, `name`, `gender`, `dob`, `age`, `address`,
	 `district`, `aadharno`, `electionno`, `religion`, `cast`, `height`, `weight`, `id1`, `id2`,
	  `relationship`, `img1`, `img2`, `asset`, `img3`, `photo`, `status`)
	  
	 VALUES (NULL,'$id','$oid','$name','$gender','$dob','$age','$address','$district','$adno','$idno','$religion',
	 '$cast','$height','$weight','$id1','$id2','$relation','$target_fileone','$target_filetwo',
	 '$asset','$target_filethree','$target_filefour','pending')";

	 $data=mysqli_query($con,$sql) or die(mysqli_error($con));


if($data){
		echo "insert successfully";
	}
	else{
		echo "ERROR! Couldn't inserted";
	}
	echo "<script>alert('Successfully registered')</script>";
			  echo "<script>window.location='inmate_reg.php?view=usrform'</script>";
			//header("location:book.php");
}
?>