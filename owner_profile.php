<?php
include 'dbconnection.php';
session_start();
if (!(isset($_SESSION['userid']))) {
    header('location:index.php');
}
$id = $_SESSION['userid'];
include 'components/nav/owner_header.php';
?>
<br><br><br>
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
                            <body>
                            	<?php
                            	$sql="SELECT * FROM `tbl_owner` WHERE lid='$id'";
                            	$data=mysqli_query($con,$sql) or die(mysqli_error($con));
                            	while($result=mysqli_fetch_array($data)){
                            	?>
                            <form method="post">
                                <table class="table" align="center">
                        <tr><td><img src="<?php echo $result['photo'];?>"height="100" width="100" /></td></tr>
                        <tr><th><label>OWNER NAME</label></th><td><?php echo $result['name'];?></td></tr>
                        <tr><th><label>CONTACT NUMBER</label></th><td><?php echo $result['mobile'];?></td></tr>
                        <tr><th><label>OLD AGE HOME NAME</label></th><td><?php echo $result['oldagehomename'];?></td></tr>
                        <tr><th><label>LOCATION</label></th><td><?php echo $result['location'];?></td>
                        <tr><th><label>LICENSE NUMBER</label></th><td><?php echo $result['lisenceno'];?></td></tr>
                        <tr><th><label>LICENSE PROOF</label></th><td><img src="<?php echo $result['proof'];?>"height="50" width="50" /></td></tr>
                        <tr><th><label>SIGNATURE</label></th><td><img src="<?php echo $result['signature'];?>"height="100" width="100"/></td></tr>
                        <tr><th><label>DISCRIPTION</label></th><td><?php echo $result['message'];?></td>
                        <td><a href="owner_edit_uprofile.php?uid=<?php echo $result["o_id"];?>"><b><u>Edit</u></b></a></td></tr>
                                </table>
                            </form>
                            </body>
                            <?php
                        }
   ?>
</html>

<?php
include 'components/footer.php';
?>