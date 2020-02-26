<?php 
require_once "../modelos/conexion.php";
	 
$stmt = Conexion::conectar()->prepare("SELECT * FROM dcdvoqzc_roux.roux_clientes WHERE custstatus = 1");
$stmt -> execute();	


/*
echo '<div class="col-md-3 clienteCardAgregar">
<div class="card card-success card-outline">
              <div class="card-body p-2" style="height:100px;> 
                <h5 class="card-title">  &nbsp;&nbsp;&nbsp; Agregar Cliente  </h5> 
                <p class="card-text"> 
				 <center>
				 <i class="fas fa-plus fa-2x text-green"></i>  
                </center>
				</p>
              </div>
            </div>
</div>'; */
		
while($results = $stmt -> fetch()){



echo '<div  class="col-md-3 clienteCard" clienteID="'.$results['custid'].'" clienteStr="'.$results['custname'].'">
<div class="card card-primary card-outline">
              <div class="card-body p-2" style="height:100px; ">
                <h5 class="card-title"><i class="far fa-address-card"></i> '.$results['custname'].' </h5>
                <p class="card-text"> 
				 <i class="fas fa-phone-square-alt"></i> '.$results['custphone'].'
				 <br/> <i class="far fa-file-code"></i> '.$results['custrnc'].'  
            
               
				</p>
              </div>
            </div>
</div>';


 


}

?>