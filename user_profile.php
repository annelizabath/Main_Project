<?php
//include 'components/session.php';
include 'dbconnection.php';
session_start();
if(!(isset($_SESSION['userid']))){
    header('location:index.php');
}
$id=$_SESSION['userid'];
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
                            <body>
                            	<?php
                            	$sql="SELECT * FROM `tbl_user_reg` WHERE lid='$id'";
                            	$data=mysqli_query($con,$sql) or die(mysqli_error($con));
                            	while($result=mysqli_fetch_array($data)){
                                    $sql1="SELECT * FROM `tbl_login` WHERE lid='$result[lid]'";
                                    $data2=mysqli_query($con,$sql1);
                                    $d1=mysqli_fetch_array($data2);
                            	?>
                            <form method="post">
                                <table class="table" align="center">
                        <tr><th><label> NAME</label></th><td><?php echo $result['name'];?></td></tr>
                        <tr><th><label>ADDRESS</label></th><td><?php echo $result['address'];?></td></tr>
                        <tr><th><label>CONTACT NUMBER</label></th><td><?php echo $result['phone'];?></td></tr>
                        <tr><th><label>OCCUPATION</label></th><td><?php echo $result['occupation'];?></td></tr>
                        <tr><th><label>EMAIL ID</label></th><td><?php echo $d1['email'];?></td>
                        <td><a href="user_update_profile.php?uid=<?php echo $result['lid'];?>"><b><u>EDIT</u></b></td></tr>
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