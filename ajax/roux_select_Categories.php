<?php 
require_once "../modelos/conexion.php";
$stmt = Conexion::conectar()->prepare("SELECT * FROM roux_categorias");
$stmt -> execute();

while( $resultado = $stmt -> fetch()){
	echo '<tr>
            <td>'.$resultado['catid'].'</td>
            <td>'.$resultado['catstr'].'</td>';
         if($resultado['catstatus']==1){ 
			echo '<td><span class="text-success"><strong> Activo </strong> </span></td>'; 
			echo '<td> 
			<div class="btn-group">
               <button type="button" class="btn btn-warning editarCategoria" catId="'.$resultado['catid'].'" catStr="'.$resultado['catstr'].'" > &nbsp; <i class="fas fa-edit text-white"></i> &nbsp; </button> 
			   <button type="button" class="btn btn-success changeStatus" nextCatState="0" catId="'.$resultado['catid'].'" > &nbsp; <i class="fas fa-power-off"></i> &nbsp; </button>
			</div></td>';
			
		 }else{
			 echo '<td><span class="text-warning"><strong> Inactivo </strong> </span> </span></td>';
			echo '<td> 
			<div class="btn-group">
               <button type="button" class="btn btn-warning editarCategoria" catId="'.$resultado['catid'].'" catStr="'.$resultado['catstr'].'" > &nbsp; <i class="fas fa-edit text-white"></i> &nbsp; </button> 
			   <button type="button" class="btn btn-secondary  changeStatus" nextCatState="1" catId="'.$resultado['catid'].'" > &nbsp; <i class="fas fa-power-off"></i>    &nbsp;  </button>
			</div></td>';			 
		 }
		echo '</tr>';		
	}	
?>
	 