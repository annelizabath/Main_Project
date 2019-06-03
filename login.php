<?php
include 'dbconnection.php';
//include 'components/session.php';
session_start();
if(isset($_POST['submit'])){
	login($con);
}
function login($con)
{
	$email=$_POST["email"];
	$password=$_POST["password"];
	$data="SELECT `email`, `password` FROM `tbl_login` WHERE email='".$_POST["email"]."' and password='".$_POST["password"]."'";
	$data1=mysqli_query($con,$data);
	$r1=mysqli_fetch_array($data1);
	$rr1=$r1["email"];
	$rr2=$r1["password"];
	

	if($rr1!=$email && $rr2!=$password){
		echo "<script>alert('Username or password is wrong');</script>";
		//header("location:index.php");
	}else
	{
		$sql="SELECT * FROM `tbl_login` WHERE email='$email' and password='$password'";
	$res=mysqli_query($con,$sql);
	while($fetch=mysqli_fetch_array($res))
	{
		if($fetch['role']==0)
		{
			$_SESSION['userid']=$fetch['lid'];
			//$_SESSION['role'] = $fetch['role'];
			header("location:admin_home.php");
			
		}

		if($fetch['role']==1)
		{
			
			//$_SESSION['role'] = $fetch['role'];

			if($fetch['status']=='approved'){

				$_SESSION['userid']=$fetch['lid'];
				?>
				<script>
				window.location.href="user_home.php";
				</script>
				<?php

			}
			else{

				?>
				<script>
				alert("unable to login")
				</script>
				<?php

			}
		}
		if($fetch['role']==2)
		{
			$_SESSION['userid']=$fetch['lid'];
			//$_SESSION['role'] = $fetch['role'];
			header("location:staff-home.php");
		}
		if($fetch['role']==3)
		{
			$_SESSION['userid']=$fetch['lid'];
			if($fetch['pr_complete']==1){
				header("location:owner_home.php");
			}
			//$_SESSION['role'] = $fetch['role'];
			else{
			header("location:owner_main_home.php");
			}
		}
	}
}
	}

	
?>