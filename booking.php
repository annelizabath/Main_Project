
<?php
include 'dbconnection.php';
session_start();

if(!isset($_SESSION['o_iid']) || !isset($_SESSION['userid']))
{
    header("location:index.php");
}

$id=$_SESSION['userid'];
// $oid=$_SESSION['o_iid'];
// unset($_SESSION['o_iid']);

if(isset($_POST['submit']))
{
	$name=$_POST["name"];
	$age=$_POST["age"];
	$arr_dte=$_POST["arrival_dte"];
	$rtyp=$_POST["room"];
	$rnt=$_POST["rent"];
	$oid=$_POST["oid"];

	// print_r($resu);

	echo $sql="INSERT INTO `tbl_book`(`book_id`, `lid`, `o_id`, `name`, `age`, `arrival_date`, `room_type`, `rent`, `status`) 
	VALUES (NULL,'$id','$oid','$name','$age','$arr_dte','$rtyp','$rnt','1')";
	 $data=mysqli_query($con,$sql) or die(mysqli_error($con));

	 $sql1="UPDATE `tbl_inmate_reg` SET `status`='booked' WHERE lid='$id'";
	 $data1=mysqli_query($con,$sql1);

	echo "<script>alert('Booking Sucess')</script>";
			//  echo "<script>window.location='book.php?view=usrform'</script>";
			 header("location:payment.php");
}
?>