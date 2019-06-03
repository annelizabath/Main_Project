<?php
include 'dbconnection.php';
include 'components/session.php';
if(isset($_POST['submit'])){
	homeregistration($con);
}
	function homeregistration($con)
	{
		$name=$_POST["name"];
        $mobile=$_POST["phone"];
        $hnme=$_POST["hnme"];
		$hnumber=$_POST["lno"];
		$email=$_POST["email"];
		$password=$_POST["pwd"];

		$sql="INSERT INTO `tbl_login`(`lid`, `email`, `password`, `role`, `status`) 
        VALUES (NULL,'$email','$password','3','1')";
		$result=mysqli_query($con,$sql);
		$login_id=mysqli_insert_id($con); // logi id of the user

		// address table insertion
		// $sqlAddr="INSERT INTO `tbl_address`(`addr_id`, `name`, `address`, `phone`, `status`) VALUES (NULL,'$name','$address','$phone','1')";
		// $result1=mysqli_query($con,$sqlAddr); 
		// $addrId=mysqli_insert_id($con); // address of the user

		// user field
		$sqlstaffReg="INSERT INTO `tbl_owner`(`o_id`, `lid`, `name`, `mobile`,`oldagehomename`, `lisenceno`, `status`) 
        VALUES (NULL,'$login_id','$name','$mobile','$hnme','$hnumber','1')";
		$result2=mysqli_query($con,$sqlstaffReg); 
		if($result2){
			header('location:index.php');
		}

	

require 'PHPMailerAutoload.php';
             require 'credential.php';
    
    
    $mail = new PHPMailer;
    
    $mail->SMTPDebug = 4;                               // Enable verbose debug output
    
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = EMAIL;                 // SMTP username
    $mail->Password = PASS;                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    
    $mail->setFrom(EMAIL, 'ADMIN');
    $mail->addAddress($_POST['email']);     // Add a recipient
                   // Name is optional
    $mail->addReplyTo(EMAIL);
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');
    
   // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML
    
    $mail->Subject = 'This is mail from govt.';
    $mail->Body    ="<i>This is your password:</i>  $password";
   
    $mail->AltBody ="";
     
    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }

}	
?>


	