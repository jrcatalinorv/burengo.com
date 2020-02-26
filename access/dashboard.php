<?php  
session_start(); 
date_default_timezone_set("America/Santo_Domingo");
$date = (getdate());
$FullDate = $date["year"].''.sprintf("%02d",$date["mon"]).''.sprintf("%02d",$date["mday"]);

 

$fsDt = date("Y-m-d", strtotime("first day of this month")); 
$lsDt = date("Y-m-d", strtotime("last day of this month")); 
$fsSRT = date("d M, Y", strtotime($fsDt));
$lsSRT = date("d M, Y", strtotime($lsDt));

$requisitions = 0;

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
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
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
  <aside class="main-sidebar sidebar-dark-lightblue elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
     <!--  <img src="dist/img/codeviLogo.png" alt="Campus CODEVI Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8"> -->
      <span class="brand-text font-weight-light"> Burengo </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../<?php echo $_SESSION['bgo_userImg'];?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> <?php echo $_SESSION['bgo_user']; ?> </a>
		 
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item"><a href="dashboard.php" class="nav-link active"><i class="nav-icon fas fa-tachometer-alt"></i><p> Dashboard </p></a></li>
          <li class="nav-item"><a href="inquiries.php" class="nav-link"><i class="nav-icon fas fa-list"></i><p> Requisiciones </p></a></li>
          <li class="nav-item"><a href="customers.php" class="nav-link"><i class="nav-icon fas fa-users"></i><p> Clientes </p></a></li>
          <li class="nav-item"><a href="departments.php" class="nav-link"><i class="nav-icon fas fa-tags"></i><p> Departamentos </p></a></li>
          <li class="nav-item"><a href="services.php" class="nav-link"><i class="nav-icon fas fa-th"></i><p> Servicios </p></a></li>
          <li class="nav-item"><a href="invoices.php" class="nav-link"><i class="nav-icon fas fa-file-invoice-dollar"></i><p> Facturacion </p></a></li>
          <li class="nav-item"><a href="calendar.php" class="nav-link"><i class="nav-icon far fa-calendar-alt"></i><p> Agenda </p></a></li>
          <li class="nav-item"><a href="reports.php" class="nav-link"><i class="nav-icon fas fa-folder"></i><p> Reportes</p></a></li>
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
				if($hour["hours"] >= 6 && $hour["hours"] <=12 ){$Saludo = "Buenos Días";   echo '<b><span class="text-info">' .$Saludo.' </span></b>';}
				if($hour["hours"] >= 13 && $hour["hours"] <= 18){$Saludo = "Buenas Tardes"; echo '<b><span class="text-success">'.$Saludo.' </span></b>';}
				if($hour["hours"] >= 19 && $hour["hours"] <= 23 ){$Saludo = "Buenas Noches"; echo '<b><span class="text-muted">' .$Saludo.' </span></b>';}
				if($hour["hours"] >=  0 && $hour["hours"] <= 5 ){$Saludo = "Buenas Noches"; echo '<b><span class="text-muted">' .$Saludo.' </span></b>';}
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
                <h3 id="atRequisitions"> 0 </h3>

                <p>Requisiciones </p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">Ver detalle <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3> <span id="atCpRequisitions">0</span><sup style="font-size: 20px">%</sup></h3>

                <p>Completadas</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">Ver detalle <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner text-white">
                <h3><span id="atIpRequisitions">0</span><sup style="font-size: 20px">%</sup></h3>

                <p>En Proceso</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">Ver detalle <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><span id="atClRequisitions">0</span><sup style="font-size: 20px">%</sup></h3>

                <p>Cancelados</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">Ver detalle <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
       		
	
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
