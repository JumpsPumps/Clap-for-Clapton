<?php
$connection =mysqli_connect("localhost","root","","verify");
$base_url='http://www.nsecit.in/Email.html';
$msg='';
if(!empty($_POST['email']) && isset($_POST['email']))
{
// username and password sent from form
$email=mysqli_real_escape_string($connection,$_POST['email']);
// regular expression for email check
$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';

mysqli_query($connection,"INSERT INTO vermail(Email) values('$email')");
// sending email
include 'smtp/Send_Mail.php';
$to=$email;
$subject="Email verification";
$body='Hi, <br/> <br/> We need to make sure you are human. Please verify your email and get started using your Website account. <br/> <br/> <a href="'.$base_url.'activation/'.$activation.'">'.$base_url.'activation/'.$activation.'</a>';

Send_Mail($to,$subject,$body);
$msg= "Registration successful, please activate email."; 

// HTML Part
?>