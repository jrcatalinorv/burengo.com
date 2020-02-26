<?php 
require_once "../modelos/conexion.php";
$categoria = strtoupper($_REQUEST["strcategoria"]);
$status = 1; 

/* Insertar datos en la tabla factura */ 
$stmt = Conexion::conectar()->prepare("INSERT INTO roux_categorias(catstr,catstatus) VALUES (:catstr,:catstatus)");
$stmt->bindParam(":catstr",$categoria, PDO::PARAM_STR);
$stmt->bindParam(":catstatus",$status, PDO::PARAM_INT);
 
if($stmt->execute()){
   $out['ok'] = 1;
}else{
  $out['ok']  = 0;
  $out['err'] = $stmt->errorInfo();
}
echo json_encode($out); 
?>