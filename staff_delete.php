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
                                        .table{
                                            width:70%;
                                        }
                                        .button{
                                            background-color:#17278c;
                                            color:white;
                                        }
                                    </style> 
                            </head>
                            <body>
                            	<?php
                                $tkv=$_GET["tkv"];
                            	$sql="SELECT * FROM `tbl_staff` WHERE emp_id='".$tkv."'";
                            	$data=mysqli_query($con,$sql) or die(mysqli_error($con));
                            	while($result=mysqli_fetch_array($data)){
                            	?>
                            <form method="post">
                                <table class="table" align="center">
                        <tr><td><img src="<?php echo $result['photo'];?>"height="100" width="100" /></td></tr>
                        <tr><th><label>EMPLOYEE NAME</label></th><td><?php echo $result['emp_name'];?></td></tr>
                        <tr><th><label>DATE OF BIRTH</label></th><td><?php echo $result['dob'];?></td></tr>
                        <tr><th><label>AGE PROOF</label></th><td><img src="<?php echo $result['age_proof'];?>"></td></tr>
                        <tr><th><label>GENDER</label></th><td><?php echo $result['gender'];?></td>
                        <tr><th><label>MARITAL STATUS</label></th><td><?php echo $result['marital_status'];?></td></tr>
                        <tr><th><label>PRESENT ADDRESS</label></th><td><?php echo $result['present_address'];?></td></tr>
                        <tr><th><label>DATE OF APPOINMENT</label></th><td><?php echo $result['date_of_appoit'];?></td></tr>
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