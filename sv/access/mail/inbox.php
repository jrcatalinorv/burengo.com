<?php 
session_start();
date_default_timezone_set("America/Santo_Domingo");
require_once "../../modelos/conexion.php";
require_once "../../modelos/data.php";

 
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
            <i class="fas fa-th mr-2"></i> <?php echo burengo_portada; ?>
          </a>
          <div class="dropdown-divider"></div>		  
		  <a href="../publicaciones.php" class="dropdown-item">
            <i class="far fa-list-alt mr-2"></i> <?php echo burengo_Mypost; ?> 
          </a>		  
          <div class="dropdown-divider"></div>
          <a href="../profile.php" class="dropdown-item">
            <i class="far fa-id-badge mr-2"></i> <?php echo burengo_Account; ?>  
          </a>
          <div class="dropdown-divider"></div>
          <a href="" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i>  <?php echo burengo_msg; ?>
          </a>
          <a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-favorites">
            <i class="fas fa-heart mr-2"></i> <?php echo burengo_seeFavs; ?>
          </a>		  
          <div class="dropdown-divider"></div>
          <a href="../salir.php" class="dropdown-item"> <i class="fas fa-sign-out-alt text-danger mr-2"></i>  <?php echo burengo_logout; ?> </a>
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
                <li class="nav-item bg-primary">
                  <a href="inbox.php" class="nav-link">
                    <i class="fas fa-inbox"></i> <?php echo burengo_msgReceived; ?>
                   
                  </a>
                </li>
                <li class="nav-item">
                  <a href="outbox.php" class="nav-link">
                    <i class="far fa-envelope"></i> <?php echo burengo_msgSent; ?>
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
              <h3 class="card-title">  </h3>

             
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
       
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody class="mmssg">
                  <?php 
						$stmt0 = Conexion::conectar()->prepare("SELECT count(msgid) as totalMsg FROM  bgo_msg WHERE usrto = '".$_SESSION['bgo_userId']."'");
						$stmt0 -> execute();
						$rest0 = $stmt0 -> fetch();
						
						if($rest0['totalMsg'] <= 0){
							echo ' <tr>
                    <td class="mailbox-name text-center"> -- No tiene Mensajes - </td>   </tr>';
						}else{
							
					$stmt = Conexion::conectar()->prepare("SELECT m.*, u.*, p.* FROM bgo_msg m 
						INNER JOIN bgo_users u ON  m.usrfrom = u.uid 
						INNER JOIN bgo_posts p ON  m.msgpost = p.bgo_code 
						AND m.usrto = '".$_SESSION['bgo_userId']."'"); 
					$stmt -> execute();
					while($rest = $stmt -> fetch()){
						
				echo ' <tr class="choosMe" msId="'.$rest['msgid'].'"  msTx="'.$rest['msgtext'].'"  msFrom="'.$rest['name'].'" 
				msTel="'.$rest['phone'].'" msEmail="'.$rest['email'].'" msFromCode="'.$rest['uid'].'" msPost="'.$rest['msgpost'].'" 
				 msPosNm="'.$rest['bgo_title'].'" >
                    <td class="mailbox-name"> '.$rest['timestamp'].' </td>
                    <td class="mailbox-name text-primary">'.$rest['name'].'</td>
                    <td class="mailbox-subject"> '.$rest['msgtext'].'</td>
                    <td class="mailbox-date"> '.$rest['bgo_title'].' </td>
                  </tr>';
				  
				}
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
              <h5 class="modal-title text-info"> <i class="fas fa-envelope"></i> <?php echo burengo_usrMsgSend; ?> </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
				<div class="row">
				  <div class="callout callout-info">
					<h5 id="mdlTitle"> </h5>
					<p id="mdlpostN">  </p>
					<p id="mdlBody"> </p>
					<hr/>
					<strong id="mdlTel">    </strong>
					<strong id="mdlMail">  </strong>
				   </div>
					 <input id="mdlFrom" class="form-control" type="hidden" value="<?php  echo $_SESSION['bgo_userId']; ?>" />
					 <input id="mdlTo"   class="form-control" type="hidden" />
					 <input id="mdlEm"   class="form-control" type="hidden" />
					 <input id="mdlPst"  class="form-control" type="hidden" />
					 <input id="mdlRply"  class="form-control" type="hidden" />
				 </div>
				<div class="form-group">
                        <label> <?php echo burengo_answer; ?> </label>
                        <textarea id="mcomment" class="form-control" rows="3" placeholder="Escribir comentario"></textarea>
                      </div>
          </div>
		  	<div class="modal-footer justify-content-between">
              <button id="btnCloseModal" type="button" class="btn btn-danger" data-dismiss="modal"> <?php echo burengo_cancel; ?> </button>
              <button id="sendMsgConfirm" type="button" class="btn btn-success"> <i class="fab fa-telegram-plane"></i> <?php echo burengo_send; ?> </button>
            </div>
        </div>
</div>
</div>

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



  <!-- /.content-wrapper -->
<footer class="main-footer"> Burengo &copy; 2020 - <?php echo burengo_copyright; ?>  </footer>
</div>
<script src="../../../plugins/jquery/jquery.min.js"></script>
<script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../../dist/js/adminlte.min.js"></script>
<script src="../../../plugins/toastr/toastr.min.js"></script>
<script type="text/javascript">
 $('.mmssg').on("click","tr.choosMe", function(){
	 //-------------------------------------
	 var id = $(this).attr("msId");
	 var nm = '<i class="fas fa-user"></i> '+$(this).attr("msFrom");
	 var bd = $(this).attr("msTx");
	 var mail = $(this).attr("msEmail");
	 var phone = '<i class="fas fa-phone mr-1"></i> '+$(this).attr("msTel");
	 var pname = '<small>'+$(this).attr("msPosNm")+'</small>';
	 //-------------------------------------	 
	 $('#mdlTitle').html(nm);
	 $('#mdlpostN').html(pname);
	 $('#mdlBody').html(bd);
	 $('#mdlTel').html(phone);
	 $('#mdlMail').html('<i class="fas fa-envelope mr-1"></i> '+mail);

	 //-------------------------------------
	 $('#mdlEm').val(mail);
	 $('#mdlTo').val($(this).attr("msFromCode"));
	 $('#mdlPst').val($(this).attr("msPost"));
	 $('#mdlRply').val(id);
	 //-------------------------------------
	 $('#triggerBtnModalmodal').click();
	 //-------------------------------------
 });
 
 
$('#sendMsgConfirm').click(function(){
if( !isEmpty($('#mcomment').val() ) ){
	$.getJSON('../../ajax/burengo_send_message.php',{			  	 
			from: $('#mdlFrom').val(),	    	 
			to: $('#mdlTo').val(), 	 
			email: $('#mdlEm').val(),	 
			msg: $('#mcomment').val(),	 
			post: $('#mdlPst').val(), 	 
			reply: $('#mdlRply').val() 	 
	},function(data){
	   switch(data['ok'])
		{
			case 0: toastr.error('ERROR! No se pudo almacenar los datos: '+ data['err']); break;
			case 1: toastr.success('El mensaje fue enviado de forma correcta'); $('#btnCloseModal').click();  break;		
		 }
	});
  }else{
		toastr.error('Debe completar el campo mensaje.');
	}
});
 
 function isEmpty(str) {
    return (!str || 0 === str.length);
}



$('.whlist').load("../ajax/burengo_select_favorites.php?id="+$('#currentCode').val());



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