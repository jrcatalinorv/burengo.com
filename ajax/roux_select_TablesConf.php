<?php 
require_once "../modelos/conexion.php";
	 
$stmt = Conexion::conectar()->prepare("SELECT * FROM roux_tables");
$stmt -> execute();			
while($results = $stmt -> fetch()){
echo '<tr>
	<td>'.$results['tableLabel'].'</td>';
        if($results['tableStatus']==1){ 
			echo '<td><span class="text-success"><strong> Activo </strong> </span></td>'; 
			echo '<td> 
			<div class="btn-group">
               <button type="button" class="btn btn-warning editarCategoria" catId="'.$results['tableId'].'" catStr="'.$results['tableLabel'].'" > &nbsp; <i class="fas fa-edit text-white"></i> &nbsp; </button> 
			   <button type="button" class="btn btn-success changeStatus" nextCatState="0" catId="'.$results['tableId'].'" > &nbsp; <i class="fas fa-power-off"></i> &nbsp; </button>
			</div></td>';
		 }else{
			 echo '<td><span class="text-warning"><strong> Inactivo </strong> </span> </span></td>';
			echo '<td> 
			<div class="btn-group">
               <button type="button" class="btn btn-warning editarCategoria" catId="'.$results['tableId'].'" catStr="'.$results['tableLabel'].'" > &nbsp; <i class="fas fa-edit text-white"></i> &nbsp; </button> 
			   <button type="button" class="btn btn-secondary  changeStatus" nextCatState="1" catId="'.$results['tableId'].'" > &nbsp; <i class="fas fa-power-off"></i>    &nbsp;  </button>
			</div></td>';			 
		 }
		echo '</tr>';
}
?>