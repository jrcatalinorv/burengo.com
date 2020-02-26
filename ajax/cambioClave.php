<?php 
session_start();
require_once "../modelos/conexion.php";
require_once "../modelos/data.php";

$id= $_REQUEST["uid"];
$pass = crypt($_REQUEST["pass"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

$stmt2 = Conexion::conectar()->prepare("UPDATE ".DB_SCHEMA.".usuarios SET clave='".$pass."' WHERE id= ".$id."");   
 
if($stmt2->execute()){	  
 $out['ok'] = 1;
}else{
  $out['ok'] = 0;
 print_r($stmt2->errorInfo());
}	
echo json_encode($out); 
?>