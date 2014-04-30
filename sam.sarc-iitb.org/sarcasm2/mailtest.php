<?php
require_once('class.phpmailer.php');

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->CharSet="UTF-8";
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->Username = 'tusharshri2@gmail.com';
$mail->Password = 'troltomm';
$mail->SMTPAuth = true;

$mail->From = 'tusharshri2@gmail.com';
$mail->FromName = 'Tushar Shrivastava';
$mail->AddAddress('m.prannoy@gmail.com');

$mail->IsHTML(true);
$mail->Subject    = "PHPMailer Test Subject via Sendmail, basic";
$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!";
$mail->Body    = "Hello";

if(!$mail->Send())
{
    echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
    echo "Message sent!";
}
?>