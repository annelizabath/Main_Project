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

                        <tr><td><img src="<?php echo $result['photo'];?>"height="100" width="100" /></td></tr>
                        <tr><th><label>EMPLOYEE NAME</label></th><td><?php echo $result['emp_name'];?></td></tr>
                        <tr><th><label>EMPLOYEE ID</label></th><td><?php echo $result['empid'];?></td></tr>
                        <tr><th><label>DATE OF BIRTH</label></th><td><?php echo $result['dob'];?></td></tr>
                        <tr><th><label>AGE PROOF</label></th><td><img src="<?php echo $result['age_proof'];?>"height="100" width="100" /></td></tr>
                        <tr><th><label>GENDER</label></th><td><?php echo $result['gender'];?></td></tr>
                        <tr><th><label>MARITAL STATUS</label></th><td><?php echo $result['marital_status'];?></td></tr>
                        <tr><th><label>DESIGNATION</label></th><td><?php echo $result['designation'];?></td>
                        <tr><th><label>QUALIFICATION</label></th><td><?php echo $result['qualification'];?></td></tr>
                        <tr><th><label>QUALIFICATION PROOF</label></th><td><img src="<?php echo $result['qualification_proof'];?>"height="100" width="100" /></td></tr>
                        <tr><th><label>PRESENT ADDRESS</label></th><td><?php echo $result['present_address'];?></td></tr>
                        <tr><th><label>PERMENENT ADDRESS</label></th><td><?php echo $result['permenent_address'];?></td></tr>
                        <tr><th><label>DATE OF APPINMENT</label></th><td><?php echo $result['date_of_appoit'];?></td></tr>
                        <tr><th><label>DATE OF JOINING</label></th><td><?php echo $result['date_of_joining'];?></td></tr>
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