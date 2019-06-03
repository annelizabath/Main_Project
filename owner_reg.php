<?php
include 'dbconnection.php';
session_start();
if (!(isset($_SESSION['userid']))) {
    header('location:index.php');
}
$id = $_SESSION['userid'];
include 'components/nav/admin_header.php';
?>

                        <!DOCTYPE html>
                        <html>
                            <head>
                            <style>
                            body{
                                padding-top:100px;
                                padding-left:100px;
                            }
                                        #customers {
                                            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                                            border-collapse: collapse;
                                            width: 70%;

                                        }

                                        #customers td, #customers th {
                                            border: 1px solid #ddd;
                                            padding: 8px;
                                        }

                                        #customers tr:nth-child(even){background-color: #f2f2f2;}

                                        #customers tr:hover {background-color: #ddd;}

                                        #customers th {
                                            padding-top: 30px;
                                            padding-bottom: 12px;
                                            text-align: left;
                                            background-color: #ff4c00;
                                            color: white;
                                        }
                                    </style>
                            </head>
                            <body>
                            <form method="post" onsubmit="return" class="oh-autoval-form" action="home_reg.php">
                                <table id="customers" align="center">

                        <tr><th><label>OWNER NAME</label></th><td><input type="text" name="name" class="av-name" av-message="Minimum 3 characters and alphabets only"></td></tr>
                        <tr><th><label>MOBILE NUMBER</label></th><td><input type="text" class="av-mobile verify-u" av-message="Must contain 10 Digits (Does't contain alphabets) " name="phone" ></td></tr>
                        <tr><th><label>OLD AGE HOME NAME</label></th><td><input type="text" name="hnme" class="av-name" av-message="Minimum 3 characters and alphabets only"></td></tr>
                        <tr><th><label>LISENCE NUMBER</label></th><td><input type="text" name="lno" ></td></tr>
                        <tr><th><label>EMAIL</label></th><td><input type="email" name="email" class="av-email verify-u" av-message="Please provide a valid email address (example@example.com)"></td></tr>
                        <tr><th><label>PASSWORD</label></th><td><input type="password" name="pwd" value="<?php echo generatekey($con);?>"></td></tr>
                        <tr><td><button type="submit" id="check" name="submit">Add Owner</button></td></tr>
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
       $("#check").click(function() {

//license number
var strFilter = /^[0-3][0-9]{7}$/;
var obj = document.getElementById("license");

if (!strFilter.test(obj.value)) {
    alert("Please enter valid 8-digit license number\r\n(Only digits)");
    obj.focus();
    obj.style.background = "#DFE32D";
    obj.value = "";
    return false;
}
});
