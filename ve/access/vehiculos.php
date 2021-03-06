<?php 
session_start();
date_default_timezone_set("America/Santo_Domingo");
require_once "../modelos/conexion.php";
require_once "../modelos/data.php";

$code = $_REQUEST["dtcd"];
$cdate = date('Y-m-d');

if(isset($_SESSION['bgo_userId'])){   
}else{
  header('Location: ../vehiculos.php?dtcd='.$code); 
}  

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
	$thump = $results['bgo_thumbnail'];
	$thumpnail = "../../media/thumbnails/".$results['bgo_thumbnail'];
	$subcat = intval($results['bgo_cat']);
	$subcat2 = intval($results['bgo_subcat']);
	$tcp = $results['bgo_uom'];
	$map = $results['bgo_mapURL'];
	$currency = $results['cur_str']." (".$results['cur_code'].")"; /* Tipo de moneda */
	$cur_sign = $results["cur_sign"];	
	$img = array($thumpnail,'0000.jpg','0000.jpg','0000.jpg','0000.jpg');
	
	$pr_low  = intval($precio) - ( intval($precio) * 0.30 ); 
	$pr_high = intval($precio) + ( intval($precio) * 0.50 ); 
  }
 
$dest="";
$iconDesc="";
if( $results['bgo_stdesc'] == 9 ){ $dest = 'style="border: solid 4px #ffc926"'; $iconDesc=' <span class="text-warning"> <i class="fas fa-star"></i> </span>';  }
 
 
  /*Buscar datos del Usuario del vehiculo  */
$stmt2 = Conexion::conectar()->prepare("SELECT * FROM bgo_users WHERE uid = '".$user."'"); 
$stmt2 -> execute();  
$rslts = $stmt2 -> fetch();
$use_img    = $rslts["img"];
$use_nombre = $rslts["name"]; 
$use_phone = $rslts["phone"]; 
$email = $rslts["email"]; 
$whatsapp = "".$rslts["bgo_whatsapp"]; 
$instagram ="".$rslts["bgo_instagram"]; 
$facebook = "".$rslts["bgo_facebook"]; 


//Colocar datos mios 
$stmt3= Conexion::conectar()->prepare("SELECT * FROM bgo_users WHERE uid = '".$_SESSION['bgo_userId']."'"); 
$stmt3 -> execute();  
$rslts3 = $stmt3 -> fetch();
$mynombre = $rslts3["name"]; 
$myphone = $rslts3["phone"]; 
$myemail = $rslts3["email"]; 




  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="icon" type="image/png" href="../../favicon.ico"/>
  <title> <?php echo $desc; ?></title>
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.css">
  <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">
<style>
@media only screen and (min-width: 992px) {	
.burengo-img-grid{width: 250px;height:130px;}
  
.burengo-img-grid-mate{
	max-height:530px;
	width:auto;
  display: block;
  margin-left: auto;
  margin-right: auto;
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
<!-- Navbar -->
 <nav class="main-header navbar navbar-expand-md navbar-dark bg-navy"> 
    <div class="container">
      <a href="inicio.php" class="navbar-brand">
          <img src="../../dist/img/burengo.png" alt="Burengo Logo" class="brand-image   elevation-0" style="opacity: .8"> 
      </a>
	  <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <ul class="navbar-nav"> </ul>
      </div>
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                  <li class="nav-item"><a class="nav-link" href="profile.php">
			 <img alt="Avatar"  class="user-image" src="../media/users/<?php echo $_SESSION['bgo_userImg']; ?>">
			 <?php echo $_SESSION['bgo_user']; ?></a>
		</li>
		
				<li class="nav-item dropdown show">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
          <i class="fas fa-bars fa-lg"></i> </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">	  
		  <div class="dropdown-divider"></div>	
		  <a href="inicio.php" class="dropdown-item">
            <i class="fas fa-th mr-2"></i> <?php echo burengo_portada; ?> 
          </a>
          <div class="dropdown-divider"></div>		  
          <a href="publicaciones.php" class="dropdown-item">
            <i class="far fa-list-alt mr-2"></i> <?php echo burengo_Mypost; ?> 
          </a>
          <div class="dropdown-divider"></div>
          <a href="profile.php" class="dropdown-item">
            <i class="far fa-id-badge mr-2"></i> <?php echo burengo_Account; ?>    
          </a>
          <div class="dropdown-divider"></div>
          <a href="mail/inbox.php"" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> <?php echo burengo_msg; ?>
          </a>
          <div class="dropdown-divider"></div>
          <a href="salir.php" class="dropdown-item"> <i class="fas fa-sign-out-alt text-danger mr-2"></i> <?php echo burengo_logout; ?> </a>
        </div>
      </li>
        
      </ul>
    </div>
  </nav>

  <div class="content-wrapper">
    <!-- Main content -->
    <div class="content pt-1">
      <div class=" ">
        <div class="row">
		<input id="getMe"   type="hidden" value="<?php echo $code; ?>" />
		<input id="getLow"  type="hidden" value="<?php echo $pr_low; ?>" />
		<input id="getHigh" type="hidden" value="<?php echo $pr_high; ?>" />
		<input id="getsubCat" type="hidden" value="<?php echo $subcat2; ?>" />
		<input id="getCat" type="hidden" value="<?php echo $subcat; ?>" />
		<input id="getUsrCode" type="hidden" value="<?php echo $user; ?>" />
		<input id="mycode" type="hidden" class="form-control"  value="<?php echo $_SESSION['bgo_userId']; ?>" >
        <input id="usremail" type="hidden" class="form-control" value="<?php echo $email; ?>" >		
		  <!-- Default box -->
      <div class="card card-solid col-12">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none"> </h3>
              <div class="col-12">
                <img <?php echo $dest; ?> src="../media/vehiculos/<?php echo $img[0]; ?>" class="product-image burengo-img-grid-mate" alt="Product Image">
              </div>
              <div class="col-12 product-image-thumbs">
                <div class="product-image-thumb active"><img src="../media/vehiculos/<?php echo $img[0]; ?>" alt="Product Image"></div>
          <?php 
			   $extraImages = json_decode($results['bgo_extrapics'], true);
					for($i=0; $i < count($extraImages); $i++){
					  echo '<div class="product-image-thumb" ><img src="../media/images/'.$code.'/'.$extraImages[$i].'" alt="Product Image"></div>';
				   }
				?>
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3"> <?php echo $iconDesc.' '.$desc; ?> </h3>
              <p>  </p>
 
			 <div class="p-0">
			<div class="p-0">
					<table class="table table-sm">
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
			<div class="bg-gray py-2 px-3 mt-4"><h2 class="mb-0"> <?php echo $cur_sign; ?>  <?php echo number_format($precio,2).' '.convert($tcp); ?></h2></div>
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
                  <i class="far fa-calendar-alt fa-lg mr-2"></i> 
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
				 <?php echo $map; ?>
				</div>
			 
				</div>
			 </div>
			

		</div>
		
		<!-- /.card-body -->
      </div>

<div id="triggerBtnModal" data-toggle="modal" data-target="#modal-default"></div>
<div id="triggerBtnModalmodal" data-toggle="modal" data-target="#modal-msg"></div>
<div id="triggerBtnModal2" data-toggle="modal" data-target="#modal-default2"></div>

<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"> <?php echo burengo_sellerInfo; ?> </h5>
              <button id="closeMeBtn" type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			<div class="row">
				<div class="col-md-6"> 
				<h2 class="lead"><b><?php echo $use_nombre; ?></b></h2> 
					 <ul class="ml-4 mb-0 fa-ul text-muted pt-1">
                       <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span><span style="font-size:1.3em;" /> <?php echo $use_phone; ?></span> </li>
                       <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span><span style="font-size:1.2em;"> <?php echo $email; ?> </span></li>
					   <li class="small"><span class="fa-li"><i class="fab fa-lg fa-whatsapp"></i></span><span style="font-size:1.3em;"> <?php echo $whatsapp; ?> </span></li>
					   <li class="small"><span class="fa-li"><i class="fab fa-lg fa-instagram"></i></span><span style="font-size:1.3em;">  <?php echo $instagram; ?>    </span></li>					   
					   <li class="small"><span class="fa-li"><i class="fab fa-lg fa-facebook"></i></span><span style="font-size:1.3em;">  <?php echo $facebook; ?>   </span></li>
					  </ul>
				</div>
				<div class="col-md-6 text-center">  <img src="../media/users/<?php echo $use_img; ?>" alt="" class="img-circle img-fluid">  </div>
				 	</div>
     
 
            </div>
			
			 <div class="modal-footer">
              <button id="sendMsg" type="button" class="btn btn-success" data-dismiss="modal"><i class="fas fa-comments"></i> <?php echo burengo_usrMsgSend; ?> </button>
              <a href="user/publicaciones.php?user=<?php echo $user; ?>" type="button" class="btn btn-info"> <i class="fas fa-th"></i> <?php echo burengo_allPost; ?> </a>
            </div>
			
          </div>
        </div>
</div>
<!-- /.modal -->  
 
<div class="modal fade" id="modal-msg">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-info"> <i class="fas fa-envelope"></i> <?php echo burengo_usrMsgSend; ?> </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
				<div class="input-group mb-3">
                  <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user"></i></span></div>
                  <input readonly type="text" class="form-control" placeholder="Nombre Completo" value="<?php echo $mynombre; ?>" >             
                </div>
				<div class="form-group">
                        <label> <?php echo burengo_send; ?> </label>
                        <textarea id="mcomment" class="form-control" rows="5" placeholder="Escribir comentario"></textarea>
                      </div>
			
          </div>
		  	<div class="modal-footer justify-content-between">
              <button id="btnCloseModal" type="button" class="btn btn-danger" data-dismiss="modal"> <?php echo burengo_cancel; ?> </button>
              <button id="sendMsgConfirm" type="button" class="btn btn-success"> <i class="fab fa-telegram-plane"></i> <?php echo burengo_send; ?> </button>
            </div>
        </div>
</div>
</div>
<!-- /.modal -->  
        </div>
      </div> 
    </div>
    <!-- /.content -->
  </div>
<footer class="main-footer"><div class="float-right d-none d-sm-inline"></div> Burengo &copy; 2020 - <?php echo burengo_copyright; ?> 

</footer>
</div>
<!-- ./wrapper -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script src="../../plugins/toastr/toastr.min.js"></script>
<script src="../../dist/js/demo.js"></script>
<script type="text/javascript">
visits();

$('.buyItem').click(function(){ $('#triggerBtnModal').click(); });
$('#sendMsg').click(function(){ $('#triggerBtnModalmodal').click(); $('#closeMeBtn').click(); });

$('.whishList').click(function(){
	
var img   = "<?php echo $thump; ?>";
var post  = $('#getMe').val();
var name  = "<?php echo $desc; ?>"; 
var user  = "<?php echo $_SESSION['bgo_userId']; ?>"; 
 
$.getJSON('../ajax/burengo_whishlist.php',{			  	 
			user: user,	    	 
			post: post, 	 
			name: name,	 
			thump: img 
	},function(data){
	   switch(data['ok'])
		{
			case 0: toastr.success(' El vehiculo fue Agregado  a la lista de favoritos. '); /* toastr.error('ERROR! No se pudo almacenar los datos: '+ data['err']); */ break;
			case 1: toastr.success(' El vehiculo fue Agregado  a la lista de favoritos. ');  break;		
		 }
	});
});




$('.similars').load("../ajax/burengo_select_similars_acc.php?sp="+$('#getsubCat').val()+"&tp="+$('#getCat').val()+"&lw="+$('#getLow').val()+"&hg="+$('#getHigh').val()+"&me="+$('#getMe').val()); 
$('.similars').on("click", "div.itemSelection", function(){ 
	var id = $(this).attr('itemId');
	var cat = $(this).attr('itemCat');
	
	switch(cat){
		case '1': location.href="vehiculos.php?dtcd="+id; break;
		case '2': location.href="inmuebles.php?dtcd="+id; break;
	} 
});  


$('#sendMsgConfirm').click(function(){
if( !isEmpty($('#mcomment').val() ) ){
	var rp = "0";
	
	$.getJSON('../ajax/burengo_send_message.php',{			  	 
			from: $('#mycode').val(),	    	 
			to: $('#getUsrCode').val(), 	 
			email: $('#usremail').val(),	 
			msg: $('#mcomment').val(),	 
			post: $('#getMe').val(),
			reply: rp 				
	},function(data){
	   switch(data['ok'])
		{
			case 0: toastr.error('ERROR! No se pudo almacenar los datos: '+ data['err']); break;
			case 1: toastr.success('El mensaje fue enviado de forma correcta'); $('#btnCloseModal').click();  break;		
		 }
	});
	
	}else{
		toastr.error('Debe completar el campo mensaje.');
	}
});


function isEmpty(str) {
    return (!str || 0 === str.length);
}


/* Funcion guardar visitas */
function visits(){
 $.getJSON('../ajax/burengo_insert_visit.php',{
	code: $('#getMe').val()	
  },function(data){
		switch(data['ok']){
			case 0: toastr.error('ERROR! No se pudo almacenar los datos: '+ data['err']); break;
			case 1: break;
		}
	});
}
 

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