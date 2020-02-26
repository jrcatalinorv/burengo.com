<?php 
require_once "../modelos/conexion.php";
$id = $_REQUEST["cid"];
$str = $_REQUEST["str"]; 

/* Insertar datos en la tabla factura */ 
$stmt = Conexion::conectar()->prepare("UPDATE roux_tables SET tableLabel = '".$str."' WHERE tableId = ".$id."");
if($stmt->execute()){
   $out['ok'] = 1;
}else{
  $out['ok']  = 0;
  $out['err'] = $stmt->errorInfo();
}
echo json_encode($out); 
?>