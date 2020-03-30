<?php 
session_start();
date_default_timezone_set("America/Santo_Domingo");
require_once "../../../../modelos/conexion.php";

$code = $_REQUEST["ccdt"];
$src = $_REQUEST["pth"];

$stmt = Conexion::conectar()->prepare("SELECT p.*, t.*, cr.*, l.* FROM bgo_posts p
INNER JOIN bgo_innercategoires t ON p.bgo_tipolocal = t.inncat 
INNER JOIN bgo_places l ON p.bgo_lugar = l.pcid 
INNER JOIN bgo_currency cr ON p.bgo_currency = cr.cur_id  AND p.bgo_code = '".$code."'");

$stmt -> execute();

if($results = $stmt -> fetch()){
	$desc = $results['bgo_title'];
	$precio =  $results['bgo_price'];
	$tipo = $results['bgo_vtype'];
	$level = $results['bgo_niveles'];
	$place = $results['bgo_lugar']; 
	$addr = $results['bgo_addr'];
	$price = $results['bgo_price'];
	$uom = $results['bgo_uom'];
	$currency = $results['bgo_currency']; 
	$location = '../../../../media/thumbnails/' . $results['bgo_thumbnail']; 
	$totalPhotos = intval($results['bgo_comp_img']);
	$rooms =  $results['bgo_rooms'] ;
	$bath =  $results['bgo_bath'] ;
	$garage =  $results['bgo_parqueos'] ;
	$terr =  $results['bgo_terreno'] ;
	$cons =  $results['bgo_construccion'] ;
	$notes =  $results['bgo_notes'] ;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="icon" type="image/png" href="../../../../../favicon.ico"/>
  <title>Burengo</title>
  <link rel="stylesheet" href="../../../../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../../../../dist/css/adminlte.css">
  <link rel="stylesheet" href="../../../../../plugins/toastr/toastr.min.css">  
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
 <nav class="main-header navbar navbar-expand-md navbar-dark bg-navy"> 
    <div class="container">
      <a href="" class="navbar-brand"><img src="../../../../../dist/img/burengo.png" alt="Burengo Logo" class="brand-image   elevation-0" style="opacity: .8"></a>
      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <ul class="navbar-nav"> </ul>
      </div>

     <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item"><a class="nav-link" href="">
			 <img alt="Avatar"  class="user-image" src="../../../../media/users/<?php echo $_SESSION['bgo_userImg']; ?>">
			 <?php echo $_SESSION['bgo_user']; ?></a>
		</li>
	 </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
 <section class="content">
      <div class="container-fluid">	
		<div class="row pt-3">	

 <div class="col-md-12">
   <div class="card">
			 <div class="card-header">
                <h3 class="card-title"><i class="fas fa-home"></i> Editar  Publicación </h3>
				<input id="pcode" type="hidden" value="<?php echo $code; ?>">
				<input id="url" type="hidden" value="<?php echo $src; ?>">	
              </div>
            <div class="card-body">
			<!-- Titulo -->	
		    <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group"> <label> Título Publicación  </label>
						<input id="title" maxlength="25" type="text" class="form-control" value="<?php echo $desc; ?>">
                      </div>
                    </div>
					
					       <div class="col-sm-6">
					<div class="form-group">   <label> Tipo de Prodiedad  </label>
						<select id="types" class="form-control"> 
						    <option <?php if($tipo==0){ echo "selected"; } ?> value="0"> Tipo de Prodiedad </option>
							<option <?php if($tipo==13){ echo "selected"; } ?>  value="13"> Casas </option>
							<option <?php if($tipo==14){ echo "selected"; } ?> value="14">  Apartamentos </option>
							<option <?php if($tipo==15){ echo "selected"; } ?> value="15">  Villas </option>
							<option <?php if($tipo==16){ echo "selected"; } ?> value="16">  Solares </option>
							<option <?php if($tipo==17){ echo "selected"; } ?> value="17">  Fincas </option>
							<option <?php if($tipo==18){ echo "selected"; } ?> value="18">  Naves </option>
							<option <?php if($tipo==19){ echo "selected"; } ?> value="19">  Oficinas </option>
							<option <?php if($tipo==20){ echo "selected"; } ?> value="20">  Edificios </option>
							<option <?php if($tipo==21){ echo "selected"; } ?> value="21">  Penthouse </option>
							<option <?php if($tipo==22){ echo "selected"; } ?> value="22">  Local Comercial </option>
							<option <?php if($tipo==23){ echo "selected"; } ?> value="23">  Salon para Eventos </option>
							<option <?php if($tipo==24){ echo "selected"; } ?> value="24"> Otros Inmuebles </option>									
						  </select> 
						</div>
						</div>
					
            </div>
		 
			 <div class="row">
	
			<div class="col-sm-6"> <label> Provincia  </label>
				<div class="form-group"> 
							<select id="place" class="form-control">
                          <option value="0"> Provincia </option>
						  <?php 
							$stmt2 = Conexion::conectar()->prepare("SELECT * FROM bgo_places WHERE pcstatus = 1");
							$stmt2 -> execute();

							while( $resulta2 = $stmt2 -> fetch()){
								
								if($place==$resulta2['pcid']){
									echo '<option selected value="'.$resulta2['pcid'].'"> '.$resulta2['pcstr'].' </option>';	
								}else{
									echo '<option value="'.$resulta2['pcid'].'"> '.$resulta2['pcstr'].' </option>';	
								}
									
								
								
								}	
							?>
						</select> 
						</div>
						</div>
							<div class="col-sm-6"><div class="form-group">  <label> Dirección  </label>
							<input id="addrs" type="text" class="form-control" value="<?php echo $addr; ?>">
					</div>
			</div>
			
			</div>
<div class="row">
   <div class="col-sm-6">
		<div class="form-group">  <label>Precio  </label><input id="price" type="text" class="form-control"  value="<?php echo $price; ?>"></div>
	</div>	
			
	<div class="col-sm-6">
        <div class="form-group"> <label> Tipo de Moneda </label>
			<select id="currency" class="form-control"> 
			<option value="0"> Tipo de Moneda </option>
			<?php 
				$stmt3 = Conexion::conectar()->prepare("SELECT * FROM bgo_currency WHERE cur_status = 1");
				$stmt3 -> execute();
				while( $resulta3 = $stmt3 -> fetch()){
					if($currency==$resulta3['cur_id']){
						echo '<option selected value="'.$resulta3['cur_id'].'"> '.$resulta3['cur_str'].' </option>';		
					}else{
						echo '<option value="'.$resulta3['cur_id'].'"> '.$resulta3['cur_str'].' </option>';		
					   }
					}	
				?>
			</select>
		</div>
	</div>
 </div>
<div class="row">
	<div class="col-sm-6">
	   <div class="form-group"><label> Niveles </label>
          <select id="niveles" class="form-control">
              <option <?php if($level==0){ echo "selected"; } ?> value="0"> Pisos / Niveles </option>
              <option <?php if($level==1){ echo "selected"; } ?> value="1"> 1 </option>
               <option <?php if($level==2){ echo "selected"; } ?> value="2"> 2 </option>
                          <option <?php if($level==3){ echo "selected"; } ?> value="3"> 3 </option>
                          <option <?php if($level==4){ echo "selected"; } ?> value="4"> 4 </option>
                          <option <?php if($level==5){ echo "selected"; } ?> value="5"> 5 </option>
                          <option <?php if($level==6){ echo "selected"; } ?> value="6"> 6 </option>
                          <option <?php if($level==7){ echo "selected"; } ?> value="7"> 7 </option>
                          <option <?php if($level==8){ echo "selected"; } ?> value="8"> 8 </option>
                          <option <?php if($level==9){ echo "selected"; } ?> value="9"> 9 </option>
                          <option <?php if($level==10){ echo "selected"; } ?> value="10"> 10 </option>
                          <option <?php if($level==11){ echo "selected"; } ?> value="11"> 11 </option>
                          <option <?php if($level==12){ echo "selected"; } ?> value="12"> 12 </option>
                        </select>                    
					</div>
					
					</div>

                   				
					
					<div class="col-sm-6">
                      <div class="form-group"> <label> Cantidad de Habitaciones </label>
						<input id="rooms" type="number" class="form-control"  value="<?php echo $rooms; ?>" />               
					</div>
                    </div>
                  </div>
	 
	 
	 
	 
<div class="row">
	<div class="col-sm-6">
      <div class="form-group"> <label> Cantidad de Baños </label><input id="baths" type="number" class="form-control" value="<?php echo $bath; ?>" /></div>
    </div>					
	<div class="col-sm-6">
       <div class="form-group"> <label> Cantidad de Parqueos / Marquecinas </label><input id="garage" type="number" class="form-control" value="<?php echo $garage; ?>" /> </div>
    </div>
</div>			
<div class="row">
	<div class="col-sm-6">
       <div class="form-group"> <label> Terreno </label> <input id="terreno" class="form-control" value="<?php echo $terr; ?>" /></div>
    </div>					
<div class="col-sm-6">
		<div class="form-group"> <label> Construcción</label><input id="construccion" class="form-control" value="<?php echo $cons; ?>"/></div>
</div>
</div>
<div class="row">
<label> Descripcion, Observaciones u Otros detalles </label>
<textarea id="notes" class="form-control" rows="3"  >  <?php echo  $notes; ?>  </textarea>
</div>
</div> <!-- Card Body -->
<div class="card-footer">
     <button id="cancel" type="button" class="btn btn-danger"> <i class="fas fa-times-circle"></i> Cancelar </button>
    <div class="float-right">
	 <button id="updPic" type="button" class="btn btn-info"> <i class="far fa-edit"> Cambiar Imagenes </i> </button>
	 <button id="updateData" type="button" class="btn btn-warning"> <i class="fas fa-retweet"> Actualizar </i> </button>

	</div>
</div>	 
</div>
</div>

      </div><!-- /.container-fluid -->
    </section>
  </div>
<!-- /.content-wrapper -->
<footer class="main-footer"> Burengo &copy; 2020 - Todos los derechos reservados. </footer>
</div>
<!-- ./wrapper -->

<script src="../../../../../plugins/jquery/jquery.min.js"></script>
<script src="../../../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../../../../dist/js/adminlte.min.js"></script>
<script src="../../../../../plugins/toastr/toastr.min.js"></script>
<script src="../../../../../dist/js/demo.js"></script>
<script src="../../../../../plugins/jquery-number/jquery.number.js"></script>
<script type="text/javascript"> 

 

$('#cancel').click(function(){ 
var ch = $('#url').val();
switch(ch){
	case '1':  location.href="confirmacion.php?ccdt="+$('#pcode').val(); break;
	case '2': location.href="../../../publicaciones.php"; break;
	default: location.href="../../../inicio.php";  break; 
}



});
$('#price').number(true,0); 
 
 
/* BTN Next  */
$('#updateData').click(function(){
if( !isEmpty($('#title').val()) ){
if( $('#types').val() != 0 ){ 
if( $('#place').val() != 0 ){ 
if( !isEmpty($('#addrs').val()) ){
if( $('#currency').val() != 0 ){ 	
		save_data();
}else{ toastr.error('Debe seleccionar el tipo de moneda'); }	
}else{ toastr.error('Debe colocar la direccion de la propiedad'); }	
}else{ toastr.error('Debe seleccionar la Provincia'); }
}else{ toastr.error('Debe seleccionar el tipo de Prodiedad'); }
}else{ $('#title').focus();  toastr.error('Debe completar todos los campos'); }	
});


function save_data(){
var rooms = 0;	
var baths = 0;	
var garage = 0;	
var terreain = '-';	
var cons = '-';	
var notes = '';
var uom = 0;

if( !isEmpty($('#rooms').val())  ){ var rooms =  $('#rooms').val();}
if( !isEmpty($('#baths').val())  ){ var baths =  $('#baths').val();}
if( !isEmpty($('#garage').val()) ){ var garage =  $('#garage').val();}
if( !isEmpty($('#terreno').val())){ var terreain = $('#terreno').val();}
if( !isEmpty($('#construccion').val())){ var cons = $('#construccion').val();}
if( !isEmpty($('#notes').val())){ var notes = $('#notes').val();}

$.getJSON('../../../../ajax/burengo_update_inmueble.php',{
	code: $('#pcode').val(),
	usercode: $('#userId').val(),
	cat: $('#cat').val(),
	subcat: $('#subcat').val(),
	title: $('#title').val(),
	type: $('#types').val(),
	niveles: $('#niveles').val(),
	lugar: $('#place').val(),
	addr: $('#addrs').val(),
	price: $('#price').val(),
	uom: uom,
	currency: $('#currency').val(),	
	rooms: rooms,
	baths: baths,
	garage: garage,
	terreno: terreain,
	construccion: cons,  
	notes: notes
  },function(data){
		switch(data['ok']){
			case 0: toastr.error('ERROR! No se pudo almacenar los datos: '+ data['err']); break;
			case 1: location.href="fotos-edit.php?ccdt="+data['ccdt']+"&pth="+$('#url').val(); break;
		}
	});	
}

function isEmpty(str) {
    return (!str || 0 === str.length);
} 


$('#updPic').click(function(){ location.href="fotos-edit.php?ccdt="+$('#pcode').val()+"&pth="+$('#url').val(); });
 
</script>
</body>
</html>
