<?php 
session_start();
date_default_timezone_set("America/Santo_Domingo");
require_once "../modelos/conexion.php";
require_once "../modelos/data.php";

$code = rand(1000000,9999999) ;
$fsDt = date("Y-m-d", strtotime("first day of this month")); 
$lsDt = date("Y-m-d", strtotime("last day of this month")); 


$stmt = Conexion::conectar()->prepare(" SELECT COUNT(bgo_code) as totalpv FROM bgo_posts WHERE bgo_usercode = '".$_SESSION['bgo_userId']."'");
$stmt -> execute();
$results = $stmt-> fetch();
$total_postv = number_format($results['totalpv']);

/* Todal destacadas compradas */
$stmt2 = Conexion::conectar()->prepare(" SELECT COUNT(bgo_code) as totalD FROM bgo_posts WHERE bgo_usercode = '".$_SESSION['bgo_userId']."' and bgo_status = 9");
$stmt2 -> execute();
$results2 = $stmt2-> fetch();
$total_desc = intval($results2['totalD']);

/* Destacadas permitidas */
$stmt3 = Conexion::conectar()->prepare(" SELECT * FROM bgo_user_plan WHERE up_uid = '".$_SESSION['bgo_userId']."'");
$stmt3 -> execute();
$results3 = $stmt3-> fetch();
$total_desc_permitidas = intval($results3['up_destacadas']);


$desc_allow = $total_desc_permitidas - $total_desc;


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="icon" type="image/png" href="../../favicon.ico"/>
  <title>Burengo.com</title>
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.css">
  <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">  
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed">
<div class="wrapper">
 <nav class="main-header navbar navbar-expand-md navbar-dark bg-navy"> 
    <div class="container">
      <a href="inicio.php" class="navbar-brand">
         <img src="../../dist/img/burengo.png" alt="Burengo Logo" class="brand-image   elevation-0" style="opacity: .8">  
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
          <i class="fas fa-bars fa-lg"></i>
           
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
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
          <a href="mail/inbox.php" class="dropdown-item">
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <input type="hidden" id="route01" value="1" />
          <input type="hidden" id="route02" value="1" />
          <input type="hidden" id="usrcode" value="<?php echo $_SESSION['bgo_userId']; ?>" />
		  <input id="planTotalP" type="hidden" value="<?php echo $total_postv; ?>" />  
		  <input id="planMaxP" type="hidden" value="<?php echo $_SESSION['bgo_maxP']; ?>" />  
		  <input id="planMaxD" type="hidden" value="<?php echo $desc_allow; ?>" />   
		  <input id="getStatus" type="hidden" value="<?php echo $_SESSION['bgo_perfil']; ?>" /> 
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
       
	   <div class="row">
		<div class="col-md-12"><input id="fcd" type="hidden" value="<?php echo $code; ?>" />
		<div class="card"> 
              <div class="card-body">
                <div class="margin">
                    <button id="btnPublicar" type="button" class="btn btn-success btn-flat"> <i class="fas fa-plus"></i> Nueva Publicacion </button>
               <div class="btn-group">
                    <button type="button" class="btn btn-info btn-flat"> <i class="fas fa-filter"></i>  Filtrar Categoria  </button>
                    <button type="button" class="btn btn-info btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                      <span class="sr-only">Toggle Dropdown</span>
                      <div class="dropdown-menu" role="menu">
                        <a id="all" class="dropdown-item"> Todos </a>
                        <a id="vh" class="dropdown-item"> Vehiculos </a>
                        <a id="in" class="dropdown-item"> Inmnuebles </a>
                    </button>
                  </div>
                </div>
              </div>
            </div>
		</div>
	   </div>
	   
	   <div class="row">
         <div class="col-md-12">
            <div class="card">
              <div class="card-body">
           <div class="row plist"> </div>
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

<div id="modalTriggerMaxOut" data-toggle="modal" data-target="#modal-planMaxOut"></div>
<div id="modalTriggerMaxOutDesc" data-toggle="modal" data-target="#modal-planMaxOutDesc"></div>
<div id="modalTriggerPublicar" data-toggle="modal" data-target="#modal-default"></div>
<div id="modalTriggerDelete" data-toggle="modal" data-target="#modal-delete"></div>

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
<div class="modal fade" id="modal-planMaxOut">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">  </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
				<h5 class="text-center"> <i class="fas fa-exclamation-triangle text-danger fa-3x"></i> </h5> <br/>
				<h5 class="text-center"> Usted ha excedido el máximo de publicaciones permitido de su plan  <span class="text-info"> <?php echo $_SESSION['bgo_planName']; ?></span>. Para adquirir publicaciones extra o un nuevo plan puede acceder a <a href="planes.php" class="text-success"> Ver Planes </a>.</h5>
				<h1> &nbsp; </h1>
            </div>
		  
			
          </div>
        </div>
</div>

<div class="modal fade" id="modal-planMaxOutDesc">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">  </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
				<h5 class="text-center"> <i class="fas fa-exclamation-triangle text-danger fa-3x"></i> </h5> <br/>
				<h5 class="text-center"> Usted ha excedido el máximo de publicaciones Destacadas adquiridas. Para adquirir publicaciones extra. <a href="destacar.php" class="text-success"> Ver Planes </a>.</h5>
				<h1> &nbsp; </h1>
            </div>
		  
			
          </div>
        </div>
</div>



<div class="modal fade" id="modal-delete">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"> Confirmación </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
				<input id="modalPostID" class="form-control" type="hidden" />
				<h3 class="text-info text-center"> ¿Está seguro que desea borrar esta publicación? </h3>
			
            </div>
			 <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal"> No, Cancelar </button>
              <button id="proccedDelete" type="button" class="btn btn-success"> Sí , Bórrarla! </button>
            </div>
			
          </div>
        </div>
      </div>
 
 
 
 <footer class="main-footer"> Burengo &copy; 2020 - Todos los derechos reservados. </footer>
</div>
<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script src="../../dist/js/demo.js"></script>
<script src="../../plugins/toastr/toastr.min.js"></script>
<script type="text/javascript">
$('.plist').load('../ajax/burengo_select_mypublications.php?typo=0');
$('#all').click(function(){  $('.plist').load('../ajax/burengo_select_mypublications.php?typo=0');  });
$('#vh').click(function(){  $('.plist').load('../ajax/burengo_select_mypublications.php?typo=1');  });
$('#in').click(function(){  $('.plist').load('../ajax/burengo_select_mypublications.php?typo=2');  });

$('.plist').on("click", "button.changeStatus", function(){
	var id = $(this).attr('itemId');
	var st  = $(this).attr('ns');
$.getJSON('../ajax/burengo_update_stp.php',{
		pid: id,
	 status: st
	},function(data){
		switch(data['ok']){
			case 0: toastr.error('ERROR! No se guardaron los cambios los datos: '+ data['err']); break;
			case 1: location.href=""; break;
		}
	});	
});


$('.plist').on("click", "button.edit", function(){
	var id = $(this).attr('itemId');
	var sb = $(this).attr('tp');
	var sbs = $(this).attr('tps');
	var pls = sbs+sb; 
 
	switch(pls){
		case '11': location.href = "post/vehiculos/sale/edit-datos.php?ccdt="+id+"&pth=2"; break;
		case '21': location.href = "post/vehiculos/rent/edit-datos.php?ccdt="+id+"&pth=2"; break;
		case '12': location.href = "post/inmuebles/sale/edit-datos.php?ccdt="+id+"&pth=2"; break;
		case '22': location.href = "post/inmuebles/rent/edit-datos.php?ccdt="+id+"&pth=2"; break;	
		
	} 
});


$('.plist').on("click","button.deletePost", function(){
  var id= $(this).attr("itemId");
  $('#modalPostID').val(id);
  $('#modalTriggerDelete').click();
});


$('.plist').on("click","button.dest", function(){
  var id = $(this).attr("itemId");
  var count = $('#planMaxD').val();
  var st = $('#getStatus').val();
  var op = 1;    
  
if(count > 0){
$.getJSON('../ajax/burengo_update_destacada.php',{
	pid: id,
	status: st,
	option: op
	},function(data){
		switch(data['ok']){
			case 0: toastr.error('ERROR! No se guardaron los cambios los datos: '+ data['err']); break;
			case 1: location.href=""; break;
		}
	});	


  }	else{
	$('#modalTriggerMaxOutDesc').click();	
  }
	
 
 
});




$('#proccedDelete').click(function(){
var id = $('#modalPostID').val();	
$.getJSON('../ajax/burengo_delete_post.php',{
		pid: id
	},function(data){
		switch(data['ok']){
			case 0: toastr.error('ERROR! No se guardaron los cambios los datos: '+ data['err']); break;
			case 1: location.href=""; break;
		}
	});		
	
});


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
		case '12': location.href = "post/inmuebles/sale/datos.php?ccdt="+fcc+"&ccdtm=12"; break;
		case '22': location.href = "post/inmuebles/rent/datos.php?ccdt="+fcc+"&ccdtm=22"; break;
	 }
 });
 
 
$('#btnPublicar').click(function(){
	var total = parseInt($('#planTotalP').val());
	var max   = parseInt($('#planMaxP').val());  
	if(total < max ){
		$('#modalTriggerPublicar').click();
	}else{
		$('#modalTriggerMaxOut').click();
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