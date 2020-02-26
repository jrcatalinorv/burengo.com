<?php 
require_once "../modelos/conexion.php";
$id = $_REQUEST["cid"];
$status = $_REQUEST["status"]; 

/* Insertar datos en la tabla factura */ 
$stmt = Conexion::conectar()->prepare("UPDATE roux_categorias SET catstatus = ".$status." WHERE catid = ".$id."");
if($stmt->execute()){
   $out['ok'] = 1;
}else{
  $out['ok']  = 0;
  $out['err'] = $stmt->errorInfo();
}
echo json_encode($out); 
?>