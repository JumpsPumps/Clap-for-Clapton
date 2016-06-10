<?php
function Send_Mail($to,$subject,$body)
{
require 'class.phpmailer.php';
$from       = "italumni@nsecit.in";
$mail       = new PHPMailer();
$mail->IsSMTP(true);            // use SMTP
$mail->IsHTML(true);
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Host       = "tls://smtp.nsecit.in"; // SMTP host
$mail->Port       =  465;                    // set the SMTP port
$mail->Username   = "italumni@nsecit.in";  // SMTP  username
$mail->Password   = "Nsec_1998";  // SMTP password
$mail->SetFrom($from, 'From Name');
$mail->AddReplyTo($from,'From Name');
$mail->Subject    = $subject;
$mail->MsgHTML($body);
$address = $to;
$mail->AddAddress($address, $to);
$mail->Send(); 
}
?>