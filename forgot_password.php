<?php
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
include 'PHPMailerAutoload.php';
include 'credential.php';
include 'dbconnection.php';
if (isset($_POST["submit"])) {
    //$id=$_GET["forgot-id"];
    $email = $_POST["email"];
    $sql = mysqli_query($con, "select * from tbl_login where email='{$email}'") or die(mysqli_error($con));
    $count = mysqli_num_rows($sql);
    $row = mysqli_fetch_array($sql);

    if ($count > 0) {
        $mail = new PHPMailer;

        $mail->SMTPDebug = 0;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = EMAIL;                 // SMTP username
        $mail->Password = PASS;                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->setFrom(EMAIL, 'ADMIN');
        $mail->addAddress($email, $email);     // Add a recipient
        // Name is optional
        $mail->addReplyTo(EMAIL);
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'password for login to your account';
        $mail->Body = "hai $email is your password is {$row['password']}";

        $mail->AltBody = "hai $email is your password is {$row['password']}";

        if (!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'your password has been sent on your email id.';
        }

        //echo $row['password'];
    } else {
        echo "<script>alert('email not found');</script>";
    }
}
?>

<html>
    <head>
        <style>
            .form{
                padding-left: 15%;
                padding-top: 10%;
                box-sizing: border-box;
                width: 10%;
            }
        </style>
    <body>
        <div class="form">
            <form method="post" >
                    <!-- <table> -->
                <img src="styles/images/logo@2x.png" ><br><br>
                <div class="a-box a-spacing-base">
                    <label><b>EMAIL:</b></label><br><br><input type="email" name="email" placeholder="enter email"><br><br>
                    <input type="submit" name="submit" value="send"><br><br>
                    <a href="index.php">Back to Home</a>
                    <!-- </table> -->
                </div>
            </form>
        </div>
    </head>
</html>
