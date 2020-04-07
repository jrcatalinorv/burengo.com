<?php 
require_once "../modelos/conexion.php";
$categoria = $_REQUEST["color"];
$status = 1; 

/* Insertar datos en la tabla factura */ 
$stmt = Conexion::conectar()->prepare("INSERT INTO bgo_colores_int(clrs_int_name,clrs_int_status) VALUES (:clrs_int_name,:clrs_int_status)");
$stmt->bindParam(":clrs_int_name",$categoria, PDO::PARAM_STR);
$stmt->bindParam(":clrs_int_status",$status, PDO::PARAM_INT);
 
if($stmt->execute()){
   $out['ok'] = 1;
}else{
  $out['ok']  = 0;
  $out['err'] = $stmt->errorInfo();
}
echo json_encode($out); 
?>