<?php 
require_once "../modelos/conexion.php";
$stmt = Conexion::conectar()->prepare("SELECT * FROM roux_order_transaction WHERE status = 4 ORDER BY txid");
$stmt -> execute();

 

while( $resultado = $stmt -> fetch()){
	
$stmt2 = Conexion::conectar()->prepare("SELECT * FROM roux_tables WHERE tableId = ".$resultado['tableid']);
$stmt2 -> execute();	
$result = $stmt2 -> fetch();


$stmt3 = Conexion::conectar()->prepare("SELECT * FROM roux_invoice_fiscal WHERE invorder = ".$resultado['txid']);
$stmt3 -> execute();	
$result3 = $stmt3 -> fetch();


	
	echo '<tr>
            <td>'.sprintf("%'011d",$result3['invcode']).'  </td>
            <td>'.$resultado['note2'].'</td>
            <td>'.$result3['invncf'].'</td>
            <td>'.$result['tableLabel'].'</td>
            <td> $'.number_format($resultado['total_venta'],2).'</td>
            <td> $'.number_format($resultado['itbis'],2).'</td>
        
          <td>'.date("d-m-Y", strtotime($resultado['fecha'])).'</td> 
          <td>'.date("h:i A", strtotime($resultado['fecha'])).'</td>
		  <td>'.$resultado['txid'].'</td>
		  ';
			echo '<td> 
			<div class="btn-group">
   
			   <button type="button" class="btn btn-success editOrder" tx="'.$resultado['txid'].'" > &nbsp; <i class="fas fa-shopping-cart"></i> &nbsp; </button> 
               <button type="button" class="btn btn-info viewtickett" tx="'.$resultado['txid'].'" > &nbsp; <i class="fas fa-file-alt"></i> &nbsp;   </button> 
               <button type="button" class="btn btn-warning editInvoice" tx="'.$resultado['txid'].'" > &nbsp; <i class="fas fa-edit"></i> &nbsp;   </button> 
 
			
			</div>
			</td>
          </tr>';		
	}
	
?>
	 