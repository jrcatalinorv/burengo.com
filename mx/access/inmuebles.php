<?php
session_start(); 
date_default_timezone_set("America/Santo_Domingo");
require_once "../modelos/conexion.php";

$code = $_REQUEST["dtcd"];
$cdate = date('Y-m-d');

$stmt = Conexion::conectar()->prepare("SELECT p.*, t.*, cr.*, l.* FROM bgo_posts p
INNER JOIN bgo_innercategoires t ON p.bgo_tipolocal = t.inncat 
INNER JOIN bgo_places l ON p.bgo_lugar = l.pcid 
INNER JOIN bgo_currency cr ON p.bgo_currency = cr.cur_id  AND p.bgo_code = '".$code."'");

$stmt -> execute();

if($results = $stmt -> fetch()){
	$user = $results['bgo_usercode'];
	$desc = $results['bgo_title'];
	$precio =  $results['bgo_price'];
	$tipo = $results['inncat_name'];
	if(intval($results['bgo_cat'])==1){
		$mod = "Venta";
	}else{
		$mod = "Renta";
	}
	
	$addr = $results['bgo_addr']; 
	$thump = $results['bgo_thumbnail'];
	$thumpnail = "../../media/thumbnails/".$results['bgo_thumbnail'];
	$subcat = intval($results['bgo_cat']);
	$subcat2 = intval($results['bgo_subcat']);
	$tcp = $results['bgo_uom'];
	$currency = $results['cur_str']." (".$results['cur_code'].")"; /* Tipo de moneda */
	$totalPhotos = intval($results['bgo_comp_img']); 
	$img = array($thumpnail,'0000.jpg','0000.jpg','0000.jpg','0000.jpg');
	$addr = $results['bgo_addr']; 
	$place = $results['pcstr']; 
	$terreno = $results['bgo_terreno'];
	$construccion = $results['bgo_construccion'];
	$niveles = $results['bgo_niveles'];
	$rooms = $results['bgo_rooms'];
	$baths = $results['bgo_bath'];
	$garage = $results['bgo_parqueos'];
	$map = $results['bgo_mapURL'];
		
	$pr_low  = intval($precio) - ( intval($precio) * 0.30 ); 
	$pr_high = intval($precio) + ( intval($precio) * 0.50 );  

 
  }
  
  /*Buscar datos del Usuario */
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
.Hideme{
	display:none;
}

.burengo-img-grid{
	width: 250px; 
	height:160px;
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
            <i class="fas fa-th mr-2"></i> Portada  
          </a>
          <div class="dropdown-divider"></div>		  
          <a href="publicaciones.php" class="dropdown-item">
            <i class="far fa-list-alt mr-2"></i> Mis publicaciones 
          </a>
          <div class="dropdown-divider"></div>
          <a href="profile.php" class="dropdown-item">
            <i class="far fa-id-badge mr-2"></i> Cuenta    
          </a>
          <div class="dropdown-divider"></div>
          <a href="mail/inbox.php" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> Mensajes
          </a>
          <div class="dropdown-divider"></div>
          <a href="salir.php" class="dropdown-item"> <i class="fas fa-sign-out-alt text-danger mr-2"></i> Cerrar Session </a>
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
                <img src="../media/vehiculos/<?php echo $img[0]; ?>" class="product-image" alt="Product Image">
              </div>
              <div class="col-12 product-image-thumbs">
                <div class="product-image-thumb active"><img src="../media/vehiculos/<?php echo $img[0]; ?>" alt="Product Image"></div>
                <?php 
				  for($i=0; $i < $totalPhotos; $i++){
					 echo '<div class="product-image-thumb" ><img src="../media/images/'.$code.'-'.$i.'.jpg" alt="Product Image"></div>';
				  }
				?>
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3"> <?php echo $desc; ?> </h3>
              <p>  </p>
 
			 <div class="p-0">
			<div class="p-0">
					<table class="table table-sm">
                         <tbody>
							<tr>
                                <td><label> Propiedad:</label></td>
                                <td> <?php echo $tipo; ?></td> 
								<td><label> Modalidad: </label></td>
                                <td><?php echo $mod; ?></td> 											
                            </tr>
							<tr>
                               <td><label>Lugar:</label></td>
                               <td><?php echo $place; ?></td>   
                               <td><label>Direccion:</label></td>
                               <td><?php echo $addr; ?></td>                                
                            </tr>							
							<tr>
                                <td><label> Construccion:</label></td>
                                <td> <?php echo $construccion; ?></td> 
								<td><label> Terreno:</label></td>
                                <td><?php echo $terreno; ?></td> 											
                            </tr>							
							<tr>
                                <td><label> Niveles / Pisos :</label></td>
                                <td> <?php echo $niveles; ?></td> 
								<td><label> Habitaciones:</label></td>
                                <td><?php echo $rooms; ?></td> 											
                            </tr>							
							<tr>
                                <td><label> Banos:</label></td>
                                <td> <?php echo $baths; ?></td> 
								<td><label> Parqueos / Marquesina:</label></td>
                                <td><?php echo $garage; ?></td> 											
                            </tr>							
						    <tr>
                              <td><label>Precio:</label></td>
                              <td><?php echo number_format($precio,2).' '.convert($tcp);  ?></td>   
                              <td><label>Moneda:</label></td>
                              <td><?php echo $currency; ?></td>                                
                            </tr>
						 </tbody>
					</table>
				</div>
			</div>

             
            
              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                 RD$ <?php echo number_format($precio,2).' '.convert($tcp); ?>
                </h2>
                <h4 class="mt-0">
                  <small> </small>
                </h4>
              </div>


           <?php 
				if($subcat==1){
				echo '
			  <div class="mt-4">
                <div class="btn btn-success btn-lg btn-flat buyItem">
                  <i class="fas fa-cart-plus fa-lg mr-2"></i> 
                  Comprar 
                </div>

                <div class="btn btn-info btn-lg btn-flat whishList">
                  <i class="fas fa-heart fa-lg mr-2 text-white"></i> 
                  Agregar a favoritos
                </div>
              </div>';
				}else{
				echo '
			  <div class="mt-4">
                <div class="btn btn-warning btn-lg btn-flat buyItem">
                  <i class="far fa-calendar-alt fa-lg mr-2"></i> 
                  Rentar 
                </div>

                <div class="btn btn-info btn-lg btn-flat whishList">
                  <i class="fas fa-heart fa-lg mr-2 text-white"></i> 
                  Agregar a favoritos
                </div>
              </div>';					
					
					
				} 
			  
?>

<div class="mt-4 product-share">
	<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
		<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
		<a class="a2a_button_whatsapp"></a>
		<a class="a2a_button_facebook"></a>
		<a class="a2a_button_twitter"></a>
		<a class="a2a_button_email"></a>
	</div>
	<script async src="https://static.addtoany.com/menu/page.js"></script>
</div>

            </div>
          </div>
      
        </div>
        
	<div class="card-body pt-1">
			 <div class="row">
			 	<div class="col-12 col-sm-8">
				<h4> Anuncios Similares </h4> 	<hr/>
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
              <h5 class="modal-title">Informacion del Vendedor </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
              <button id="sendMsg" type="button" class="btn btn-success" data-dismiss="modal"><i class="fas fa-comments"></i> Enviar mensaje</button>
              <a href="user/publicaciones.php?user=<?php echo $user; ?>" type="button" class="btn btn-info"> <i class="fas fa-th"></i> Ver Publicaciones </a>
            </div>
          </div>
        </div>
 </div>
<!-- /.modal --> 


<div class="modal fade" id="modal-msg">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-info"> <i class="fas fa-envelope"></i> Enviar Mensaje </h5>
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
                        <label>Mensaje </label>
                        <textarea id="mcomment" class="form-control" rows="5" placeholder="Escribir comentario"></textarea>
                      </div>
			
          </div>
		  	<div class="modal-footer justify-content-between">
              <button id="btnCloseModal" type="button" class="btn btn-danger" data-dismiss="modal"> Cancelar </button>
              <button id="sendMsgConfirm" type="button" class="btn btn-success"> <i class="fab fa-telegram-plane"></i> Enviar </button>
            </div>
        </div>
</div>
</div>
 

</div>
</div> 
</div>
<!-- /.content -->
</div>
<footer class="main-footer"><div class="float-right d-none d-sm-inline"></div> Burengo &copy; 2020 - Todos los derechos reservados. </footer>
</div>
<!-- ./wrapper -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script src="../../plugins/toastr/toastr.min.js"></script>
<script type="text/javascript">
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
			case 0: toastr.success(' El inmueble fue Agregado  a la lista de favoritos. '); /* toastr.error('ERROR! No se pudo almacenar los datos: '+ data['err']); */ break;
			case 1: toastr.success(' El inmueble fue Agregado  a la lista de favoritos. ');  break;		
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

</script>
</body>
</html>
<?php 
function convert($id){
	switch($id){
		case 0: return ""; break;
		case 1: return " x dia "; break;
		case 2: return " x Noche "; break;
		case 3: return " x Hora"; break;
		case 4: return " - Semanal"; break;
		case 5: return " - Mensual"; break;
		default: return ""; break;
	}
}
?>