<?php 
require_once "../modelos/conexion.php";
	 
	$stmt = Conexion::conectar()->prepare("SELECT * FROM roux_categorias WHERE catstatus = 1");
	$stmt -> execute();		
while($results = $stmt -> fetch()){


 
echo '<div class="col-md-3"> 
		<div class="info-box mb-3"> 
		 <button style="width:225px; height:100px; " class="btn btn-info selectMenuItem" catID ="'.$results['catid'].'"  catStr="'.$results['catstr'].'"> '.$results['catstr'].'  </button> 
		 </div> 
		</div>'; 
 
}

?>