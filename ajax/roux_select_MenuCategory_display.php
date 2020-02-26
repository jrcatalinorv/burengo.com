<?php 
require_once "../modelos/conexion.php";
	 
 
	
	$stmt1 = Conexion::conectar()->prepare("SELECT * FROM roux_categorias WHERE catstatus = 1");
	$stmt1 -> execute();		
while($results1 = $stmt1 -> fetch()){
	
	$categoryID = $results1['catid'];
	$categorySTR = $results1['catstr'];
	$stmt2 = Conexion::conectar()->prepare("SELECT COUNT(prodid) FROM roux_productos WHERE prodcatid = ".$categoryID." and prodstatus = 1");
	$stmt2 -> execute();		
	$cant = $stmt2-> fetch();
	
	echo '<div class="col-md-4">
            <div class="card card-widget widget-user-2">
              <div class="p-2 bg-info">
				<h4 class="">'.$categorySTR.'
				
				
				</h4>
				
                   <div class="card-tools float-right">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                
                </div>
				
			  </div>
              <div class="card-footer p-0">
                <ul class="nav flex-column">';
			
				$stmt3 = Conexion::conectar()->prepare("SELECT * FROM roux_productos WHERE prodcatid = ".$categoryID." and prodstatus = 1");
				$stmt3 -> execute();		
			 while($results3 = $stmt3 -> fetch()){
				echo '<li class="nav-item">
                    <span class="nav-link">
                      '.$results3['prodstr'].' <span class="float-right"> $'.number_format($results3['prod_precio_venta'],2).'</span>
                    </span>
                  </li>';
				}
            echo '</ul>
              </div>
            </div>
          </div>';
		  }
//}

?>