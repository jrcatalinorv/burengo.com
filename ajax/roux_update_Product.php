<?php 
require_once "../modelos/conexion.php";

$id = $_REQUEST["id"];
$cat = $_REQUEST["cat"];
$name = $_REQUEST["name"];
$desc = $_REQUEST["desc"];
$price = $_REQUEST["price"];

/* Insertar datos en la tabla factura */ 
$stmt = Conexion::conectar()->prepare("UPDATE roux_productos SET prodcatid = '".$cat."', prodstr = '".$name."', proddesc = '".$desc."', prod_precio_venta = ".$price." WHERE prodid = ".$id."");

if($stmt->execute()){
  $out['ok'] = 1;
  $out['pid'] = $id;
}else{
  $out['ok']  = 0;
  $out['err'] = $stmt->errorInfo();
}
echo json_encode($out); 
?>