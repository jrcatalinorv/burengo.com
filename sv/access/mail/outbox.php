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
  <link rel="stylesheet" href="../../../dist/css/adminlte.css">
  <link rel="stylesheet" href="../../../plugins/toastr/toastr.min.css">
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
      <a href="../inicio.php" class="navbar-brand">
        <img src="../../../dist/img/burengo.png" alt="Burengo Logo" class="brand-image   elevation-0" style="opacity: .8"> 
      </a>
      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <ul class="navbar-nav"> </ul>
      </div>
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
	  		<li class="nav-item"><a class="nav-link" href="../profile.php">
			 <img alt="Avatar"  class="user-image" src="../../media/users/<?php echo $_SESSION['bgo_userImg']; ?>">
			 <?php echo $_SESSION['bgo_user']; ?></a>
		</li>
	<li class="nav-item dropdown show">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
          <i class="fas fa-bars fa-lg"></i>
           
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="../inicio.php" class="dropdown-item">
            <i class="fas fa-th mr-2"></i> Portada  
          </a>
          <div class="dropdown-divider"></div>		  
		  <a href="../publicaciones.php" class="dropdown-item">
            <i class="far fa-list-alt mr-2"></i> Mis publicaciones 
          </a>		  
          <div class="dropdown-divider"></div>
          <a href="../profile.php" class="dropdown-item">
            <i class="far fa-id-badge mr-2"></i> Cuenta   
          </a>
          <div class="dropdown-divider"></div>
          <a href="inbox.php" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> Mensajes
          </a>
          <div class="dropdown-divider"></div>
          <a href="../salir.php" class="dropdown-item"> <i class="fas fa-sign-out-alt text-danger mr-2"></i> Cerrar Session </a>
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
		  <input id="currentCode" class="form-control" type="hidden" value="<?php  echo $_SESSION['bgo_userId']; ?>"/>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
 <section class="content">
      <div class="container-fluid">
        <div class="row">
		
		<div class="col-md-3">
        

          <div class="card">
            <div class="card-header">
           

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <ul class="nav nav-pills flex-column">
                <li class="nav-item active">
                  <a href="inbox.php" class="nav-link">
                    <i class="fas fa-inbox"></i> Recibidos
                   
                  </a>
                </li>
                <li class="nav-item">
                  <a href="outbox.php" class="nav-link bg-primary">
                    <i class="far fa-envelope"></i> Enviados
                  </a>
                </li>
				<li> &nbsp;
				</li>
              </ul>
            </div>
            <!-- /.card-body -->
          </div>
 
          <!-- /.card -->
        </div>
		
		
 <div class="col-md-9">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Mensajes Enviados </h3>

             
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody class="mmssg">
                  <?php 
					$stmt = Conexion::conectar()->prepare("SELECT m.*, u.*, p.* FROM bgo_msg m 
						INNER JOIN bgo_users u ON  m.usrto = u.uid 
						INNER JOIN bgo_posts p ON  m.msgpost = p.bgo_code 
						AND m.usrfrom = '".$_SESSION['bgo_userId']."'"); 
					$stmt -> execute();
					while($rest = $stmt -> fetch()){
						
				echo ' <tr class="choosMe" msId="'.$rest['msgid'].'"   msTx="'.$rest['msgtext'].'"  msFrom="'.$rest['name'].'" 
				msTel="'.$rest['phone'].'" msEmail="'.$rest['email'].'" msFromCode="'.$rest['uid'].'" msPost="'.$rest['msgpost'].'" />
                    <td class="mailbox-name"> '.$rest['timestamp'].' </td>
                    <td class="mailbox-name text-primary">'.$rest['name'].'</td>
                    <td class="mailbox-subject"> '.$rest['msgtext'].'</td>
                    <td class="mailbox-date"> '.$rest['bgo_title'].' </td>
                    <td class="mailbox-date"> <button type="button" class="btn btn-default btn-sm"><i class="far fa-trash-alt"></i></button></td>
                  </tr>';
				}
  ?>
</tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer p-0">
        
            </div>
          </div>
          <!-- /.card -->
        </div>    
       
        </div>
      </div><!-- /.container-fluid -->
    </section>
  </div>
  
 
<div id="triggerBtnModalmodal" data-toggle="modal" data-target="#modal-msg"></div>

 
  <div class="modal fade" id="modal-msg">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-info"> <i class="fas fa-envelope"></i> Enviar Mensaje </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
				<div class="row">
				  <div class="callout callout-info">
					<h5 id="mdlTitle"> </h5>
					<p id="mdlBody"> </p>
					 
 
				   </div>
		 
				 </div>
		 
          </div>
		  	<div class="modal-footer justify-content-between">
    
            </div>
        </div>
</div>
</div>  
  
  
  <!-- /.content-wrapper -->
<footer class="main-footer"> Burengo &copy; 2020 - Todos los derechos reservados. </footer>
</div>
<script src="../../../plugins/jquery/jquery.min.js"></script>
<script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../../dist/js/adminlte.min.js"></script>
<script src="../../../plugins/toastr/toastr.min.js"></script>
<script type="text/javascript">
 $('.mmssg').on("click","tr.choosMe", function(){
	 //-------------------------------------
	 var id = $(this).attr("msId");
	 var nm = 'Para: '+$(this).attr("msFrom");
	 var bd = $(this).attr("msTx");
	 var mail = $(this).attr("msEmail");
	 var phone = '<i class="fas fa-phone mr-1"></i> '+$(this).attr("msTel");
	 //-------------------------------------	 
	 $('#mdlTitle').html(nm);
	 $('#mdlBody').html(bd);
	 //$('#mdlTel').html(phone);
	// $('#mdlMail').html('<i class="fas fa-envelope mr-1"></i> '+mail);
	 //-------------------------------------
	// $('#mdlEm').val(mail);
	// $('#mdlTo').val($(this).attr("msFromCode"));
	// $('#mdlPst').val($(this).attr("msPost"));
	// $('#mdlRply').val(id);
	 //-------------------------------------
	 $('#triggerBtnModalmodal').click();
	 //-------------------------------------
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