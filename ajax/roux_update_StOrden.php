<?php 
require_once "../modelos/conexion.php";
$txid = $_REQUEST["ccdd"];
$status = $_REQUEST["stts"]; 

/* Insertar datos en la tabla factura */ 
$stmt = Conexion::conectar()->prepare("UPDATE roux_order_transaction SET status = ".$status." WHERE txid = ".$txid."");
if($stmt->execute()){
   $out['ok'] = 1;
}else{
  $out['ok']  = 0;
  $out['err'] = $stmt->errorInfo();
}
echo json_encode($out); 
?>