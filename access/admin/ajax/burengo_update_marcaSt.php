<?php 
require_once "../../modelos/conexion.php";
$id = $_REQUEST["pid"];
$status = $_REQUEST["status"]; 

/* Insertar datos en la tabla factura */ 
$stmt = Conexion::conectar()->prepare("UPDATE bgo_marcas_vehiculos SET mv_status = ".$status." WHERE mv_id = '".$id."'");
if($stmt->execute()){
   $out['ok'] = 1;
}else{
  $out['ok']  = 0;
  $out['err'] = $stmt->errorInfo();
}
echo json_encode($out); 
?>