<?php 
date_default_timezone_set("America/Santo_Domingo");
require_once "../modelos/conexion.php";



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
      <a href="../index.php" class="navbar-brand">
        <span class="brand-text">Buren<span class="text-danger">go</span></span>
      </a>
      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <ul class="navbar-nav"> </ul>
      </div>

      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item"><a class="nav-link" href="../index.php"> Portada </a></li>
        <li class="nav-item"><a class="nav-link" href="../acceder.php">Acceder / Registarse </a></li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">  
			<input id="route01" type="hidden" value="1" />
			<small> </small></h1>
          </div><!-- /.col -->
    
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
		
          <div class="col-lg-12">
		  
		  	<div class="card">
              <div class="card-body p-0">
               <div class="row">
                
                </div>
              </div>
            </div> 
			<input id="route01" type="hidden" value="1" />
          </div>
          <!-- /.col-md-6 -->
            <div class="col-lg-12">
<div class="card">
 <div class="card-body plist">
   <div class="row">
<?php

$stmt = Conexion::conectar()->prepare(" SELECT * FROM bgo_posts 
WHERE bgo_status = 1 
and bgo_cat = 1 and bgo_subcat = 2");
$stmt -> execute();
while($results = $stmt -> fetch()){

echo '<div class="col-lg-3 col-md-6 visit mb-3 itemSelection" itemId="'.$results['bgo_code'].'" data-aos="fade-up">
      <img src="../media/thumbnails/'.$results['bgo_thumbnail'].'" alt="Image placeholder" class="img-fluid rounded"> 
      <div style="overlay; z-index:999; margin-top:-2em;"> <span class="badge bg-warning">$'.number_format($results['bgo_price'],2).' </span></div>
	  <h5 class="pt-2"> 
		  '.$results['bgo_title'].'    
		<small class="float-right pt-1"> '.$results['bgo_lugar'].' </small>
	  </h5>
      <div class="reviews-star float-left">   
      </div>
 </div>';
}		 
			 
			 
			 
			 ?>
              <!-- /.card-header -->
             
         
		  
        
        
         


         
        
          
                  
		  		  
		  

        </div>
      
              </div>
              <!-- /.card-body -->
		           

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
	location.href="itemview.php?dtcd="+id; 
}); 




$('#btnCompras').click(function(){
var rt = $('#route01').val();
switch(rt){
	case '1': location.href="buy/vehiculos.php"; break;
	case '2': location.href="buy/inmuebles.php"; break;
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
