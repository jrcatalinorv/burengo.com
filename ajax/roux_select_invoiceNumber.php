<?php 
session_start();
require_once "../modelos/conexion.php";
$id = $_REQUEST["id"];
$st = $_REQUEST["st"];


if($st==2){
	$stmt = Conexion::conectar()->prepare("SELECT * FROM roux_invoice WHERE invorder='".$id."'");
	$stmt -> execute();
	if($resultado = $stmt -> fetch()){
		$out['ok'] = 1;
		$out['invoiceN'] = sprintf("%'09d",$resultado['invcode']);
	}else{
		$out['ok'] = 0;
	}
}else{
	$stmt = Conexion::conectar()->prepare("SELECT * FROM roux_invoice_fiscal WHERE invorder='".$id."'");
	$stmt -> execute();
	if($resultado = $stmt -> fetch()){
		$out['ok'] = 1;
		$out['invoiceN'] = sprintf("%'011d",$resultado['invcode']);
	}else{
		$out['ok'] = 0;
	}
}

echo json_encode($out); 
?>