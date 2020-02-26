<?php 
require_once "../modelos/conexion.php";


$invorder = $_REQUEST["order"];
$invpm = $_REQUEST["pm"];
$invtipo = intval($_REQUEST["ncfType"]);
$invuserid = $_REQUEST["user"];
$invncf = $_REQUEST["ncfSTR"];
$sequ = $_REQUEST["ncfsq"];
$invstatus = 1;
$table = 'roux_invoice_fiscal';

 
$stmt = Conexion::conectar()->prepare("INSERT INTO ".$table."(invorder,invpm,invtipo,invncf,invuserid,invstatus) VALUES (:invorder,:invpm,:invtipo,:invncf,:invuserid,:invstatus)");
$stmt->bindParam(":invorder",$invorder, PDO::PARAM_STR);
$stmt->bindParam(":invpm",$invpm, PDO::PARAM_STR);
$stmt->bindParam(":invtipo",$invtipo, PDO::PARAM_INT);
$stmt->bindParam(":invncf",$invncf, PDO::PARAM_STR);
$stmt->bindParam(":invuserid",$invuserid, PDO::PARAM_STR);
$stmt->bindParam(":invstatus",$invstatus, PDO::PARAM_INT);
 
if($stmt->execute()){
	  	  
	  $stmt2 = Conexion::conectar()->prepare("UPDATE roux_order_transaction SET status = 4 WHERE txid = '".$invorder."'");
	  if($stmt2->execute()){
		  
		  
		   $stmt3 = Conexion::conectar()->prepare("UPDATE roux_nfc_controlador SET ncfsecuencia  = ".$sequ.", ncfseqdate = '".date('Y-m-d H:i:s')."' WHERE ncfid = ".$invtipo."");
		   $stmt3->execute();
		  
		   $out['ok'] = 1;
		   $out['txid'] = $invorder;
		}else{
		  $out['ok']  = 0;
		  $out['err'] = $stmt2->errorInfo();
		}
}else{
  $out['ok']  = 0;
  $out['err'] = $stmt->errorInfo();
} 
echo json_encode($out); 