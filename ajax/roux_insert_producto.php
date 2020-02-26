<?php 
require_once "../modelos/conexion.php";

$prodcatid = $_REQUEST["categoriaid"];
$prodstr = $_REQUEST["producto"];
$proddesc = $_REQUEST["desc"];
$prodimg = 'vistas/img/productos/default/anonymous.png';
$prod_precio_compra = 1;
$prod_precio_venta = $_REQUEST["precio"]; 
$prodstatus = 1; 
/* ----------------------------------------------- */
$stmt2 = Conexion::conectar()->prepare("SELECT prodid FROM roux_productos ORDER BY prodid DESC LIMIT 1");
$stmt2 -> execute();
$results2 = $stmt2-> fetch();
$prodid =  ($results2['prodid']+1);
$prodcode = sprintf("%'04d", $prodid);
/* ----------------------------------------------- */
/* Insertar datos en la tabla factura */ 
$stmt = Conexion::conectar()->prepare("INSERT INTO roux_productos(prodcatid,prodcode,prodstr,proddesc,prodimg,prod_precio_compra,prod_precio_venta,prodstatus) VALUES (:prodcatid,:prodcode,:prodstr,:proddesc,:prodimg,:prod_precio_compra,:prod_precio_venta,:prodstatus)");
$stmt->bindParam(":prodcatid",$prodcatid, PDO::PARAM_INT);
$stmt->bindParam(":prodcode",$prodcode, PDO::PARAM_STR);
$stmt->bindParam(":prodstr",$prodstr, PDO::PARAM_STR);
$stmt->bindParam(":proddesc",$proddesc, PDO::PARAM_STR);
$stmt->bindParam(":prodimg",$prodimg, PDO::PARAM_STR);
$stmt->bindParam(":prod_precio_compra",$prod_precio_compra, PDO::PARAM_STR);
$stmt->bindParam(":prod_precio_venta",$prod_precio_venta, PDO::PARAM_STR);
$stmt->bindParam(":prodstatus",$prodstatus, PDO::PARAM_INT);
 
if($stmt->execute()){
   $out['ok'] = 1;
}else{
  $out['ok']  = 0;
  $out['err'] = $stmt->errorInfo();
}
echo json_encode($out); 
?>