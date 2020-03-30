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
        <link rel="icon" type="image/png" href="../../../favicon.ico"/>
  <title>Burengo</title>
  <link rel="stylesheet" href="../../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../../dist/css/adminlte.css">
  <link rel="stylesheet" href="../../../plugins/toastr/toastr.min.css"> 
</head>
<body class="hold-transition sidebar-mini">
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
 
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-danger elevation-4">
    <a href="" class="brand-link">
       <img src="../../../dist/img/burengoLogo.png" alt="Campus CODEVI Logo" class="brand-image img-circle elevation-0" style="opacity: .8">  
      <span class="brand-text font-weight-light text-danger"> Burengo </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../media/users/<?php echo $_SESSION['bgo_userImg']; ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> <?php echo $_SESSION['bgo_user']; ?> </a>
		 
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item"><a href="dashboard.php" class="nav-link"><i class="nav-icon fas fa-tachometer-alt"></i><p> Dashboard </p></a></li>
          <li class="nav-item"><a href="members.php" class="nav-link"><i class="nav-icon fas fa-users"></i><p> Miembros </p></a></li>
          <li class="nav-item"><a href="all-publications.php" class="nav-link"><i class="nav-icon fas fa-list-alt"></i><p> Publicaciones </p></a></li>
          <li class="nav-item"><a href="planes.php" class="nav-link"><i class="nav-icon fas fa-list"></i><p> Planes </p></a></li>
          <li class="nav-item"><a href="settings.php" class="nav-link active"><i class="nav-icon fas fa-cogs"></i><p> Configuracion</p></a></li>
		  <li class="nav-header"></li>
		  <li class="nav-item"><a href="../salir.php" class="nav-link"><i class="nav-icon fas fa-sign-out-alt text-danger"></i><p> Salir</p></a></li>
		  
		</ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div> <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
	  <div class="row pt-2">
	        <div class="col-md-12">
            <div class="">
        <div class="card-body pb-0 ">
<div class="row d-flex align-items-stretch userList">


 <div class="col-md-3">
            <div id="mv_marcas" class="card">
              <div class="card-body box-profile">
               <div class="text-center"><i class="fas fa-car fa-3x text-info"></i></div>
				<h3 class="profile-username text-center"> Marcas </h3>
              </div>
            </div>      
          </div>

 <div id="mv_modelos" class="col-md-3">
            <div class="card">
              <div class="card-body box-profile">
               <div class="text-center"><i class="fas fa-car fa-3x text-info"></i></div>
				<h3 class="profile-username text-center"> Modelos </h3>
              </div>
            </div>      
          </div>


 <div class="col-md-3">
            <div class="card">
              <div class="card-body box-profile">
               <div class="text-center"><i class="fas fa-calendar-alt fa-3x text-secondary"></i></div>
				<h3 class="profile-username text-center"> Años </h3>
              </div>
            </div>      
          </div>
		  
 <div id="mv_fuel" class="col-md-3">
            <div class="card">
              <div class="card-body box-profile"> 
               <div class="text-center"><i class="fas fa-gas-pump fa-3x text-info"></i></div>
				<h3 class="profile-username text-center"> Combustible </h3>
              </div>
            </div>      
          </div>	 
		  
		  <div id="mv_trans" class="col-md-3">  
            <div class="card">
              <div class="card-body box-profile"> 
               <div class="text-center"><i class="fas fa-oil-can fa-3x text-info"></i></div>
				<h3 class="profile-username text-center"> Transmision </h3>
              </div>
            </div>      
          </div>		  


		<div id="mv_places" class="col-md-3">
            <div class="card">
              <div class="card-body box-profile">
               <div class="text-center"><i class="fas fa-map-marked-alt fa-3x text-info"></i></div>
				<h3 class="profile-username text-center"> Provincias </h3>
              </div>
            </div>      
          </div>
 
 <div id="mv_colors" class="col-md-3">
            <div class="card">
              <div class="card-body box-profile">
               <div class="text-center"><i class="fas fa-palette fa-3x text-info"></i></div>
				<h3 class="profile-username text-center"> Colores </h3>
              </div>
            </div>      
          </div> 
 
 
  <div class="col-md-3">
            <div class="card">
              <div class="card-body box-profile">
               <div class="text-center"><i class="fas fa-cogs fa-3x text-info"></i></div>
				<h3 class="profile-username text-center"> Generales </h3>
              </div>
            </div>      
          </div> 

 
 </div>
		</div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
  
 
	 </div>  
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 
 
 

  <!-- Main Footer -->
  <footer class="main-footer"><strong>Burengo &copy; 2020 </footer>
</div>
<!-- ./wrapper -->
<script src="../../../plugins/jquery/jquery.min.js"></script>
<script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../../dist/js/adminlte.min.js"></script>
<script src="../../../plugins/toastr/toastr.min.js"></script>
<script type="text/javascript">
 $( document ).ready(function() {
  /// $('.userList').load("../ajax/burengo_miembros.php");   
});

$('#mv_marcas').click(function(){location.href="settings-marcas.php";});
$('#mv_modelos').click(function(){location.href="settings-modelos.php";});
$('#mv_fuel').click(function(){location.href="settings-fuel.php";});
$('#mv_trans').click(function(){location.href="settings-transmition.php";});
$('#mv_places').click(function(){location.href="settings-places.php";});
$('#mv_colors').click(function(){location.href="settings-colors.php";});

</script>
</body>
</html>
