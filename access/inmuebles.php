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
	 
	$thumpnail = "../../media/thumbnails/".$results['bgo_thumbnail'];
	$subcat = intval($results['bgo_cat']);
	$tcp = $results['bgo_uom'];
	$currency = $results['cur_code']; 
	$img = array($thumpnail,'0000.jpg','0000.jpg','0000.jpg','0000.jpg');
	$addr = $results['bgo_addr']; 
	$place = $results['pcstr']; 
	$terreno = $results['bgo_terreno'];
	$construccion = $results['bgo_construccion'];
	$niveles = $results['bgo_niveles'];
	$rooms = $results['bgo_rooms'];
	$baths = $results['bgo_bath'];
	$garage = $results['bgo_parqueos'];
	
	

 
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="icon" type="image/png" href="../favicon.ico"/>
  <title>Burengo</title>
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../dist/css/adminlte.css">
  <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
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
      <a href="inicio.php" class="navbar-brand">
          <img src="../dist/img/burengo.png" alt="Burengo Logo" class="brand-image   elevation-0" style="opacity: .8"> 
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
		  <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-default">
            <i class="fas fa-cloud-upload-alt mr-2" ></i> Publicar   
          </a>		  
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
          <a href="mensajes-recibidos.php" class="dropdown-item">
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
		  <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none"> </h3>
              <div class="col-12">
                <img src="../media/vehiculos/<?php echo $img[0]; ?>" class="product-image" alt="Product Image">
              </div>
              <div class="col-12 product-image-thumbs">
                <div class="product-image-thumb active"><img src="../media/vehiculos/<?php echo $img[0]; ?>" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="../media/vehiculos/<?php echo $img[2]; ?>" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="../media/vehiculos/<?php echo $img[3]; ?>" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="../media/vehiculos/<?php echo $img[4]; ?>" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="../media/vehiculos/<?php echo $img[4]; ?>" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="../media/vehiculos/<?php echo $img[4]; ?>" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="../media/vehiculos/<?php echo $img[4]; ?>" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="../media/vehiculos/<?php echo $img[4]; ?>" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="../media/vehiculos/<?php echo $img[4]; ?>" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="../media/vehiculos/<?php echo $img[4]; ?>" alt="Product Image"></div>
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
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
<script src="../plugins/toastr/toastr.min.js"></script>
<script src="../dist/js/demo.js"></script>
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