<?php 
require_once "../modelos/conexion.php";
$stmt = Conexion::conectar()->prepare("SELECT * FROM roux_categorias WHERE catstatus = 1");
$stmt -> execute();

	echo '<option> Categoria </option>';

while( $resultado = $stmt -> fetch()){
	echo '<option value="'.$resultado['catid'].'"> '.$resultado['catstr'].' </option>';		
	}	
?>
	 