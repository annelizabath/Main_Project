<?php
include 'dbconnection.php';
session_start();
if (!(isset($_SESSION['userid']))) {
    header('location:index.php');
}
$id = $_SESSION['userid'];
include 'components/nav/owner_header.php';
?>

<html>
<head>
	<style type="text/css">
		.table{
			width: 70%;
		}
	</style>
	</head>
	<body>
		<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">STAFF NAME</th>
      <th scope="col">STAFF ID</th>
      <th scope="col">DESIGNATION</th>
      <th scope="col">LEAVE TYPE</th>
      <th scope="col">DURATION</th>
      <th scope="col">LEAVE FROM</th>
      <th scope="col">LEAVE TO</th>
      <th scope="col">REASON</th>
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>
  	<?php
  		$sql="SELECT * FROM `tbl_leave` WHERE status='pending' and o_id='$id'";
  		$data=mysqli_query($con,$sql);
  		while($data1=mysqli_fetch_array($data)){
        $sql1="SELECT * FROM `tbl_staff` WHERE lid='$data1[lid]'";
        $data2=mysqli_query($con,$sql1);
    $d1=mysqli_fetch_array($data2);
  	?>
    <tr>
      <td><?php echo $d1['emp_name'] ;?></td>
      <td><?php echo $d1['empid'] ;?></td>
      <td><?php echo $d1['designation'] ;?></td>
      <td><?php echo $data1['leave_type'] ;?></td>
      <td><?php echo $data1['duration'] ;?></td>
      <td><?php echo $data1['leave_from'] ;?></td>
      <td><?php echo $data1['leave_to'] ;?></td>
      <td><?php echo $data1['reason'] ;?></td>
      <td><a href="leave_approve.php?tkv=<?php echo $data1['leave_id'];?>">VERIFY</a></td>
    </tr>
    <?php
}
?>
  </tbody>
</table>
	</body>
</html>

<?php
include 'components/footer.php';
?>