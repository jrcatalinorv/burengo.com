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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="../favicon.ico"/>
  <title>Burengo</title>
  <link rel="stylesheet" href="../dist/css/pagination.css">
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../plugins/toastr/toastr.min.css"> 
  <link rel="stylesheet" href="../plugins/flag-icon-css-master/css/flag-icon.css" > 
  
  
<style>
@media only screen and (min-width: 992px) {	
.burengo-img-grid{
	width: 250px; 
	height:180px;
  }
.bgo_font{
	font-size:1vW;
}
.bgo_mfont{
   font-size:0.8vW;
}
}

@media only screen and (max-width: 600px) {
.linkWeb{
	display:none;
}
</style>  
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed">
<div class="wrapper">
<nav class="main-header navbar navbar-expand-md navbar-dark bg-navy"> 
    <div class="container">
      <a href="" class="navbar-brand"><img src="../dist/img/burengo.png" alt="Burengo Logo" class="brand-image   elevation-0" style="opacity: .8"></a>
      <div class="collapse navbar-collapse order-3" id="navbarCollapse"><ul class="navbar-nav"> </ul></div>
	  <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
		<li class="nav-item linkWeb"><a class="nav-link " href="contacto.php"><?php echo burengo_contact; ?></a></li>
		<li class="nav-item"><a class="nav-link" href="acceder.php"> <?php echo burengo_login; ?></a></li>
		<li class="nav-item float-right"><a class="nav-link" href="../"><i class="flag-icon flag-icon-<?php echo COUNTRY_CODE; ?>"></i></a></li>
      </ul>
    </div>
</nav>
<div class="content-wrapper bg-white">
    <div class="content-header ">
      <div class="">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">
			<input id="fcd" type="hidden" value="<?php echo $code; ?>" />			
			<input id="route01" type="hidden" value="0" />
			<input id="pageCant" type="hidden" value="1" />  
			<input id="pageTop" type="hidden" value="1" />  
			<small> </small></h1>
          </div>
        </div>
      </div>
	</div>
	<div class="content">
      <div class="">
        <div class="row">
          <div class="col-lg-3">
		  	<div class="card">
              <div class="card-body p-0">
              <div class="btn-group col-lg-12 p-0 viewFilter">
				  <button style="display:none;" id="op0" name="op0" class="btn btn-lg btn-warning viewOption" view="0"><i class="fas fa-th"></i> Todos </button>
				  <button id="op1" name="op1" class="btn btn-lg btn-default viewOption" view="1"><i class="fas fa-car"></i> <?php echo burengo_vehiculos; ?> </button>
				  <button id="op2" name="op2" class="btn btn-lg btn-default viewOption" view="2"><i class="fas fa-home"></i> <?php echo burengo_inmuebles; ?> </button>
               </div>
              </div>
            </div> 
			
            <div id="btnCompras" class="info-box bg-gradient-success">
              <span class="info-box-icon"><i class="fas fa-wallet"></i></span>
              <div class="info-box-content">
                <span class="info-box-number"> <br/> <h4><?php echo burengo_buy; ?></h4></span><br/>
              </div>
            </div>
		  
	         <div id="btnRentas"class="info-box bg-gradient-warning">
              <span class="info-box-icon"><i class="far fa-calendar-alt"></i> </span>
              <div class="info-box-content">
                <span class="info-box-number"><br/> <h4><?php echo burengo_rent; ?></h4> </span><br/>
              </div>
            </div>
			<!-- Espacio para anuncios de adsence -->
			<div class=".gAdsenceVertical">
					
			</div>
			<!-- Espacio para anuncios de adsence -->
			
          </div>

<div style="margin-top:-1.2em;" class="col-lg-9 p-0">
	
<div class="">
 <div class="card-body">
   <div class="row plist"></div>
 </div>
</div> 
		<div class=".gAdsenceHorrizontal"></div> 
</div> 
     </div>
    </div><!-- /.container-fluid -->
   </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<div id="modalTriggerComprar" data-toggle="modal" data-target="#modal-comprar" ></div>
<div id="modalTriggerRentar" data-toggle="modal" data-target="#modal-rentar" ></div>
<div class="modal fade" id="modal-comprar">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"> </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

<div class="modal-body">
 <h3><center> <?php echo burengo_qBuy; ?></center></h3><br/>
		 <div class="row">
			<div class="col-md-6">
			<div id="btnBuyVh" class="info-box bg-gradient-success">
              <span class="info-box-icon"><i class="fas fa-car"></i></span>
              <div class="info-box-content"><span class="info-box-number"> <br/> <h4> <?php echo burengo_vehiculos; ?> </h4></span><br></div>
            </div>				
			</div>			
			<div class="col-md-6">	
				<div id="btnBuyIm" class="info-box bg-gradient-success">
                <span class="info-box-icon"><i class="fas fa-home"></i></span>
                <div class="info-box-content"><span class="info-box-number"> <br> <h4> <?php echo burengo_inmuebles; ?> </h4></span><br></div>
            </div>				
			</div>
		</div>
	</div>	 
       </div>
    </div>
</div>
<div class="modal fade" id="modal-rentar">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"> </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
         <div class="modal-body">	
		 <h3><center><?php echo burengo_qRent; ?> </center></h3>
		 <br/>
		 <div class="row">
			<div class="col-md-6">	
			  <div id="btnRentVh" class="info-box bg-gradient-warning">
              <span class="info-box-icon"><i class="fas fa-car"></i></span>
              <div class="info-box-content"><span class="info-box-number"> <br/> <h4> <?php echo burengo_vehiculos; ?> </h4></span><br></div>
            </div>				
			</div>
			
			<div class="col-md-6">
				<div id="btnRentIm" class="info-box bg-gradient-warning">
				<span class="info-box-icon"><i class="fas fa-home"></i></span>
				<div class="info-box-content"><span class="info-box-number"> <br> <h4> <?php echo burengo_inmuebles; ?> </h4></span><br></div>
				</div>				
			</div>
		</div>
	</div>
  </div>
  </div>
</div>
<footer class="main-footer"> Burengo &copy; 2020 - <?php echo burengo_copyright; ?>  </footer>
</div>
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../plugins/toastr/toastr.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
<script src="../dist/js/demo.js"></script>

<script type="text/javascript">
$(document).ready(function(){
$('.plist').load('ajax/burengo_select.php?typo='+$('#route01').val()+'&pageno='+$('#pageCant').val());
getopPages();
first();
});
function explode(){
var top = parseInt($('#pageTop').val());
var current = parseInt($('#pageCant').val());	
var next = current+1;
if(next>top){
	$('#pageCant').val(1);	
	$('.plist').load('ajax/burengo_select.php?typo='+$('#route01').val()+'&pageno='+$('#pageCant').val());	
	first();
}else{
	$('#pageCant').val(next);
	$('.plist').load('ajax/burengo_select.php?typo='+$('#route01').val()+'&pageno='+$('#pageCant').val());	
	first();	
  }
}
function first(){setTimeout(explode, 5000);}
function getopPages(){
	$.getJSON('ajax/burengo_page_stats.php',{			  	 
	value: $('#route01').val() 	 
	},function(data){
	   switch(data['ok'])
		{
			case 0:  toastr.error('Usuario o Clave Incorrectos '); break;
			case 1: $('#pageTop').val(data['top']);  break;		
		 }
	});		
}
$('.viewFilter').on('click', 'button.viewOption', function(){
	var option = $(this).attr('view');
	var active = $('#route01').val();
	
	/* OLD */
	$('#op'+active).removeClass('btn-warning');
	$('#op'+active).addClass('btn-default');
	
	/* New */
	$('#op'+option).removeClass('btn-default');
	$('#op'+option).addClass('btn-warning');
	$('#route01').val(option);
	$('#pageCant').val(1);
	
	$('.plist').load('ajax/burengo_select.php?typo='+$('#route01').val()+'&pageno='+$('#pageCant').val());		
	getopPages();
});
$('.plist').on("click", "div.itemSelection", function(){ 
	var id = $(this).attr('itemId');
	var cat = $(this).attr('itemCat');
	
	switch(cat){
		case '1': location.href="vehiculos.php?dtcd="+id; break;
		case '2': location.href="inmuebles.php?dtcd="+id; break;
	} 
}); 
$('#btnCompras').click(function(){
var rt = $('#route01').val();
switch(rt){
	case '1': location.href="vehiculos/filtro.php?cat=1"; break;
	case '2': location.href="inmuebles/filtro.php?cat=1"; break;
	default:  $('#modalTriggerComprar').click(); break;
}	
});
$('#btnRentas').click(function(){
var rt = $('#route01').val();
switch(rt){
	case '1': location.href="vehiculos/filtro.php?cat=2"; break;
	case '2': location.href="inmuebles/filtro.php?cat=2"; break;
	default: $('#modalTriggerRentar').click(); break;
}	
});
$('#btnBuyVh').click(function(){ location.href="vehiculos/filtro.php?cat=1"; });
$('#btnRentVh').click(function(){location.href="vehiculos/filtro.php?cat=2"; });
$('#btnBuyIm').click(function(){ location.href="inmuebles/filtro.php?cat=1"; });
$('#btnRentIm').click(function(){ location.href="inmuebles/filtro.php?cat=2"; });
</script>
</body>
</html>