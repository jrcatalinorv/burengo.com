<?php 
session_start();
date_default_timezone_set("America/Santo_Domingo");
require_once "../../../../modelos/conexion.php";

$code = $_REQUEST["ccdt"];
$src = $_REQUEST["pth"];
$cat = 1;
$subcat = 2;
$strcat = "Venta";	

$stmt = Conexion::conectar()->prepare("SELECT p.*, t.*, cr.*, l.* FROM bgo_posts p
INNER JOIN bgo_innercategoires t ON p.bgo_tipolocal = t.inncat 
INNER JOIN bgo_places l ON p.bgo_lugar = l.pcid 
INNER JOIN bgo_currency cr ON p.bgo_currency = cr.cur_id  AND p.bgo_code = '".$code."'");

$stmt -> execute();

if($results = $stmt -> fetch()){
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
                <h3 class="card-title"><i class="fas fa-car"></i> <?php echo $strcat;?> de Vehiculos | Informaciones Generales  </h3>
				<input id="pcode" type="hidden" value="<?php echo $code; ?>">
				<input id="cat" type="hidden" value="<?php echo $cat; ?>">
				<input id="subcat" type="hidden" value="<?php echo $subcat; ?>">
				<input id="userId" type="hidden" value="<?php echo $_SESSION['bgo_userId']; ?>">
				<input id="url" type="hidden" value="<?php echo $src; ?>">
              </div>
            <div class="card-body">
		    <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
						<input id="title" maxlength="25" type="text" class="form-control" placeholder="Titulo de Publicacion (Ejemplo: Honda Civic EX 2014)">
                      </div>
                    </div>
            </div>
 			
			<div class="row">
                 <div class="col-sm-6">
					<div class="form-group">
						<select id="brands" class="form-control"> 
							<option value="0"> Marcas </option> 
						</select> 
					</div>
				 </div>
				 
                 <div class="col-sm-6">
					<div class="form-group">
						<select id="models" class="form-control"> 
							<option value="0"> Modelo </option> 
						</select>
					</div>
				</div>
             </div>
			<!-- Anio / Condicion -->
			<div class="row">
                   <div class="col-sm-6"> 
						<div class="form-group">
							<select id="activeYears" class="form-control"> 
								<option value="0"> Seleccione el Año  </option> 
							</select> 
						</div>
					 </div>
					<div class="col-sm-6">
                      <div class="form-group">
                        <select id="condition" class="form-control">
                          <option value="0"> Condicion del vehiculo </option>
                          <option value="Nuevo"> Nuevo </option>
                          <option value="Usado"> Usado </option>
                        </select>                    
					</div>
                    </div>
                  </div>
			<!-- Precio / Tipo de Moneda -->	
				<div class="row">
                    <div class="col-sm-6">
						<div class="form-group">
							<input id="price" type="text" class="form-control" placeholder="Precio">
						</div>
					</div>				
					<div class="col-sm-6">
						<div class="form-group">
							<select id="currency" class="form-control"> 
								<option value="0"> Tipo de Moneda </option>
							</select>
						</div>
					</div>
                 </div>
			<!-- Combustible / Tipo de Vehiculo -->					
			<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<select id="fuel" class="form-control">
								<option value="0"> Combustible </option>
							  </select>
							</div>
						</div>					
					
					<div class="col-sm-6">
                      <div class="form-group">
					   <div class="input-group mb-3">
                  <select id="cartype" class="form-control">
                        <option value="0"> Tipo de Vehiculo  </option>
						<option value="1"> Sedan   </option>
						<option value="2"> Compacto  </option> 
						<option value="3"> Jeepeta  </option>
						<option value="4"> Camioneta  </option>
						<option value="5"> Coupe/Sport  </option>
						<option value="6"> Motores  </option>
						<option value="7"> Camiones  </option>
						<option value="8"> Autobuses  </option>
						<option value="9"> Vehiculos Pesados  </option>
						<option value="10"> Otros  </option>
                    </select> 
                </div>                     
					</div>
                    </div>
                  </div>
			<!-- Transmision / Traccion -->			 	
			<div class="row">
					<div class="col-sm-6">
                      <div class="form-group">
                        <select id="trasnmision" class="form-control">
                          <option value="0"> Transmision </option>
                          <option value="1"> Automatica </option>
                          <option value="2"> Manual </option>
                          <option value="3"> Triptonica </option>
                        </select>                    
					</div>
                    </div>					
					
					<div class="col-sm-6">
                      <div class="form-group"> 
						<select id="traccion" class="form-control">
                          <option value="0"> Traccion </option>
              
                        </select>                
					</div>
                    </div>
                  </div>
			<!-- Color -->		
			<div class="row">
					<div class="col-sm-6">
                      <div class="form-group">
                        <select id="color" class="form-control">
						 <option value="0"> Color </option>
                        </select>                    
					</div>
                    </div>					
					
					<div class="col-sm-6">
                      <div class="form-group">
					   <div class="input-group mb-3">
						<select id="interior" class="form-control">
                          <option value="0"> Color Interior </option>
  
                        </select> 
                  
                </div>                     
					</div>
                    </div>
                  </div>
			<!-- Puertas / Pasajeros --> 					
			<div class="row">
    			<div class="col-sm-6">
                      <div class="form-group">
                        <select id="doors" class="form-control">
                          <option value="0"> Cantidad de Puertas </option>
                          <option value="0">0</option>
						  <option value="2">2</option>
						  <option value="3">3</option>
						  <option value="4">4</option>
						  <option value="5">5</option>
						</select>                    
					</div>
				</div>					 
				<div class="col-sm-6"><div class="form-group">
					<input id="passengers" type="number" min="1" class="form-control" placeholder="Cantidad de Pasajeros"> 
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
			<div class='row'>
			<div class="col-sm-12">
				 <div class="card-header">
                <h3 class="card-title"> <i class="fas fa-list"></i> Observaciones  </h3>
              </div>
            </div>
            </div>
			<div class="row carAcc">
			 
				<div class="col-md-12">
                      <input id="accesories" type="hidden"  />
					  <textarea id="notes" class="form-control" rows="7" placeholder="Descripcion, Observaciones u Otros detalles"></textarea>
                  </div>
            </div>
		</div> <!-- Card Body -->
          <div class="card-footer">
              <button id="cancel" type="button" class="btn btn-danger"> <i class="fas fa-times-circle"></i> Cancelar </button>
              <button id="next" type="button" class="btn btn-primary float-right"> Siguente <i class="fas fa-arrow-alt-circle-right"></i> </button>
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

$('#updateData').click(function(){
	 
});

$('#cancel').click(function(){ 
var ch = $('#url').val();
switch(ch){
	case '1': location.href="confirmacion.php?ccdt="+$('#pcode').val();  break;
	case '2': location.href="../../../publicaciones.php"; break;
	default: location.href="../../../inicio.php";  break; 
}



});
$('#price').number(true,0); 
/* BTN Next  */
$('#next').click(function(){
 var uom = 0;
 $.getJSON('../../ajax/burengo_insert_vehicle.php',{
	code: $('#pcode').val(),
	usercode: $('#userId').val(),
	cat: $('#cat').val(),
	subcat: $('#subcat').val(),
	title: $('#title').val(),
	price: $('#price').val(),
	lugar: $('#place').val(),
	uom: uom,
	marca: $('#brands').val(),
	modelo: $('#models').val(),
	year: $('#activeYears').val(),
	condicion: $('#condition').val(),
	currency: $('#currency').val(),
	fuel: $('#fuel').val(),
	vtype: $('#cartype').val(),
	transmision: $('#trasnmision').val(),
	traccion: $('#traccion').val(),
	color: $('#color').val(),
	color_interior: $('#interior').val(),
	puertas_cantidad: $('#doors').val(),
	pasajeros_cantidad: $('#passengers').val(),
	addr: $('#addrs').val(),
	accesories: $('#accesories').val(),   
	notes: $('#notes').val()	
  },function(data){
		switch(data['ok']){
			case 0: toastr.error('ERROR! No se pudo almacenar los datos: '+ data['err']); break;
			case 1:  location.href="fotos.php?ccdt="+data['ccdt']; break;
		}
	});	
});
</script>
</body>
</html>
