<?php
include 'dbconnection.php';
session_start();
if (!(isset($_SESSION['userid']))) {
    header('location:index.php');
}
$id = $_SESSION['userid'];
//print_r($id);
include 'components/nav/owner_header.php';
?>
<html>
<head>
<style>
.table{
    width:auto;
}
th{
      width:auto;
      padding-left: 22px;
    }
</style>
</head>
<body>
<table class="table" >
  <thead>
  <tr>
        <th scope="col">Name</th>
        <th scope="col">Address</th>
        <th scope="col">Contact</th>
        <th scope="col">Email</th>
        <th scope="col">Inmate Name</th>
        <th scope="col">Relation</th>
        <th scope="col">Aadhaar Number</th>
        <th scope="col">Action</th>
      </tr>
   <?php
   $e="select * from tbl_owner where lid='$id'";
   $r=mysqli_query($con,$e);
   while($t=mysqli_fetch_array($r)){
   //print_r($t['o_id']);
   
    $sqlView="SELECT * FROM `tbl_inmate_reg` WHERE o_id='$t[o_id]'";
    $data=mysqli_query($con,$sqlView);
      while( $data1=mysqli_fetch_array($data)){

          $sqlView1="SELECT * FROM `tbl_user_reg` WHERE lid='$data1[lid]'";
          $data2=mysqli_query($con,$sqlView1);
            $d1=mysqli_fetch_array($data2);

            $sqlView2="SELECT * FROM `tbl_login` WHERE lid='$data1[lid]'";
            $data3=mysqli_query($con,$sqlView2);
            $d2=mysqli_fetch_array($data3);

    ?>
     
    </thead>
    <tbody>
   
      <tr>
      <td><?php echo $d1['name'] ;?></td>
        <td><?php echo $d1['address'] ;?></td>
        <td><?php echo $d1['phone'] ;?></td>
        <td><?php echo $d2['email'] ;?></td>
        <td><?php echo $data1['name'] ;?></td>
        <td><?php echo $data1['relationship'] ;?></td>
        <td><?php echo $data1['aadharno'] ;?></td>
        <td><a href="owner_inmate_view.php?vid=<?php echo $data1['id'];?>">verify</a></td>
      </tr>
      <?php

   }
 
} 
?>
  </tbody>
</table>
</body>
</html>
<?php
include 'components/footer.php';
?>
