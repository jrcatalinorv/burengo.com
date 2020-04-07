<?php 
session_start();
date_default_timezone_set("America/Santo_Domingo");
require_once "modelos/data.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="icon" type="image/png" href="../favicon.ico"/>
  <title>Burengo</title>
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../plugins/toastr/toastr.min.css">
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed">
<div class="wrapper">
 <nav class="main-header navbar navbar-expand-md navbar-dark bg-navy"> 
    <div class="container">
      <a href="../<?php echo COUNTRY_CODE; ?>" class="navbar-brand">
            <img src="../dist/img/burengo.png" alt="Burengo Logo" class="brand-image   elevation-0" style="opacity: .8">  
      
      </a>    
      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <ul class="navbar-nav"> </ul>
      </div>

      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
         <li class="nav-item"><a class="nav-link" href="../<?php echo COUNTRY_CODE; ?>"> <?php echo burengo_portada; ?> </a></li>
        <li class="nav-item"><a class="nav-link" href="contacto.php"> <?php echo burengo_contact; ?>  </a></li>
      </ul>
    </div>
  </nav>
 
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
        </div> 
      </div> 
    </div>

    <div class="content">
      <div class="container">
	 <center>
	 <div class="login-box">
  <div class="login-logo">
  </div>

  <div class="card">
    <div class="card-body login-card-body">
      <p class=""> <h3> <?php echo burengo_login2; ?> </h3> </p>
      <div action="#"><br/>
        <div class="input-group mb-3">
          <input id="user" type="text" class="form-control" placeholder="<?php echo burengo_user; ?>" />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="pass" type="password" class="form-control" placeholder="<?php echo burengo_pass; ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button id="login" type="button" class="btn btn-success btn-block"> <?php echo burengo_access; ?> </button>
          </div>
        </div>
      </div>

      <div class="social-auth-links text-center mb-3">
        <p>-   -</p>
        <a href="recuperar-cuenta.php" class="btn btn-block btn-secondary"> <?php echo burengo_lostPass; ?> </a>
        <a href="registro/datos-personales.php" class="btn btn-block btn-info"> <?php echo burengo_register; ?> </a>         
		</div>  
    </div>
  </div>
</div>
 </center>
	 </div> 
    </div>
  </div>
 <footer class="main-footer"> Burengo &copy; 2020 - <?php echo burengo_copyright; ?>   </footer>
</div>
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../plugins/toastr/toastr.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
<script src="../dist/js/demo.js"></script>
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
</script>
</body>
</html>