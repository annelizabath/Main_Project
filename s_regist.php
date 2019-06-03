 <?php
include 'dbconnection.php';
include 'components/session.php';
if(isset($_POST['submit'])){
	staffregistration($con);
}
	function staffregistration($con)
	{

		$name=$_POST["name"];
		$address=$_POST["address"];
		$phone=$_POST["phone"];
		$gender=$_POST["gender"];
		$dob=$_POST["dob"];
		$country=$_POST["country"];
		$state=$_POST["state"];
		$district=$_POST["dist"];
		$qualification=$_POST["qualification"];
		$designation=$_POST["designation"];
		$doj=$_POST["doj"];
		$email=$_POST["email"];
		$password=$_POST["password"];
		$cpassword=$_POST["cpassword"];

		$sql="INSERT INTO `tbl_login`(`lid`, `email`, `password`, `role`, `status`) VALUES (NULL,'$email','$password','2','pending')";
		$result=mysqli_query($con,$sql);
		$login_id=mysqli_insert_id($con); // logi id of the user

		// address table insertion
		// $sqlAddr="INSERT INTO `tbl_address`(`addr_id`, `name`, `address`, `phone`, `status`) VALUES (NULL,'$name','$address','$phone','1')";
		// $result1=mysqli_query($con,$sqlAddr); 
		// $addrId=mysqli_insert_id($con); // address of the user

		// user field
		$sqlstaffReg="INSERT INTO `tbl_staff_reg`(`staff_id`, `lid`, `name`, `address`, `phone`, `gender`, `dob`, `d_id`, `des_id`, `doj`, `status`) VALUES (NULL,'$login_id','$name','$address','$phone','$gender','$dob','$district','$designation','$doj','pending')";
		// move_uploaded_file($path,$destination);
		$result2=mysqli_query($con,$sqlstaffReg);
		if($result2){
			header("location:index.php");
		}
	}

	// $type = $_POST['submit'];
 //    switch ($type) {
 //        case 's_register':
 //            staffregistration($con);
 //            break;
 //        default :
 //            echo 'error';
 //            break;
 //    }
?>



	