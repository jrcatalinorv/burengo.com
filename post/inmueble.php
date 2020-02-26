<?php 

?>

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

		<style type="text/css">
			#dropZone {
				border: 3px dashed #0088cc;
				padding: 50px;
				width: 500px;
				margin-top: 20px;
			}

			#files {
				border: 1px dotted #0088cc;
				padding: 20px;
				width: 800px;
				display: none;
			}

            #error {
                color: red;
            }
		</style>

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
        <li class="nav-item"><a class="nav-link" href="contacto.php">Contacto</a></li>
        <li class="nav-item"><a class="nav-link" href="contacto.php">Mensajes</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php"> Cerrar Session </a></li>
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
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> &nbsp;  <small> </small></h1>
          </div><!-- /.col -->
    
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
        <div class="row">
			<center>
			<br><br>
			<div id="dropZone">
				<h3>Arrastra & Pega los archivos</h3>
				<input type="file" id="fileupload" name="attachments[]" multiple>
			</div>
			<h1 id="error"></h1><br><br>
			<h1 id="progress"></h1><br><br>
			<div id="files"></div>
		</center>
		
       </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
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
 
  $('#op2').click(function(){
	 $(this).removeClass('btn-default');
	 $(this).addClass('btn-warning');
	 $('#op1').removeClass('btn-warning');
	 $('#op1').addClass('btn-default');
 });
 
 $('#uploadFiles').click(function(){
	 location.href="upload/upload.php";
 });
 
$('.plist').on("click", "div.itemSelection", function(){ 
	var id = $(this).attr('itemId');
	location.href="itemview.php?dtcd="+id; 
 
}); 
</script>
</body>
</html>
