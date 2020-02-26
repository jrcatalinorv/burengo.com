<?php 
require_once "../modelos/conexion.php";

$txid = $_REQUEST["orderid"];
$custid = $_REQUEST["custid"];
$tableid = $_REQUEST["tableid"];
$userid = $_REQUEST["userid"];
$items = $_REQUEST["items"];
$precio_neto = $_REQUEST["subtotal"];
$propina = $_REQUEST["tip"];
$itbis = $_REQUEST["itbis"];
$total_venta = $_REQUEST["total"];
$note = $_REQUEST["nota"];
$note2 = $_REQUEST["nota2"];


$stmt = Conexion::conectar()->prepare("UPDATE roux_order_transaction SET 
custid =".$custid.", tableid =".$tableid.", userid='".$userid."', items='".$items."', precio_neto=".$precio_neto.", propina =".$propina.",  
itbis =".$itbis.", total_venta =".$total_venta.", note ='".$note."', note2 ='".$note2."' WHERE txid = '".$txid."'");

if($stmt->execute()){
   $out['ok'] = 1;
   $out['txid'] = $txid;
}else{
  $out['ok']  = 0;
  $out['err'] = $stmt->errorInfo();
}

echo json_encode($out); 
?>