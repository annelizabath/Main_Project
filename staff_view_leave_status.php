<?php
include 'dbconnection.php';
session_start();
if(!(isset($_SESSION['userid']))){
    header('location:index.php');
}
$id=$_SESSION['userid'];
include 'components/nav/staff_header.php';
?>

<html>
<head>
<style>
.table{
    width:70%;
    padding:100%;
}
</style>
</head>
<body>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Leave Type</th>
      <th scope="col">Duration</th>
      <th scope="col">Leave From</th>
      <th scope="col">Leave To</th>
      <th scope="col">Reason</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $sqlLeave="SELECT * FROM `tbl_leave` WHERE lid='$id' ";
  $result=mysqli_query($con,$sqlLeave) or die(mysqli_error($con));
  while($data=mysqli_fetch_array($result)){
  ?>
    <tr>
      <td><?php echo $data['leave_type'] ;?></td>
      <td><?php echo $data['duration'] ;?></td>
      <td><?php echo $data['leave_from'] ;?></td>
      <td><?php echo $data['leave_to'] ;?></td>
      <td><?php echo $data['reason'] ;?></td>
      <td><?php echo $data['status'] ;?></td>
    </tr>
    <?php
    }
    ?>
  </tbody>
</table>
</body>
</html>
<br><br>
<?php
include 'components/footer.php';
?>