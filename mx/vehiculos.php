<?php 
date_default_timezone_set("America/Santo_Domingo");
require_once "modelos/conexion.php";
require_once "modelos/data.php";

$code = $_REQUEST["dtcd"];
$cdate = date('Y-m-d');
 
$stmt = Conexion::conectar()->prepare("SELECT p.*, c.*, i.*, m.*,n.*, l.*, cr.*, ts.*, tc.*, fl.*, vt.* FROM bgo_posts p 
INNER JOIN bgo_colores c ON p.bgo_color = c.clrs_id
INNER JOIN bgo_colores_int i ON p.bgo_color_interior = i.clrs_int_id
INNER JOIN bgo_marcas_vehiculos m ON p.bgo_marca = m.mv_id   
INNER JOIN bgo_modelos_vehiculos n ON p.bgo_modelo = n.mvd_id      
INNER JOIN bgo_places l ON p.bgo_lugar = l.pcid      
INNER JOIN bgo_currency cr ON p.bgo_currency = cr.cur_id  
INNER JOIN bgo_transmision_vehiculo ts ON p.bgo_transmision = ts.tsvid    
INNER JOIN bgo_traccion_vehiculo tc ON p.bgo_traccion = tc.tv_id    
INNER JOIN bgo_fuel fl ON p.bgo_fuel = fl.fid 
INNER JOIN bgo_innercategoires vt ON p.bgo_vtype = vt.inncat 
AND p.bgo_code = '".$code."'");

$stmt -> execute();

if($results = $stmt -> fetch()){
	$user = $results['bgo_usercode'];
	$desc = $results['bgo_title'];
	$precio =  $results['bgo_price'];
	$year = $results['bgo_year']; 
	$modelo = $results['mvd_modelo'];
	$fullbrand = $results['mv_marca'] ; 
	$motor = 'N/A';
	$color =$results['clrs_name'];
	$color2 =$results['clrs_int_name'];
	$tipo = $results['inncat_name'];
	$fuel = $results['fstr'];
	$transmission = $results['tsvstr']; 
	$tracsion = $results['tv_name'];
	$condition = $results['bgo_condicion'];
	$passengers = $results['bgo_pasajeros_cantidad'];
	$doors = $results['bgo_puertas_cantidad']; 
	$addr = $results['bgo_addr']; 
	$place = $results['pcstr'];
	$totalPhotos = intval($results['bgo_comp_img']); 	
	$thumpnail = "../../media/thumbnails/".$results['bgo_thumbnail'];
	$subcat = intval($results['bgo_cat']);
	$subcat2 = intval($results['bgo_subcat']);
	$tcp = $results['bgo_uom'];
	$currency = $results['cur_str']." (".$results['cur_code'].")"; /* Tipo de moneda */
	$img = array($thumpnail,'0000.jpg','0000.jpg','0000.jpg','0000.jpg');
	$cur_sign = $results["cur_sign"];
	$pr_low  = intval($precio) - ( intval($precio) * 0.30 ); 
	$pr_high = intval($precio) + ( intval($precio) * 0.50 );  
  }

$dest="";
$iconDesc="";
if( $results['bgo_stdesc'] == 9 ){ $dest = 'style="border: solid 4px #ffc926"'; $iconDesc=' <span class="text-warning"> <i class="fas fa-star"></i> </span>';  }
 
  
 /*Buscar datos del Usuario */
$stmt2 = Conexion::conectar()->prepare("SELECT * FROM bgo_users WHERE uid = '".$user."'"); 
$stmt2 -> execute();  
$rslts = $stmt2 -> fetch();
$use_img    = $rslts["img"];
$use_nombre = $rslts["name"];

/* Vicitas */  


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="icon" type="image/png" href="../favicon.ico"/>
  <title><?php echo $desc; ?></title>
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  
  <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
<style>
@media only screen and (min-width: 992px) {	
.burengo-img-grid{
	width: 250px; 
	height:130px;
  }
.bgo_font{
	font-size:1vW;
}
.bgo_mfont{
   font-size:0.8vW;
}
}

@media only screen and (max-width: 600px) {
.linkWeb{
	display:none;
}
</style> 
  
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed">
<div class="wrapper">
 <nav class="main-header navbar navbar-expand-md navbar-dark bg-navy"> 
    <div class="container">
      <a href="../<?php echo COUNTRY_CODE; ?>" class="navbar-brand"><img src="../dist/img/burengo.png" alt="Burengo Logo" class="brand-image   elevation-0" style="opacity: .8"></a>
	  <div class="collapse navbar-collapse order-3" id="navbarCollapse"><ul class="navbar-nav"> </ul></div>
       <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item"><a class="nav-link" href="../<?php echo COUNTRY_CODE; ?>"> <?php echo burengo_portada; ?></a></li>
        <li class="nav-item"><a class="nav-link" href="acceder.php"> <?php echo burengo_login; ?> </a></li>
      </ul>
    </div>
  </nav>

  <div class="content-wrapper">
    <div class="content pt-1">
      <div class=" ">
        <div class="row">
		<input id="getMe"   type="hidden" value="<?php echo $code; ?>" />
		<input id="getLow"  type="hidden" value="<?php echo $pr_low; ?>" />
		<input id="getHigh" type="hidden" value="<?php echo $pr_high; ?>" />
		<input id="getsubCat" type="hidden" value="<?php echo $subcat2; ?>" />
		<input id="getCat" type="hidden" value="<?php echo $subcat; ?>" />
		<input id="getUsrCode" type="hidden" value="<?php echo $user; ?>" />
		  <div class="card card-solid col-12">
			<div class="card-body" style="width:100%;">
				 <div class="row" >
				    <div class="col-12 col-sm-6" >
              <h3 class="d-inline-block d-sm-none"></h3>
              <div class="col-12"><img <?php echo $dest; ?> src="media/vehiculos/<?php echo $img[0]; ?>" class="product-image" alt="Product Image"></div>
               <div class="col-12 product-image-thumbs">
                <div class="product-image-thumb active"><img src="media/vehiculos/<?php echo $img[0]; ?>" alt="Product Image"></div>
                <?php 
  				   $extraImages = json_decode($results['bgo_extrapics'], true);
					for($i=0; $i < count($extraImages); $i++){
					  echo '<div class="product-image-thumb" ><img src="media/images/'.$code.'/'.$extraImages[$i].'" alt="Product Image"></div>';
				   }
				?>
              </div>
            </div>
				 
				 <div class="col-12 col-sm-6">
  <h3 class="my-3"> <?php echo $iconDesc.' '.$desc; ?> </h3><p></p>
	<div class="p-0">
	  <div class="p-0">
		<table class="table table-sm" >
           <tbody>
				<tr><td><label> <?php echo burengo_marca; ?>:</label></td><td><?php echo $fullbrand; ?></td><td><label> <?php echo burengo_model; ?>:</label></td><td><?php echo $modelo; ?></td></tr>							
				<tr><td><label> <?php echo burengo_condicion; ?>:</label></td><td> <?php echo $condition; ?></td><td><label> <?php echo burengo_year; ?>:</label></td><td><?php echo $year; ?></td></tr>
                <tr><td><label> <?php echo burengo_color; ?>:</label></td><td><?php echo $color; ?></td><td><label><?php echo burengo_tipo;?>:</label></td><td><?php echo $tipo; ?></td></tr>
                <tr><td><label> <?php echo burengo_int; ?>:</label></td><td><?php echo $color2; ?></td><td><label><?php echo burengo_fuel; ?>: </label></td><td><?php echo $fuel; ?></td></tr>
                <tr><td><label> <?php echo burengo_transmition; ?>:</label></td><td><?php echo $transmission; ?></td><td><label><?php echo burengo_doors; ?>:</label></td><td><?php echo $doors; ?></td></tr>
                <tr><td><label> <?php echo burengo_tranccion; ?>:</label></td><td><?php echo $tracsion; ?></td><td><label><?php echo burengo_passenger; ?>:</label></td><td><?php echo $passengers; ?></td></tr>                                        
				<tr><td><label> <?php echo burengo_place; ?>:</label></td><td><?php echo $place; ?></td><td><label><?php echo burengo_addr; ?>:</label></td><td><?php echo $addr; ?></td></tr>										
				<tr><td><label> <?php echo burengo_price; ?>:</label></td><td><?php echo number_format($precio,2).' '.convert($tcp);  ?></td><td><label><?php echo burengo_currency; ?>:</label></td><td><?php echo $currency; ?></td></tr>
			</tbody>
		 </table>
	 </div>
  </div>
<div class="bg-gray py-2 px-3 mt-4"><h2 class="mb-0"> <?php echo $cur_sign; ?> <?php echo number_format($precio,2).' '.convert($tcp); ?></h2></div>
<?php 
	 if($subcat==1){
				echo '
			  <div class="mt-4">
                <div class="btn btn-success btn-lg btn-flat buyItem">
                  <i class="fas fa-cart-plus fa-lg mr-2"></i> 
                   '.burengo_buy.' 
                </div>

                <div class="btn btn-info btn-lg btn-flat whishList">
                  <i class="fas fa-heart fa-lg mr-2 text-white"></i> 
                  '.burengo_fav.'
                </div>
              </div>';
				}else{
				echo '
			  <div class="mt-4">
                <div class="btn btn-warning btn-lg btn-flat buyItem">
                  <i class="far fa-calendar-alt fa-lg mr-2 buyerData"></i> 
                  '.burengo_rent.' 
                </div>

                <div class="btn btn-info btn-lg btn-flat whishList">
                  <i class="fas fa-heart fa-lg mr-2 text-white"></i> 
                  '.burengo_fav.'
                </div>
              </div>';									
 } 			  
?>

 <div class="mt-4 product-share">
                
 <!-- AddToAny BEGIN -->
<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
<a class="a2a_button_whatsapp"></a>
<a class="a2a_button_facebook"></a>
<a class="a2a_button_twitter"></a>
<a class="a2a_button_email"></a>
</div>
<script async src="https://static.addtoany.com/menu/page.js"></script>
<!-- AddToAny END -->
</div>

            </div>
    
				 </div>	
			</div>
			
		<div class="card-body pt-1">
			 <div class="row">
			 	<div class="col-12 col-sm-8">
				<h4> <?php echo burengo_similars; ?> </h4> 	<hr/>
				<div class="row similars"> </div>
				</div>
				
				<div class="col-12 col-sm-4">
				
				<h4> &nbsp; </h4> 	<hr/>
				<div class="map"> 
				 
				</div>
			 
				</div>
			 </div>
			

		</div>
			
		  </div> <!--- Card Solid ---> 	
		</div> <!--- --->
      </div> 
    </div>
    
	
	
	<!-- /.content -->
  </div>
 
<div id="triggerBtnModal" data-toggle="modal" data-target="#modal-default"></div>
<div id="triggerBtnModal2" data-toggle="modal" data-target="#modal-default2"></div> 
 
<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><?php echo burengo_sellerInfo; ?> </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			<div class="row">
				<div class="col-md-6"> 
				<h2 class="lead"><b><?php echo $use_nombre; ?></b></h2> 
					 <ul class="ml-4 mb-0 fa-ul text-muted pt-1">
                       <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>  
					   <span class="bg-gray"> 
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   
					        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					   </span> </li>
                       <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span>   
					   	   <span class="bg-gray"> 
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   
					        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					   </span>
					   
					   </li>
					   <li class="small"><span class="fa-li"><i class="fab fa-lg fa-whatsapp"></i></span>   
					   	   <span class="bg-gray"> 
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   
					        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					   </span>
					   
					   </li>
					   <li class="small"><span class="fa-li"><i class="fab fa-lg fa-instagram"></i></span>   
					   	   <span class="bg-gray"> 
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   
					        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					   </span>
					   
					   </li>					   
					   
					   <li class="small"><span class="fa-li"><i class="fab fa-lg fa-facebook"></i></span>   
					   	   <span class="bg-gray"> 
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   
					        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					   </span>
					   
					   </li>
                        
					  </ul>
				</div>
				<div class="col-md-6 text-center">  <img src="media/users/<?php echo $use_img; ?>" alt="" class="img-circle img-fluid">  </div>
				<div class="col-md-12 pt-4"> <h6 class="text-info"> <?php echo burengo_mustSignIn; ?> </h6> </div>
			</div>
            </div>
			
			  <div class="modal-footer">
              <button disabled style="display:none;" type="button" class="btn btn-success" data-dismiss="modal"><i class="fas fa-comments"></i> <?php echo burengo_usrMsgSend; ?></button>
              <a href="publicaciones.php?user=<?php echo $user; ?>" type="button" class="btn btn-info"> <i class="fas fa-th"></i> <?php echo burengo_allPost; ?> </a>
            </div>
			
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
<!-- /.modal -->  
 
<div class="modal fade" id="modal-default2">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
             
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			<div class="row">
				<div class="col-md-12 pt-4"> 
				<h2 class="text-info text-center"> <i class="far fa-file-alt fa-2x"></i> </h2>
				<h5 class="text-info text-center"> <?php echo burengo_warning1; ?> </h5> 
				
				<br/>
				<br/>
				</div>
				
			</div>
     
 
            </div>
		</div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
<!-- /.modal -->  
  
<footer class="main-footer"><div class="float-right d-none d-sm-inline"></div> Burengo &copy; 2020 - <?php echo burengo_copyright; ?> </footer>
</div>
<!-- ./wrapper -->
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
<script src="../plugins/toastr/toastr.min.js"></script>
<script src="../dist/js/demo.js"></script>
<script type="text/javascript">
$('.buyItem').click(function(){ $('#triggerBtnModal').click(); });
 
$('.whishList').click(function(){ $('#triggerBtnModal2').click(); });  
 
$('.similars').load("ajax/burengo_select_similars.php?sp="+$('#getsubCat').val()+"&tp="+$('#getCat').val()+"&lw="+$('#getLow').val()+"&hg="+$('#getHigh').val()+"&me="+$('#getMe').val()); 
 
$('.similars').on("click", "div.itemSelection", function(){ 
	var id = $(this).attr('itemId');
	var cat = $(this).attr('itemCat');
	
	switch(cat){
		case '1': location.href="vehiculos.php?dtcd="+id; break;
		case '2': location.href="inmuebles.php?dtcd="+id; break;
	} 
});  
 
 
</script>
</body>
</html>
<?php 
function convert($id){
	switch($id){
		case 0: return ""; break;
		case 1: return " x ".burengo_day; break;
		case 2: return " x ".burengo_night; break;
		case 3: return " x ".burengo_hour; break;
		case 4: return " - ".burengo_week; break;
		case 5: return " - ".burengo_month; break;
		default: return ""; break;
	}
}
?>