<?php
$connection =mysqli_connect("localhost","root","","verify");
$base_url='http://www.nsecit.in/Email.html';
$msg='';
if(!empty($_POST['email']) && isset($_POST['email']))
 {
// username and password sent from form
$email=mysqli_real_escape_string($connection,$_POST['email']);
// regular expression for email check
//$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';

mysqli_query($connection,"INSERT INTO vermail(Email) values('$email')");
// sending email

require("/home/nsecit1998/public_html/phpmailertest/PHPMailer_5.2.0/class.phpmailer.php");

$mail = new PHPMailer();

$mail->IsSMTP();                                      // set mailer to use SMTP
$mail->Host = "localhost";  // specify main and backup server
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = "recieve_from@nsecit.in";  // SMTP username
$mail->Password = "Nsec_1998"; // SMTP password

$mail->From = "italumni@nsecit.in";
$mail->FromName = "NSEC Dept. of IT";
//$mail->AddAddress("josh@example.net", "Josh Adams");
$mail->AddAddress("$echo");                  // name is optional
//$mail->AddReplyTo("info@example.com", "Information");

$mail->WordWrap = 50;                                 // set word wrap to 50 characters
//$mail->AddAttachment("/var/tmp/file.tar.gz");         // add attachments
//$mail->AddAttachment("/tmp/image.jpg", "new.jpg");    // optional name
$mail->IsHTML(true);                                  // set email format to HTML

$mail->Subject = "Email Check";
$mail->Body    = "This is a check message from nsecit.in. Please respond to it. ";
$mail->AltBody = "This is a check message from nsecit.in. Please respond to it. ";
if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}
 }
echo "Message has been sent";
?>
