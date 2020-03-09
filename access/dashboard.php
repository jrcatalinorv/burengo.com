<?php  
session_start(); 
date_default_timezone_set("America/Santo_Domingo");
require_once "../modelos/conexion.php";
$date = (getdate());
$FullDate = $date["year"].''.sprintf("%02d",$date["mon"]).''.sprintf("%02d",$date["mday"]);

 if($_SESSION["bgoSesion"] != "ok"){
	header('location: salir.php'); 
 }
 
$fname = explode(' ',trim($_SESSION['bgo_name'])); 

$fsDt = date("Y-m-d", strtotime("first day of this month")); 
$lsDt = date("Y-m-d", strtotime("last day of this month")); 
//$fsSRT = date("d M, Y", strtotime($fsDt));
//$lsSRT = date("d M, Y", strtotime($lsDt));
 
/* Total de miembros */
$stmt1 = Conexion::conectar()->prepare("SELECT COUNT(uid) as members FROM bgo_users WHERE profile BETWEEN 1 AND 49");
$stmt1 -> execute();
$rest1 = $stmt1 -> fetch();

/* Miembros VIP */ 
$stmt2 = Conexion::conectar()->prepare("SELECT COUNT(uid) as vip FROM bgo_users WHERE profile = 10");
$stmt2 -> execute();
$rest2 = $stmt2 -> fetch();

/* Miembros gratuitos */
$stmt3 = Conexion::conectar()->prepare("SELECT COUNT(uid) as free FROM bgo_users WHERE profile = 1");
$stmt3 -> execute();
$rest3 = $stmt3 -> fetch();  

/* Visitas del mes */
$stmt4 = Conexion::conectar()->prepare("SELECT COUNT(vstid) as visits FROM bgo_visits WHERE vstdate  BETWEEN '".$fsDt."' AND '".$lsDt."'");
$stmt4 -> execute();
$rest4 = $stmt4 -> fetch(); 

/* Publicaciones */
$stmt5 = Conexion::conectar()->prepare("SELECT COUNT(bgo_code) as posts FROM dcdvoqzc_mpro.bgo_posts where bgo_status = 1");
$stmt5 -> execute();
$rest5 = $stmt5 -> fetch();  

/* Publicaciones Carros */
$stmt6 = Conexion::conectar()->prepare("SELECT COUNT(bgo_code) as cars FROM dcdvoqzc_mpro.bgo_posts where bgo_status = 1 and bgo_subcat = 1");
$stmt6 -> execute();
$rest6 = $stmt6 -> fetch();  
 
/* Publicaciones Inmuebles  */
$stmt7 = Conexion::conectar()->prepare("SELECT COUNT(bgo_code) as estate FROM dcdvoqzc_mpro.bgo_posts where bgo_status = 1 and bgo_subcat = 2");
$stmt7 -> execute();
$rest7 = $stmt7 -> fetch();  

/* Publicaciones Inmuebles  */
$stmt8 = Conexion::conectar()->prepare("SELECT COUNT(bgo_code) as others FROM dcdvoqzc_mpro.bgo_posts where bgo_status = 1 and bgo_subcat = 3");
$stmt8 -> execute();
$rest8 = $stmt8 -> fetch(); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Campus CODEVI</title>
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini sidebar-collapse">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark bg-navy">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>
  <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    <!-- Notifications Dropdown Menu -->
		 <li class="nav-item dropdown"  ><a class="nav-link"  href="#"><i class="fas fa-th"></i>   </a></li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-danger elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
       <img src="../dist/img/burengoLogo.png" alt="Campus CODEVI Logo" class="brand-image img-circle elevation-0"
           style="opacity: .8">  
      <span class="brand-text font-weight-light text-danger"> Burengo </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../media/users/<?php echo $_SESSION['bgo_userImg']; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> <?php echo $_SESSION['bgo_user']; ?> </a>
		 
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item"><a href="dashboard.php" class="nav-link active"><i class="nav-icon fas fa-tachometer-alt"></i><p> Dashboard </p></a></li>
          <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon fas fa-users"></i><p> Miembros </p></a></li>
          <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon fas fa-list-alt"></i><p> Publicaciones </p></a></li>
          <li class="nav-item"><a href="#" class="nav-link"><i class="nav-icon fas fa-list"></i><p> Planes </p></a></li>
          <li class="nav-item"><a href="services.php" class="nav-link"><i class="nav-icon fas fa-car"></i><p> Vehiculos </p></a></li>
          <li class="nav-item"><a href="invoices.php" class="nav-link"><i class="nav-icon fas fa-th"></i><p> Inmuebles </p></a></li>
          <li class="nav-item"><a href="settings.php" class="nav-link"><i class="nav-icon fas fa-cogs"></i><p> Configuracion</p></a></li>
		  <li class="nav-header"></li>
		  <li class="nav-item"><a href="salir.php" class="nav-link"><i class="nav-icon fas fa-sign-out-alt text-danger"></i><p> Salir</p></a></li>
		  
		</ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
			<?php 
				$hour = (getdate());
				if($hour["hours"] >= 6 && $hour["hours"] <=12 ){$Saludo = "Buenos Días";   echo '<b><span class="text-info">' .$Saludo.', '.$fname[0].' </span></b>';}
				if($hour["hours"] >= 13 && $hour["hours"] <= 18){$Saludo = "Buenas Tardes"; echo '<b><span class="text-success">'.$Saludo.', '.$fname[0].' </span></b>';}
				if($hour["hours"] >= 19 && $hour["hours"] <= 23 ){$Saludo = "Buenas Noches"; echo '<b><span class="text-muted">' .$Saludo.', '.$fname[0].' </span></b>';}
				if($hour["hours"] >=  0 && $hour["hours"] <= 5 ){$Saludo = "Buenas Noches"; echo '<b><span class="text-muted">' .$Saludo.', '.$fname[0].' </span></b>';}
			?>
			</small>
			   <input id="stdate" type="hidden" value="<?php echo $fsDt;  ?>" />
           <input id="nddate" type="hidden" value="<?php echo $lsDt;  ?>" />
 
		 
          </h1>
			
          </div><!-- /.col -->
       
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
	  
	  <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 id="atRequisitions"> <?php echo number_format($rest1['members']); ?> </h3>

                <p> Miembros </p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="#" class="small-box-footer">Ver detalle <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3> <span id="atCpRequisitions"> <?php echo number_format($rest2['vip']); ?></span> </h3>

                <p> Cuentas VIP </p>
              </div>
              <div class="icon">
               <i class="fas fa-trophy"></i>
              </div>
              <a href="#" class="small-box-footer">Ver detalle <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner text-white">
                <h3><span id="atIpRequisitions"><?php echo number_format($rest3['free']); ?></span> </h3>

                <p>  Cuentas Gratuitas </p>
              </div>
              <div class="icon">
                <i class="far fa-flag"></i>
              </div>
              <a href="#" class="small-box-footer">Ver detalle <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><span id="atClRequisitions"> <?php echo number_format($rest4['visits']); ?> </span> </h3>

                <p> Visitas del Mes </p>
              </div>
              <div class="icon">
                <i class="fas fa-chart-area"></i>
              </div>
              <a href="#" class="small-box-footer">Ver detalle <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
       		
	
		</div>
	
	<div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-lightblue elevation-1"><i class="fas fa-list-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"> Publicaciones  </span>
                <span class="info-box-number">
                  <?php echo number_format($rest5['posts']); ?>
                  
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-lightblue elevation-1"><i class="fas fa-car"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Vehiculos </span>
                <span class="info-box-number"><?php echo number_format($rest6['cars']); ?> </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-lightblue elevation-1"><i class="fas fa-th"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Inmuebles </span>
                <span class="info-box-number"><?php echo number_format($rest7['estate']); ?> </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-lightblue elevation-1"><i class="fas fa-archive"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"> Otros </span>
                <span class="info-box-number"> <?php echo number_format($rest8['others']); ?> </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>		
		
 
	
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
       version 1.0.0.1
    </div>
    <!-- Default to the left -->
    <strong>Campus CODEVI &copy; 2020
  </footer>
</div>
<!-- ./wrapper -->
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- PAGE SCRIPTS -->
 
<script type="text/javascript">
$( document ).ready(function() {
 
});

 
</script>
</body>
</html>
