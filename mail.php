<?php 
 
$name = "Clauida Franco";
$subject = "Burengo.com";
$email = "claudiaf@mail.com";
$phone = "(809) 000-0000";
$msg = "Esta es una prueba de email de contacto";

$innerMail = "info-test@mpro-app.com";
$headers = "From: ".$email;
$txt = "Has recibido un email de ".$name.".\n\n".$msg;

mail($innerMail,$subject,$txt, $header);
 echo "SEND";
 

?>
