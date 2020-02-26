<?php 
require_once "../modelos/conexion.php";

$stmt = Conexion::conectar()->prepare("SELECT p.*, c.* FROM roux_productos p INNER JOIN roux_categorias c ON p.prodcatid = c.catid AND p.prodstatus = 1");
$stmt -> execute();
 while( $resultado = $stmt -> fetch()){
	echo '<tr>
            <td>'.$resultado['prodcode'].'</td>
               <td>'.$resultado['prodstr'].'</td>
               <td>'.$resultado['proddesc'].'</td>
               <td>'.$resultado['catstr'].'</td>
               <td>'.number_format($resultado['prod_precio_venta'],2).'</td>';
              if($resultado['prodstatus']==1){ 
				 echo '<td><span class="badge bg-success"> Activo </span></td>';
			  }else{
				  echo '<td><span class="badge bg-warning"> Inactivo </span></td>';
			  }
			   echo '<td>  
                        <button type="button" class="btn btn-warning btn-sm"><i class="fas fa-edit text-white"></i> Editar </button>
       
                       </td>
                    </tr>';	
				   }
				?>
	 