<?php 
require_once "../modelos/conexion.php";

$id= $_REQUEST["id"];
	 
	$stmt = Conexion::conectar()->prepare("SELECT * FROM roux_productos WHERE prodcatid = ".$id." and prodstatus = 1");
	$stmt -> execute();		
while($results = $stmt -> fetch()){

echo '<div class="col-md-4"> 
		<div class="info-box mb-3"> 
		 <button style="width:250px; height:75px; " class="btn btn-danger agregarItem" itemId="'.$results['prodid'].'" itemCode="'.$results['prodcode'].'" itemStr="'.$results['prodstr'].'" itemPrice="'.$results['prod_precio_venta'].'"
		 > '.$results['prodstr'].' <br/> $'.number_format($results['prod_precio_venta'],2).'  </button> 
		 </div> 
		</div>';
}

?>