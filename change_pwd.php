<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Relief</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Different Multiple Form Widget template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs  Sign up Web Templates, Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free web designs for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="styles/forgot/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- font-awesome icons -->
<link href="styles/forgot/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
<!-- //web font -->
</head>
<body>
	<!-- main -->
	<div class="main-agile">
		<div class="content">
			<div class="top-grids">
				<div class="top-grids-right">
					<div class="signin-form reset-password">
						<h3>Reset Password</h3>
						<form action="ch_pwd.php" method="post">
							<input type="password" placeholder="Current Password" name="password" required="">
							<input type="password" placeholder="New Password" name="npassword" id="npassword" required="">
							<input type="password" placeholder="Confirm Password" name="cpassword" id="cpassword" required="">
							<input type="submit" name="submit" class="send" value="Save"><br><br>
							<a href="user_home.php"><font color="white"><u>Home</u></font></a>
						</form>
					</div>
		</div>
	</div>	
</div>
</div>
	<!-- //main --> 
</body>
</html>

<script  language="javascript" type="text/javascript">
    var password = document.getElementById("npassword")
            , confirm_password = document.getElementById("cpassword");

    function validatePassword() {
        if (password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Doesn't Match");
        } else {
            confirm_password.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>