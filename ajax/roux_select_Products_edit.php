<?php 
require_once "../modelos/conexion.php";

$stmt = Conexion::conectar()->prepare("SELECT p.*, c.* FROM roux_productos p INNER JOIN roux_categorias c ON p.prodcatid = c.catid");
$stmt -> execute();
 while( $resultado = $stmt -> fetch()){
	echo '<tr>
            <td>'.$resultado['prodcode'].'</td>
               <td>'.$resultado['prodstr'].'</td>
               <td style="width:300px;">'.$resultado['proddesc'].'</td>
               <td>'.$resultado['catstr'].'</td>
               <td>'.number_format($resultado['prod_precio_venta'],2).'</td>';
              if($resultado['prodstatus']==1){ 
				 echo '<td><span class="badge bg-success"> Activo </span></td>
				 <td>
					<div class="btn-group">
                        <button type="button" class="btn btn-warning editarProd" pid="'.$resultado['prodid'].'" > &nbsp;  <i class="fas fa-edit text-white"></i> &nbsp;   </button>
                        <button type="button" class="btn btn-success changeStatusprod" nextCatState="0" prodId="'.$resultado['prodid'].'" > &nbsp; <i class="fas fa-power-off"></i> &nbsp; </button>
					</div>
                       </td>
				 ';
			  }else{
				  echo '<td><span class="badge bg-warning"> Inactivo </span></td>
				  <td>
					<div class="btn-group">
                        <button type="button" class="btn btn-warning editarProd" pid="'.$resultado['prodid'].'" > &nbsp;  <i class="fas fa-edit text-white"></i> &nbsp;   </button>
                        <button type="button" class="btn btn-secondary changeStatusprod" nextCatState="1" prodId="'.$resultado['prodid'].'" > &nbsp; <i class="fas fa-power-off"></i> &nbsp; </button>
					</div>
                       </td>
				  ';
			  }
			   echo '</tr>';	
				   }
				?>
	 