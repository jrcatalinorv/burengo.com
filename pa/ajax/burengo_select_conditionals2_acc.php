<?php 
require_once "../modelos/conexion.php";
require_once "../modelos/functions.php";
require_once "../modelos/data.php";

$ct = $_REQUEST['t0'];
$ar = $_REQUEST['t1'];
 
$srings ="";
$lista = json_decode($ar, true);
if($lista[0][1]=='0'){ }else{ $srings = "AND p.bgo_".$lista[0][0]."= '".$lista[0][1]."'"; }
if($lista[1][1]=='0'){ }else{ $srings = $srings." AND p.bgo_".$lista[1][0]."= '".$lista[1][1]."'"; }
if($lista[2][1]=='0'){ }else{ $srings = $srings." AND p.bgo_".$lista[2][0]."= '".$lista[2][1]."'"; }
if($lista[3][1]=='0'){ }else{ $srings = $srings." AND p.bgo_".$lista[3][0]."= '".$lista[3][1]."'"; }
if($lista[4][1]=='0'){ }else{ $srings = $srings." AND p.bgo_".$lista[4][0]."= '".$lista[4][1]."'"; }
if($lista[5][1]=='0'){ }else{ $srings = $srings." AND p.bgo_".$lista[5][0]."= '".$lista[5][1]."'"; }
 
$stmt = Conexion::conectar()->prepare(" SELECT * FROM bgo_posts p INNER JOIN bgo_places pl ON p.bgo_lugar = pl.pcid 
		AND p.bgo_status = 1 AND p.bgo_subcat = 2 AND p.bgo_cat= ".$ct." ".$srings." 
		AND p.bgo_country_code = '".COUNTRY_CODE."' ORDER BY p.bgo_stdesc DESC");				
  
 
$stmt -> execute();

while($results = $stmt -> fetch()){
$dest="";
$iconDesc="";
if( $results['bgo_stdesc'] == 9 ){ $dest = 'style="border: solid 4px #ffc926"'; $iconDesc=' <span class="text-warning"> <i class="fas fa-star"></i> </span>';  }


echo '<div class="col-lg-3 visit itemSelection" itemId="'.$results['bgo_code'].'" itemCat="'.$results['bgo_subcat'].'" data-aos="fade-up">';
echo '<div class="p-2"><img '.$dest.' src="../../media/thumbnails/'.$results['bgo_thumbnail'].'" alt="Image placeholder" class="img-fluid burengo-img-grid"> 
      <div style="z-index:999; margin-top:-2em;">'; 
if($results['bgo_cat']==1){	  
	 echo '<span class="badge bg-success bgo_mfont">$'.number_format($results['bgo_price'],2).' '.convert($results['bgo_uom']).' </span>    '.$iconDesc.'  </div>';
}else{
	 echo '<span class="badge bg-warning bgo_mfont">$'.number_format($results['bgo_price'],2).' '.convert($results['bgo_uom']).' </span>    '.$iconDesc.'  </div>';
}	  
	  echo '<h5 class="pt-2 bgo_font"> 
		   '.softTrim($results['bgo_title'],25).' ';  
		echo '<br/>
		<small class="float-left"> <i class="fas fa-map-marker-alt text-danger"></i> '.$results['pcstr'].'  </small>
		<small>'; 
					
		echo '</small> </h5>
      <div class="reviews-star float-left">   
      </div>
 </div> </div>';
} 
 	 
?>
	 