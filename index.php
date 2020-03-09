<?php
session_start(); 
date_default_timezone_set("America/Santo_Domingo");
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
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css"> 
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed">
<div class="wrapper">
 <nav class="main-header navbar navbar-expand-md navbar-dark bg-navy"> 
    <div class="container">
      <a href="index.php" class="navbar-brand">
          <img src="dist/img/burengo.png" alt="Burengo Logo" class="brand-image   elevation-0" style="opacity: .8">  
      </a>
     
      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav"> </ul>
      </div>

      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item"><a class="nav-link" href="#">Contacto</a></li>
        <li class="nav-item"><a class="nav-link" href="acceder.php">Acceder / Registarse </a></li>
      </ul>
    </div>
  </nav>

  <div class="content-wrapper">
    <div class="content-header">
      <div class="  ">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">
<input id="fcd" type="hidden" value="<?php echo $code; ?>" />			
			<input id="route01" type="hidden" value="0" />
			<small> </small></h1>
          </div>
        </div>
      </div>
    </div>

    <div class="content">
      <div class="">
        <div class="row">
          <div class="col-lg-3">
		  	<div class="card">
              <div class="card-body p-0">
              <div class="btn-group col-lg-12 p-0 viewFilter">
				  <button id="op0" name="op0" class="btn btn-lg btn-warning viewOption" view="0"><i class="fas fa-th"></i> Todos </button>
				  <button id="op1" name="op1" class="btn btn-lg btn-default viewOption" view="1"><i class="fas fa-car"></i> Vehiculos </button>
				  <button id="op2" name="op2" class="btn btn-lg btn-default viewOption" view="2"><i class="fas fa-home"></i> Inmuebles </button>
               </div>
              </div>
            </div> 
			
			 
            <div id="btnCompras" class="info-box bg-gradient-success">
              <span class="info-box-icon"><i class="fas fa-wallet"></i></span>
              <div class="info-box-content">
                <span class="info-box-number"> <br/> <h4>Comprar</h4></span><br/>
              </div>
            </div>
		  
	         <div id="btnRentas"class="info-box bg-gradient-warning">
              <span class="info-box-icon"><i class="far fa-calendar-alt"></i> </span>
              <div class="info-box-content">
                <span class="info-box-number"><br/> <h4>Rentar</h4> </span><br/>
              </div>
            </div>
          </div>

<div style="margin-top:-1.2em;" class="col-lg-9 p-0">
<div class="">
 <div class="card-body">
   <div class="row plist">
   </div>
 </div>
</div>  
</div>
  
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<footer class="main-footer">
    <div class="float-right d-none d-sm-inline"></div>
    Burengo &copy; 2020 - Todos los derechos reservados.  
  </footer>
</div>


<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/toastr/toastr.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$('.plist').load('ajax/burengo_select.php?typo='+$('#route01').val());	
	
});



$('.viewFilter').on('click', 'button.viewOption', function(){
	var option = $(this).attr('view');
	var active = $('#route01').val();
	
	/* OLD */
	$('#op'+active).removeClass('btn-warning');
	$('#op'+active).addClass('btn-default');
	
	/* New */
	$('#op'+option).removeClass('btn-default');
	$('#op'+option).addClass('btn-warning');
	$('#route01').val(option);
	
	$('.plist').load('ajax/burengo_select.php?typo='+$('#route01').val());		
});
 
$('.plist').on("click", "div.itemSelection", function(){ 
	var id = $(this).attr('itemId');
	var cat = $(this).attr('itemCat');
	
	switch(cat){
		case '1': location.href="vehiculos.php?dtcd="+id; break;
		case '2': location.href="inmuebles.php?dtcd="+id; break;
	} 
}); 




$('#btnCompras').click(function(){
var rt = $('#route01').val();
switch(rt){
	case '1': location.href="buy/vehiculos.php"; break;
	case '2': location.href="buy/inmuebles.php"; break;
	default: toastr.info('Seleccione una categoria: Vehiculos o Inmuebles '); break;
}	
	
});

$('#btnRentas').click(function(){
var rt = $('#route01').val();
switch(rt){
	case '1': location.href="rent/vehiculos.php"; break;
	case '2': location.href="rent/inmuebles.php"; break;
	default: break;
}	
	
});

 
</script>
</body>
</html>