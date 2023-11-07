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
/*$mail->Host = 'sandbox.smtp.mailtrap.io';
$mail->SMTPAuth = true;
$mail->Port = 2525;
$mail->Username = '90a1d2227a3db4';
$mail->Password = '55003c61d145fe';*/
$mail->SMTPAuth = true; // enable SMTP authentication
$mail->SMTPSecure = "ssl"; // sets the prefix to the server
$mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
$mail->Port = 465; // set the SMTP port for the GMAIL server
$mail->Username = "dentariosmx@gmail.com"; // GMAIL username
$mail->Password = "piwdqjmtrvtpkfbb"; // GMAIL password
 //Guardamos los datos escritos por el usuario
$nombre = $_POST['Name'];
$clinica = $_POST['Clinica'];
$phone = $_POST['Phone'];
$correo = $_POST['Email'];
$mensaje = $_POST['Mensaje'];
$contacto = $_POST['contacto'];
$x = '* ';
$servicios = [
  $_POST['servicio-1'],
  $_POST['servicio-2'],
  $_POST['servicio-3'],
  $_POST['servicio-4'],
  $_POST['servicio-5'],
  $_POST['servicio-6'],
];

$subject = 'Hola, solicito información sobre sus servicios';

for($i = 0; $i<6; $i++) {
  if(!empty($servicios[$i])) {
    $servicios[$i] = $x . $servicios[$i];
  }
}

$mail->From = $correo;
$mail->FromName = $nombre;
$email_template = 'mail_template.html';
$email = 'dentariosmx@gmail.com';
$f_name = 'Dentarios';


$message = file_get_contents($email_template);
$message = str_replace('%nombre%', $nombre, $message);
$message = str_replace('%clinica%', $clinica, $message);
$message = str_replace('%phone%', $phone, $message);
$message = str_replace('%correo%', $correo, $message);
$message = str_replace('%mensaje%', $mensaje, $message);
$message = str_replace('%contacto%', $contacto, $message);
$message = str_replace('%servicio1%', $servicios[0], $message);
$message = str_replace('%servicio2%', $servicios[1], $message);
$message = str_replace('%servicio3%', $servicios[2], $message);
$message = str_replace('%servicio4%', $servicios[3], $message);
$message = str_replace('%servicio5%', $servicios[4], $message);
$message = str_replace('%servicio6%', $servicios[5], $message);

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