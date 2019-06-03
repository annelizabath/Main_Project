<?php
include 'dbconnection.php';
session_start();
if(!(isset($_SESSION['userid']))){
    header('location:index.php');
}
$id=$_SESSION['userid'];
include 'components/nav/owner_header.php';
?>
<br><br><br>
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
                            <body onload="firstfocus();">
                            <form name="userform" method="post" onsubmit="return" class="oh-autoval-form" action="staff_detail.php">
                                <table class="table" align="center">

                        <tr><th><label>EMPLOYEE NAME</label></th><td><input type="text" class="av-name" av-message="Atleast tree characters and alphabets only" name="name"></td></tr>
                        <tr><th><label>EMPLOYEE ID</label></th><td><input type="text" onblur="userid_validation(5,12)" name="emid"></td></tr>
                        <tr><th><label>DESIGNATION</label></th><td><input type="text" name="designation" class="av-name" av-message="Atleast 3 characters "></td></tr>
                        <tr><th><label>EMAIL</label></th><td><input type="email"  class="av-email verify-u" av-message="Please provide a valid email address (example@example.com)" name="email"></td></tr>
                        <tr><th><label>PASSWORD</label></th><td><input type="password" name="pwd" value="<?php echo generatekey($con);?>"></td></tr>
                        <tr><td><button type="submit" class="button" name="submit">Add Staff</button></td></tr>
                                </table>
                            </form>
                            </body>
                        </html>

                        <?php

    function checkKeys($con,$randstr)

{
$sql="SELECT * FROM tbl_uniqueid  ";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_assoc($res)){
    if($row['keystring']==$randstr){
        $keyExists=true;
        break;
    }
    else{
        $keyExists=false;
    }
}
return $keyExists;
}

// function generateid($con){
    
// }


function generatekey($con){
        $keylength=8;
        $str ="1234567890abcdefghijklmnopqrstuvwxyz()@#!%&/$";
        $randstr= substr(str_shuffle($str),0,$keylength);
        $checkKey=checkKeys($con,$randstr);
        while($checkKey==true){
            $randstr=substr(str_shuffle($str),0,$keylength);
            $checkKey=checkKeys($con,$randstr);
        }
        return $randstr;
    }
       ?>           

<script>
    /*---- IMAGE UPLOAD VALIDATION ---*/

function validateImage() {
    var formData = new FormData();
 
    var file = document.getElementById("img").files[0];
 
    formData.append("Filedata", file);
    var t = file.type.split('/').pop().toLowerCase();
    if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") {
        alert('Please select a valid image file jpg,png');
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
include 'components/footer.php';
?>