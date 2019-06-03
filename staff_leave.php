<?php
include 'dbconnection.php';
session_start();
if(!(isset($_SESSION['userid']))){
    header('location:index.php');
}
$id=$_SESSION['userid'];
include 'components/nav/staff_header.php';
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
            <form name="userform" action="#" method="post">
                <table class="table">
                <tr><th><label>LEAVE TYPE</label></th><td><select name="leave_type">
                    <option value="">SELECT</option>
                    <option value="casual">Casual Leave</option>
                    <option value="sick">Sick Leave</option>
                    <option value="earned">Earned Leave</option>
                    <option value="maternity">Maternity Leave</option>
                    <option value="paternity">Paternity Leave</option>
    </select>
                </td></tr>
                <tr><th><label>DURATION</label></th><td><select name="duration">
                    <option value="">SELECT</option>
                    <option value="forenoon">FN</option>
                    <option value="afternoon">AN</option>
                    <option value="fullday">Full Day</option>
    </select></td></tr>
                <tr><th><label>LEAVE FROM</label></th><td><input type="date" name="datef" min="2019-05-16" max="2019-05-20"></td></tr>
                <tr><th><label>LEAVE TO</label></th><td><input type="date" name="datet" min="2019-06-01" max="2019-06-10"></td></tr>
                <tr><th><label>REASON</label></th><td><textarea name="reason"></textarea></td></tr>
                <tr><td><button type="submit" class="button" name="submit">APPLY </button></td></tr>
                </table>
            </form>
        </body>
</html>
<?php
// if(isset($_GET['o_id']))
// {
//     $oid=$_GET["o_id"];
//     $_SESSION['o_iid'] = $oid;
    
// }


if(isset($_POST['submit']))
{
    $leave_type=$_POST["leave_type"];
    $duration=$_POST["duration"];
    $leave_frm=$_POST["datef"];
    $leave_to=$_POST["datet"];
    $reason=$_POST["reason"];


    $sql="SELECT * FROM `tbl_staff` WHERE lid='$id'";
    $dta=mysqli_query($con,$sql);
    $re=mysqli_fetch_array($dta);
    $ree=$re['o_id'];
    $sqlQuery="INSERT INTO `tbl_leave`(`leave_id`, `lid`, `o_id`, `leave_type`, `duration`, 
    `leave_from`, `leave_to`, `reason`, `status`) 
    VALUES (NULL,'$id','$ree','$leave_type','$duration','$leave_frm','$leave_to','$reason','pending')";

    $exequery=mysqli_query($con,$sqlQuery) or die (mysqli_error($con));
    echo "<script>alert('Leave apply sucessfully')</script>";
    echo "<script>window.location='staff_leave.php?view=userform'</script>";
}
?>
<?php
include 'components/footer.php';
?>