

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Burengo.com</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
    <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
 <nav class="main-header navbar navbar-expand-md navbar-light navbar-warning"> 
    <div class="container">
      <a href="#" class="navbar-brand">
        <!-- <img src="dist/img/AdminLTELogo.png" alt="Burengo Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8"> -->
        <span class="brand-text">Buren<span class="text-danger">go</span></span>
      </a>
     
      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav"> </ul>
      </div>

     <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item"><a class="nav-link" href="index.php"> Portada </a></li>
        <li class="nav-item"><a class="nav-link" href="contacto.php"> Contacto  </a></li>
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
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
	 <center>
	 <div class="login-box">
  <div class="login-logo">
     
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class=" "> <h4>Nuevo Usuario </h4> </p>

      <div action="#"><br/>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Nombre Completo">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="far fa-id-badge">    </span>
            </div>
          </div>
        </div>        
		
		<div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Nombre de Usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>		
		
		<div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Correo electronico">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
		
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Escribir Contrasena">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>        
		
		<div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Confirmar Contrasena">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
         
          <!-- /.col -->
          <div class="col-12">
            <button type="button" class="btn btn-success btn-block"> Acceder </button>
          </div>
          <!-- /.col -->
        </div>
      </div>

      <div class="social-auth-links text-center mb-3">
        <p>-   -</p>
        <a href="#" class="btn btn-block btn-secondary">
           Olvide la Contrasena 
        </a>
        <a href="acceder.php" class="btn btn-block btn-warning">
           Iniciar Seccion  
        </a>
      </div>
      <!-- /.social-auth-links -->

     
     
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<br/>
<br/>
<br/>
	 </center>
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
 });
 
 
 
 
</script>
</body>
</html>
