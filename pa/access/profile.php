<?php 
session_start();
date_default_timezone_set("America/Santo_Domingo");
require_once "../modelos/conexion.php";
require_once "../modelos/data.php";

if(isset($_SESSION['bgo_userId'])){   
}else{
  header('Location: ../acceder.php'); 
} 

$fsDt = date("Y-m-d", strtotime("first day of this month")); 
$lsDt = date("Y-m-d", strtotime("last day of this month")); 
 
/* Total Publicaciones */
$stmt2 = Conexion::conectar()->prepare(" SELECT COUNT(bgo_code) as totalp 
FROM bgo_posts WHERE bgo_status = 1 and bgo_usercode = '".$_SESSION['bgo_userId']."'");
$stmt2 -> execute();
$results = $stmt2 -> fetch();
$total_post = $results['totalp'];

/* Vehiculos */
$stmt2 = Conexion::conectar()->prepare(" SELECT COUNT(bgo_code) as totalpv FROM 
bgo_posts WHERE bgo_status = 1 and bgo_usercode = '".$_SESSION['bgo_userId']."' and bgo_subcat = 1");
$stmt2 -> execute();
$results = $stmt2 -> fetch();
$total_postv = number_format($results['totalpv']);
 
/* Inmnuebles */ 
$stmt2 = Conexion::conectar()->prepare(" SELECT COUNT(bgo_code) as totalpin FROM 
bgo_posts WHERE bgo_status = 1 and bgo_usercode = '".$_SESSION['bgo_userId']."' and bgo_subcat = 2");
$stmt2 -> execute();
$results = $stmt2 -> fetch();
$total_postin = number_format($results['totalpin']);

/* Total Publicaciones Destacadas */
$stmt2 = Conexion::conectar()->prepare(" SELECT COUNT(bgo_code) as totalpd 
FROM bgo_posts WHERE bgo_stdesc = 9 and bgo_usercode = '".$_SESSION['bgo_userId']."'");
$stmt2 -> execute();
$results = $stmt2 -> fetch();
$total_postD = $results['totalpd'];


/* Visitas del mes */
$stmt4 = Conexion::conectar()->prepare("SELECT COUNT(vstid) as visits FROM bgo_visits WHERE vstdate  
BETWEEN '".$fsDt."' AND '".$lsDt."' AND vst_usercode = '".$_SESSION['bgo_userId']."'");
$stmt4 -> execute();
$rest4 = $stmt4 -> fetch(); 


$stmt5 = Conexion::conectar()->prepare("SELECT u.*, p.*, pl.* FROM bgo_users u 
INNER JOIN bgo_places p  ON u.provinvia = p.pcid 
INNER JOIN bgo_planes pl ON u.profile = pl.planid AND u.uid = '".$_SESSION['bgo_userId']."'");
$stmt5 -> execute();
$rest5 = $stmt5 -> fetch(); 

$stmt6 = Conexion::conectar()->prepare("SELECT * FROM bgo_user_plan WHERE up_uid = '".$rest5["uid"]."'"); 
$stmt6 -> execute();
$rest6 = $stmt6 -> fetch();

if($rest6['up_planid']==7){
	$pu_rest = "-";
}else{	
 if($rest6["up_maxp"]==99999){ $pu_rest = " - "; }else{  $pu_rest = intval($rest6["up_maxp"]) - intval($total_post) ;    }	
}
if($rest6["up_destacadas"]==99999){ $pd_rest = " Ilimitadas "; }else{ $pd_rest =  $total_postD.' de '.intval($rest6["up_destacadas"]); }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="icon" type="image/png" href="../../favicon.ico"/>
  <title>Burengo</title>
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.css">
    <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">
  <style>
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
      <a href="inicio.php" class="navbar-brand">
        <img src="../../dist/img/burengo.png" alt="Burengo Logo" class="brand-image   elevation-0" style="opacity: .8"> 
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
            <i class="fas fa-th mr-2"></i> <?php echo burengo_portada; ?>
          </a>
          <div class="dropdown-divider"></div>		  
		  <a href="publicaciones.php" class="dropdown-item">
            <i class="far fa-list-alt mr-2"></i>  <?php echo burengo_Mypost; ?>
          </a>		  
          <div class="dropdown-divider"></div>
          <a href="profile.php" class="dropdown-item">
            <i class="far fa-id-badge mr-2"></i> <?php echo burengo_Account; ?>    
          </a>
          <div class="dropdown-divider"></div>
          <a href="mail/inbox.php" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> <?php echo burengo_msg; ?>
          </a>
		 <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-favorites">
            <i class="fas fa-heart mr-2"></i> <?php echo burengo_seeFavs; ?>
          </a>
          <div class="dropdown-divider"></div>
          <a href="salir.php" class="dropdown-item"> <i class="fas fa-sign-out-alt text-danger mr-2"></i> <?php echo burengo_logout; ?> </a>
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

 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3"><input id="fcd" type="hidden" value="<?php echo $code; ?>" />
            <div class="card">
              <div class="card-body box-profile">
                <div class="text-center"><img class="profile-user-img img-fluid img-circle" src="../media/users/<?php echo $_SESSION['bgo_userImg']; ?>" alt="User profile picture"></div>
                <h3 class="profile-username text-center"> <?php echo $_SESSION['bgo_name']; ?>  </h3>
                <p class="text-muted text-center">  
				<?php 
					if($_SESSION['bgo_perfil'] > 1){
							if($_SESSION['bgo_perfil'] == 4){
								echo '<i class="fas fa-trophy fa-2x text-success"></i>'; 
							}else{
								echo '<i class="fas fa-trophy fa-2x text-primary"></i>';
							}
					}else{
						echo '<i class="far fa-flag fa-2x text-primary"></i>'; 
					}
				?>
				</p>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item"><b> <?php echo burengo_tpots; ?> </b> <a class="float-right"> <?php echo $total_post; ?></a></li>
				  <li class="list-group-item"><b> <?php echo burengo_vehiculos; ?> </b> <a class="float-right"><?php echo $total_postv; ?></a></li>                     
				  <li class="list-group-item"><b> <?php echo burengo_inmuebles; ?> </b> <a class="float-right"><?php echo $total_postin; ?></a></li>                  
				  <li class="list-group-item"><b> <?php echo burengo_visits; ?></b> <a class="float-right"> <?php echo number_format($rest4['visits']); ?>  </a></li>
				 </ul>
				 <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-favorites"> <i class="fas fa-heart"></i> <b> <?php echo burengo_seeFavs; ?> </b></a>
			   </div>
            </div>
          
	  
		  </div>
          <!-- /.col -->
      <div class="col-md-6">
	  
	  <?php 		  
if(intval($rest5['profile']==7)){
		  
echo '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> '.burengo_paymentAlertExp.' <a href="planes.php"> '.burengo_MaxOut3. ' </a>. </h5>        
                </div>'; 
}	?>
	  
		<div class="card">
        <div class="card-body" style="display: block;">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-1 order-md-1">
              <h5 class=""> <?php echo burengo_personalData; ?> </h5>
              <div class="text-muted">
                <p class="text-sm"><?php echo burengo_fname; ?>: <b class="d-block"> <?php echo $rest5["name"]; ?></b></p>
                <p class="text-sm"> <?php echo burengo_id; ?> <b class="d-block"> <?php echo $rest5["ced"]; ?></b></p>                
				<p class="text-sm"> <?php echo burengo_phone; ?> <b class="d-block"> <?php echo $rest5["phone"]; ?></b></p>                
				<p class="text-sm"> <?php echo burengo_addr; ?>
                  <b class="d-block"> <?php echo $rest5["addr"]; ?> </b>
                  <b class="d-block"> <?php echo $rest5["pcstr"].', Republica Dominicana '; ?> </b>
                </p>				
				<p class="text-sm"><?php echo burengo_email; ?> <b class="d-block"> <?php echo $rest5["email"]; ?></b></p>
				<p class="text-sm"><i class="fab fa-lg fa-whatsapp"></i> Whatsapp <b class="d-block"><?php echo $rest5["bgo_whatsapp"]; ?></b></p>
				<p class="text-sm"><i class="fab fa-lg fa-instagram"></i> Instagram <b class="d-block"><?php echo $rest5["bgo_instagram"]; ?></b></p>
				<p class="text-sm"><i class="fab fa-lg fa-facebook"></i> Facebook <b class="d-block"><?php echo $rest5["bgo_facebook"]; ?></b></p>
              </div>
          </div>
		
		<div class="col-12 col-md-12 col-lg-4 order-2 order-md-2 float-right">
			 <h5 class="bgo_top"> <?php echo burengo_accInfo; ?>  </h5>
              <div class="row">
                <div class="col-12 col-sm-12 bgo_top">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted"> <?php echo burengo_plan; ?> </span>
                      <span class="info-box-number text-center text-muted mb-0"> <?php echo $rest5["planname"]; ?> <span>
                    </div>
                  </div>
                </div>
                </div>
				
			 <div class="row">
                <div class="col-12 col-sm-12">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted"> <?php echo burengo_exDate; ?> </span>
                      <span class="info-box-number text-center text-muted mb-0"> <?php echo date("d/m/Y", strtotime($rest6["up_expdate"])); ?> <span>
                    </div>  
                  </div>
                </div>
             </div>
				
			<div class="row">
                <div class="col-12 col-sm-12">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted"> <?php echo burengo_maxP; ?> </span>
                      <span class="info-box-number text-center text-muted mb-0"> <?php if($rest6["up_maxp"]==99999){ echo "Ilimitadas"; }else{ echo $rest6["up_maxp"]; }  ?> </span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-12">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted"> <?php echo burengo_pendP; ?> </span>
                      <span class="info-box-number text-center text-muted mb-0"> <?php echo $pu_rest;  ?> <span>
                    </span></span></div>
                  </div>
                </div>                
				<div class="col-12 col-sm-12">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted"> <?php echo burengo_descP; ?> </span>
                      <span class="info-box-number text-center text-muted mb-0"> <?php echo $pd_rest;  ?>  <span>
                    </span></span></div>
                  </div>
                </div>
            </div>
           </div>
          </div>
        </div>
        <!-- /.card-body -->
		
		<div class="card-footer">
           <button  type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-pass"> <i class="fas fa-lock"></i> <?php echo burengo_changePass; ?> </button>
		   <a href="profile-edit.php" type="button" class="btn btn-warning btn-sm"> <i class="fas fa-user"></i> <?php echo burengo_edit; ?></a>
		   <a href="planes.php" type="button" class="btn btn-success btn-sm" > <i class="fas fa-trophy"></i>  <?php if($_SESSION['bgo_perfil'] > 1){ echo burengo_availPlan;  } else{ echo burengo_cpremium;  }   ?> </a>
		   <a href="destacar.php" type="button" class="btn btn-primary btn-sm" > <i class="fas fa-star"></i>  <?php echo burengo_descPost; ?> </a>
          </div>
      </div> 
 </div>
          <!-- /.col -->
        </div>
	   <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
  <!-- /.content-wrapper -->

   <div class="modal fade" id="modal-pass">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"> <?php echo burengo_changePass; ?> </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body"> 
				<div class="form-group"><input type="password" class="form-control" id="password0" placeholder="<?php echo burengo_accPass; ?>"></div>
				<div class="form-group"><input type="password" class="form-control" id="password1" placeholder="<?php echo burengo_newPass; ?>"></div>
				<div class="form-group"><input type="password" class="form-control" id="password2" placeholder="<?php echo burengo_conPass; ?>"></div> 
            </div>
			 <div class="modal-footer justify-content-between">
              <button id="closeMeBtn" type="button" class="btn btn-danger" data-dismiss="modal"> <?php echo burengo_close; ?> </button>
              <button id="changePass" type="button" class="btn btn-success"> <?php echo burengo_accept; ?>  </button>
            </div>
          </div>
        </div>
      </div>
   <!-- /.modal -->
   
<div class="modal fade" id="modal-favorites">
 <div class="modal-dialog">
   <div class="modal-content">
      <div class="modal-header">
       <h4 class="modal-title">   </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
<div class="modal-body p-0 whlist" style="height:400px;   overflow-y: auto; overflow-x: hidden;"> 
<!----------------------------------->
		
<!----------------------------------->
</div>
   </div>
    </div>
      </div>
   <!-- /.modal -->

<footer class="main-footer"> Burengo &copy; 2020 -  <?php echo burengo_copyright; ?> </footer>
</div>
<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script src="../../plugins/toastr/toastr.min.js"></script>
<script type="text/javascript"> 
$('.whlist').load("../ajax/burengo_select_favorites.php?id="+$('#currentCode').val());


 
function isEmpty(str) {
    return (!str || 0 === str.length);
}

function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}
 
$('#changePass').click(function(){

if( !isEmpty($("#password0").val())){ 
  if( !isEmpty($("#password1").val())){
	if( !isEmpty($("#password2").val())){
	var newpass  = $("#password1").val();
	var conpass  = $("#password2").val(); 
	var pr = newpass.localeCompare(conpass);
	
	if(pr==0){
			$.getJSON('../ajax/burengo_update_account_pass.php',{
		 code: $('#currentCode').val(),
		 pass: $("#password0").val(),
		 npass: newpass
  },function(data){
		switch(data['ok']){
			case 0: toastr.error('ERROR! No se pudo almacenar los datos: '+ data['err']); break;
			case 1: toastr.success('Los Datos fueron actualizados de forma correcta.'); $('#closeMeBtn').click(); break;
			case 2: $('#password0').val(""); $('#password0').focus(); toastr.error('La clave actual no es correcta! '); break;
		}
	});
		
	}else{
		$('#password1').val(""); 
		$('#password2').val(""); 
		$('#password1').focus(); 
		toastr.error('Las Claves no coinciden');
	}
}else{ $('#password2').focus();	toastr.error('Las Claves no coinciden'); }
}else{ $('#password1').focus();	toastr.error('Las Claves no coinciden'); }
}else{ $('#password0').focus(); toastr.error('La clave actual no es correcta! '); }

 
});


$('.whlist').on("click","span.itemSelection",function(){
	var id = $(this).attr('itemId');
	var cat = $(this).attr('stid');
	switch(cat){
		case '1': location.href="vehiculos.php?dtcd="+id; break;
		case '2': location.href="inmuebles.php?dtcd="+id; break;
	}
});


$('.whlist').on("click","img.itemSelection",function(){
	var id = $(this).attr('itemId');
	var cat = $(this).attr('stid');
	switch(cat){
		case '1': location.href="vehiculos.php?dtcd="+id; break;
		case '2': location.href="inmuebles.php?dtcd="+id; break;
	}
});

$('.whlist').on("click","a.itemSelection",function(){
	var id = $(this).attr('itemId');
	var cat = $(this).attr('stid');
	switch(cat){
		case '1': location.href="vehiculos.php?dtcd="+id; break;
		case '2': location.href="inmuebles.php?dtcd="+id; break;
	}
});

$('.whlist').on("click","a.itemDelete",function(){
   var pid = $(this).attr('itemId');
   var uid = $(this).attr('userId');
   
   $.getJSON('../ajax/burengo_delete_fav.php',{
		pid: pid,
		uid: uid
	},function(data){
		switch(data['ok']){
			case 0: toastr.error('ERROR! No se guardaron los cambios los datos: '+ data['err']); break;
			case 1: $('.whlist').load("../ajax/burengo_select_favorites.php?id="+uid);  break;
		}
	});	
 
});


</script>
</body>
</html>