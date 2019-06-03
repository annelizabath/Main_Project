<?php
include 'dbconnection.php';
session_start();
if(!(isset($_SESSION['userid']))){
    header('location:index.php');
}
$id=$_SESSION['userid'];
include 'components/nav/admin_header.php';


if(isset($_POST["btn1"]))
{
	$id=$_GET["id"];
	$q=mysqli_query($con,"update tbl_user_reg set status='approved' where lid='$id'");

	$qr=mysqli_query($con,"update tbl_login set status='approved' where lid='$id'");

	if(mysqli_affected_rows($con)>0)
	{
		
		?>
		<script>
			alert("aproved")
				window.location.href="pending_user.php";
			</script>
		<?php
	}
}
if(isset($_POST["btn2"]))
{
	$id=$_GET["id"];
	$q=mysqli_query($con,"update tbl_user_reg set status='rejected' where lid='$id'");

	$q=mysqli_query($con,"update tbl_login set status='rejected' where lid='$id'");
	
	if(mysqli_affected_rows($con)>0)
	{
		?>
		<script>
			alert("rejected")
				window.location.href="pending_user.php";
			</script>
		<?php
	}
}

?>
                 <?php
                        $id=$_GET["id"];
						$q="select * from tbl_user_reg where lid='$id'";
						$data=mysqli_query($con,$q) or die (mysqli_error($con));
						if($r=mysqli_fetch_array($data))
						{
							?>
							<br><br><br>
							<form method="post">
							<table align="center" border="1px" class="table"style="width:300px;line-height:40px;">
							<tr>
							<th>Name</th><td><?php echo $r['name'];?></td>
							</tr>
							<tr>
							<th>Address</th><td><?php echo $r['address'];?></td>
							</tr>
							<tr>
							<th>Contact No</th><td><?php echo $r['phone'];?></td>
							</tr>
							<tr>
							<th>Occupation</th><td><?php echo $r['occupation'];?></td>
							</tr>
							<tr>
							<td colspan="2"><input type="submit" name="btn1" value="APPROVE"/>
							<input type="submit"  name="btn2" value="REJECT" /></td>
							</tr>
							</table>
							</form>
							<?Php
						}    
						?>
