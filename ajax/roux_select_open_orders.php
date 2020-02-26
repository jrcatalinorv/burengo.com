<?php 
require_once "../modelos/conexion.php";
$stmt = Conexion::conectar()->prepare("SELECT * FROM roux_order_transaction WHERE status = 1 ORDER BY txid DESC");
$stmt -> execute();

echo '<table class="table table-sm table-striped">';

while( $resultado = $stmt -> fetch()){
	
$stmt2 = Conexion::conectar()->prepare("SELECT * FROM roux_tables WHERE tableId = ".$resultado['tableid']);
$stmt2 -> execute();	
$result = $stmt2 -> fetch();

if($resultado['tableid']==0){
 $tsrt = "";		
}else{
 $tsrt = " - ".$result['tableLabel'];	
}	
	
	echo '<tr>
            <td>'.$resultado['txid'].'</td>
            <td>'.$resultado['note2'].'</td>
            <td>'.$result['tableLabel'].'</td>
            <td> $'.number_format($resultado['total_venta'],2).'</td>
            <td> '.$resultado['note'].'</td>
          <td>'.date("d-m-Y", strtotime($resultado['fecha'])).'</td> 
          <td>'.date("h:i A", strtotime($resultado['fecha'])).'</td>';
			echo '<td> 
			<div class="btn-group">
               <button type="button" class="btn btn-info chooseOrder" tx="'.$resultado['txid'].'" ><i class="fas fa-file-alt"></i> Ver Orden </button> 
     		</div>
			</td>
          </tr>';		
	}
echo '</table>';	
?>
	 