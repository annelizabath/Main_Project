<?php
include 'dbconnection.php';
session_start();
if(!(isset($_SESSION['userid']))){
    header('location:index.php');
}
$id=$_SESSION['userid'];
include 'components/nav/staff_header.php';
?>
<!DOCTYPE html>
                        <html>
                            <head>
                             <style>
                                        .table{
                                            width:50%;
                                            align:center;
                                        }
                                        .button{
                                            background-color:#17278c;
                                        }
                                    </style> 
                            </head>
                            <body>
                            	<?php
                            	// $sql="select tbl_staff.emp_name,tbl_staff.empid,tbl_staff.designation,tbl_login.email from 
                                // tbl_staff,tbl_login where tbl_staff.lid='$id' and tbl_login.lid='$id'";
                                
                                $sql="SELECT * FROM `tbl_staff` WHERE lid='$id'";
                            	$data=mysqli_query($con,$sql) or die(mysqli_error($con));
                            	while($result=mysqli_fetch_array($data)){
                            	?>
                            <form method="post">
                                <table class="table" align="center">

                        <tr><th><label>EMPLOYEE NAME</label></th><td><?php echo $result['emp_name'];?></td></tr>
                        <tr><th><label>EMPLOYEE ID</label></th><td><?php echo $result['empid'];?></td></tr>
                        <tr><th><label>DESIGNATION</label></th><td><?php echo $result['designation'];?></td>
                        
                         <!-- <td><a href="update_profile.php?eid=<?php echo $result['lid'];?>">more info</a></td></tr>  -->
                         <td><a href="staff_update_profile.php?eid=<?php echo $result['lid'];?>">
<img border="0" src="styles/images/img_button.png" width="150" height="100">
</a></a></td></tr> 
                              
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