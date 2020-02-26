<?php 
session_start();
require_once "../modelos/conexion.php";
$id = $_REQUEST["id"];

$stmt = Conexion::conectar()->prepare("SELECT p.*, c.* FROM roux_productos p 
INNER JOIN roux_categorias c ON p.prodcatid = c.catid AND p.prodid=".$id."");
$stmt -> execute();
if($resultado = $stmt -> fetch()){


	$out['pcode'] = $resultado['prodcode'];
	$out['pname'] = $resultado['prodstr'];
	$out['pdesc'] = $resultado['proddesc'];
	$out['pecatid'] = $resultado['prodcatid'];
	$out['pecatstr'] = $resultado['catstr'];
	$out['pprice'] = $resultado['prod_precio_venta'];
 if($resultado['prodstatus']==1){
	$out['pstatus'] = "text-success";
	$out['pstatusstr'] = "Activo";
	$out['btnClass'] = "btn-info";
	$out['btnAtrr'] = "0";
 }else{
	$out['pstatus'] = "text-secondary";
	$out['pstatusstr'] = "Inactivo";
	$out['btnClass'] = "btn-secondary";
	$out['btnAtrr'] = "1";	
 }
	$out['ok'] = 1;
	$out['status'] = 1; 
}else{
	$out['ok'] = 0;
}
echo json_encode($out); 
?>