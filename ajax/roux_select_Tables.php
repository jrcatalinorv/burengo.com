<?php 
require_once "../modelos/conexion.php";
	 
$stmt = Conexion::conectar()->prepare("SELECT * FROM roux_tables WHERE tableStatus = 1");
$stmt -> execute();	


echo '<div class="col-sm-3 quitarMesa">
           <div class="info-box mb-3">
              
              <div class="info-box-content bg-danger">
                <span class="info-box-text">  - </span>
                <span class="info-box-number"> Delivery </span>
              </div>
              <!-- /.info-box-content -->
            </div>   
            </div>
';



		
while($results = $stmt -> fetch()){


if(intval($results['tableAvail'])==0){ 
	$text = "Ocupada";
	$color = "bg-danger";
    $class = "";
}else{
	$text = "Disponible"; 
	$color = "bg-success";
    $class = "agregarMesa"; 	
}

echo '<div class="col-sm-3 '. $class.'" mesaID="'.$results['tableId'].'" mesaSTR="'.$results['tableLabel'].'">
           <div class="info-box mb-3">
              

              <div class="info-box-content bg-info">
                <span class="info-box-text"> '.$text.' </span>
                <span class="info-box-number">'.$results['tableLabel'].' </span>
              </div>
              <!-- /.info-box-content -->
            </div>   
            </div>
';


}

?>