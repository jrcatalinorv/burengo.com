<?php 
$uid = $_REQUEST["acc"];
$code = rand(1000000,9999999) ;

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
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
 <nav class="main-header navbar navbar-expand-md navbar-dark bg-navy"> 
    <div class="container">
      <a href="index.php" class="navbar-brand">
          <img src="../../dist/img/burengo.png" alt="Burengo Logo" class="brand-image   elevation-0" style="opacity: .8">  
      </a>
      <div class="collapse navbar-collapse order-3" id="navbarCollapse"><ul class="navbar-nav"> </ul></div>
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
 
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
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
	 <div class="col-md-10">
 
 
     <div class="card">
	 
			  <div class="card-header">
                <h3 class="card-title">  
				<i class="far fa-image"></i>
				
				Portada Publicacion 
				<input id="uploadedCTRL" type="hidden" value="0" />
				<input id="getCode" type="hidden" value="<?php echo $uid; ?>" />
				</h3>
              </div>
            <div class="card-body"> <input id="currentCode" type="hidden" value="<?php echo $code; ?>" />
 
			<div class="form-group">
                      <h4> Proporcione una Imagen de su documento de Identidad  </h4>
					  <br/>
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
			  
				 
			</div>
			
			<div class="card-footer">
                <button id="skip" type="button" class="btn btn-secondary float-left"> <i class="fas fa-times-circle"></i> Obviar </button>
              
				<button id="next" type="button" class="btn btn-primary float-right">  Siguiente <i class="fas fa-arrow-alt-circle-right"></i> </button>
              </div>
			
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
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script src="../../plugins/toastr/toastr.min.js"></script>
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<script type="text/javascript">
$('#next').click(function(){
var code = <?php echo $code; ?>;
location.href="planes.php?code="+code+"&acc="+$('#getCode').val()+"";
	
});

$('#skip').click(function(){
var code = <?php echo $code; ?>;
location.href="planes.php?code="+code+"&acc="+$('#getCode').val()+"";
	
});



 	
</script>
</body>
</html>
