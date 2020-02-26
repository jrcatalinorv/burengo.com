<?php 
date_default_timezone_set("America/Santo_Domingo");
require_once "../modelos/conexion.php";

$stmt2 = Conexion::conectar()->prepare(" SELECT COUNT(bgo_code) as totalp FROM bgo_posts WHERE bgo_status = 1 and bgo_usercode = '202002162143-8789'");
$stmt2 -> execute();
$results = $stmt2 -> fetch();
$total_post = number_format($results['totalp']);

$stmt2 = Conexion::conectar()->prepare(" SELECT COUNT(bgo_code) as totalpv FROM 
bgo_posts WHERE bgo_status = 1 and bgo_usercode = '202002162143-8789' and bgo_cat = 1");
$stmt2 -> execute();
$results = $stmt2 -> fetch();
$total_postv = number_format($results['totalpv']);
 
$stmt2 = Conexion::conectar()->prepare(" SELECT COUNT(bgo_code) as totalpin FROM 
bgo_posts WHERE bgo_status = 1 and bgo_usercode = '202002162143-8789' and bgo_cat = 2");
$stmt2 -> execute();
$results = $stmt2 -> fetch();
$total_postin = number_format($results['totalpin']);


?>

<!DOCTYPE html>
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
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
 <nav class="main-header navbar navbar-expand-md navbar-light navbar-warning"> 
    <div class="container">
      <a href="inicio.php" class="navbar-brand">
        <span class="brand-text">Buren<span class="text-danger">go</span></span>
      </a>
      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <ul class="navbar-nav"> </ul>
      </div>
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
          <input id="route01" value="1" />
          <input id="route02" value="1" />
          <input id="rcode" value="202002162143-8789" />
    
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
        <div class="row">
		
		
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-warning card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="../dist/img/user8-128x128.jpg" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"> Administrator </h3>

                <p class="text-muted text-center"> - </p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Total Publicaciones </b> <a class="float-right"> <?php echo $total_post; ?></a>
                  </li>
				  
                  <li class="list-group-item">
                    <b>Vehiculos </b> <a class="float-right"><?php echo $total_postv; ?></a>
                  </li>                     
				  
				  <li class="list-group-item">
                    <b>Inmnuebles </b> <a class="float-right"><?php echo $total_postin; ?></a>
                  </li>                  
				 
				  <li class="list-group-item">
                    <b> Visitas a publicaciones  </b> <a class="float-right"> - </a>
                  </li>
                </ul>

				<button  type="button" class="btn btn-block bg-gradient-warning btn-lg" data-toggle="modal" data-target="#modal-default"> Crear Publicacion</button>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

         
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-warning card-outline">
    
              <div class="card-body">
           <div class="row">
		   		 <?php

$stmt = Conexion::conectar()->prepare(" SELECT * FROM bgo_posts WHERE bgo_status = 1");
$stmt -> execute();
while($results = $stmt -> fetch()){
echo '<div class="col-lg-3 col-md-6 visit mb-3 itemSelection" itemId="'.$results['bgo_code'].'" data-aos="fade-up">';
      

	  echo '<img src="../media/thumbnails/'.$results['bgo_thumbnail'].'" alt="Image placeholder" class="img-fluid rounded"> 
      <div style="z-index:999; margin-top:-2em;"> <span class="badge bg-warning">$'.number_format($results['bgo_price'],2).' '.convert($results['bgo_uom']).' </span></div>
	  <h5 class="pt-2"> 
		  '.$results['bgo_title'].'';


		  
		echo '<br/>
		<small class="float-left"> '.$results['bgo_lugar'].'  </small>
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
 </div>';
 

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
				<button id="#" class="btn btn-sm btn-warning"><i class="fas fa-wallet"></i> Vender </button>
				<button id="#" class="btn btn-sm btn-default"> <i class="far fa-calendar-alt"></i> Rentar </button>
			</div>
			<hr/>
			<div class="btn-group btn-group-lg col-md-12">
				<button id="op1" class="btn btn-sm btn-default"><i class="fa fa-car"></i> Vehiculos </button>
				<button id="op2" class="btn btn-sm btn-default"> <i class="fa fa-th"></i> Inmuebles </button>
			</div>
		</div>
			
            </div>
			 <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal"> Cerrar </button>
              <button id="uploadFiles" type="button" class="btn btn-success"> Aceptar </button>
            </div>
			
          </div>
		 
		 
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
    
    </div>
    <!-- Default to the left -->
    Burengo &copy; 2020 - Todos los derechos reservados.  
  </footer>
</div>
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
<script src="../dist/js/demo.js"></script>
<script type="text/javascript">
 $('#op1').click(function(){
	 $(this).removeClass('btn-default');
	 $(this).addClass('btn-warning');
	 $('#op2').removeClass('btn-warning');
	 $('#op2').addClass('btn-default');
	 $('#route02').val(1);
 });
 
  $('#op2').click(function(){
	 $(this).removeClass('btn-default');
	 $(this).addClass('btn-warning');
	 $('#op1').removeClass('btn-warning');
	 $('#op1').addClass('btn-default');
	 $('#route02').val(2);
 });
 
 $('#uploadFiles').click(function(){
	 var rt1 = $('#route01').val();
	 var rt2 = $('#route02').val();
	 var fullRoute = rt1+rt2;
	 
	 switch(fullRoute){
		case '11': location.href = "../post/vehiculo.php?hdmi="+$('#rcode').val(); break;
		case '12': location.href = "../post/inmueble.php?hdmi="+$('#rcode').val(); break;
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