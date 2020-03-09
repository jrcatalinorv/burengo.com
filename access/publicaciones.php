<?php 
session_start();
date_default_timezone_set("America/Santo_Domingo");
require_once "../modelos/conexion.php";

$code = rand(1000000,9999999) ;
 
 
$fsDt = date("Y-m-d", strtotime("first day of this month")); 
$lsDt = date("Y-m-d", strtotime("last day of this month")); 
 
/* Total Publicaciones */
$stmt2 = Conexion::conectar()->prepare(" SELECT COUNT(bgo_code) as totalp 
FROM bgo_posts WHERE bgo_status = 1 and bgo_usercode = ".$_SESSION['bgo_userId']."");
$stmt2 -> execute();
$results = $stmt2 -> fetch();
$total_post = number_format($results['totalp']);

/* Vehiculos */
$stmt2 = Conexion::conectar()->prepare(" SELECT COUNT(bgo_code) as totalpv FROM 
bgo_posts WHERE bgo_status = 1 and bgo_usercode = ".$_SESSION['bgo_userId']." and bgo_cat = 1");
$stmt2 -> execute();
$results = $stmt2 -> fetch();
$total_postv = number_format($results['totalpv']);
 
/* Inmnuebles */ 
$stmt2 = Conexion::conectar()->prepare(" SELECT COUNT(bgo_code) as totalpin FROM 
bgo_posts WHERE bgo_status = 1 and bgo_usercode = ".$_SESSION['bgo_userId']." and bgo_cat = 2");
$stmt2 -> execute();
$results = $stmt2 -> fetch();
$total_postin = number_format($results['totalpin']);






/* Visitas del mes */
$stmt4 = Conexion::conectar()->prepare("SELECT COUNT(vstid) as visits FROM bgo_visits WHERE vstdate  
BETWEEN '".$fsDt."' AND '".$lsDt."' AND vst_usercode = ".$_SESSION['bgo_userId']."");
$stmt4 -> execute();
$rest4 = $stmt4 -> fetch(); 



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="../favicon.ico"/>
  <title>Burengo.com</title>
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../dist/css/adminlte.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
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
          <input type="hidden" id="route01" value="1" />
          <input type="hidden" id="route02" value="1" />
          <input type="hidden" id="usrcode" value="<?php echo $_SESSION['bgo_userId']; ?>" />
    
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
                  
                    <button type="button" class="btn btn-success btn-flat" data-toggle="modal" data-target="#modal-default"> <i class="fas fa-plus"></i> Nueva Publicacion </button>
                   
               <div class="btn-group">
                    <button type="button" class="btn btn-info btn-flat"> <i class="fas fa-filter"></i>  Filtrar Categoria  </button>
                    <button type="button" class="btn btn-info btn-flat dropdown-toggle dropdown-icon" data-toggle="dropdown">
                      <span class="sr-only">Toggle Dropdown</span>
                      <div class="dropdown-menu" role="menu">
                        <a class="dropdown-item" href="#">Vehiculos </a>
                        <a class="dropdown-item" href="#"> Inmnuebles </a>
                    </button>
                  </div>
                </div>

              

              </div>
              <!-- /.card-body -->
            </div>

		</div>
	   </div>
	   
	   
	   
	   <div class="row">
		
		
         <div class="col-md-12">
            <div class="card">
    
              <div class="card-body">
           <div class="row plist">
		   		 <?php

$stmt = Conexion::conectar()->prepare(" SELECT p.*, pl.* FROM bgo_posts p
INNER JOIN bgo_places pl ON p.bgo_lugar = pl.pcid 
AND p.bgo_usercode=".$_SESSION['bgo_userId']." ");
$stmt -> execute();
while($results = $stmt -> fetch()){
	
echo '<div class="col-12 col-sm-4 col-md-3 d-flex align-items-stretch itemSelection" itemId="'.$results['bgo_code'].'"">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">';
                  
				   if($results['bgo_subcat']==1){
					   echo '<span class="badge bg-info float-right"> Vehiculos </span>';
				   }else{
					   echo '<span class="badge bg-info float-right"> Inmnuebles </span>';
				   }
			 
				   
               echo '</div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b> '.$results['bgo_title'].'</b></h2>
                  
                      <ul class="ml-4 mb-0 fa-ul text-muted">';
                    
						
						
					if($results['bgo_cat']==1){
						if($results['bgo_subcat']==1){
							echo '<li class="small pt-1"><span class="fa-li"><i class="fas fa-car fa-lg"></i></span> Venta </li>';
						}else{
							echo '<li class="small pt-1"><span class="fa-li"><i class="fas fa-home fa-lg"></i></span> Venta </li>';
						}
					  }else{
							if($results['bgo_subcat']==1){
							echo '<li class="small pt-1"><span class="fa-li"><i class="fas fa-car fa-lg"></i></span> Renta </li>';
							}else{
								echo '<li class="small pt-1"><span class="fa-li"><i class="fas fa-home fa-lg"></i></span> Renta </li>';
							}
						}
						
						echo '<li class="small pt-1"><span class="fa-li"><i class="fas fa-lg fa-dollar-sign"></i></span>'.number_format($results['bgo_price'],2).' '.convert($results['bgo_uom']).' <li>
                      	 <li class="small pt-1"><span class="fa-li"><i class="fas fa-lg fa-map-marker"></i></span>'.$results['pcstr'].'</li> 
                         
					  </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="../media/thumbnails/'.$results['bgo_thumbnail'].'" alt="" class="  img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                     <div class="btn-group">';
                       
						if($results['bgo_status']==1){					   
							echo '<button type="button" class="btn btn-warning inac"><i class="fas fa-power-off"></i> Inactivar </button>';
						}else{
							echo '<button type="button" class="btn btn-success act"><i class="fas fa-power-off"></i>Activar </button>';
                        }
						
						echo '<button type="button" class="btn btn-danger"><i class="fas fa-trash"></i> Borrar </button>
                      </div>
                  </div>
                </div>
              </div>
            </div>';	
}		 
//$stmt ->free_result();
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
 <footer class="main-footer">
    <div class="float-right d-none d-sm-inline"></div>
     Burengo &copy; 2020 - Todos los derechos reservados.  
  </footer>
</div>
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
<script src="../dist/js/demo.js"></script>
<script type="text/javascript">


$('.plist').on("click", "div.itemSelection", function(){ 
	var id = $(this).attr('itemId');
	 alert(id);
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
		case '11': location.href = "../post/vehiculos/datos.php?ccdt="+fcc+"&ccdtm=11"; break;
		case '21': location.href = "../post/vehiculos/datos.php?ccdt="+fcc+"&ccdtm=21"; break;
		case '12': location.href = "../post/inmuebles/datos.php?ccdt="+fcc+"&ccdtm=12"; break;
		case '22': location.href = "../post/inmuebles/datos.php?ccdt="+fcc+"&ccdtm=22"; break;
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