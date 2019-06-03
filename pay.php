<?php
include 'dbconnection.php';
session_start();

if(!isset($_SESSION['userid']))
{
    header("location:index.php");
}
$id=$_SESSION['userid'];
?>

<?php
if(isset($_POST['submit'])){
	$amount=$_POST["number"];
	$name=$_POST["name"];
	$cnumber=$_POST["number"];
	$ex_date=$_POST["expiration-month-and-year"];
	$cvv=$_POST["security-code"];

$sql="INSERT INTO `tbl_payment`(`p_id`, `amount`, `name`, `cnumber`, `valid_thru`, `cvv`, `status`) 
VALUES (NULL,'$amount','$name','$cnumber','$ex_date','$cvv','1')";
$data=mysqli_query($con,$sql) or die(mysqli_error($con));
	

	if($data){
		?>
		<script>
			alert('payment success');
			//('window.location:payment.php');
			window.location.href="payment.php";
		</script>
		<?php
	}
	else{
		?>
		<script>
		alert(' Payment eroor! pleace try again later');
		</script>
		<?php
	}
}
?>
<script>
function cardnumber(inputtxt)
{
  var cardno = /^(?:4[0-9]{12}(?:[0-9]{3})?)$/;
  if(inputtxt.value.match(cardno))
        {
      return true;
        }
      else
        {
        alert("Not a valid Visa credit card number!");
        return false;
        }
}
</script>