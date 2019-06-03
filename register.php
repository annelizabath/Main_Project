<?php
include 'dbconnection.php';
//include 'components/session.php';
if(isset($_POST['submit'])){
	userregistration($con);
}
	function userregistration($con)
	{
		$name=$_POST["name"];
		$address=$_POST["address"];
		$phone=$_POST["phone"];
		$occupation=$_POST["occupation"];
		$email=$_POST["email"];
		$password=$_POST["cpass"];
		$cpassword=$_POST["cconpass"];

		$sqllogin="INSERT INTO `tbl_login`(`lid`, `email`, `password`, `role`, `status`) 
		VALUES (NULL,'$email','$password','1','pending')";
		$result=mysqli_query($con,$sqllogin);
		$login_id=mysqli_insert_id($con); // logi id of the user

		$sqluser="INSERT INTO `tbl_user_reg`(`u_id`, `lid`, `name`,`address`, `phone`, `occupation`, `status`) 
		VALUES (NULL,'$login_id','$name','$address','$phone','$occupation','pending')";
		$result2=mysqli_query($con,$sqluser); 
		

		echo "<script>alert('Successfully registered')</script>";
		    echo "<script>window.location='index.php?view=userform'</script>";
	}
?>



