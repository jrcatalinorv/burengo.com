<?php
    if (isset($_FILES['attachments'])) {
        $msg = "";
        $targetFile = "upload/" . basename($_FILES['attachments']['name'][0]);
        if (file_exists($targetFile))
            $msg = array("status" => 0, "msg" => "El Archivo ya existe!");
        else if (move_uploaded_file($_FILES['attachments']['tmp_name'][0], $targetFile))
            $msg = array("status" => 1, "msg" => "El archivo fue cargado con exito", "path" => $targetFile);
        exit(json_encode($msg));
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Burengo.com</title>
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style type="text/css">
			#dropZone {
				border: 3px dashed #0088cc;
				padding: 90px;
				width: 90%;
				margin-top: 25px;
			}

			#files {
				border: 1px dotted #0088cc;
				padding: 20px;
				width: 90%;
				display: none;
			}

            #error {
                color: red;
            }
   </style>
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
 <nav class="main-header navbar navbar-expand-md navbar-light navbar-warning"> 
    <div class="container">
      <a href="../access/inicio.php" class="navbar-brand"><span class="brand-text">Buren<span class="text-danger">go</span></span></a>
      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <ul class="navbar-nav"> </ul>
      </div>
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item"><a class="nav-link" href="#">Mensajes</a></li>
        <li class="nav-item"><a class="nav-link" href="../index.php"> Cerrar Session </a></li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
        
          </div>
        
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->

    <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
        <div class="row">
		<div class="col-md-12">
            <div class="card">
			  <div class="card-header">
                <h3 class="card-title">Accesorios</h3>
              </div>
            <div class="card-body">
		 	<center>
				<div id="dropZone">
					<h3>Arrastra & Pega los archivos</h3>
					<input type="file" id="fileupload" name="attachments[]" multiple>
				</div>
				<h3 id="error"></h3><br> 
				<h3 id="progress"></h3><br> 
				<div id="files"></div>
			</center>
            </div>
            </div>
          </div>
		
		<div class="col-md-12">
		<div class="card">
              <div class="card-header">
                <h3 class="card-title">Application Buttons</h3>
              </div>
              <div class="card-body">
                <a id="btnUno" class="btn btn-app">
                  <i class="fas fa-edit"></i> Uno
                </a>
                <a class="btn btn-app">
                  <i class="fas fa-play"></i> Dos
                </a>
                <a class="btn btn-app">
                  <i class="fas fa-pause"></i> Tres
                </a>
              </div>
              <!-- /.card-body -->
            </div>
		</div>
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

<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
<script src="../dist/js/demo.js"></script>
<script src="../dist/js/vendor/jquery.ui.widget.js" type="text/javascript"></script>
<script src="../dist/js/utld/jquery.iframe-transport.js" type="text/javascript"></script>
<script src="../dist/js/utld/jquery.fileupload.js" type="text/javascript"></script>
<script type="text/javascript">
            $(function () {
               var files = $("#files");

               $("#fileupload").fileupload({
                   url: 'fotos.php',
                   dropZone: '#dropZone',
                   dataType: 'json',
                   autoUpload: false
               }).on('fileuploadadd', function (e, data) {
                   var fileTypeAllowed = /.\.(gif|jpg|png|jpeg)$/i;
                   var fileName = data.originalFiles[0]['name'];
                   var fileSize = data.originalFiles[0]['size'];

                   if (!fileTypeAllowed.test(fileName))
                        $("#error").html('Only images are allowed!');
                   else if (fileSize > 3000000)
                       $("#error").html('El archivo es muy grande! EL tamano Maximo permitido es: 3MB');
                   else {
                       $("#error").html("");
                       data.submit();
                   }
               }).on('fileuploaddone', function(e, data) {
                    var status = data.jqXHR.responseJSON.status;
                    var msg = data.jqXHR.responseJSON.msg;

                    if (status == 1) {
                        var path = data.jqXHR.responseJSON.path;
                        $("#files").fadeIn().append('<img style="width: 100px; height: 100px;" src="'+path+'" />');
                    } else
                        $("#error").html(msg);
               }).on('fileuploadprogressall', function(e,data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $("#progress").html("Completado: " + progress + "%");
               });
            });

$('#btnUno').click(function(){
	alert($('#files').val());
	
});

</script>
</body>
</html>
