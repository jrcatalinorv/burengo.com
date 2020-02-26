<?php 
require_once "../modelos/conexion.php";
$id = $_REQUEST["id"];
$status = $_REQUEST["status"]; 

/* Insertar datos en la tabla factura */ 
$stmt = Conexion::conectar()->prepare("UPDATE roux_productos SET prodstatus = ".$status." WHERE prodid = ".$id."");
if($stmt->execute()){
   $out['ok'] = 1;
   $out['pid'] = $id;
}else{
  $out['ok']  = 0;
  $out['err'] = $stmt->errorInfo();
}
echo json_encode($out); 
?>