<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
$mail = new PHPMailer(true);

$mail->IsHTML(true);
//$mail->IsSMTP(true);

// Gmail
$mail = new PHPMailer();
$mail->isSMTP();
$mail->CharSet = 'UTF-8';
// $mail = new PHPMailer();
// $mail->isSMTP();
// $mail->CharSet = 'UTF-8';
// $mail->Host = 'sandbox.smtp.mailtrap.io';
// $mail->SMTPAuth = true;
// $mail->Port = 2525;
// $mail->Username = '90a1d2227a3db4';
// $mail->Password = '55003c61d145fe';
$mail->SMTPAuth = true; // enable SMTP authentication
$mail->SMTPSecure = "ssl"; // sets the prefix to the server
$mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
$mail->Port = 465; // set the SMTP port for the GMAIL server
$mail->Username = "dentariosmx@gmail.com"; // GMAIL username
$mail->Password = "piwdqjmtrvtpkfbb"; // GMAIL password
//Guardamos los datos escritos por el usuario
$location = $_POST['TitleLocation'];
$direction = $_POST['Direction'];
$link = $_POST['Link'];
$email = $_POST['email'];
$time = $_POST['Time'];

$subject = 'Gracias por tu reservación';

$mail->From = 'dentariosmx@gmail.com';
$mail->FromName = 'Dentarios';
$email_template = 'mail_aviso.html';
$f_name = 'Dentarios';


$message = file_get_contents($email_template);
$message = str_replace('%location%', $location, $message);
$message = str_replace('%direction%', $direction, $message);
$message = str_replace('%link%', $link, $message);
$message = str_replace('%horario%', $time, $message);

$mail->MsgHTML($message);
$mail->Subject = $subject;
$mail->AddAddress($email, $f_name);
$mail->send();

// Send mail   
if (!$mail) {
  echo 'Email not sent an error was encountered: ' . $mail->ErrorInfo;
} else {
  header('Location:exito.php');
}
?>