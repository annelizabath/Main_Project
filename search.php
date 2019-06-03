<?php
include 'dbconnection.php';
session_start();
if (!(isset($_SESSION['userid']))) {
    header('location:index.php');
}
$id = $_SESSION['userid'];

if(isset($_POST['search'])){
    ?>
     <table align="center">
            <tr>
            <th>OWNER NAME</th>
            <th>CONTACT NUMBER</th>
            <th>OLD AGE HOME NAME</th>
            <th>DESCRIPTION</th>
            </tr>
            <?php
    $location=$_POST['location'];
    $query="select * from tbl_owner where location='$location'";
    $data=mysqli_query($con,$query) or die(mysqli_error($con));
    if($data){
        ?>
        <?php
        while($result=mysqli_fetch_array($data)){
            ?>
            <tr>
            <td><?php echo $result['name'];?></td>
            <td><?php echo $result['mobile'];?></td>
            <td><?php echo $result['oldagehomename'];?></td>
            <td><?php echo $result['message'];?></td>
            </tr>
            <?php
        }
    }
    ?>
    </table>
    <?php
}


?>
