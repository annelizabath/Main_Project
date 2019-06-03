<?php
include 'dbconnection.php';
session_start();
if (!(isset($_SESSION['userid']))) {
    header('location:index.php');
}
$id = $_SESSION['userid'];
//include 'components/nav/owner_header.php';


$sql="SELECT * FROM `tbl_owner` WHERE  lid='$id'";
$result=mysqli_query($con,$sql) or die(mysqli_error($con));

while ($row=mysqli_fetch_array($result))
{
    $name=$row['name'];
	$mobile=$row['mobile'];
	$hnme=$row['oldagehomename'];
    $lno=$row['lisenceno'];
}


?>



<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>owner :: complete profile</title>
<!-- for-mobile-apps -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="Job Application Form Widget Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!-- //for-mobile-apps -->
<link href='//fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="styles/css/oh-autoval-style.css">
<link rel="stylesheet" href="styles/inmate/css/j-forms.css">
<link href="styles/inmate/css/style.css" rel="stylesheet" type="text/css" media="all" />
<script src="styles/js/oh-autoval-script.js"></script>
         <script src="styles/js/vali.js"></script>
</head>
<body>
<div class="content">
		<!-- <h1>Add More Details</h1> -->
		<div class="main">
			<form class="contact-forms" method="post" action="owner_complete.php" onsubmit="return" class="oh-autoval-form" enctype="multipart/form-data">
				<!-- end /.header-->



					<!-- start name -->
					<div class="first-line">
						<div class="span6 main-row">
							<div class="input">
								
								<input type="text" id="name" name="name" value="<?php echo $name;?>" >
							</div>
						</div>
						<div class="span6 main-row">
							<div class="input">
								
								<input type="text" id="mob" name="mob" value="<?php echo $mobile;?>" readonly >
							</div>
						</div>
					</div>
					<!-- end name -->

						<div class="first-line">
						<div class="span6 main-row">
							<div class="input">
								
								<input type="text" id="name" name="hname" value="<?php echo $hnme;?>" readonly="">
							</div>
						</div>
						<div class="span6 main-row">
							<div class="input">
								
								<input type="text" id="mob" class="av-name" av-message="atleast three characters and alphabets only" name="location" placeholder="Location">
							</div>
						</div>
					</div>

					<!-- start email phone -->
					<div class="first-line">
						<div class="span6 main-row">
							<div class="input">
								
								<input type="text" placeholder="License Number"  id="lic" name="lic" value="<?php echo $lno;?>" readonly="">
							</div>
						</div>
						<div class="span6 main-row">

							<div class=" main-row">
								<label>Valid License Proof</label>
								<input type="file" id="file1" onchange="validatePDF(this)" name="file1">
								<!-- <span class="hint">Only: pdf / doc Size: lessthan 1 Mb</span> -->
							<!-- </label> -->
						</div>
						</div>
					</div>

					

					<!-- start position -->
					<div class="first-line">
						<div class="span6 main-row">

							<div class=" main-row">
							<!-- <label class="input append-small-btn">
								<div class="upload-btn">
									Browse
									<input type="file" name="file2" onChange="document.getElementById('file2').value = this.value;">
								</div> -->
								<label>Upload Your Photo</label>
								<input type="file" id="file2" name="file2" id="img" onchange="validateImage()" required="" >
								<!-- <span class="hint">Size: lessthan 1 Mb</span> -->
							<!-- </label> -->
						</div>
						
							<!-- <div class="input">
								
								<input type="text" placeholder="Valid License Proof" id="proof" name="proof">
							</div> -->
						</div>
						<div class="span6 main-row">

							<div class=" main-row">
							<!-- <label class="input append-small-btn">
								<div class="upload-btn">
									Browse
									<input type="file" name="file3" onChange="document.getElementById('file3').value = this.value;">
								</div> -->
								<label>Upload Your Signature</label>
								<input type="file" id="file3" id="file1" onchange="validatePDF(this)" name="file3">
								<!-- <span class="hint">Only: pdf / doc Size: lessthan 1 Mb</span> -->
							<!-- </label> -->
						<!-- </div> -->
						
							<!-- <div class="input">
								
								<input type="text" placeholder="Valid License Proof" id="proof" name="proof">
							</div> -->
						</div>
					</div>
				</div>
					<!-- end position -->

					<!-- start message -->
					<div class="main-row">
						<div class="input">
							<textarea placeholder="Additional info" spellcheck="false" name="message"></textarea>
								<span class="tooltip tooltip-right-top">Key Specification</span>
						</div>
					</div>
					<!-- end message -->

				<div class="footer">
					<button type="submit" name="submit" class="primary-btn">Submit</button>
					<!-- <button type="reset" class="secondary-btn">Reset</button> <br> -->
					<!-- <a href="owner_main_home.php"><b><u><- HOME</u></b></a> -->
				</div>
				<!-- end /.footer -->

			</form>
		</div>
		<!-- <p class="copy_rights">&copy; 2016 Job Application Form Widget. All Rights Reserved | Design by  <a href="http://w3layouts.com/"> W3layouts</a></p> -->
</div>
		<!-- Scripts -->
		<script src="styles/inmate/js/jquery.1.11.1.min.js"></script>

		<!--[if lt IE 10]>
				<script src="j-folder/js/jquery.placeholder.min.js"></script>
			<![endif]-->

		<script>
			$(document).ready(function(){

				// Phone masking
				$('#phone').mask('(999) 999-9999', {placeholder:'x'});

				// Post code masking
				$('#post').mask('999-9999', {placeholder:'x'});

			});

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
</body>
</html>
