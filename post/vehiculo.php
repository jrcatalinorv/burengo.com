<?php 

?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Burengo.com</title>
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
		<style type="text/css">
			#dropZone {
				border: 3px dashed #0088cc;
				padding: 50px;
				width: 500px;
				margin-top: 20px;
			}

			#files {
				border: 1px dotted #0088cc;
				padding: 20px;
				width: 800px;
				display: none;
			}

            #error {
                color: red;
            }
		</style>

</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
 <nav class="main-header navbar navbar-expand-md navbar-light navbar-warning"> 
    <div class="container">
      <a href="../access/inicio.php" class="navbar-brand">
        <span class="brand-text">Buren<span class="text-danger">go</span></span>
      </a>
     
      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav"> </ul>
      </div>

     <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item"><a class="nav-link" href="#">Mensajes</a></li>
        <li class="nav-item"><a class="nav-link" href="../index.php"> Cerrar Session </a></li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
      
    
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
        <div class="row">
		
			
		<div class="col-md-6">
            <div class="card">
			 <div class="card-header">
                <h3 class="card-title"><i class="fas fa-list"></i> Nueva Publicacion </h3>
              </div>
            <div class="card-body">
			<!-- Titulo -->	
		    <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
						<input type="text" class="form-control" placeholder="Titulo de Publicacion (Max 15 Caracteres)">
                      </div>
                    </div>
            </div>
			<!-- Marca / Modelo -->				
			<div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
						<select class="form-control">
                          <option option="0"> Marca </option>
                         
                        </select> 
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <select class="form-control">
                          <option option="0"> Modelo </option>
                        
                        </select>                    
					</div>
                    </div>
                  </div>
			<!-- Anio / Condicion -->
			<div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
						<select class="form-control">
                          <option option="0"> Seleccione el Año  </option>
                         
                        </select> 
                      </div>
                    </div>
					
					<div class="col-sm-6">
                      <div class="form-group">
                        <select class="form-control">
                          <option option="0"> Condicion del vehiculo </option>
                          <option option="1"> Nuevo </option>
                          <option option="2"> Usado </option>
                        </select>                    
					</div>
                    </div>
                  </div>
			<!-- Precio / Tipo de Moneda -->	
			<div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
							<input type="text" class="form-control" placeholder="Precio">
                      </div>
                    </div>
					
					<div class="col-sm-6">
                      <div class="form-group">
                        <select class="form-control">
                          <option option="0"> Tipo de Moneda </option>
                          <option option="dop"> Peso  (DOP) </option>
                          <option option="usd"> Dolar (USD)  </option>
                        </select>                    
					</div>
                    </div>
                  </div>
			<!-- Combustible / Tipo de Vehiculo -->					
			<div class="row">
					<div class="col-sm-6">
                      <div class="form-group">
                        <select class="form-control">
                          <option option="0"> Combustible </option>
                          <option option="dop">   </option>
                          <option option="usd">    </option>
                        </select>                    
					</div>
                    </div>					
					
					<div class="col-sm-6">
                      <div class="form-group">
					   <div class="input-group mb-3">
                  <select class="form-control">
                          <option option="0"> Tipo de Vehiculo  </option>
                          <option option="dop">   </option>
                          <option option="usd">    </option>
                        </select> 
                  <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-check"></i></span>
                  </div>
                </div>                     
					</div>
                    </div>
                  </div>
			<!-- Transmision / Traccion -->			 	
			<div class="row">
					<div class="col-sm-6">
                      <div class="form-group">
                        <select class="form-control">
                          <option option="0"> Transmision </option>
                          <option option="dop">   </option>
                          <option option="usd">    </option>
                        </select>                    
					</div>
                    </div>					
					
					<div class="col-sm-6">
                      <div class="form-group">
					   
                  <select class="form-control">
                          <option option="0"> Traccion </option>
                          <option option="dop">   </option>
                          <option option="usd">    </option>
                        </select> 
                                   
					</div>
                    </div>
                  </div>
			<!-- Color -->		
			<div class="row">
					<div class="col-sm-6">
                      <div class="form-group">
                        <select class="form-control">
                        </select>                    
					</div>
                    </div>					
					
					<div class="col-sm-6">
                      <div class="form-group">
					   <div class="input-group mb-3">
                  <select class="form-control">
                          <option option="0"> Color Interior </option>
  
                        </select> 
                  
                </div>                     
					</div>
                    </div>
                  </div>
			<!-- Puertas / Pasajeros --> 					
			<div class="row">
				 <div class="col-sm-6">
                      <div class="form-group">
                        <select class="form-control">
                          <option option="0"> Puertas </option>
						  <option value="2">2</option>
						  <option value="3">3</option>
						  <option value="4">4</option>
						  <option value="5">5</option>
						</select>                    
					</div>
                    </div>					 
					
					<div class="col-sm-6">
                      <div class="form-group">
                        <select class="form-control">
                          <option option="0"> Cant. de Pasajeros </option>
						  <option value="2">2</option>
						  <option value="3">3</option>
						  <option value="4">4</option>
						  <option value="5">5</option>
						</select>                  
					</div>
                    </div>	
			</div>  
			<!-- Ubicacion --> 	
			 <div class="row">
				 <div class="col-sm-12">
    <div class="form-group">
                        <select class="form-control">
                          <option option="0"> Provincia </option>
						  <option value="2">2</option>
						  <option value="3">3</option>
						  <option value="4">4</option>
						  <option value="5">5</option>
						</select>                    
					</div>
                </div>					 
			</div> 
			  
            </div>
            </div>
          </div>
		
		
		
		
		
		<div class="col-md-6">
            <!-- Application buttons -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Accesorios</h3>
              </div>
              <div class="card-body">
					<div class='row'>
						<div class="col-sm-6">
                      <!-- checkbox -->
                      <div class="form-group">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="acc-1" >
                          <label for="acc-1" class="custom-control-label"> Tercera Fila de asientos </label>
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
					
					<div class="col-sm-6">
						<textarea class="form-control" rows="3" placeholder="Descripcion, Observaciones u Otros detalles"></textarea>
					</div>
					
					</div>
              </div>
              <!-- /.card-body -->
			  <div class="card-footer">
                  <button type="button" class="btn btn-danger"> Cancelar </button>
                  <button type="button" class="btn btn-success float-right"> Siguente </button>
                </div>
            </div>
            <!-- /.card -->
 
          
          </div>
		
		
		
       </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
  <!-- /.content-wrapper -->


 

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
    
    </div>
    <!-- Default to the left -->
    Burengo &copy; 2020 - Todos los derechos reservados.  
  </footer>
</div>
<!-- ./wrapper -->

<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
<script src="../dist/js/demo.js"></script>
<script type="text/javascript">
  
 
  
</script>
</body>
</html>
