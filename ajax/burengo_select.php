<?php 
require_once "../modelos/conexion.php";
require_once "../modelos/functions.php";

$sb = $_REQUEST['typo'];

switch($sb){
	case 1: 
		$stmt = Conexion::conectar()->prepare(" SELECT p.*, pl.* FROM bgo_posts p
		INNER JOIN bgo_places pl ON p.bgo_lugar = pl.pcid AND p.bgo_status = 1 AND bgo_subcat = 1");			
	  break;
	
	case 2: 
		$stmt = Conexion::conectar()->prepare(" SELECT p.*, pl.* FROM bgo_posts p
		INNER JOIN bgo_places pl ON p.bgo_lugar = pl.pcid AND p.bgo_status = 1 AND bgo_subcat = 2");		
	  break;

	default:
			$stmt = Conexion::conectar()->prepare(" SELECT p.*, pl.* FROM bgo_posts p
			INNER JOIN bgo_places pl ON p.bgo_lugar = pl.pcid AND p.bgo_status = 1");	
		break;
 }

$stmt -> execute();
while($results = $stmt -> fetch()){


echo '<div class="col-lg-3 col-md-4 visit itemSelection" itemId="'.$results['bgo_code'].'" itemCat="'.$results['bgo_subcat'].'" data-aos="fade-up">';
      

	  echo '<div class="card p-2"><img src="media/thumbnails/'.$results['bgo_thumbnail'].'" alt="Image placeholder" class="img-fluid"> 
      <div style="z-index:999; margin-top:-2em;">'; 
if($results['bgo_cat']==1){	  
	 echo '<span class="badge bg-success">$'.number_format($results['bgo_price'],2).' '.convert($results['bgo_uom']).' </span></div>';
}else{
	 echo '<span class="badge bg-warning">$'.number_format($results['bgo_price'],2).' '.convert($results['bgo_uom']).' </span></div>';
}	  
	  echo '<h5 class="pt-2"> 
		  <small>'.softTrim($results['bgo_title'],18).'</small>';


		  
		echo '<br/>
		<small class="float-left"> '.$results['pcstr'].'  </small>
		<small>'; 
			if($results['bgo_cat']==1){
				echo '<span class="badge bg-success float-right "> Venta';   
					if($results['bgo_subcat']==1){
						echo ' <i class="fas fa-car"></i> ';
					}else{
						echo ' <i class="fas fa-home"></i> ';
					}
				echo '</span>';
			}else{
				echo ' <span class="badge bg-warning float-right"> Renta';  
					if($results['bgo_subcat']==1){
						echo ' <i class="fas fa-car"></i> ';
					}else{
						echo ' <i class="fas fa-home"></i> ';
					}

				echo '</span>';
			}
					
		echo '</small> </h5>
      <div class="reviews-star float-left">   
      </div>
 </div> </div>';
}	
?>
	 