<?php 
session_start();
require_once "../modelos/conexion.php";

$type  = $_REQUEST["tp"];

$stmt2 = Conexion::conectar()->prepare("SELECT ncfprefix, ncftope, ncfsecuencia FROM  roux_nfc_controlador WHERE ncfid = ".$type."");
$stmt2 -> execute();
if($results = $stmt2 -> fetch()){										
		if(intval($results['ncftope']) < intval($results['ncfsecuencia'])){
			$out['ok'] = 2;
		}else{
			$out['ok'] = 1;
			$next = $results['ncfsecuencia']+1;
			$out['seq'] = $next;
			$out['ncf'] = $results['ncfprefix'].''.sprintf("%'08d",$next); 
		}

}else{
	$out['ok'] = 0;
}
echo json_encode($out); 
?>