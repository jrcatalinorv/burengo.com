<?php 
session_start();
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
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed">
<div class="wrapper">
 <nav class="main-header navbar navbar-expand-md navbar-dark bg-navy"> 
    <div class="container">
      <a href="#" class="navbar-brand">
            <img src="dist/img/burengo.png" alt="Burengo Logo" class="brand-image   elevation-0" style="opacity: .8">  
      
      </a>    
      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
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
      <p class=" "> <h3>Inicio de Seccion</h3> </p>

      <div action="#"><br/>
        <div class="input-group mb-3">
          <input id="user" type="text" class="form-control" placeholder="Usuario" />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="pass" type="password" class="form-control" placeholder="Contrasena">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
         
          <!-- /.col -->
          <div class="col-12">
            <button id="login" type="button" class="btn btn-success btn-block"> Acceder </button>
          </div>
          <!-- /.col -->
        </div>
      </div>

      <div class="social-auth-links text-center mb-3">
        <p>-   -</p>
        <a href="#" class="btn btn-block btn-secondary">
           Olvide la Contrasena 
        </a>
        <a href="registro.php" class="btn btn-block btn-info">
           Registrarse 
        </a>        
		
		<p class="pt-2 text-info"><dt> Accesos temporales </dt></p>
		
		<a id="adminview" href="#" class="btn btn-block btn-outline-danger">
            *** Entrar como Admin *** 
        </a>		
		
		<a id="customerview" href="#" class="btn   btn-block btn-outline-danger">
           *** Entrar como Cliente 1*** 
        </a>		
		
		<a id="customerview2" href="#" class="btn   btn-block btn-outline-danger">
           *** Entrar como Cliente 2*** 
        </a>
      </div>
      <!-- /.social-auth-links -->

     
     
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
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
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/toastr/toastr.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
<script type="text/javascript">
var input = document.getElementById("pass");
input.addEventListener("keyup", function(event) {
  if (event.keyCode === 13) {
   event.preventDefault();
   document.getElementById("login").click();
  }
});


$('#login').click(function(){
$.getJSON('ajax/login.php',{			  	 
	usr: $('#user').val(),	    	 
	pass: $('#pass').val() 	 
	},function(data){
	   switch(data['ok'])
		{
			case 0: 
				 toastr.error('Usuario o Clave Incorrectos ');
				 $('#user').val("");
				 $('#pass').val("");
			  break;
			case 1:  window.location = "access/"+data['url']; break;		
		 }
	});				 
}); 
 

 

$('#adminview').click(function(){
	$('#user').val('admin');
	$('#pass').val('12345');
	$('#login').click();
});


$('#customerview').click(function(){
	$('#user').val('user-test');
	$('#pass').val('12345');
	$('#login').click();
});


$('#customerview2').click(function(){
	$('#user').val('claudiaf');
	$('#pass').val('12345');
	$('#login').click();
});

</script>
</body>
</html>
