<?php 
require_once "../../modelos/conexion.php";

$cd = $_REQUEST["cd"];

$stmt = Conexion::conectar()->prepare("SELECT p.*, c.* FROM bgo_places p
INNER JOIN bgo_country c ON p.pcountry = c.cyid AND p.pcountry = '".$cd."'");
$stmt -> execute();

while( $resultado = $stmt -> fetch()){
	echo '<tr>
            <td>'.$resultado['pcstr'].'</td>
			<td>'.$resultado['cystr'].'</td>';
         if($resultado['pcstatus']==1){ 
			echo '<td><span class="text-success"><strong> Activo </strong> </span></td>'; 
		 echo '<td>  <button type="button" class="btn btn-block btn-warning btn-sm changeStatus" nxid="'.$resultado['pcid'].'" nxt="0"> Inactivar </button>  </td>';
			
		 }else{
			 echo '<td><span class="text-warning"><strong> Inactivo </strong> </span> </span></td>';
			echo '<td> <button type="button" class="btn btn-block btn-success btn-sm changeStatus"  nxid="'.$resultado['pcid'].'" nxt="1"> Activar </button> </td>';			 
		 }
		echo '</tr>';		
	}	
?>
	 