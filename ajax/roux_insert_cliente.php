<?php 
require_once "../modelos/conexion.php";

$nombre = $_REQUEST["nombre"];
$rnc = $_REQUEST["rnc"];
$tel  = $_REQUEST["tel"];
$addr = $_REQUEST["addr"];
$email = $_REQUEST["email"];
$status = 1; 
 
/* ----------------------------------------------- */
/* Insertar datos en la tabla factura */
/* ----------------------------------------------- */ 
$stmt = Conexion::conectar()->prepare("INSERT INTO roux_clientes(custname,custrnc,custemail,custphone,custmobile,custaddr,custstatus) VALUES (:custname,:custrnc,:custemail,:custphone,:custmobile,:custaddr,:custstatus)");
$stmt->bindParam(":custname",$nombre, PDO::PARAM_STR);
$stmt->bindParam(":custrnc",$rnc, PDO::PARAM_STR);
$stmt->bindParam(":custemail",$email, PDO::PARAM_STR);
$stmt->bindParam(":custphone",$tel, PDO::PARAM_STR);
$stmt->bindParam(":custmobile",$tel, PDO::PARAM_STR);
$stmt->bindParam(":custaddr",$addr, PDO::PARAM_STR);
$stmt->bindParam(":custstatus",$status, PDO::PARAM_INT);
 
if($stmt->execute()){
   $out['ok'] = 1;
}else{
  $out['ok']  = 0;
  $out['err'] = $stmt->errorInfo();
}
echo json_encode($out); 
?>