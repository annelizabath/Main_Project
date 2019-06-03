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
<style>
.button{
	background-color:blue;
}
</style>
</head>
<body>
<?php

$q="select * from tbl_owner where lid='$id'";
$data=mysqli_query($con,$q) or die (mysqli_error($con));
while($r=mysqli_fetch_array($data))
{
?>
<form method="post">
<table>
<tr>
<th>OWNER NAME</th><td><input type="text" name="txt1" value="<?php echo $r[2];?>"/></td>
</tr>
<tr>
<th>CONTACT NUMBER</th><td><input type="text" name="txt2" value="<?Php echo $r[3];?>"/></td>
</tr>
<tr>
<th>OLD AGE HOME NAME</th><td><input type="text" name="txt3" value="<?Php echo $r[4];?>"/></td>
</tr>
<tr>
<th>LOCATION</th><td><input type="text" name="location"value="<?Php echo $r[5];?>"/></td>
</tr>
<tr>
<th>LICENSE NUMBER</th><td><input type="text" name="txt4" value="<?Php echo $r[6];?>" readonly=""/></td>
</tr>
<tr>
<th>DESCRIPTION</th><td> <input type="text" name="message" value="<?php echo $r[10];?>"></td>
</tr>
<tr>
<td><input type="submit" class="button" name="btn1" value="UPDATE"/></td>
</tr>
</table>
</form>
</body>
</html>


<?php
}
if(isset($_POST["btn1"]))
{
	$id=$_GET["uid"];

	$oname=$_POST['txt1'];
	$mobile=$_POST['txt2'];
	$oldagename=$_POST['txt3'];
	$loc=$_POST['location'];
	$msg=$_POST['message'];

	$qs="UPDATE `tbl_owner` SET `name`='$oname',`mobile`='$mobile', `oldagehomename`='$oldagename',
    `location`='$loc',`message`='$msg' WHERE lid='$id'";
	$data=mysqli_query($con,$qs) or die( mysqli_error($con));
	if(mysqli_affected_rows($con)>0)
	{
		?>
		<script>
			alert("UPDATED");
				window.location.href="owner_profile.php";
			</script>
		<?php
	}
}
?>



<?php
include 'components/footer.php';
?>