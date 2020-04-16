<?php 
require_once "../modelos/conexion.php";
require "../../plugins/PHPMailer/src/Exception.php";
require "../../plugins/PHPMailer/src/PHPMailer.php";
require "../../plugins/PHPMailer/src/SMTP.php";

// def name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$nombre  = $_REQUEST["nm"];
$email   = $_REQUEST["ml"];
$phone   = $_REQUEST["ph"];
$comment = $_REQUEST["cm"];
$myEmail = "info@burengo.com"; 
 
// create instance phpmailer
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = "smtp.ionos.com";
$mail->Port = "587";
$mail->SMTPAuth = "true";
$mail->Username = "info@burengo.com";
$mail->Password = "Burengo123321@";
$mail->SMTPSecure = "tls";
$mail->CharSet = "UTF-8";
$mail->isHTML(true);

$mail->setFrom("info@burengo.com");
$mail->Subject = " Mensaje de contacto de ".$nombre;
$mail-> Body =  "<p> Nombre: ".$nombre."</p>"
				."<p> Tel: ".$phone."</p>"
				."\n"
				."<p>".$comment."</p>"
				." \n"
				."\n"
				."\n";
$mail->addAddress($myEmail);

if($mail->Send()){
	 	$out['ok'] = 1;
}else{
	 	$out['ok'] = 2;
}

$mail->smtpClose();
echo json_encode($out); 
?>