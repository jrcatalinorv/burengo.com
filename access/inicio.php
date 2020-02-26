<?php 
session_start();
date_default_timezone_set("America/Santo_Domingo");
require_once "../modelos/conexion.php";
$code = "";
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
 <nav class="main-header navbar navbar-expand-md navbar-light navbar-warning"> 
    <div class="container">
      <a href="inicio.php" class="navbar-brand">
        <span class="brand-text">Buren<span class="text-danger">go</span></span>
      </a>
     
      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav"> </ul>
      </div>

     <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item"><a class="nav-link" href="#"> <i class="fas fa-list-alt"> </i> Mis Publicaciones</a></li>
        <li class="nav-item"><a class="nav-link" href="salir.php"> Cerrar Session </a></li>
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
			<input id="route01" type="hidden" value="1" />
			<small class="float-right"> <a href="#"><i class="fas fa-user"></i> <?php echo $_SESSION['bgo_user']; ?> </a> </small></h5>
          </div><!-- /.col -->
    
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
		
          <div class="col-lg-3">
		  
		  	<div class="card">
              <div class="card-body p-0">
               

       <div class="btn-group btn-group-lg">
				<button id="op1" class="btn btn-sm btn-warning"><i class="fas fa-car"></i> Vehiculos </button>
				<button id="op2" class="btn btn-sm btn-default"> <i class="fas fa-th"></i> Inmuebles </button>
			</div>
              </div>
            </div> 
			
			  
            <div id="btnCompras" class="info-box bg-gradient-success">
              <span class="info-box-icon"><i class="fas fa-wallet"></i></span>
              <div class="info-box-content">
                <span class="info-box-number"> <br/> <h4>Comprar</h4></span>

              <br/>
              
              </div>
              <!-- /.info-box-content -->
            </div>
		  
	         <div id="btnRentas"class="info-box bg-gradient-warning">
              <span class="info-box-icon"><i class="far fa-calendar-alt"></i> </span>
              <div class="info-box-content">
                <span class="info-box-number"><br/> <h4>Rentar</h4> </span>
               <br/>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
 
            <!-- /.info-box -->
         
			 

          </div>
          <!-- /.col-md-6 -->
            <div class="col-lg-9">
<div class="card">
 <div class="card-body plist">
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
<!-- /.card-header -->
   </div>
 </div>
		   </div>  
          </div>
          <!-- /.col-md-6 -->
  
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
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script type="text/javascript">
 $('#op1').click(function(){
	 $(this).removeClass('btn-default');
	 $(this).addClass('btn-warning');
	 $('#op2').removeClass('btn-warning');
	 $('#op2').addClass('btn-default');
	 $('#route01').val(1);
 });
 
  $('#op2').click(function(){
	 $(this).removeClass('btn-default');
	 $(this).addClass('btn-warning');
	 $('#op1').removeClass('btn-warning');
	 $('#op1').addClass('btn-default');
	 $('#route01').val(2);
 });
 
 
$('.plist').on("click", "div.itemSelection", function(){ 
	var id = $(this).attr('itemId');
	location.href="itemsview.php?dtcd="+id; 
}); 




$('#btnCompras').click(function(){
var rt = $('#route01').val();
switch(rt){
	case '1': alert("compras de vehiculos!"); break;
	case '2': alert("compras de Inmuebles!"); break;
	default: 
	
	break;
}	
	
});

$('#btnRentas').click(function(){
var rt = $('#route01').val();
switch(rt){
	case '1': alert("Renta de vehiculos!"); break;
	case '2': alert("Renta de Inmuebles!"); break;
	default: break;
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