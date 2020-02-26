<?php 
session_start();
require_once "../modelos/conexion.php";

$newtable = $_REQUEST["newtable"];
$oldtable = $_REQUEST["oldtable"];
$newtablestr = $_REQUEST["newtablestr"];
$ordercode = $_REQUEST["code"];

//reservar la mesa Nueva  
$stmt2 = Conexion::conectar()->prepare("UPDATE roux_tables SET tableAvail = 0, tableCurrentOrder ='".$ordercode."' WHERE tableId = ".$newtable."");   
 if($stmt2->execute()){		
	
	$out['mesaID']  = $newtable;
	$out['mesaSTR'] = $newtablestr;

if($oldtable==0){	
		$out['ok'] = 1; 
	}else{
	/*-------------------------------*/
	/* Liberar la mesa anterior */
	$stmt3 = Conexion::conectar()->prepare("UPDATE roux_tables SET tableAvail = 1, tableCurrentOrder ='-'  WHERE tableId = ".$oldtable.""); 
		 if($stmt3->execute()){
			$out['ok'] = 1; 
		 }else{
			 $out['ok'] = 2;
		 }
    /*-------------------------------*/
	}
}else{
  $out['ok'] = 0;
  //print_r($stmt2->errorInfo());
}		
echo json_encode($out); 
?>