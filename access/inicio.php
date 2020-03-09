<?php 
session_start();
date_default_timezone_set("America/Santo_Domingo");

$code = rand(1000000,9999999) ;

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
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed">
<div class="wrapper">
 <nav class="main-header navbar navbar-expand-md navbar-dark bg-navy"> 
    <div class="container">
      <a href="inicio.php" class="navbar-brand">
        <img src="../dist/img/burengo.png" alt="Burengo Logo" class="brand-image   elevation-0" style="opacity: .8">  
      </a>
      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <ul class="navbar-nav"> </ul>
      </div>

     <!-- Right navbar links -->
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
  <!-- /.navbar -->

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h5 class="m-0">  
          <input type="hidden" id="route00" value="0" />
          <input type="hidden" id="route01" value="1" />
          <input type="hidden" id="route02" value="1" />
			<input type="hidden" id="usrcode" value="<?php echo $_SESSION['bgo_userId']; ?>" />
			<input id="fcd" type="hidden" value="<?php echo $code; ?>" />
			<small class="float-right"> <a href="#">  </a> </small></h5>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <div class="content">
      <div class=" ">
        <div class="row">
          <div class="col-lg-3">
		  	<div class="card  ">
              <div class="card-body p-0">
              <div class="btn-group col-lg-12 p-0 viewFilter">
				  <button id="op0" name="op0" class="btn btn-lg btn-warning viewOption" view="0"><i class="fas fa-th"></i> Todos </button>
				  <button id="op1" name="op1" class="btn btn-lg btn-default viewOption" view="1"><i class="fas fa-car"></i> Vehiculos </button>
				  <button id="op2" name="op2" class="btn btn-lg btn-default viewOption" view="2"><i class="fas fa-home"></i> Inmuebles </button>
               </div>
              </div>
            </div>  
			
			<!-- Main content -->			
            <div id="btnCompras" class="info-box bg-gradient-success">
              <span class="info-box-icon"><i class="fas fa-wallet"></i></span>
              <div class="info-box-content">
                <span class="info-box-number"> <br/> <h4>Comprar</h4></span>
              <br/>
              </div>
            </div>
            <!-- /.info-box-content -->
			  
	         <div id="btnRentas"class="info-box bg-gradient-warning">
              <span class="info-box-icon"><i class="far fa-calendar-alt"></i> </span>
              <div class="info-box-content">
                <span class="info-box-number"><br/> <h4>Rentar</h4> </span>
               <br/>
              </div>
            </div>
			 <!-- /.info-box-content -->
          </div>

          <!-- /.col-md-6 -->
            <div style="margin-top:-1.2em;" class="col-lg-9 p-0">
<div class="">
 <div class="card-body">
   <div class="row p-0 plist">
 
 
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
				<button id="opr1" class="btn btn-sm btn-warning"><i class="fa fa-car"></i> Vehiculos </button>
				<button id="opr2" class="btn btn-sm btn-default"> <i class="fa fa-th"></i> Inmuebles </button>
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
 
 

  <!-- Main Footer -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-inline"></div>
    Burengo &copy; 2020 - Todos los derechos reservados.  
  </footer>
</div>
<!-- ./wrapper -->

<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../plugins/toastr/toastr.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
<script src="../dist/js/demo.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$('.plist').load('../ajax/burengo_select_acc.php?typo='+$('#route00').val());
});

$('.viewFilter').on('click', 'button.viewOption', function(){
	var option = $(this).attr('view');
	var active = $('#route00').val();
	/* OLD */
	$('#op'+active).removeClass('btn-warning');
	$('#op'+active).addClass('btn-default');
	/* New */
	$('#op'+option).removeClass('btn-default');
	$('#op'+option).addClass('btn-warning');
	$('#route00').val(option);
	/* Charge Options */
	$('.plist').load('../ajax/burengo_select_acc.php?typo='+$('#route00').val());			
});

$('#btnCompras').click(function(){
var rt = $('#route01').val();
switch(rt){
	case '1': alert("compras de vehiculos!"); break;
	case '2': alert("compras de Inmuebles!"); break;
	default: toastr.info('Seleccione una categoria: Vehiculos o Inmuebles '); break;
}		
});

$('#btnRentas').click(function(){
var rt = $('#route01').val();
switch(rt){
	case '1': alert("Renta de vehiculos!"); break;
	case '2': alert("Renta de Inmuebles!"); break;
	default: toastr.info('Seleccione una categoria: Vehiculos o Inmuebles '); break;
}	
	
});

$('.plist').on("click", "div.itemSelection", function(){ 
	var id = $(this).attr('itemId');
	var cat = $(this).attr('itemCat');
	
	switch(cat){
		case '1': location.href="vehiculos.php?dtcd="+id; break;
		case '2': location.href="inmuebles.php?dtcd="+id; break;
	} 
}); 


$('#opr1').click(function(){
	 $(this).removeClass('btn-default');
	 $(this).addClass('btn-warning');
	 $('#opr2').removeClass('btn-warning');
	 $('#opr2').addClass('btn-default');
	 $('#route02').val(1);
});
 
$('#opr2').click(function(){
	 $(this).removeClass('btn-default');
	 $(this).addClass('btn-warning');
	 $('#opr1').removeClass('btn-warning');
	 $('#opr1').addClass('btn-default');
	 $('#route02').val(2);
});
 
$('#opv1').click(function(){
	 $(this).removeClass('btn-default');
	 $(this).addClass('btn-warning');
	 $('#opv2').removeClass('btn-warning');
	 $('#opv2').addClass('btn-default');
	 $('#route01').val(1);
});
 
$('#opv2').click(function(){
	 $(this).removeClass('btn-default');
	 $(this).addClass('btn-warning');
	 $('#opv1').removeClass('btn-warning');
	 $('#opv1').addClass('btn-default');
	 $('#route01').val(2);
});

$('#uploadFiles').click(function(){
	 var rt1 = $('#route01').val();
	 var rt2 = $('#route02').val();
	 var fullRoute = rt1+rt2;
	 var fcc = $('#fcd').val();
	 
	 switch(fullRoute){
		case '11': location.href = "post/vehiculos/sale/datos.php?ccdt="+fcc; break;
		case '21': location.href = "post/vehiculos/rent/datos.php?ccdt="+fcc; break;
		case '12': location.href = "post/inmuebles/datos.php?ccdt="+fcc+"&ccdtm=12"; break;
		case '22': location.href = "post/inmuebles/datos.php?ccdt="+fcc+"&ccdtm=22"; break;
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