<?php
include 'dbconnection.php';
session_start();
if (!(isset($_SESSION['userid']))) {
    header('location:index.php');
}
$id = $_SESSION['userid'];
include 'components/nav/owner_header.php';
?>

<?php
if(isset($_POST["btn1"]))
{
	$sid=$_GET["tkv"];
	$q=mysqli_query($con,"update tbl_leave set status='approved' where leave_id='$sid'");
	if(mysqli_affected_rows($con)>0)
	{
		
		?>
		<script>
			alert("aproved")
				window.location.href="owner_leave_approve.php";
			</script>
		<?php
	}
}
if(isset($_POST["btn2"]))
{
	//$id=$_GET["iid"];
	$sid=$_GET["tkv"];
	$q=mysqli_query($con,"update tbl_leave set status='rejected' where leave_id='$sid'");
	if(mysqli_affected_rows($con)>0)
	{
		?>
		<script>
			alert("rejected")
				window.location.href="owner_leave_approve.php";
			</script>
		<?php
	}
}

?>

<html>
<head>
<style>
.table{
    width:70%;
}
.button{
    width:40%;
    color:black;
    background-color:#4286f4;
    font-size: 16px;
}
.button1{
    width:40%;
    color:black;
    background-color:#4286f4;
    font-size: 16px;
}
</style>
</head>
<body>
	<?php
	//$id=$_GET["iid"];
	 $tkv=$_GET["tkv"];
     $sql="SELECT * FROM `tbl_leave` WHERE status='pending' and leave_id='".$tkv."'	";
     $data=mysqli_query($con,$sql);
     while($data1=mysqli_fetch_array($data)){
   $sql1="SELECT * FROM `tbl_staff` WHERE lid='$data1[lid]'";
   $data2=mysqli_query($con,$sql1);
$d1=mysqli_fetch_array($data2);
                            	?>
							<form method="post">
							<table align="center" class="table">
							<tr>
							<th>Name</th><td><?php echo $d1['emp_name'];?></td>
							</tr>
                            <tr>
							<th>ID</th><td><?php echo $d1['empid'];?></td>
							</tr>
							<tr>
							<th>Designation</th><td><?php echo $d1['designation'];?></td>
							</tr>
							<tr>
							<th>Leave type</th><td><?php echo $data1['leave_type'];?></td>
							</tr>
							<tr>
							<th>Duration</th><td><?php echo $data1['duration'];?></td>
							</tr>
							<tr>
							<th>Leave From</th><td><?php echo $data1['leave_from'];?></td>
							</tr>
							<tr>
							<th>Leave To</th><td><?php echo $data1['leave_to'];?></td>
							</tr>
							<tr>
							<th>Reason</th><td><?php echo $data1['reason'];?></td>
							</tr>
							<tr>
							<td><input type="submit" class="button" name="btn1" value="APPROVE"/></td>
							<td><input type="submit" class="button1"  name="btn2" value="REJECT" /></td>
							</tr>
							</table>
							</form>
							<?Php
						}    
						
	?>
    </body>
    </html>


<?php
include 'components/footer.php';
?>