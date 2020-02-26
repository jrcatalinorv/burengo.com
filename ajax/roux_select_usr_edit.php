<?php 
require_once "../modelos/conexion.php";

$stmt = Conexion::conectar()->prepare("SELECT * FROM usuarios WHERE estado = 1");
$stmt -> execute();
 while( $resultado = $stmt -> fetch()){
	
 	
	echo '<tr>
            <td>'.$resultado['id'].'</td>
               <td>'.$resultado['nombre'].'</td>
               <td>'.$resultado['usuario'].'</td>
               <td>'.$resultado['perfil'].'</td>';
              
			 
			 if($resultado['estado']==1){ 
				 echo '<td><span class="badge bg-success"> Activo </span></td>
				 <td>
					<div class="btn-group">
                        <button type="button" class="btn btn-secondary editarProdaa" pid="'.$resultado['id'].'" > &nbsp;  <i class="fas fa-edit text-white"></i> &nbsp;   </button>
                        <button type="button" class="btn btn-secondary changeStatusprodaa" nextCatState="0" prodId="'.$resultado['id'].'" > &nbsp; <i class="fas fa-power-off"></i> &nbsp; </button>
					</div>
                       </td>
				 ';
			  }else{
				  echo '<td><span class="badge bg-warning"> Inactivo </span></td>
				  <td>
					<div class="btn-group">
                        <button type="button" class="btn btn-secondary editarProdaa" pid="'.$resultado['id'].'" > &nbsp;  <i class="fas fa-edit text-white"></i> &nbsp;   </button>
                        <button type="button" class="btn btn-secondary changeStatusprodaa" nextCatState="1" prodId="'.$resultado['id'].'" > &nbsp; <i class="fas fa-power-off"></i> &nbsp; </button>
					</div>
                       </td>
				  ';
			  }
			   echo '</tr>';	
				   }
			 
				?>
	 