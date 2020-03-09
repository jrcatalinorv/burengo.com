<?php 
session_start();
date_default_timezone_set("America/Santo_Domingo");
$postCode = 'BGS'.date('YmdHis').rand(1000,9999); /*Codigo de 20 caracteres */
$codeFake = $_REQUEST["ccdt"];
$tipo = $_REQUEST["ccdtm"];

if($tipo==12){
	$cat = 1;
	$subcat = 2;
	$strcat = "Venta";
}elseif($tipo==22){
	$cat = 2;
	$subcat = 2;
	$strcat = "Renta";	
}else{
	
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Burengo</title>
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.css">
  <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">  
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
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
      <a href="../../access/inicio.php" class="navbar-brand">
	                  <img src="../../dist/img/burengo.png" alt="Burengo Logo" class="brand-image   elevation-0" style="opacity: .8">  
      </a>
      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <ul class="navbar-nav"> </ul>
      </div>

     <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item"><a class="nav-link" href="profile.php">
			 <img alt="Avatar"  class="user-image" src="../../media/users/<?php echo $_SESSION['bgo_userImg']; ?>">
			 <?php echo $_SESSION['bgo_user']; ?></a>
		</li>
		<li class="nav-item dropdown show">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
          <i class="fas fa-bars fa-lg"></i> </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
		  
		  <a href="../../access/inicio.php" class="dropdown-item">
            <i class="fas fa-th mr-2"></i> Portada  
          </a>
          <div class="dropdown-divider"></div>		  
          <a href="../../access/publicaciones.php" class="dropdown-item">
            <i class="far fa-list-alt mr-2"></i> Mis publicaciones 
          </a>
          <div class="dropdown-divider"></div>
          <a href="../../access/profile.php" class="dropdown-item">
            <i class="far fa-id-badge mr-2"></i> Cuenta    
          </a>
          <div class="dropdown-divider"></div>
          <a href="mensajes-recibidos.php" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> Mensajes
          </a>
          <div class="dropdown-divider"></div>
          <a href="../../access/salir.php" class="dropdown-item"> <i class="fas fa-sign-out-alt text-danger mr-2"></i> Cerrar Session </a>
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
                <h3 class="card-title"><i class="fas fa-home"></i> <?php echo $strcat;?> de Inmuebles | Informaciones Generales  </h3>
				<input id="pcode" type="hidden" value="<?php echo $postCode; ?>">
				<input id="cat" type="text" value="<?php echo $cat; ?>">
				<input id="subcat" type="text" value="<?php echo $subcat; ?>">
				<input id="userId" type="hidden" value="<?php echo $_SESSION['bgo_userId']; ?>">
              </div>
            <div class="card-body">
			<!-- Titulo -->	
		    <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
						<input id="title" maxlength="25" type="text" class="form-control" placeholder="Titulo de Publicacion (Ej: Casa Completa, Apartamento, etc...)">
                      </div>
                    </div>
            </div>
			<!-- Marca / Modelo -->				
			<div class="row">
                 <div class="col-sm-6">
						<div class="form-group">
								<select id="types" class="form-control"> 
									<option value="0"> Tipo de Prodiedad </option>
								</select> 
						</div>
						</div>
                 <div class="col-sm-6">
						<div class="form-group">
							<select id="place" class="form-control">
                          <option option="0"> Provincia </option>
					 
						</select> 
						</div>
					</div>
             </div>
			 <div class="row">
					<div class="col-sm-12"><div class="form-group">
							<input id="addrs" type="text" class="form-control" placeholder="Direccion">
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
										<option option="0"> Tipo de Moneda </option></select>
						</div>
					</div>
                 </div>
		 
			<!-- Transmision / Traccion -->			 	
			<div class="row">
					<div class="col-sm-6">
                      <div class="form-group">
                        <select id="trasnmision" class="form-control">
                          <option option="0"> Pisos / Niveles </option>
                          <option option="1"> 1 </option>
                          <option option="2"> 2 </option>
                          <option option="3"> 3 </option>
                          <option option="4"> 4 </option>
                          <option option="5"> 5 </option>
                          <option option="6"> 6 </option>
                          <option option="7"> 7 </option>
                          <option option="8"> 8 </option>
                          <option option="9"> 9 </option>
                          <option option="10"> 10 </option>
                          <option option="11"> 11 </option>
                          <option option="12"> 12 </option>
                        </select>                    
					</div>
                    </div>					
					
					<div class="col-sm-6">
                      <div class="form-group"> 
						<input id="rooms" class="form-control" placeholder="Cantidad de Habitaciones" />               
					</div>
                    </div>
                  </div>
			<!-- Color -->		
			<div class="row">
					<div class="col-sm-6">
                      <div class="form-group">
                      		<input id="baths" class="form-control" placeholder="Cantidad de Banos" />
                    
					</div>
                    </div>					
					
					<div class="col-sm-6">
                      <div class="form-group">
					   <div class="input-group mb-3">
						<input id="garage" class="form-control" placeholder="Cantidad de Parqueos / Marquecinas" /> 
                  
                </div>                     
					</div>
                    </div>
                  </div>
			<!-- Puertas / Pasajeros --> 					
		   
			<!-- Ubicacion --> 	
			<div class="row">
				 <div class="col-sm-12">
					<div class="form-group">
                                           
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
			<div class="row">
				<div class="col-md-4 p-4">
					<div class="form-group">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="acc-1" >
                          <label for="acc-1" class="custom-control-label"> 3ra Fila de asientos </label>
                        </div>
						
						<div class="custom-control custom-checkbox pt-2">
                          <input class="custom-control-input" type="checkbox" id="acc-2" >
                          <label for="acc-2" class="custom-control-label"> Asientos Leather </label>
                        </div>
						
						<div class="custom-control custom-checkbox pt-2">
                          <input class="custom-control-input" type="checkbox" id="acc-3" >
                          <label for="acc-3" class="custom-control-label"> Baul eléctrico </label>
                        </div>						
						
						<div class="custom-control custom-checkbox pt-2">
                          <input class="custom-control-input" type="checkbox" id="acc-4" >
                          <label for="acc-4" class="custom-control-label"> Bolsa de Aire conductor </label>
                        </div>						
						
						<div class="custom-control custom-checkbox pt-2">
                          <input class="custom-control-input" type="checkbox" id="acc-5" >
                          <label for="acc-5" class="custom-control-label"> Bolsa de Aire Pasajero </label>
                        </div>						
						
						<div class="custom-control custom-checkbox pt-2">
                          <input class="custom-control-input" type="checkbox" id="acc-6" >
                          <label for="acc-6" class="custom-control-label"> Cámara Reversa </label>
                        </div>						
 
                      </div>                    
                  </div>
                <div class="col-md-4 p-4">
                <div class="form-group">
					<div class="custom-control custom-checkbox pt-2">
                          <input class="custom-control-input" type="checkbox" id="acc-7" >
                          <label for="acc-7" class="custom-control-label"> Faros LED </label>
                        </div>		
						
						<div class="custom-control custom-checkbox pt-2">
                          <input class="custom-control-input" type="checkbox" id="acc-8" >
                          <label for="acc-8" class="custom-control-label"> Llave Inteligente/Encendido Botón  </label>
                        </div>						
						<div class="custom-control custom-checkbox pt-2">
                          <input class="custom-control-input" type="checkbox" id="acc-9" >
                          <label for="acc-9" class="custom-control-label"> Radio Multimedia   </label>
                        </div>						
						<div class="custom-control custom-checkbox pt-2">
                          <input class="custom-control-input" type="checkbox" id="acc-10" >
                          <label for="acc-10" class="custom-control-label"> Seguros eléctricos   </label>
                        </div>						
						<div class="custom-control custom-checkbox pt-2">
                          <input class="custom-control-input" type="checkbox" id="acc-11" >
                          <label for="acc-11" class="custom-control-label"> Sunroof    </label>
                        </div>						
						<div class="custom-control custom-checkbox pt-2">
                          <input class="custom-control-input" type="checkbox" id="acc-12" >
                          <label for="acc-12" class="custom-control-label"> Vidrios eléctricos    </label>
                        </div>					 
					 
					 </div>
                  </div>
				<div class="col-md-4 p-4">
                      <input id="accesories" type="text"  />
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

<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script src="../../plugins/toastr/toastr.min.js"></script>
<script src="../../dist/js/demo.js"></script>
<script type="text/javascript"> 


$('#brands').load('../../ajax/bgo_select_car_brands.php');
$('#activeYears').load('../../ajax/bgo_select_active_years.php');
$('#currency').load('../../ajax/bgo_select_currency.php');
$('#color').load('../../ajax/burengo_select_color.php');
$('#interior').load('../../ajax/burengo_select_color_interior.php');
$('#place').load('../../ajax/burengo_select_places.php');



$('#brands').change(function(){$('#models').load('../../ajax/bgo_select_car_models.php?id='+$('#brands').val()); });
$('#cancel').click(function(){ location.href="../../access/inicio.php"; });


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
