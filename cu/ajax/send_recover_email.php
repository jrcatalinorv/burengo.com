<?php 
require_once "../modelos/conexion.php";
require_once "../modelos/data.php";
require "../../plugins/PHPMailer/src/Exception.php";
require "../../plugins/PHPMailer/src/PHPMailer.php";
require "../../plugins/PHPMailer/src/SMTP.php";

// def name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$email  = $_REQUEST["email"];
$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

/* Buscar el usuario si existe */

$stmt2 = Conexion::conectar()->prepare("SELECT * FROM bgo_users WHERE email ='".$email."' AND bgo_country ='".COUNTRY_CODE."'");
$stmt2 -> execute();
if($results = $stmt2 -> fetch()){	


$first = substr(str_shuffle($permitted_chars), 0, 75);
$second = $results['uid'] ;
$third = substr(str_shuffle($permitted_chars), 0, 35);

// create instance phpmailer
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->Port = "587";
$mail->SMTPAuth = "true";
$mail->Username = "quiniguacity@gmail.com";
$mail->Password = "barrionuevo02";
$mail->SMTPSecure = "tls";
$mail->CharSet = "UTF-8";
$mail->isHTML(true);


$mail->setFrom("quiniguacity@gmail.com");
$mail->Subject = burengo_mailSubject;
$mail-> Body =  "<center>"
				."\n\n"
				."<h3> ".burengo_mailboddy." </h3>"
				."https://mpro-app.com/burengo/do/confirmation/recuperar-cuenta.php?ft=".$first."&th=".$third."&sd=".$second.""
				."</center>\n"
				."\n"
				."\n";
$mail->addAddress($email);

if($mail->Send()){
	 	$out['ok'] = 1;
}else{
	 	$out['ok'] = 2;
}

$mail->smtpClose();
}else{
	$out['ok'] = 3;
	$out['err'] = $stmt->errorInfo();
}
echo json_encode($out); 
?>