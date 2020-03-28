<?php
require_once "modelos/conexion.php";
$stmt = Conexion::conectar()->prepare("SELECT * FROM bgo_cpinfo WHERE cpcode = 'bgo'");
$stmt -> execute();
$results = $stmt -> fetch();

?>
<!DOCTYPE html>
<html>
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
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
 <nav class="main-header navbar navbar-expand-md navbar-dark bg-navy"> 
    <div class="container">
      <a href="" class="navbar-brand">
            <img src="../dist/img/burengo.png" alt="Burengo Logo" class="brand-image   elevation-0" style="opacity: .8">  
      
      </a>    
      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <ul class="navbar-nav"> </ul>
      </div>

     <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
         <li class="nav-item"><a class="nav-link" href="../do"> Portada </a></li>
        <li class="nav-item"><a class="nav-link" href="acceder.php">Iniciar Session</a></li>
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
<div class="row">
          <div class="col-md-3">

           
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Acerca de Nosostros </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
				<p><strong><i class="fas fa-building mr-1"></i></strong> <span class="text-muted"> <?php echo $results["cpname"]; ?></span></p><hr>
				<p><strong><i class="fas fa-envelope mr-1"></i></strong> <span class="text-muted"><?php echo $results["cpemail"]; ?></span></p><hr>
				<p><strong><i class="fas fa-map-marker-alt mr-1"></i></strong> <span class="text-muted"><?php echo $results["cpaddr"]; ?></span></p><hr>
				<p><strong><i class="fas fa-phone mr-1"></i></strong> <span class="text-muted"><?php echo $results["cpphone"]; ?></span></p><hr> 
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-info">
              <div class="card-header">
               <h3 class="card-title"> <i class="fas fa-envelope-open-text"></i> Envianos un Mensaje </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nombre </label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" placeholder="Nombre">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Correo</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Correo ">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Telefono</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="Telefono ">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label"> Comentario </label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder=" "></textarea>
                        </div>
                      </div>
                    
                   
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-success"> <i class="fab fa-telegram-plane"></i> Enviar </button>
                        </div>
                      </div>
                    </form>
                 
                 
              
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>     

	 <!-- /.row -->
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