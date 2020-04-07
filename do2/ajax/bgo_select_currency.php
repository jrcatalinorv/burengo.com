<?php 
require_once "../modelos/conexion.php";

$stmt = Conexion::conectar()->prepare("SELECT * FROM bgo_currency WHERE cur_status = 1");
$stmt -> execute();

	echo '<option value="0"> Tipo de Moneda </option>';

while( $resultado = $stmt -> fetch()){
	echo '<option value="'.$resultado['cur_id'].'"> '.$resultado['cur_str'].' </option>';		
	}	
?>
	 