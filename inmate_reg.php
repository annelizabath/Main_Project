<?php
//include 'components/session.php';
include 'dbconnection.php';
session_start();
if(isset($_GET['o_id']))
{
	$oid=$_GET["o_id"];
	
}
if(!(isset($_SESSION['userid']))){
    header('location:index.php');
}
$id=$_SESSION['userid'];
include 'components/nav/user_header.php';
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>

    <script src="styles/js/jquery-3.2.1.min.js"></script>
        <script src="styles/js/oh-autoval-script.js"></script>
         <script src="styles/js/vali.js"></script>

    <!-- Icons font CSS-->
    <link rel="stylesheet" type="text/css" href="styles/css/oh-autoval-style.css">
    <link href="styles/inmate_reg/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="styles/inmate_reg/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="styles/inmate_reg/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="styles/inmate_reg/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="styles/inmate_reg/css/main.css" rel="stylesheet" media="all">
    
</head>
<body>
    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h1 class="title"><u><b>FILL THE FORM </b></u><span class="required">*</span></h1>
                    <form name="usrform" method="POST" onsubmit="return formOK;" action="inmate.php?o_id=<?php echo $oid;?>" enctype="multipart/form-data">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Name<span class="required">*</span></label>
                                    <input class="input--style-4" type="text" name="name"
                                    id="author" value="" required="required" aria-required="true" pattern="^([- \w\d\u00c0-\u024f]+)$" title="Your name (no special characters, numbers diacritics are okay)" type="text" spellcheck="false" size="20" required="">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Gender<span class="required">*</span></label>
                                    <div class="p-t-10">
                                        <label class="radio-container m-r-45">Male
                                            <input type="radio" checked="checked" name="gender" value="male">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio-container">Female
                                            <input type="radio" name="gender" value="female">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Date of Birth<span class="required">*</span></label>
                                    <div class="input-group-icon">
                                        <input class="input--style-4 js-datepicker" type="text"  id="dob" name="dob" name="dob" required="">
                                        <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                        <script>
  var d = new Date();
var year = d.getFullYear() ;
d.setFullYear(year);
$('#dl').datepicker({ changeYear: true, changeMonth: true, maxDate:'d', minDate:'d', defaultDate: d})
  </script>  
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Age<span class="required">*</span></label>
                                    <input class="input--style-4" type="text" id="id1" min="60" max="85" name="age" required="">
                                    <p>If the age is less than 60 or greater than 85, an error message will be displayed.</p>

<p id="demo"></p>
                                </div>
                            </div>
                        </div>
                        <script>
                             function myFunction() {
                            var inpObj = document.getElementById("id1");
                            if (!inpObj.checkValidity()) {
                          document.getElementById("demo").innerHTML = inpObj.validationMessage;
                        }
                    } 
                        </script>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Address<span class="required">*</span></label>
                                    <input class="input--style-4" type="text" name="address" required="">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">District<span class="required">*</span></label>
                                    <input class="input--style-4" type="text" name="district" required="">
                                </div>
                            </div>
                        </div>
                         <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Aadhaar Number<span class="required">*</span></label>
                                    <input class="input--style-4" type="text" id="txtAadhar" onblur="AadharValidate();" name="adno" required="">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Election id number<span class="required">*</span></label>
                                    <input class="input--style-4" type="text" name="idno" required="">
                                </div>
                            </div>
                        </div>
                         <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Religion<span class="required">*</span></label>
                                    <input class="input--style-4" type="text" name="religion" required="">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Cast<span class="required">*</span></label>
                                    <input class="input--style-4" type="text" name="cast" required="">
                                </div>
                            </div>
                        </div>
                         <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Height<span class="required">*</span></label>
                                    <input class="input--style-4" type="text" id="height" name="height" required="">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Weight<span class="required">*</span></label>
                                    <input class="input--style-4" type="text"  name="weight" required="">
                                </div>
                            </div>
                        </div>
                         <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Identification mark1<span class="required">*</span></label>
                                    <input class="input--style-4" type="text" name="id1" required="">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Identification mark 2<span class="required">*</span></label>
                                    <input class="input--style-4" type="text" name="id2" required="">
                                </div>
                            </div>
                        </div>
                         <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Relationship<span class="required">*</span></label>
                                    <input class="input--style-4" type="text" name="relationship" required="">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Ration card copy<span class="required">*</span></label>
                                    <input class="input--style-4" type="file" onchange="validatePDF(this)" name="f1" required="">
                                </div>
                            </div>
                        </div>
                         <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Health Documents<span class="required">*</span></label>
                                    <input class="input--style-4" type="file"  onchange="validatePDF(this)" name="f2" required="" >
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Assest(in Rupees)<span class="required">*</span></label>
                                    <input class="input--style-4" type="text" name="asset" required="">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Asset Proof<span class="required">*</span></label>
                                    <input class="input--style-4" type="file"  onchange="validatePDF(this)" name="f3" required="" >
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">Photo<span class="required">*</span></label>
                                    <input class="input--style-4" type="file" name="f4" id="img" onchange="validateImage()" required="">
                                </div>
                            </div>
                        </div>
                        <div class="p-t-15">
                         <button class="btn btn--radius-2 btn--blue" type="submit" onclick="validate();" name="submit">Submit</button>
                                                <br><br>
                            <!-- <a href="book.php">Book Now</a> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="styles/inmate_reg/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="styles/inmate_reg/vendor/select2/select2.min.js"></script>
    <script src="styles/inmate_reg/vendor/datepicker/moment.min.js"></script>
    <script src="styles/inmate_reg/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="styles/inmate_reg/js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>

<script type="text/javascript">

    /*--- AADHAR NUMBER VALIDATION ----*/

    function AadharValidate() {
        var aadhar = document.getElementById("txtAadhar").value;
        var adharcardTwelveDigit = /^\d{12}$/;
        var adharSixteenDigit = /^\d{16}$/;
        if (aadhar != '') {
            if (aadhar.match(adharcardTwelveDigit)) {
                return true;
            }
            else if (aadhar.match(adharSixteenDigit)) {
                return true;
            }
            else {
                alert("Enter valid Aadhar Number (12 digit number)");
                txtAadhar.value="";
                return false;
            }
        }
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

/* HEIGHT VALIDATION */

var regex = /(\d{1,2}'\d{1,2}")|(\d{1,3}cm)/;
    
    function validate(){
        var height = document.getElementById('height').value;
        document.getElementById('result').innerHTML = regex.test(height) ? "Valid" : "Invalid"; 
    }
   </script>

<?php
include 'components/footer.php';
?>