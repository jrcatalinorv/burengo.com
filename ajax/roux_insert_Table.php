<?php 
require_once "../modelos/conexion.php";
$table = $_REQUEST["strtable"];
$avail  = 1; 
$factor = 5; 
$status = 1; 
$order = '-'; 

/* Insertar datos en la tabla factura */ 
$stmt = Conexion::conectar()->prepare("INSERT INTO  roux_tables (tableLabel,tableCfcator,tableAvail,
tableCurrentOrder,tableStatus)VALUES (:tableLabel,:tableCfcator,:tableAvail,:tableCurrentOrder,:tableStatus)");

$stmt->bindParam(":tableLabel",$table, PDO::PARAM_STR);
$stmt->bindParam(":tableCfcator",$factor, PDO::PARAM_INT);
$stmt->bindParam(":tableAvail",$avail, PDO::PARAM_INT);
$stmt->bindParam(":tableCurrentOrder",$order, PDO::PARAM_STR);
$stmt->bindParam(":tableStatus",$status, PDO::PARAM_INT);
 
if($stmt->execute()){
   $out['ok'] = 1;
}else{
  $out['ok']  = 0;
  $out['err'] = $stmt->errorInfo();
}
echo json_encode($out); 
?>