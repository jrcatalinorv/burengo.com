<?php 
require_once "../modelos/conexion.php";
require_once "../modelos/functions.php";

$sb = intval($_REQUEST['value']);
$no_of_records_per_page = 16;


switch($sb){
	case 1: 

		$stmt = Conexion::conectar()->prepare(" SELECT COUNT(p.bgo_code) as totalR FROM bgo_posts p INNER JOIN bgo_places pl ON p.bgo_lugar = pl.pcid AND p.bgo_status = 1 AND bgo_subcat = 1");			
	  break;
	
	case 2: 
		$stmt = Conexion::conectar()->prepare(" SELECT COUNT(p.bgo_code) as totalR FROM bgo_posts p INNER JOIN bgo_places pl ON p.bgo_lugar = pl.pcid AND p.bgo_status = 1 AND bgo_subcat = 2");		
	  break;

	default:
			$stmt = Conexion::conectar()->prepare(" SELECT COUNT(p.bgo_code) as totalR FROM bgo_posts p INNER JOIN bgo_places pl ON p.bgo_lugar = pl.pcid AND p.bgo_status = 1");	
		break;
 }

$stmt -> execute();
$total_rows = $stmt -> fetch();
$out['top'] = ceil($total_rows["totalR"] / $no_of_records_per_page);
$out['ok'] = 1;
echo json_encode($out);
 
?>
 