<?php 
require_once "../modelos/conexion.php";
$nombre = $_REQUEST["nombre"];
$usuario = $_REQUEST["usuario"];
$pass = '12345';
$password  = crypt($pass, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
$perfil = $_REQUEST["profile"];
$ultimo_login = date('Y-m-d H:i:s');
$fecha = date('Y-m-d H:i:s');
$estado = 1; 
 
/* ----------------------------------------------- */
/* Insertar datos en la tabla factura */
/* ----------------------------------------------- */ 
$stmt = Conexion::conectar()->prepare("INSERT INTO usuarios (nombre,usuario,password,perfil,estado,
ultimo_login,fecha)VALUES(:nombre,:usuario,:password,:perfil,:estado,:ultimo_login,:fecha)");

$stmt->bindParam(":nombre",$nombre, PDO::PARAM_STR);
$stmt->bindParam(":usuario",$usuario, PDO::PARAM_STR);
$stmt->bindParam(":password",$password, PDO::PARAM_STR);
$stmt->bindParam(":perfil",$perfil, PDO::PARAM_STR);
$stmt->bindParam(":estado",$estado, PDO::PARAM_INT);
$stmt->bindParam(":ultimo_login",$ultimo_login, PDO::PARAM_STR);
$stmt->bindParam(":fecha",$fecha , PDO::PARAM_STR);
 
if($stmt->execute()){
   $out['ok'] = 1;
}else{
  $out['ok']  = 0;
  $out['err'] = $stmt->errorInfo();
}
echo json_encode($out); 
?>