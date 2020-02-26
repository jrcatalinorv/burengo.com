<?php 
require_once "../modelos/conexion.php";

$stmt = Conexion::conectar()->prepare("SELECT * FROM roux_clientes WHERE custstatus = 1");
$stmt -> execute();
 while( $resultado = $stmt -> fetch()){
	
if($resultado['custid']==1){
	
	echo '<tr>
            <td>'.$resultado['custid'].'</td>
               <td>'.$resultado['custname'].'</td>
               <td>'.$resultado['custrnc'].'</td>
               <td>'.$resultado['custphone'].'</td>
               <td> - </td> 
               <td> - </td>  
               <td><span class="badge bg-success"> Activo </span></td>
               <td> &nbsp; </td>
			  </tr>';
              
	
}else{	
	echo '<tr>
            <td>'.$resultado['custid'].'</td>
               <td>'.$resultado['custname'].'</td>
               <td>'.$resultado['custrnc'].'</td>
               <td>'.$resultado['custphone'].'</td>
               <td>'.$resultado['custaddr'].'</td> 
               <td>'.$resultado['custemail'].'</td>';
              
			 
			 if($resultado['custstatus']==1){ 
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
			}
				?>
	 