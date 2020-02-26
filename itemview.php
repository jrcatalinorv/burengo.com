<?php 
date_default_timezone_set("America/Santo_Domingo");
require_once "modelos/conexion.php";

$code = $_REQUEST["dtcd"];


$stmt = Conexion::conectar()->prepare(" SELECT * FROM bgo_posts WHERE bgo_status = 1 and bgo_code = '".$code."'");
$stmt -> execute();
if($results = $stmt -> fetch()){

	

$desc = $results['bgo_title'];
$precio =  $results['bgo_price'] ;
$motor = 'N/A';
$color ="N/A";
$tipo = 'N/A';
$thumpnail = "media/thumbnails/".$results['bgo_thumbnail'];
$subcat = intval($results['bgo_cat']);
$tcp = $results['bgo_uom'];
$img = array('0000.jpg','0000.jpg','0000.jpg','0000.jpg','0000.jpg');

 	}else{
	
			$desc = "*** NOT FOUND ***";
			$precio = '0';
			$motor = 'N/A';
			$color ="N/A";
			$tipo = 'N/A';
			$img = array('0000.jpg','0000.jpg','0000.jpg','0000.jpg','0000.jpg'); 
	 
	
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Burengo.com</title>
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
<style>  
.Hideme{
	display:none;
}
</style>  
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
<!-- Navbar -->
 <nav class="main-header navbar navbar-expand-md navbar-light navbar-warning"> 
    <div class="container">
      <a href="inicio.php?id=202002162143-8789" class="navbar-brand">
        <!-- <img src="dist/img/AdminLTELogo.png" alt="Burengo Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <span class="brand-text">Buren<span class="text-danger">go</span></span>
      </a>
	  <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav"> </ul>
      </div>
      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item"><a class="nav-link" href="index.php">Portada</a></li>
        <li class="nav-item"><a class="nav-link" href="acceder.php">Acceder / Registarse </a></li>
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
          <div class="col-sm-12">
            
			
			     <h5 class="m-0">  
			 
          </div><!-- /.col -->
    
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
		  <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none"> </h3>
              <div class="col-12">
                <img src="<?php echo $thumpnail ?>" class="product-image" alt="Product Image">
              </div>
              <div class="col-12 product-image-thumbs">
                <div class="product-image-thumb active"><img src="media/vehiculos/<?php echo $img[1]; ?>" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="media/vehiculos/<?php echo $img[2]; ?>" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="media/vehiculos/<?php echo $img[3]; ?>" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="media/vehiculos/<?php echo $img[4]; ?>" alt="Product Image"></div>
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3"> <?php echo $desc; ?> </h3>
              <p>  </p>

              <hr>
              <h4>Datos Generales </h4>
  <div class="p-0">

                             

                                    <table class="table table-sm">
                                        <tbody><tr>
                                            <td><label> Tipo:</label></td>
                                            <td colspan="3">  
<?php 
if($subcat==1){
	echo " Disponible para Compra";
}else{
	echo " Disponible para Renta";	
}

?>

											</td>                                
                                        </tr>
                                        <tr>
                                            <td><label>Motor:</label></td>
                                            <td colspan="3"><?php echo $motor; ?></td>                                
                                        </tr>
                                        <tr>
                                            <td><label>Color:</label></td>
                                            <td><?php echo $color; ?></td> 
                                            <td><label>Tipo:</label></td>
                                            <td><?php echo $tipo; ?></td> 
                                        </tr>
                                        <tr>
                                            <td><label>Interior:</label></td>
                                            <td>-</td> 
                                            <td><label>Uso:</label></td>
                                            <td>N/D Mi</td>
                                        </tr>
                                        <tr>
                                            <td><label>Combustible:</label></td>
                                            <td>-</td>

                                            <td><label>Carga:</label></td>
                                            <td>N/D Lb</td> 
                                        </tr>
                                        <tr>
                                            <td><label>Transmisión:</label></td>
                                            <td>-</td> 

                                            <td><label>Puertas:</label></td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td><label>Tracción:</label></td>
                                            <td>-</td>   
                                            <td><label>Pasajeros:</label></td>
                                            <td>-</td>                                
                                        </tr>
                                    </tbody></table>

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
                 <i class="fab fa-facebook-square fa-2x"></i>
                </a>
            
                <a href="#" class="text-gray">
                 <i class="fab fa-twitter-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fab fa-instagram-square fa-2x"></i>
                </a>
              </div>

            </div>
          </div>
          <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true"> <h3> - </h3> </a>
                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false"> - </a>
                <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">- </a>
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> 
			  <div class="detail-ad-info-specs-block">

                                    
 

                            </div>
			  </div>
              <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">  <br/><br/><br/><br/><br/><br/><br/><br/> </div>
              <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> <br/> <br/><br/><br/><br/><br/><br/><br/><br/> </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

		
		 
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
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

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script type="text/javascript">
 
 
 
 
$('.buyItem').click(function(){
	
	toastr.error('ERROR! No se pudo procesar la informacion');
});
 
 
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