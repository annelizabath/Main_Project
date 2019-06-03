<?php
include 'dbconnection.php';
session_start();
if(!(isset($_SESSION['userid']))){
    header('location:index.php');
}
$id=$_SESSION['userid'];
include 'components/nav/staff_header.php';
?>
<br><br><br><br><br><br><br>
<?php
$sql="SELECT * FROM `tbl_staff` WHERE  lid='$id'";
$result=mysqli_query($con,$sql) or die(mysqli_error($con));

while ($row=mysqli_fetch_array($result))
{
    $name=$row['emp_name'];
	$empid=$row['empid'];
	$desig=$row['designation'];
}
?>
<html>
<head>
<style>
.table{
    width:70px;
}
.submit{
  background-color:#008CBA;
  color:black;
}
</style>
</head>
<body>
<form name="userform" method="post" enctype="multipart/form-data">
<table class="table">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">EMPLOYEE NAME</label>
      <input type="text" class="form-control" id="inputEmail4" value="<?php echo $name;?>" readonly="">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">EMPLOYEE ID</label>
      <input type="text" class="form-control" id="inputPassword4" value="<?php echo $empid;?>" readonly="">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">DATE OF BIRTH</label>
      <input type="date" name="dob" class="form-control" min="1960-01-01" max="2000-01-01" id="inputEmail4" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">AGE PROOF</label>
      <input type="file" name="f1" onchange="validatePDF(this)" class="form-control" id="inputPassword4" >
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">GENDER</label>
      <select name="gender">
      <option value="">---select---</option>
      <option value="male">Male</option>
      <option value="female">Female</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">MARITAL STATUS</label>
      <select name="mstatus">
      <option value="">---select---</option>
      <option value="unmarried">Unmarried</option>
      <option value="married">Married</option>
      </select>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">CURRENT DESIGNATION</label>
      <input type="text" class="form-control" id="inputEmail4" value="<?php echo $desig;?>" readonly="">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">PHOTO</label>
      <input type="file" name="f2" class="form-control" id="img" onchange="validateImage()" required="">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">QUALIFICATION </label>
      <input type="text" name="qualification" class="form-control" id="inputEmail4" placeholder="Your Qualification" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">QUALIFICATION PROOF</label>
      <input type="file" name="f3" onchange="validatePDF(this)" class="form-control" id="inputPassword4" >
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">PRESENT ADDRESS</label>
      <textarea name="address1" class="form-control" id="inputEmail4"></textarea>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">PERMENENT ADDRESS</label>
      <textarea name="address2"  class="form-control" id="inputEmail4"></textarea>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">DATE OF APPOINMENT</label>
      <input type="date" name="doa" min="2000-01-01" max="2019-04-20" class="form-control" id="inputEmail4" >
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">DATE OF JOINING</label>
      <input type="date" name="doj" min="2000-01-10" max="2019-04-30" class="form-control" id="inputPassword4" >
    </div>
  </div>
  <input type="submit" class="submit" name="submit" value="Update">
  </table>
</form>
</body>
</html>



<script>
/* ---- PDF FILE UPLOAD VALIDATION --- */
var formOK = false;

function validatePDF(objFileControl){
 var file = objFileControl.value;
 var len = file.length;
 var ext = file.slice(len - 4, len);
 if(ext.toUpperCase() == ".PDF"){
   formOK = true;
 }
 else{
   formOK = false;
   alert("Only PDF files allowed.");
   objFileControl.value="";
 }
}
/*---- IMAGE UPLOAD VALIDATION ---*/

function validateImage() {
    var formData = new FormData();
 
    var file = document.getElementById("img").files[0];
 
    formData.append("Filedata", file);
    var t = file.type.split('/').pop().toLowerCase();
    if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") {
        alert('Please select a valid image file');
        document.getElementById("img").value = '';
        return false;
    }
    if (file.size > 1024000) {
        alert('Max Upload size is 1MB only');
        document.getElementById("img").value = '';
        return false;
    }
    return true;
}

</script>










<?php
if(isset($_POST['submit'])){

  $dob=$_POST["dob"];

  $target_directory="uploads/";

  $age_pf=$target_directory.basename($_FILES['f1']['name']);
	move_uploaded_file($_FILES['f1']['tmp_name'],$age_pf);
 
  $gender=$_POST["gender"];
  $marital_satus=$_POST["mstatus"];

  $target_directory="uploads/";

  $photo=$target_directory.basename($_FILES['f2']['name']);
  move_uploaded_file($_FILES['f2']['tmp_name'],$photo);
  
  $qualification=$_POST["qualification"];

  $target_directory="uploads/";

  $qualification_pf=$target_directory.basename($_FILES['f3']['name']);
  move_uploaded_file($_FILES['f3']['tmp_name'],$qualification_pf);

  
  $present_addr=$_POST["address1"];
  $permenent_addr=$_POST["address2"];
  $doa=$_POST["doa"];
  $doj=$_POST["doj"];


  $sqlUpdate="UPDATE `tbl_staff` SET `dob`='$dob',`age_proof`='$age_pf',`gender`='$gender',`marital_status`='$marital_satus',
  `photo`='$photo',`qualification`='$qualification',`qualification_proof`='$qualification_pf',
  `present_address`='$present_addr',`permenent_address`='$permenent_addr',`date_of_appoit`='$doa',`date_of_joining`='$doj'
   WHERE lid='$id'";

  $data=mysqli_query($con,$sqlUpdate) or die(mysqli_error($con));
  echo "<script>alert('Details added sucessfully')</script>";
  echo "<script>window.location='staff_page.php?view=userform'</script>";


}
?>
<?php
include 'components/footer.php';
?>