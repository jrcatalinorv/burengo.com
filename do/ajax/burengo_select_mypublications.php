<?php 
session_start();
require_once "../modelos/conexion.php";
require_once "../modelos/functions.php";

$sb = $_REQUEST['typo'];

switch($sb){
	case 1: $stmt = Conexion::conectar()->prepare(" SELECT p.*, pl.* FROM bgo_posts p INNER JOIN bgo_places pl ON p.bgo_lugar = pl.pcid AND p.bgo_usercode='".$_SESSION['bgo_userId']."' AND bgo_subcat = 1 "); break;		 break;
	case 2: $stmt = Conexion::conectar()->prepare(" SELECT p.*, pl.* FROM bgo_posts p INNER JOIN bgo_places pl ON p.bgo_lugar = pl.pcid AND p.bgo_usercode='".$_SESSION['bgo_userId']."' AND bgo_subcat = 2 ");break;
	default: $stmt = Conexion::conectar()->prepare(" SELECT p.*, pl.* FROM bgo_posts p INNER JOIN bgo_places pl ON p.bgo_lugar = pl.pcid AND p.bgo_usercode='".$_SESSION['bgo_userId']."' ");break;
}

$stmt -> execute();
while($results = $stmt -> fetch()){
	
echo '<div class="col-12 col-sm-4 col-md-3 d-flex align-items-stretch itemSelection" itemId="'.$results['bgo_code'].'"">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">';
                  
				   if($results['bgo_subcat']==1){
					   echo '<span class="badge bg-info float-right"> Vehiculos </span>';
				   }else{
					   echo '<span class="badge bg-info float-right"> Inmnuebles </span>';
				   }
			 
				   
               echo '</div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b> '.$results['bgo_title'].'</b></h2>
                  
                      <ul class="ml-4 mb-0 fa-ul text-muted">';
                    
						
						
					if($results['bgo_cat']==1){
						if($results['bgo_subcat']==1){
							echo '<li class="small pt-1"><span class="fa-li"><i class="fas fa-car fa-lg"></i></span> Venta </li>';
						}else{
							echo '<li class="small pt-1"><span class="fa-li"><i class="fas fa-home fa-lg"></i></span> Venta </li>';
						}
					  }else{
							if($results['bgo_subcat']==1){
							echo '<li class="small pt-1"><span class="fa-li"><i class="fas fa-car fa-lg"></i></span> Renta </li>';
							}else{
								echo '<li class="small pt-1"><span class="fa-li"><i class="fas fa-home fa-lg"></i></span> Renta </li>';
							}
						}
						
						echo '<li class="small pt-1"><span class="fa-li"><i class="fas fa-lg fa-dollar-sign"></i></span>'.number_format($results['bgo_price'],2).' '.convert($results['bgo_uom']).' <li>
                      	 
						 <li class="small pt-1"><span class="fa-li"><i class="fas fa-lg fa-map-marker"></i></span>'.$results['pcstr'].'</li>'; 
						 
						 if($results['bgo_status']==1){
						     echo '<li class="small pt-1"><span class="fa-li"><i class="fas fa-circle text-success"></i></span> Activo </li>'; 
						 }else{	
						   echo '<li class="small pt-1"><span class="fa-li"><i class="fas fa-circle text-secondary"></i></span></span> Inactivo </li>'; 
                           }
					 echo '</ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="../media/thumbnails/'.$results['bgo_thumbnail'].'" alt="" class="  img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                     <div class="btn-group">
                       
						<button type="button" class="btn btn-info edit" itemId="'.$results['bgo_code'].'" tp="'.$results['bgo_subcat'].'"  tps="'.$results['bgo_cat'].'"><i class="fas fa-edit"></i> Editar </button>';
                    
						if($results['bgo_status']==1){					   
							echo '<button type="button" class="btn btn-warning changeStatus" itemId="'.$results['bgo_code'].'" ns="0"><i class="fas fa-power-off"></i> Inactivar </button>';
						}else{
							echo '<button type="button" class="btn btn-success changeStatus" itemId="'.$results['bgo_code'].'" ns="1"><i class="fas fa-power-off"></i> Activar&nbsp; </button>';
                        }
						
						echo '<button type="button" class="btn btn-danger deletePost" itemId="'.$results['bgo_code'].'"><i class="fas fa-trash"></i> Borrar </button>
                      </div>
                  </div>
                </div>
              </div>
            </div>';	
}	 
 

 /*



$stmt -> execute();
$total_rows = $stmt -> fetch();
$total_pages = ceil($total_rows["totalR"] / $no_of_records_per_page);

$stmt2 -> execute();
while($results = $stmt2 -> fetch()){

echo '<div class="col-lg-3 visit itemSelection" itemId="'.$results['bgo_code'].'" itemCat="'.$results['bgo_subcat'].'" data-aos="fade-up">';
      

	  echo '<div class=" p-2"><img  src="../media/thumbnails/'.$results['bgo_thumbnail'].'" alt="Image placeholder" class="img-fluid burengo-img-grid"> 
      <div style="z-index:999; margin-top:-2em;">'; 
if($results['bgo_cat']==1){	  
	 echo '<span class="badge bg-success">$'.number_format($results['bgo_price'],2).' '.convert($results['bgo_uom']).' </span></div>';
}else{
	 echo '<span class="badge bg-warning">$'.number_format($results['bgo_price'],2).' '.convert($results['bgo_uom']).' </span></div>';
}	  
	  echo '<h5 class="pt-2"> 
		  <small>'.softTrim($results['bgo_title'],25).'</small>';  
		echo '<br/>
		<small class="float-left"> <i class="fas fa-map-marker-alt"></i> '.$results['pcstr'].'  </small>
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
 }	*/
?>
 