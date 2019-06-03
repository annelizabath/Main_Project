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
      <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>
<?php
$sql="SELECT * FROM `tbl_staff` WHERE o_id='$id'";
$data=mysqli_query($con,$sql) or die(mysqli_error($con));
while($r=mysqli_fetch_array($data)){
?>
<tr>
      <td><?php echo $r['emp_name'] ;?></td>
      <td><?php echo $r['empid'] ;?></td>
      <td><?php echo $r['designation'] ;?></td>
      <td><a href="staff_delete.php?tkv=<?php echo $r['emp_id'];?>">View</a></td>
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