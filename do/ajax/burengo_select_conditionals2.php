<?php 
require_once "../modelos/conexion.php";
require_once "../modelos/functions.php";

$ct = $_REQUEST['t0'];
$ar = $_REQUEST['t1'];
//$pf = $_REQUEST['t2'];
//$pt = $_REQUEST['t3'];

 
$srings ="";
$lista = json_decode($ar, true);
if($lista[0][1]=='0'){ }else{ $srings = "AND p.bgo_".$lista[0][0]."= '".$lista[0][1]."'"; }
if($lista[1][1]=='0'){ }else{ $srings = $srings." AND p.bgo_".$lista[1][0]."= '".$lista[1][1]."'"; }
if($lista[2][1]=='0'){ }else{ $srings = $srings." AND p.bgo_".$lista[2][0]."= '".$lista[2][1]."'"; }
if($lista[3][1]=='0'){ }else{ $srings = $srings." AND p.bgo_".$lista[3][0]."= '".$lista[3][1]."'"; }
if($lista[4][1]=='0'){ }else{ $srings = $srings." AND p.bgo_".$lista[4][0]."= '".$lista[4][1]."'"; }
if($lista[5][1]=='0'){ }else{ $srings = $srings." AND p.bgo_".$lista[5][0]."= '".$lista[5][1]."'"; }
 

 /*
$stmt = Conexion::conectar()->prepare(" SELECT * FROM bgo_posts p INNER JOIN bgo_places pl ON p.bgo_lugar = pl.pcid 
		AND p.bgo_status = 1 AND p.bgo_subcat = 2 AND p.bgo_cat= ".$ct." 
		AND p.bgo_price BETWEEN ".$pf." AND ".$pt." ".$srings);			
 */
$stmt = Conexion::conectar()->prepare(" SELECT * FROM bgo_posts p INNER JOIN bgo_places pl ON p.bgo_lugar = pl.pcid 
		AND p.bgo_status = 1 AND p.bgo_subcat = 2 AND p.bgo_cat= ".$ct." ".$srings);			
  
 
$stmt -> execute();

while($results = $stmt -> fetch()){


echo '<div class="col-lg-3 visit itemSelection" itemId="'.$results['bgo_code'].'" itemCat="'.$results['bgo_subcat'].'" data-aos="fade-up">';
echo '<div style="width: 18vW; height:15vh;" class="p-2"><img style="width: 25vW; height:22vh;" src="../media/thumbnails/'.$results['bgo_thumbnail'].'" alt="Image placeholder" class="img-fluid burengo-img-grid"> 
      <div style="z-index:999; margin-top:-2em;">'; 
if($results['bgo_cat']==1){	  
	 echo '<span class="badge bg-success style="font-size:0.8vW;"">$'.number_format($results['bgo_price'],2).' '.convert($results['bgo_uom']).' </span></div>';
}else{
	 echo '<span class="badge bg-warning style="font-size:0.8vW;"">$'.number_format($results['bgo_price'],2).' '.convert($results['bgo_uom']).' </span></div>';
}	  
	  echo '<h5 class="pt-2" style="font-size:1vW;"> 
		   '.softTrim($results['bgo_title'],25).' ';  
		echo '<br/>
		<small class="float-left"> <i class="fas fa-map-marker-alt text-danger"></i> '.$results['pcstr'].'  </small>
		<small>'; 
			/* if($results['bgo_cat']==1){
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
			}*/
					
		echo '</small> </h5>
      <div class="reviews-star float-left">   
      </div>
 </div> </div>';
} 
 	 
?>
	 