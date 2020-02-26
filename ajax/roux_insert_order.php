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
$status = 1;
 
$stmt = Conexion::conectar()->prepare("INSERT INTO roux_order_transaction(txid,custid,tableid,userid,items,precio_neto,propina,itbis,total_venta,note,note2,status) VALUES (:txid,:custid,:tableid,:userid,:items,:precio_neto,:propina,:itbis,:total_venta,:note,:note2,:status)");
$stmt->bindParam(":txid",$txid, PDO::PARAM_STR);
$stmt->bindParam(":custid",$custid, PDO::PARAM_INT);
$stmt->bindParam(":tableid",$tableid, PDO::PARAM_INT);
$stmt->bindParam(":userid",$userid, PDO::PARAM_STR);
$stmt->bindParam(":items",$items, PDO::PARAM_STR);
$stmt->bindParam(":precio_neto",$precio_neto, PDO::PARAM_STR);
$stmt->bindParam(":propina",$propina, PDO::PARAM_STR);
$stmt->bindParam(":itbis",$itbis, PDO::PARAM_STR);
$stmt->bindParam(":total_venta",$total_venta, PDO::PARAM_STR);
$stmt->bindParam(":note",$note, PDO::PARAM_STR);
$stmt->bindParam(":note2",$note2, PDO::PARAM_STR);
$stmt->bindParam(":status",$status, PDO::PARAM_INT);
 
if($stmt->execute()){
   $out['ok'] = 1;
   $out['txid'] = $txid;
}else{
  $out['ok']  = 0;

}

echo json_encode($out); 
?>