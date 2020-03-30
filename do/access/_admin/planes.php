<?php  
session_start(); 
date_default_timezone_set("America/Santo_Domingo");
require_once "../../modelos/conexion.php";
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
  <link rel="stylesheet" href="../../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="../../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark bg-navy">
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
       <img src="../../../../dist/img/burengoLogo.png" alt="Campus CODEVI Logo" class="brand-image img-circle elevation-0" style="opacity: .8">  
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
          <li class="nav-item"><a href="planes.php" class="nav-link active"><i class="nav-icon fas fa-list"></i><p> Planes </p></a></li>
          <li class="nav-item"><a href="settings.php" class="nav-link"><i class="nav-icon fas fa-cogs"></i><p> Configuracion</p></a></li>
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
		           <div class="row plist">
		   		 <?php


 
$stmt = Conexion::conectar()->prepare("SELECT * FROM bgo_planes WHERE planstatus = 1");
$stmt -> execute();

 
while($results = $stmt -> fetch())
{ 

if($results["plantypo"]==1){
 echo '
 <div class="col-md-3">
            <div class="card card-primary card-outline choice" pn="'.$results["planid"].'"  nm ="'.$results["planname"].'" pr="'.$results["planprice"].'"  dr="'.$results["planduration"].'"  />
              <div class="card-body box-profile">
               
				<h3 class="profile-username text-center"> '.$results["planname"].' </h3>
				
				<br/>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Precio </b> <a class="float-right">$'.number_format($results["planprice"],2).' '.$results["plancurrency"].' </a>
                  </li>
                  <li class="list-group-item">
                    <b>Duracion</b> <a class="float-right">'.$results["planduration"].' Dias</a>
                  </li>
                  <li class="list-group-item">
                    <b>Publicacions </b> <a class="float-right"> ';
						if($results["planmaxp"]==0){
							echo "Ilimitadas";
						}else{
						  echo $results["planmaxp"];	 	
						}
						echo ' </a>
                  </li>                  
				  <li class="list-group-item">
                    <b>Fotos </b> <a class="float-right"> '.$results["planmaxf"].' </a>
                  </li>
                </ul>

                  </div>
            </div>      
          </div>
 ';	
}else{
 echo '
 <div class="col-md-3">
            <div class="card card-success card-outline choice" pn="'.$results["planid"].'"  nm ="'.$results["planname"].'" pr="'.$results["planprice"].'"  dr="'.$results["planduration"].'" >
              <div class="card-body box-profile">
              
				<h3 class="profile-username text-center"> '.$results["planname"].' </h3>
				
				<br/>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Precio </b> <a class="float-right">$'.number_format($results["planprice"],2).' '.$results["plancurrency"].' </a>
                  </li>
                  <li class="list-group-item">
                    <b>Duracion</b> <a class="float-right">'.$results["planduration"].' Dias</a>
                  </li>
                  <li class="list-group-item">
                    <b>Publicacions </b> <a class="float-right"> ';
						if($results["planmaxp"]==0){
							echo "Ilimitadas";
						}else{
						  echo $results["planmaxp"];	 	
						}
						echo ' </a>
                  </li>                  
				  <li class="list-group-item">
                    <b>Fotos </b> <a class="float-right"> '.$results["planmaxf"].' </a>
                  </li>
                </ul>

              </div>
            </div>      
          </div>
 ';	
	
}


}		 
 
 ?>
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

 
 

<div id="triggerEditarPlan"  data-toggle="modal" data-target="#modal-editar-plan"  > </div>
<div class="modal fade" id="modal-editar-plan">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"> Editar Plan </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
         <div class="modal-body">	
		  
		 
        
          <input type="hidden" id="modalPlanID" /> 
        		  
		<div class="form-group row">
          <label for="inputEmail3" class="col-sm-4 col-form-label">Plan</label>
          <div class="col-sm-8"><input type="text" class="form-control" id="planName"></div>
        </div>		
		<div class="form-group row">
          <label for="inputEmail3" class="col-sm-4 col-form-label">Precio ($USD)</label>
          <div class="col-sm-8"><input type="text" class="form-control" id="planPrice"></div>
        </div>	
		<div class="form-group row">
          <label for="inputEmail3" class="col-sm-4 col-form-label">Duracion (Dias)</label>
          <div class="col-sm-8"><input type="text" class="form-control" id="planDuration"></div>
        </div>

		  
	    </div>
		            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal"> Cancelar </button>
            <button type="button" class="btn btn-warning"> Actualizar </button>
            </div>
		
		
  </div>
  </div>
</div>

  
 
 

  <!-- Main Footer -->
  <footer class="main-footer"><strong>Burengo &copy; 2020 </footer>
</div>
<!-- ./wrapper -->
<script src="../../../plugins/jquery/jquery.min.js"></script>
<script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../../dist/js/adminlte.min.js"></script>
<script src="../../../plugins/toastr/toastr.min.js"></script>
<script src="../../../plugins/jquery-number/jquery.number.js"></script>

<script type="text/javascript">
$('#planPrice').number(true,2); 


$('.plist').on("click","div.choice",function(){
 

$('#modalPlanID').val($(this).attr("pn"));
$('#planName').val($(this).attr("nm"));
$('#planPrice').val($(this).attr("pr"));
$('#planDuration').val($(this).attr("dr"));

$('#triggerEditarPlan').click();
//pn="'.$results[""].'"  nm ="'.$results[""].'" pr="'.$results[""].'"  dr=	
	
});
// triggerEditarPlan
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
