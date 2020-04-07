<?php 
session_start();
date_default_timezone_set("America/Santo_Domingo");
$postCode = 'BGS'.date('YmdHis').rand(1000,9999); /*Codigo de 20 caracteres */
$codeFake = $_REQUEST["ccdt"];

$cat = 1;
$subcat = 1;
$strcat = "Venta";
 

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
<style>
.bgo-wrapper{width: 600px;  height: 100px;}
.bgo-margin-area {position: relative;  text-align: center;  font-family: "Trebuchet", sans-serif;  font-size: 14px;  margin: 0 20px;}
.bgo-dot {height: 30px; width: 30px; position: absolute; background: #000; border-radius: 50%; top: 10px; color: #fff; line-height: 30px; z-index: 9999;}
.bgo-dot.bgo-one {left: 35px; background: #0C84D9;}
.bgo-dot.bgo-two {left: 180px; background: #bbb;}
.bgo-dot.bgo-three {left: 330px; background: #bbb; color: #fff; }
.bgo-progress-bar { position: absolute;  height: 10px;  width: 25%;  top: 20px;  left: 10%;  background: #bbb;}
.bgo-progress-bar.bgo-first {background: #bbb;}
.bgo-progress-bar.bgo-second {left: 35%;}
.bgo-message{position: absolute; height: 60px; width: 170px; padding: 10px; margin: 0; left: -50px; top: 0; color: #000;}
.bgo-message.bgo-message-1 {top: 40px; color: #000;}
.bgo-message.bgo-message-2 {left: 160px;}
.bgo-message.bgo-message-3 {left: 160px;color: #000;}
</style>
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
 <nav class="main-header navbar navbar-expand-md navbar-dark bg-navy"> 
    <div class="container">
      <a href="../../../inicio.php" class="navbar-brand">
	                  <img src="../../../../../dist/img/burengo.png" alt="Burengo Logo" class="brand-image   elevation-0" style="opacity: .8">  
      </a>
      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <ul class="navbar-nav"> </ul>
      </div>

     <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item"><a class="nav-link" href="profile.php">
			 <img alt="Avatar"  class="user-image" src="../../../../media/users/<?php echo $_SESSION['bgo_userImg']; ?>">
			 <?php echo $_SESSION['bgo_user']; ?></a>
		</li>
		<li class="nav-item dropdown show">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
          <i class="fas fa-bars fa-lg"></i> </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
		  
		  <a href="../../../inicio.php" class="dropdown-item">
            <i class="fas fa-th mr-2"></i> Portada  
          </a>
          <div class="dropdown-divider"></div>		  
          <a href="../../../publicaciones.php" class="dropdown-item">
            <i class="far fa-list-alt mr-2"></i> Mis publicaciones 
          </a>
          <div class="dropdown-divider"></div>
          <a href="../../../profile.php" class="dropdown-item">
            <i class="far fa-id-badge mr-2"></i> Cuenta    
          </a>
          <div class="dropdown-divider"></div>
          <a href="mensajes-recibidos.php" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> Mensajes
          </a>
          <div class="dropdown-divider"></div>
          <a href="../../../salir.php" class="dropdown-item"> <i class="fas fa-sign-out-alt text-danger mr-2"></i> Cerrar Session </a>
        </div>
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
        <div class="row">
         <div class="col-md-12">
	<!------------------------------> 
	<center>
			<div class="bgo-wrapper">
			<div class="bgo-margin-area">
			<div class="bgo-dot bgo-one">1</div>
			<div class="bgo-dot bgo-two">2</div>
			<div class="bgo-dot bgo-three">3</div>
			<div class="bgo-progress-bar bgo-first"></div>
			<div class="bgo-progress-bar bgo-second"></div>
			<div class="bgo-message bgo-message-1">Datos Generales <div>
			<div class="bgo-message bgo-message-2">Subir Imagenes  <div>
			<div class="bgo-message bgo-message-3">Confirmar Datos <div>
			</div></div></div></div></div></div>
			</div>
			</div>
		 
	</center>			
			<!------------------------------>
		</div>
</div>
		
		<div class="row">	
		<div class="col-md-11">
            <div class="card">
			 <div class="card-header">
                <h3 class="card-title"><i class="fas fa-car"></i> <?php echo $strcat;?> de Vehiculos | Informaciones Generales  </h3>
				<input id="pcode" type="hidden" value="<?php echo $postCode; ?>">
				<input id="cat" type="hidden" value="<?php echo $cat; ?>">
				<input id="subcat" type="hidden" value="<?php echo $subcat; ?>">
				<input id="userId" type="hidden" value="<?php echo $_SESSION['bgo_userId']; ?>">
				<input id="userProfile" type="hidden" value="<?php echo $_SESSION['bgo_perfil']; ?>">
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
			<!-- Ubicacion --> 	
			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
							<input id="addrs" type="text" class="form-control" placeholder="Direccion">
					</div>
				</div>
			</div>
			<div class="row">
				 <div class="col-sm-12">
					<div class="form-group">
                        <select id="place" class="form-control">
                          <option value="0"> Provincia </option>
					 
						</select>                    
					</div>
                </div>					 
			</div> 
			<div class='row'>
			<div class="col-sm-12">
				 <div class="card-header">
                <h3 class="card-title"> <i class="fas fa-list"></i> Accesorios & Observaciones  </h3>
              </div>
            </div>
            </div>
			<div class="row carAcc">
				<div class="col-md-4 p-4">
					<div class="form-group">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input opAcc" type="checkbox" id="acc-1"  vldt="3ra Fila de asientos" pos="0">
                          <label for="acc-1" class="custom-control-label"> 3ra Fila de asientos </label>
                        </div>
						
						<div class="custom-control custom-checkbox pt-2">
                          <input class="custom-control-input opAcc" type="checkbox" id="acc-2" vldt="Asientos Leather" pos="1" >
                          <label for="acc-2" class="custom-control-label"> Asientos Leather </label>
                        </div>
						
						<div class="custom-control custom-checkbox pt-2">
                          <input class="custom-control-input opAcc" type="checkbox" id="acc-3" vldt="Baul eléctrico" pos="2" >
                          <label for="acc-3" class="custom-control-label"> Baul eléctrico </label>
                        </div>						
						
						<div class="custom-control custom-checkbox pt-2">
                          <input class="custom-control-input opAcc" type="checkbox" id="acc-4" vldt="Bolsa de Aire conductor" pos="3" >
                          <label for="acc-4" class="custom-control-label"> Bolsa de Aire conductor </label>
                        </div>						
						
						<div class="custom-control custom-checkbox pt-2">
                          <input class="custom-control-input opAcc" type="checkbox" id="acc-5" vldt="Bolsa de Aire Pasajero" pos="4" >
                          <label for="acc-5" class="custom-control-label"> Bolsa de Aire Pasajero </label>
                        </div>						
						
						<div class="custom-control custom-checkbox pt-2">
                          <input class="custom-control-input opAcc" type="checkbox" id="acc-6" vldt="Cámara Reversa" pos="5" >
                          <label for="acc-6" class="custom-control-label"> Cámara Reversa </label>
                        </div>						
 
                      </div>                    
                  </div>
                <div class="col-md-4 p-4">
                <div class="form-group">
					<div class="custom-control custom-checkbox pt-2">
                          <input class="custom-control-input opAcc" type="checkbox" id="acc-7" vldt="Faros LED" pos="6" >
                          <label for="acc-7" class="custom-control-label"> Faros LED </label>
                        </div>		
						
						<div class="custom-control custom-checkbox pt-2">
                          <input class="custom-control-input opAcc" type="checkbox" id="acc-8" vldt="Llave Inteligente/Encendido Botón" pos="7" >
                          <label for="acc-8" class="custom-control-label"> Llave Inteligente/Encendido Botón  </label>
                        </div>						
						<div class="custom-control custom-checkbox pt-2">
                          <input class="custom-control-input opAcc" type="checkbox" id="acc-9" vldt="Radio Multimedia" pos="8" >
                          <label for="acc-9" class="custom-control-label"> Radio Multimedia   </label>
                        </div>						
						<div class="custom-control custom-checkbox pt-2">
                          <input class="custom-control-input opAcc" type="checkbox" id="acc-10" vldt="Seguros eléctricos" pos="9" >
                          <label for="acc-10" class="custom-control-label"> Seguros eléctricos   </label>
                        </div>						
						<div class="custom-control custom-checkbox pt-2">
                          <input class="custom-control-input opAcc" type="checkbox" id="acc-11" vldt="Sunroof" pos="10" >
                          <label for="acc-11" class="custom-control-label"> Sunroof    </label>
                        </div>						
						<div class="custom-control custom-checkbox pt-2">
                          <input class="custom-control-input opAcc" type="checkbox" id="acc-12" vldt="Vidrios eléctricos" pos="11" >
                          <label for="acc-12" class="custom-control-label"> Vidrios eléctricos    </label>
                        </div>					 
					 
					 </div>
                  </div>
				<div class="col-md-4 p-4">
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
 <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
<!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-inline"></div>
    Burengo &copy; 2020 - Todos los derechos reservados.  
  </footer>
</div>
<!-- ./wrapper -->

<script src="../../../../../plugins/jquery/jquery.min.js"></script>
<script src="../../../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../../../../dist/js/adminlte.min.js"></script>
<script src="../../../../../plugins/toastr/toastr.min.js"></script>
<script src="../../../../../dist/js/demo.js"></script>
<script src="../../../../../plugins/jquery-number/jquery.number.js"></script>
<script type="text/javascript"> 
var listaItems = [0,0,0,0,0,0,0,0,0,0,0,0];	
$('#price').number(true,0); 

$('#brands').load('../../../../ajax/bgo_select_car_brands.php');
$('#activeYears').load('../../../../ajax/bgo_select_active_years.php');
$('#currency').load('../../../../ajax/bgo_select_currency.php');
$('#color').load('../../../../ajax/burengo_select_color.php');
$('#interior').load('../../../../ajax/burengo_select_color_interior.php');
$('#place').load('../../../../ajax/burengo_select_places.php');
$('#fuel').load('../../../../ajax/burengo_select_fuel.php');
$('#traccion').load('../../../../ajax/burengo_select_traccion.php');
$('#trasnmision').load('../../../../ajax/burengo_select_trasnmision.php');



$('#brands').change(function(){$('#models').load('../../../../ajax/bgo_select_car_models.php?id='+$('#brands').val()); });
$('#cancel').click(function(){ location.href="../../../inicio.php"; });



$('.carAcc').on("change","input.opAcc",function(){
	var value = $(this).attr('vldt');
	var p = $(this).attr('pos');
		if($(this).is(':checked')){
			  listaItems[p] = value;
			 $('#accesories').val(JSON.stringify(listaItems));
		}else{
			listaItems[p] = 0;
			 $('#accesories').val(JSON.stringify(listaItems));
		}
	
});

/* BTN Next  */
$('#next').click(function(){

	
if( !isEmpty($('#title').val()) ){
if( $('#brands').val() != 0 ){ 
if( $('#models').val() != 0){
if( $('#activeYears').val() != 0){
if( $('#condition').val() != 0){
if( !isEmpty($('#price').val()) ){	
if( $('#currency').val() != 0){
if( $('#fuel').val() != 0){
if( $('#cartype').val() != 0){
if( $('#trasnmision').val() != 0){
if( $('#color').val() != 0){
if( !isEmpty($('#addrs').val()) ){	 
if( $('#place').val() != 0){
	save_data();
}else{ toastr.error('Debe colocar la provincia donde se encuentra el vehículo'); }
}else{ toastr.error('Debe colocar la direccion donde se encuentra el vehículo'); }
}else{ toastr.error('Debe seleccionar el color del vehículo'); }
}else{ toastr.error('Debe seleccionar el tipo de Transmision del vehículo'); }
}else{ toastr.error('Debe seleccionar el tipo de vehículo'); }
}else{ toastr.error('Debe seleccionar el tipo de Combustible del vehículo'); }
}else{ toastr.error('Debe seleccionar el tipo de moneda para la venta'); }
}else{ toastr.error('Debe colocar el Precio del vehículo'); }
}else{ toastr.error('Debe seleccionar la Condición del vehículo'); }
}else{ toastr.error('Debe seleccionar el Año del vehículo'); }
}else{ toastr.error('Debe seleccionar el Moldelo del vehículo'); }
}else{ toastr.error('Debe seleccionar la Marca del vehículo'); }
}else{ $('#title').focus();  toastr.error('Debe completar todos los campos'); }
});

function save_data(){
var uom = 0;
var passengers = 1; parseInt($('#passengers').val());	
if( !isEmpty($('#passengers').val()) ){  passengers = parseInt($('#passengers').val()); }	

 $.getJSON('../../../../ajax/burengo_insert_vehicle.php',{
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
	pasajeros_cantidad: passengers,
	addr: $('#addrs').val(),
	accesories: $('#accesories').val(),   
	destacado: $('#userProfile').val(),   
	notes: $('#notes').val()	
  },function(data){
		switch(data['ok']){
			case 0: toastr.error('ERROR! No se pudo almacenar los datos: '+ data['err']); break;
			case 1:  location.href="fotos.php?ccdt="+data['ccdt']; break;
		}
	});	
}

function isEmpty(str) {
    return (!str || 0 === str.length);
}

</script>
</body>
</html>
