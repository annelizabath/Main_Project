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
    $uid=$_GET["vid"];
    print_r($uid);
	$q=mysqli_query($con,"update tbl_inmate_reg set status='approved' where id='$uid'");
	if(mysqli_affected_rows($con)>0)
	{
		
		?>
		<script>
			alert("aproved")
				//window.location.href="owner_leave_approve.php";
			</script>
		<?php
	}
}
if(isset($_POST["btn2"]))
{
	//$id=$_GET["iid"];
	$uid=$_GET["vid"];
	$q=mysqli_query($con,"update tbl_inmate_reg set status='rejected' where id='$uid'");
	if(mysqli_affected_rows($con)>0)
	{
		?>
		<script>
			alert("rejected")
				//window.location.href="owner_leave_approve.php";
			</script>
		<?php
	}
}

?>

<html>
<head>
<style>
.table{
    width:auto;
}
.button{
    width:auto;
    color:black;
    background-color:#4286f4;
    font-size: 16px;
}
.button1{
    width:auto;
    color:black;
    background-color:#4286f4;
    font-size: 16px;
}
</style>
</head>
<body>
	<?php
	//$id=$_GET["iid"];
	 $vid=$_GET["vid"];
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
							<form method="post">
							<table class="table">
							<tr>
							<th>INMATE NAME</th><td><?php echo $data1['name'];?></td>
							</tr>
							<tr>
							<th>DATE OF BIRTH</th><td><?php echo $data1['dob'];?></td>
							</tr>
							<tr>
							<th>AGE</th><td><?php echo $data1['age'];?></td>
							</tr>
							<tr>
							<th>RELATION</th><td><?php echo $data1['relationship'];?></td>
							</tr>
							<tr>
							<th>AADHAARNUMBER</th><td><?php echo $data1['aadharno'];?></td>
							</tr>
							<tr>
							<th>ASSET</th><td><?php echo $data1['asset'];?></td>
							</tr>
							<tr>
							<th>GARDIAN NAME</th><td><?php echo $d1['name'];?></td>
							</tr>
                            <tr>
							<th>ADDRESS</th><td><?php echo $d1['address'];?></td>
							</tr>
							<tr>
							<th>CONTACT</th><td><?php echo $d1['phone'];?></td>
							</tr>
							<tr>
							<th>EMAIL ID</th><td><?php echo $d2['email'];?></td>
							</tr>
							<tr>
							<td><input type="submit" class="button" name="btn1" value="APPROVE"/></td>
							<td><input type="submit" class="button1"  name="btn2" value="REJECT" /></td>
							</tr>
							</table>
							</form>
							<?Php
                        }   
                    } 
						
	?>
    </body>
    </html>


<?php
include 'components/footer.php';
?>