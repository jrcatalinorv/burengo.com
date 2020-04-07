<?php 
require_once "../modelos/conexion.php";
require_once "../modelos/functions.php";
require_once "../modelos/data.php";

$sb = $_REQUEST['typo'];
$pageno = $_REQUEST['pageno'];

$no_of_records_per_page = 16;
$offset = ($pageno-1) * $no_of_records_per_page;


switch($sb){
	case 1: 

		$stmt = Conexion::conectar()->prepare(" SELECT COUNT(p.bgo_code) as totalR FROM bgo_posts p INNER JOIN bgo_places pl ON p.bgo_lugar = pl.pcid AND p.bgo_status = 1 AND bgo_subcat = 1");			
		$stmt2 = Conexion::conectar()->prepare(" SELECT p.*, pl.*, cu.* FROM bgo_posts p 
		INNER JOIN bgo_places pl ON p.bgo_lugar = pl.pcid 
		INNER JOIN bgo_currency cu ON p.bgo_currency = cu.cur_id		
		AND p.bgo_status = 1 AND bgo_subcat = 1 
		AND p.bgo_country_code = '".COUNTRY_CODE."'
		ORDER BY p.bgo_stdesc DESC LIMIT ".$offset.", ".$no_of_records_per_page."");			
	  break;
	
	case 2: 
		$stmt = Conexion::conectar()->prepare(" SELECT COUNT(p.bgo_code) as totalR FROM bgo_posts p INNER JOIN bgo_places pl ON p.bgo_lugar = pl.pcid AND p.bgo_status = 1 AND bgo_subcat = 2");		
		$stmt2 = Conexion::conectar()->prepare(" SELECT p.*, pl.*, cu.* FROM bgo_posts p 
		INNER JOIN bgo_places pl ON p.bgo_lugar = pl.pcid 
		INNER JOIN bgo_currency cu ON p.bgo_currency = cu.cur_id		
		AND p.bgo_status = 1 AND bgo_subcat = 2 
		AND p.bgo_country_code = '".COUNTRY_CODE."'
		ORDER BY p.bgo_stdesc DESC LIMIT ".$offset.", ".$no_of_records_per_page."");		
	  break;

	default:
		$stmt = Conexion::conectar()->prepare(" SELECT COUNT(p.bgo_code) as totalR FROM bgo_posts p INNER JOIN bgo_places pl ON p.bgo_lugar = pl.pcid AND p.bgo_status = 1");	
		$stmt2 = Conexion::conectar()->prepare(" SELECT p.*, pl.*, cu.* FROM bgo_posts p 
		INNER JOIN bgo_places pl ON p.bgo_lugar = pl.pcid 
		INNER JOIN bgo_currency cu ON p.bgo_currency = cu.cur_id
		AND p.bgo_status = 1 AND p.bgo_country_code = '".COUNTRY_CODE."' ORDER BY p.bgo_stdesc DESC LIMIT ".$offset.", ".$no_of_records_per_page."");	
	break;
 }

$stmt -> execute();
$total_rows = $stmt -> fetch();
$total_pages = ceil($total_rows["totalR"] / $no_of_records_per_page);

$stmt2 -> execute();
while($results = $stmt2 -> fetch()){
$dest="";
$iconDesc="";
if( $results['bgo_stdesc'] == 9 ){ $dest = 'style="border: solid 4px #ffc926"'; $iconDesc=' <span class="text-warning"> <i class="fas fa-star"></i> </span>';  }

echo '<div  class="col-lg-3 burengo_case visit itemSelection" itemId="'.$results['bgo_code'].'" itemCat="'.$results['bgo_subcat'].'" data-aos="fade-up">';
      

	  echo '<div   class=" p-2 "><img  '.$dest.' src="media/thumbnails/'.$results['bgo_thumbnail'].'" alt="Image placeholder" class="img-fluid burengo-img-grid"> 
      <div style="z-index:999; margin-top:-2em;" class="pl-2">'; 
if($results['bgo_cat']==1){	  
	 echo '<span class="badge bg-success bgo_mfont"> '.$results["cur_sign"].' '.number_format($results['bgo_price']).' '.convert($results['bgo_uom']).' </span>  
	  '.$iconDesc.'
	 </div>';
}else{
	 echo '<span class="badge bg-warning bgo_mfont"> '.$results["cur_sign"].' '.number_format($results['bgo_price']).' '.convert($results['bgo_uom']).' </span>  
	'.$iconDesc.'
	 </div>';
}	  
	  echo '<h5 class="pt-2 bgo_font"> 
		   '.softTrim($results['bgo_title'],25).'';  
		echo '<br/>
		<small class="float-left">  <i class="fas fa-map-marker-alt text-danger"></i> '.$results['pcstr'].'  </small>
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
 