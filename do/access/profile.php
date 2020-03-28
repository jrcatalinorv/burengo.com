<?php 
session_start();
date_default_timezone_set("America/Santo_Domingo");
require_once "../modelos/conexion.php";

$code = rand(1000000,9999999) ;
 
 
$fsDt = date("Y-m-d", strtotime("first day of this month")); 
$lsDt = date("Y-m-d", strtotime("last day of this month")); 
 
/* Total Publicaciones */
$stmt2 = Conexion::conectar()->prepare(" SELECT COUNT(bgo_code) as totalp 
FROM bgo_posts WHERE bgo_status = 1 and bgo_usercode = '".$_SESSION['bgo_userId']."'");
$stmt2 -> execute();
$results = $stmt2 -> fetch();
$total_post = $results['totalp'];

/* Vehiculos */
$stmt2 = Conexion::conectar()->prepare(" SELECT COUNT(bgo_code) as totalpv FROM 
bgo_posts WHERE bgo_status = 1 and bgo_usercode = '".$_SESSION['bgo_userId']."' and bgo_subcat = 1");
$stmt2 -> execute();
$results = $stmt2 -> fetch();
$total_postv = number_format($results['totalpv']);
 
/* Inmnuebles */ 
$stmt2 = Conexion::conectar()->prepare(" SELECT COUNT(bgo_code) as totalpin FROM 
bgo_posts WHERE bgo_status = 1 and bgo_usercode = '".$_SESSION['bgo_userId']."' and bgo_subcat = 2");
$stmt2 -> execute();
$results = $stmt2 -> fetch();
$total_postin = number_format($results['totalpin']);

/* Visitas del mes */
$stmt4 = Conexion::conectar()->prepare("SELECT COUNT(vstid) as visits FROM bgo_visits WHERE vstdate  
BETWEEN '".$fsDt."' AND '".$lsDt."' AND vst_usercode = '".$_SESSION['bgo_userId']."'");
$stmt4 -> execute();
$rest4 = $stmt4 -> fetch(); 


$stmt5 = Conexion::conectar()->prepare("SELECT u.*, p.*, pl.* FROM bgo_users u 
INNER JOIN bgo_places p  ON u.provinvia = p.pcid 
INNER JOIN bgo_planes pl ON u.profile = pl.planid AND u.uid = '".$_SESSION['bgo_userId']."'");
$stmt5 -> execute();
$rest5 = $stmt5 -> fetch(); 

$stmt6 = Conexion::conectar()->prepare("SELECT * FROM bgo_user_plan WHERE up_uid = '".$rest5["uid"]."'"); 
$stmt6 -> execute();
$rest6 = $stmt6 -> fetch();


$pu_rest = intval($rest6["up_maxp"]) - intval($total_post) ; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="icon" type="image/png" href="../../favicon.ico"/>
  <title>Burengo</title>
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.css">
  <style>
  .bgo_top{
	 
  }
@media only screen and (max-width: 600px) {
.bgo_top{
	margin-top: 2rem; 
  }
	
}  
</style>
  
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed">
<div class="wrapper">

  <!-- Navbar -->
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
          <a href="#" class="dropdown-item">
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
          <input type="hidden" id="usrcode" value="<?php echo $_SESSION['bgo_userId']; ?>" />
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3"><input id="fcd" type="hidden" value="<?php echo $code; ?>" />
            <div class="card">
              <div class="card-body box-profile">
                <div class="text-center"><img class="profile-user-img img-fluid img-circle" src="../media/users/<?php echo $_SESSION['bgo_userImg']; ?>" alt="User profile picture"></div>
                <h3 class="profile-username text-center"> <?php echo $_SESSION['bgo_name']; ?>  </h3>
                <p class="text-muted text-center">  
					<?php if($_SESSION['bgo_perfil'] > 1){
					
							if($_SESSION['bgo_perfil'] == 4){
									echo '<i class="fas fa-trophy fa-2x text-success"></i>'; 
							}else{
								echo '<i class="fas fa-trophy fa-2x text-primary"></i>';
							}
					
					}else{
						echo '<i class="far fa-flag fa-2x text-primary"></i>'; 
					}
					?>
				</p>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item"><b>Total Publicaciones </b> <a class="float-right"> <?php echo $total_post; ?></a></li>
				  <li class="list-group-item"><b>Vehiculos </b> <a class="float-right"><?php echo $total_postv; ?></a></li>                     
				  <li class="list-group-item"><b>Inmnuebles </b> <a class="float-right"><?php echo $total_postin; ?></a></li>                  
				  <li class="list-group-item"><b> Visitas del mes </b> <a class="float-right"> <?php echo number_format($rest4['visits']); ?>  </a></li>
                </ul>
			   </div>
            </div>
          
	  
		  </div>
          <!-- /.col -->
          <div class="col-md-6">
<div class="card">
  
        <div class="card-body" style="display: block;">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-1 order-md-1">
              <h5 class=""> Datos Personales </h5>
              <div class="text-muted">
                <p class="text-sm">Nombre Completo:<b class="d-block"> <?php echo $rest5["name"]; ?></b></p>
                <p class="text-sm">Cedula<b class="d-block"> <?php echo $rest5["ced"]; ?></b></p>                
				<p class="text-sm">Telefono Principal <b class="d-block"> <?php echo $rest5["phone"]; ?></b></p>                
				<p class="text-sm">Dirreccion
                  <b class="d-block"> <?php echo $rest5["addr"]; ?> </b>
                  <b class="d-block"> <?php echo $rest5["pcstr"].', Republica Dominicana '; ?> </b>
                </p>				
				<p class="text-sm">Email<b class="d-block"> <?php echo $rest5["email"]; ?></b></p>
				<p class="text-sm"><i class="fab fa-lg fa-whatsapp"></i> <?php echo $rest5["bgo_whatsapp"]; ?></b></p>
				<p class="text-sm"><i class="fab fa-lg fa-instagram"></i> <?php echo $rest5["bgo_instagram"]; ?></b></p>
				<p class="text-sm"><i class="fab fa-lg fa-facebook"></i> <?php echo $rest5["bgo_facebook"]; ?></b></p>
              </div>
 
          </div>
			 
			 <div class="col-12 col-md-12 col-lg-4 order-2 order-md-2 float-right">
			 <h5 class="bgo_top"> Informacion de Cuenta  </h5>
              <div class="row">
                <div class="col-12 col-sm-12 bgo_top">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted"> Plan </span>
                      <span class="info-box-number text-center text-muted mb-0"> <?php echo $rest5["planname"]; ?> <span>
                    </div>
                  </div>
                </div>
                </div>
				
				       <div class="row">
                <div class="col-12 col-sm-12">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted"> Fecha de Expiracion </span>
                      <span class="info-box-number text-center text-muted mb-0"> <?php echo $rest6["up_expdate"]; ?> <span>
                    </div>
                  </div>
                </div>
                </div>
				
				 <div class="row">
                <div class="col-12 col-sm-12">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted"> Publicaciones Permitidas </span>
                      <span class="info-box-number text-center text-muted mb-0"> <?php if($rest6["up_maxp"]==99999){ echo "Ilimitadas"; }else{ echo $rest6["up_maxp"]; }  ?> </span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-12">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted"> Plublicaciones Pend. </span>
                      <span class="info-box-number text-center text-muted mb-0"> <?php if($rest6["up_maxp"]==99999){ echo " - "; }else{ echo $pu_rest; }  ?> <span>
                    </span></span></div>
                  </div>
                </div>
              </div>
           </div>
			
			
          </div>
        </div>
        <!-- /.card-body -->
		
		
		<div class="card-footer">
                <button  type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-pass"> <i class="fas fa-lock"></i> Cambiar Clave </button>
			  	<button  type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-datos"> <i class="fas fa-user"></i> Editar datos </button>
			  	<button  type="button" class="btn btn-success btn-sm" > <i class="fas fa-trophy"></i>  <?php if($_SESSION['bgo_perfil'] > 1){ echo " Ver Planes Disponibles";  } else{ echo "Cambiar Cuenta Premium";  }   ?> </button>
           
                </div>
		
      </div> 

 </div>
          <!-- /.col -->
        </div>
       


	   <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
  <!-- /.content-wrapper -->

 

   <div class="modal fade" id="modal-pass">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Cambiar Contraseña </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
				<div class="form-group"><input type="password" class="form-control" id="password0" placeholder="Clave Actual"></div>
				<div class="form-group"><input type="password" class="form-control" id="password1" placeholder="Nueva Clave"></div>
				<div class="form-group"><input type="password" class="form-control" id="password2" placeholder="Confirmar Clave"></div> 
            </div>
			 <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal"> Cerrar </button>
              <button id="changePass" type="button" class="btn btn-success"> Aceptar </button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.modal -->

<footer class="main-footer"> Burengo &copy; 2020 - Todos los derechos reservados. </footer>
</div>
<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script src="../../dist/js/demo.js"></script>
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
	 var fcc = $('#fcd').val();
	 
	 switch(fullRoute){
		case '11': location.href = "../post/vehiculos/datos.php?ccdt="+fcc+"&ccdtm=11"; break;
		case '21': location.href = "../post/vehiculos/datos.php?ccdt="+fcc+"&ccdtm=11"; break;
		case '12': location.href = "../post/inmueble.php?ccdt="+fcc+"&ccdtm=12"; break;
		case '22': location.href = "../post/inmueble.php?ccdt="+fcc+"&ccdtm=12"; break;
	 }
 });
 
 
$('#changePass').click(function(){
	var original = $("#password0").val(); 
	var newpass  = $("#password1").val();
	var conpass  = $("#password2").val(); 
	
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