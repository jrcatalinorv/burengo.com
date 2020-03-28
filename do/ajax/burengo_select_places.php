<?php 
require_once "../modelos/conexion.php";

$stmt = Conexion::conectar()->prepare("SELECT * FROM bgo_places WHERE pcstatus = 1");
$stmt -> execute();



	echo ' <option value="0"> Provincia </option>';

while( $resultado = $stmt -> fetch()){
	echo '<option value="'.$resultado['pcid'].'"> '.$resultado['pcstr'].' </option>';		
	}	
?>
	 