<?php 
date_default_timezone_set("America/Santo_Domingo");
require_once "modelos/conexion.php";

$code = $_REQUEST["dtcd"];
$cdate = date('Y-m-d');

 

$stmt = Conexion::conectar()->prepare("SELECT p.*, c.*, i.*, m.*,n.*, l.*, cr.*, ts.*, tc.*, fl.* FROM bgo_posts p 
INNER JOIN bgo_colores c ON p.bgo_color = c.clrs_id
INNER JOIN bgo_colores_int i ON p.bgo_color_interior = i.clrs_int_id
INNER JOIN bgo_marcas_vehiculos m ON p.bgo_marca = m.mv_id   
INNER JOIN bgo_modelos_vehiculos n ON p.bgo_modelo = n.mvd_id      
INNER JOIN bgo_places l ON p.bgo_lugar = l.pcid      
INNER JOIN bgo_currency cr ON p.bgo_currency = cr.cur_id  
INNER JOIN bgo_transmision_vehiculo ts ON p.bgo_transmision = ts.tsvid    
INNER JOIN bgo_traccion_vehiculo tc ON p.bgo_traccion = tc.tv_id    
INNER JOIN bgo_fuel fl ON p.bgo_fuel = fl.fid   
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
	$tipo = $results['bgo_vtype'];
	$fuel = $results['fstr'];
	$transmission = $results['tsvstr']; 
	$tracsion = $results['tv_name'];
	$condition = $results['bgo_condicion'];
	$passengers = $results['bgo_pasajeros_cantidad'];
	$doors = $results['bgo_puertas_cantidad']; 
	$addr = $results['bgo_addr']; 
	$place = $results['pcstr']; 
	$thumpnail = "../../media/thumbnails/".$results['bgo_thumbnail'];
	$subcat = intval($results['bgo_cat']);
	$tcp = $results['bgo_uom'];
	$currency = $results['cur_str']." (".$results['cur_code'].")"; /* Tipo de moneda */
	$img = array($thumpnail,'0000.jpg','0000.jpg','0000.jpg','0000.jpg');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="icon" type="image/png" href="favicon.ico"/>
  <title>Burengo</title>
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
<style>  
.Hideme{
	display:none;
}
</style>  
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed">
<div class="wrapper">
<!-- Navbar -->
 <nav class="main-header navbar navbar-expand-md navbar-dark bg-navy"> 
    <div class="container">
      <a href="index.php" class="navbar-brand">
          <img src="dist/img/burengo.png" alt="Burengo Logo" class="brand-image   elevation-0" style="opacity: .8"> 
      </a>
	  <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <ul class="navbar-nav"> </ul>
      </div>
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Portada</a></li>
        <li class="nav-item"><a class="nav-link" href="acceder.php">Acceder / Registarse </a></li>
      </ul>
    </div>
  </nav>

  <div class="content-wrapper">
    <!-- Main content -->
    <div class="content pt-1">
      <div class=" ">
        <div class="row">
		  <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none"> </h3>
              <div class="col-12">
                <img src="media/vehiculos/<?php echo $img[0]; ?>" class="product-image" alt="Product Image">
              </div>
              <div class="col-12 product-image-thumbs">
                <div class="product-image-thumb active"><img src="media/vehiculos/<?php echo $img[0]; ?>" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="media/vehiculos/<?php echo $img[2]; ?>" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="media/vehiculos/<?php echo $img[3]; ?>" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="media/vehiculos/<?php echo $img[4]; ?>" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="media/vehiculos/<?php echo $img[4]; ?>" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="media/vehiculos/<?php echo $img[4]; ?>" alt="Product Image"></div>
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
                                <td><label> Marca:</label></td>
                                <td> <?php echo $fullbrand; ?></td> 
								<td><label> Modelo:</label></td>
                                <td><?php echo $modelo; ?></td> 											
                            </tr>							
							<tr>
                                <td><label> Condicion:</label></td>
                                <td> <?php echo $condition; ?></td> 
								<td><label> Año:</label></td>
                                <td><?php echo $year; ?></td> 											
                            </tr>
                            <tr>
                               <td><label>Color:</label></td>
                               <td><?php echo $color; ?></td> 
                               <td><label>Tipo:</label></td>
                               <td><?php echo $tipo; ?></td> 
                            </tr>
                             <tr>
                                 <td><label>Interior:</label></td>
                                 <td><?php echo $color2; ?></td> 
                                 <td><label>Combustible: </label></td>
                                 <td><?php echo $fuel; ?></td>
                             </tr>
                                      
                                        <tr>
                                            <td><label>Transmisión:</label></td>
                                            <td><?php echo $transmission; ?></td> 

                                            <td><label>Puertas:</label></td>
                                            <td><?php echo $doors; ?></td>
                                        </tr>
                                        <tr>
                                            <td><label>Tracción:</label></td>
                                            <td><?php echo $tracsion; ?></td>   
                                            <td><label>Pasajeros:</label></td>
                                            <td><?php echo $passengers; ?></td>                                
                                        </tr>                                        
										<tr>
                                            <td><label>Lugar:</label></td>
                                            <td><?php echo $place; ?></td>   
                                            <td><label>Direccion:</label></td>
                                            <td><?php echo $addr; ?></td>                                
                                        </tr>										
										<tr>
                                            <td><label>Precio:</label></td>
                                            <td><?php echo number_format($precio,2).' '.convert($tcp);  ?></td>   
                                            <td><label>Moneda:</label></td>
                                            <td><?php echo $currency; ?></td>                                
                                        </tr>
										
									 
										
                                    </tbody></table>

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
			  <div class="mt-4 buyItem">
                <div class="btn btn-success btn-lg btn-flat">
                  <i class="fas fa-cart-plus fa-lg mr-2"></i> 
                  Comprar 
                </div>

                <div class="btn btn-info btn-lg btn-flat">
                  <i class="fas fa-heart fa-lg mr-2 text-white"></i> 
                  Agregar a la lista de deseos
                </div>
              </div>';
				}else{
				echo '
			  <div class="mt-4 buyItem">
                <div class="btn btn-warning btn-lg btn-flat">
                  <i class="far fa-calendar-alt fa-lg mr-2"></i> 
                  Rentar 
                </div>

                <div class="btn btn-info btn-lg btn-flat">
                  <i class="fas fa-heart fa-lg mr-2 text-white"></i> 
                  Agregar a la lista de deseos
                </div>
              </div>';					
					
					
				} 
			  
?>

              <div class="mt-4 product-share">
                <a href="#" class="text-gray">
                 <i class="fab fa-facebook fa-2x"></i>
                </a>
            
                <a href="#" class="text-gray">
                 <i class="fab fa-twitter fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fab fa-instagram  fa-2x"></i>
                </a>
              </div>

            </div>
          </div>
          <div class="row mt-4">
           
          
          </div>
        </div>
        
		<div class="card-body pt-4">
			<h4> Anuncios Similares </h4>
			<hr/>
		   <div class="row similars">
		   </div>
		</div>
		
		<!-- /.card-body -->
      </div>


<div style="margin-top:-1.2em;" class="col-lg-9 p-0">
<div class=" ">

 <div class="card-body">
   <div class="row plist">
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
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="plugins/toastr/toastr.min.js"></script>
<script src="dist/js/demo.js"></script>
<script type="text/javascript">
$('.buyItem').click(function(){ toastr.info('Debe iniciar Seccion para poder ejecutar esta accion'); });
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