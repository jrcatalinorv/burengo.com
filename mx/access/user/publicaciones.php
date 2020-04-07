<?php 
session_start();
date_default_timezone_set("America/Santo_Domingo");
require_once "../../modelos/conexion.php";
//require_once "modelos/functions.php";

$usr = $_REQUEST['user'];


 /*Buscar datos del Usuario */
$stmt2 = Conexion::conectar()->prepare("SELECT * FROM bgo_users WHERE uid = '".$usr."'"); 
$stmt2 -> execute();  
$rslts = $stmt2 -> fetch();
$use_img = $rslts["img"];
$use_nombre = $rslts["name"]; 
$use_phone = $rslts["phone"]; 
$email = $rslts["email"]; 
$whatsapp = "".$rslts["bgo_whatsapp"]; 
$instagram ="".$rslts["bgo_instagram"]; 
$facebook = "".$rslts["bgo_facebook"]; 

 



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="icon" type="image/png" href="../../../favicon.ico"/>
  <title>Burengo.com</title>
  <link rel="stylesheet" href="../../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../../dist/css/adminlte.css">
<style>  
.Hideme{
	display:none;
}

.burengo-img-grid{
	width: 250px; 
	height:180px;
}

</style>  
  
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed">
<div class="wrapper">
 <nav class="main-header navbar navbar-expand-md navbar-dark bg-navy"> 
    <div class="container">
      <a href="index.php" class="navbar-brand">
         <img src="../../../dist/img/burengo.png" alt="Burengo Logo" class="brand-image   elevation-0" style="opacity: .8">  
      </a>
      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <ul class="navbar-nav"> </ul>
      </div>
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
	 
		
	 
		 		<li class="nav-item dropdown show">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
          <i class="fas fa-bars fa-lg"></i> </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          
		 	  
		  <div class="dropdown-divider"></div>	
		  <a href="../inicio.php" class="dropdown-item">
            <i class="fas fa-th mr-2"></i> Portada  
          </a>
          <div class="dropdown-divider"></div>		  
          <a href="../publicaciones.php" class="dropdown-item">
            <i class="far fa-list-alt mr-2"></i> Mis publicaciones 
          </a>
          <div class="dropdown-divider"></div>
          <a href="../profile.php" class="dropdown-item">
            <i class="far fa-id-badge mr-2"></i> Cuenta    
          </a>
          <div class="dropdown-divider"></div>
          <a href="../mensajes-recibidos.php" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> Mensajes
          </a>
          <div class="dropdown-divider"></div>
          <a href="../salir.php" class="dropdown-item"> <i class="fas fa-sign-out-alt text-danger mr-2"></i> Cerrar Session </a>
        </di
	 
   
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
	   <div class="col-md-3 pt-2">

            <!-- Profile Image -->
            <div class="card">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="../../media/users/<?php echo $use_img; ?>" alt="User profile picture">
                </div>
                <h3 class="profile-username text-center"> </h3>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item"><b><i class="fas fa-lg fa-id-badge"></i></b> <?php echo $use_nombre; ?> </li>
                  <li class="list-group-item"><b><i class="fas fa-lg fa-phone"></i></b> <?php echo $use_phone; ?> </li>
                  <li class="list-group-item"><b><i class="fas fa-lg fa-envelope"></i></b> <?php echo $email; ?> </li>
                  <li class="list-group-item"><b><i class="fab fa-lg fa-whatsapp"></i></b> <?php echo $whatsapp; ?></li>
                  <li class="list-group-item"><b><i class="fab fa-lg fa-instagram"></i></b> <?php echo $instagram; ?> </li>
                  <li class="list-group-item"><b><i class="fab fa-lg fa-facebook"></i></b> <?php echo $facebook; ?> </li>
                </ul>

              
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

      </div>
	   
	   
         <div class="col-md-9 pt-2">
            <div class="card">
              <div class="card-body">
           <div class="row plist">
		   		 <?php

$stmt = Conexion::conectar()->prepare(" SELECT p.*, pl.* FROM bgo_posts p 
INNER JOIN bgo_places pl ON p.bgo_lugar = pl.pcid AND p.bgo_status = 1 AND 
bgo_usercode = '".$usr."'");

$stmt -> execute();
while($results = $stmt -> fetch()){
echo '<div class="col-lg-3 visit itemSelection" itemId="'.$results['bgo_code'].'" itemCat="'.$results['bgo_subcat'].'" data-aos="fade-up">';
      

	  echo '<div class=" p-2"><img  src="../../media/thumbnails/'.$results['bgo_thumbnail'].'" alt="Image placeholder" class="img-fluid burengo-img-grid"> 
      <div style="z-index:999; margin-top:-2em;">'; 
if($results['bgo_cat']==1){	  
	 echo '<span class="badge bg-success">$'.number_format($results['bgo_price'],2).' '.$results['bgo_uom'].' </span></div>';
}else{
	 echo '<span class="badge bg-warning">$'.number_format($results['bgo_price'],2).' '.$results['bgo_uom'].' </span></div>';
}	  
	  echo '<h5 class="pt-2"> 
		  <small>'. $results['bgo_title'] .'</small>';  
		echo '<br/>
		<small class="float-left"> <i class="fas fa-map-marker-alt"></i> '.$results['pcstr'].'  </small>
		<small>'; 
			if($results['bgo_cat']==1){
				echo '<span class="badge bg-success float-right "> Venta';   
					if($results['bgo_subcat']==1){
						echo ' <i class="fas fa-car"></i> ';
					}else{
						echo ' <i class="fas fa-home"></i> ';
					}
				echo '</span>';
			}else{
				echo ' <span class="badge bg-warning float-right"> Renta';  
					if($results['bgo_subcat']==1){
						echo ' <i class="fas fa-car"></i> ';
					}else{
						echo ' <i class="fas fa-home"></i> ';
					}

				echo '</span>';
			}
					
		echo '</small> </h5>
      <div class="reviews-star float-left">   
      </div>
 </div> </div>'; 	
 
}		 
 
 ?>
  </div>
 </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
  <!-- /.content-wrapper -->

   <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Nueva Publicacion </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <div class="col-md-12">
			<div class="btn-group btn-group-lg col-md-12">
				<button id="opv1" class="btn btn-sm btn-warning"><i class="fas fa-wallet"></i> Vender </button>
				<button id="opv2" class="btn btn-sm btn-default"> <i class="far fa-calendar-alt"></i> Rentar </button>
			</div>
			<hr/>
			<div class="btn-group btn-group-lg col-md-12">
				<button id="op1" class="btn btn-sm btn-warning"><i class="fa fa-car"></i> Vehiculos </button>
				<button id="op2" class="btn btn-sm btn-default"> <i class="fa fa-th"></i> Inmuebles </button>
			</div>
		</div>
			
            </div>
			 <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal"> Cerrar </button>
              <button id="uploadFiles" type="button" class="btn btn-success"> Aceptar </button>
            </div>
			
          </div>
        </div>
      </div>
 <footer class="main-footer"> Burengo &copy; 2020 - Todos los derechos reservados. </footer>
</div>
<script src="../../../plugins/jquery/jquery.min.js"></script>
<script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../../dist/js/adminlte.min.js"></script>
<script src="../../../dist/js/demo.js"></script>
<script type="text/javascript">


 

$('.plist').on("click", "div.itemSelection", function(){ 
	var id = $(this).attr('itemId');
	var cat = $(this).attr('itemCat');
	
	switch(cat){
		case '1': location.href="../vehiculos.php?dtcd="+id; break;
		case '2': location.href="../inmuebles.php?dtcd="+id; break;
	} 
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