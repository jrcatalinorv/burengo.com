<?php 
session_start();
date_default_timezone_set("America/Santo_Domingo");
$code = $_REQUEST["ccdt"];


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Burengo.com</title>
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style type="text/css">

.bgo-wrapper{width: 600px;  height: 100px;}
.bgo-margin-area {  position: relative;  text-align: center;  font-family: "Trebuchet", sans-serif;  font-size: 14px;  margin: 0 20px;}
.bgo-dot {height: 30px; width: 30px; position: absolute; background: #000; border-radius: 50%; top: 10px; color: #fff; line-height: 30px; z-index: 9999;}
.bgo-dot.bgo-one {left: 35px; background: #0C84D9;}

.bgo-dot.bgo-two {
  left: 180px;
  background: #0C84D9;
}

.bgo-dot.bgo-three {
  left: 330px;
  background: #bbb;
  color: #fff;
}
.bgo-progress-bar { position: absolute;  height: 10px;  width: 25%;  top: 20px;  left: 10%;  background: #bbb;}

.bgo-progress-bar.bgo-first {
    background: #0C84D9;  
}
.bgo-progress-bar.bgo-second {
  left: 35%;
}
 

.bgo-message {
  position: absolute;
  height: 60px;
  width: 170px;
  padding: 10px;
  margin: 0;
  left: -50px;
  top: 0;
  color: #000;
}
.bgo-message.bgo-message-1 {
  top: 40px;
  color: #000;
}
.bgo-message.bgo-message-2 {
  left: 160px;
}
.bgo-message.bgo-message-3 {
  left: 160px;
  color: #000;
}
			
			
   </style>
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
 <nav class="main-header navbar navbar-expand-md navbar-dark bg-black"> 
    <div class="container">
      <a href="../../access/inicio.php" class="navbar-brand"><span class="brand-text"><span class="text-danger">Burengo</span></span></a>
      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <ul class="navbar-nav"> </ul>
      </div>
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
         <li class="nav-item"><a class="nav-link" href="profile.php">
			 <img alt="Avatar"  class="user-image" src="../../media/users/<?php echo $_SESSION['bgo_userImg']; ?>">
			 <?php echo $_SESSION['bgo_user']; ?></a>
		</li>

		<li class="nav-item dropdown show">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
          <i class="fas fa-bars fa-lg"></i> </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
		  
		  <a href="../../inicio.php" class="dropdown-item">
            <i class="fas fa-th mr-2"></i> Portada  
          </a>
          <div class="dropdown-divider"></div>		  
          <a href="../../publicaciones.php" class="dropdown-item">
            <i class="far fa-list-alt mr-2"></i> Mis publicaciones 
          </a>
          <div class="dropdown-divider"></div>
          <a href="../../profile.php" class="dropdown-item">
            <i class="far fa-id-badge mr-2"></i> Cuenta    
          </a>
          <div class="dropdown-divider"></div>
          <a href="../../mensajes-recibidos.php" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> Mensajes
          </a>
          <div class="dropdown-divider"></div>
          <a href="salir.php" class="dropdown-item"> <i class="fas fa-sign-out-alt text-danger mr-2"></i> Cerrar Session </a>
        </div>
      </li> 
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
	          <div class="row">
         <div class="col-md-12"> 
	<center>
			<div class="bgo-wrapper">
			<div class="bgo-margin-area">
			<div class="bgo-dot bgo-one">1</div>
			<div class="bgo-dot bgo-two">2</div>
			<div class="bgo-dot bgo-three">3</div>
			<div class="bgo-progress-bar bgo-first"></div>
			<div class="bgo-progress-bar bgo-second"></div>
			<div class="bgo-message bgo-message-1">Datos Generales <div>
			<div class="bgo-message bgo-message-2">Subir Imagenes  <div>
			<div class="bgo-message bgo-message-3">Confirmar Datos <div>
			</div></div></div></div></div></div>
			</div>
			</div>
	</center>			
			<!------------------------------>
		</div>
</div>
	  
    <div class="row">
	<div class="col-md-11">
            <div class="card">
			  <div class="card-header">
                <h3 class="card-title">  
				<i class="far fa-image"></i>
				
				Portada Publicacion 
				<input id="uploadedCTRL" type="hidden" value="0" />
				<input id="getCode" type="hidden" value="<?php echo $code; ?>" />
				</h3>
              </div>
            <div class="card-body"> <input id="currentCode" type="hidden" value="<?php echo $code; ?>" />
 
			<div class="form-group">
                      <h3>Seleccione la Imagen de Portada </h3>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="file">
                        <label class="custom-file-label" for="file">Choose file</label>
                      </div>
                    </div>
                  </div>
 
			<center>
			<div style="padding: 10px; height:260px; width:415px; border: solid #ced4da;">
			   <span   id="uploaded_image"></span>
			</div>
             </center>
			 <hr/>
			 <h3> <i class="far fa-images"></i> Anexar Mas imagenes  </h3>
				 
				 <div class="form-group">
             
                    <div class="input-group">
                      <div class="custom-file">
                        <input disabled type="file" class="custom-file-input" id="files">
                        <label class="custom-file-label" for="file">Choose file</label>
                      </div>
                    </div>
                  </div>
			</div>
			
			<div class="card-footer clearfix ">
                              <button id="cancel" type="button" class="btn btn-danger"> <i class="fas fa-times-circle"></i> Cancelar </button>
              
				<button id="next" type="button" class="btn btn-primary float-right">  Siguiente <i class="fas fa-arrow-alt-circle-right"></i> </button>
              </div>
			
            </div>
          </div>
	  	

  </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
  <!-- /.content-wrapper -->


 

  <!-- Main Footer -->
  <footer class="main-footer bg-black">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
    
    </div>
    <!-- Default to the left -->
    Burengo &copy; 2020 - Todos los derechos reservados.  
  </footer>
</div>
<!-- ./wrapper -->

<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../plugins/toastr/toastr.min.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script src="../../dist/js/demo.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $(document).on('change', '#file', function(){
	var name = document.getElementById("file").files[0].name;
	var form_data = new FormData();
	var ext = name.split('.').pop().toLowerCase();
  
 if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
  {
	toastr.error('Archivo Invalido. Solo se permite jpg, png & jpeg');
  }else{
	var oFReader = new FileReader();
		oFReader.readAsDataURL(document.getElementById("file").files[0]);
	var f = document.getElementById("file").files[0];
	var fsize = f.size||f.fileSize;
  
	 if(fsize > 2000000)
		{
		 toastr.error('La imgen es muy Grande. Solo se permiten archivos de max 2MB');			
		}
	else
	{
		$('#uploaded_image').html();
		form_data.append("file", document.getElementById('file').files[0]);
		form_data.append("code", $('#currentCode').val());

   $.ajax({
		url:"../upload.php",
		method:"POST",
		data: form_data,
		contentType: false,
		cache: false,
		processData: false,
		beforeSend:function(){
			toastr.success('Subiendo Imagen de portada');	
		},   
			success:function(data){
			$('#uploaded_image').html(data);
			$('#uploadedCTRL').val(1);
		}
   });
  } //Fin del else 
	
		
	}
 });
});
 

$('#cancel').click(function(){
	location.href="../../access/inicio.php";
});

$('#next').click(function(){
	if($('#uploadedCTRL').val()==1){
		location.href="confirmacion.php?ccdt="+$('#getCode').val();
	}else{
		toastr.error('Debe elegir al menos una imagen');
	}
});

           

</script>
</body>
</html>
