<?php
include 'dbconnection.php';
session_start();
if (!(isset($_SESSION['userid']))) {
    header('location:index.php');
}
$id = $_SESSION['userid'];
include 'components/nav/user_header.php';
?>
<html>
<head>
<style>
 .table{
     width:50%;
     }
    .button{
       background-color:#17278c;
      }
 </style> 
</head>
<?php
if(isset($_GET['oldname']))
{
    $o_id=$_GET["oldname"];


$q="select * from tbl_owner where o_id='$o_id'";
$data=mysqli_query($con,$q) or die(mysqli_error($con));
while($r=mysqli_fetch_array($data)){
    ?>
    <form>
<table class="table" align="center" border="4">
  <thead> 

      <tr><th scope="col">Owner Name</th><td><?php echo $r['name'];?></td></tr>
      <th scope="col">Contact </th><td><?php echo $r['mobile'];?></td></tr>
      <th scope="col">Old age home name</th><td><?php echo $r['oldagehomename'];?></td></tr>
      <!-- <th scope="col">Location</th><td><?php echo $r['location'];?></td></tr> -->
      <th scope="col">Lisence number </th><td><?php echo $r['lisenceno'];?></td></tr>
      <th scope="col">Description </th><td><?php echo $r['message'];?></td>
      <td colspan="2"><a href="inmate_reg.php?o_id=<?php echo $o_id ;?>"><b><u>ADMIT HERE</u></b></a></td></tr>
  </thead>
</table>

</form>
<?php
}
?>
<?php
}
?>
</html>
<?php
include 'components/footer.php';
?>