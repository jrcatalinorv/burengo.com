<?php 
date_default_timezone_set("America/Santo_Domingo");
require_once "../modelos/conexion.php";
require_once "../modelos/data.php";
require_once "../modelos/settings.php";
$tp = $_REQUEST['cat'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="icon" type="image/png" href="../../favicon.ico"/>
  <title>Burengo - Compra, renta o vende vehículos e inmuebles</title>
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../plugins/bootstrap-slider/css/bootstrap-slider.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../dist/css/burengo-min.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
 <nav class="main-header navbar navbar-expand-md navbar-dark bg-navy"> 
    <div class="container">
      <a href="../../<?php echo COUNTRY_CODE; ?>" class="navbar-brand"><img src="../../dist/img/burengo.png" alt="Burengo Logo" class="brand-image   elevation-0" style="opacity: .8"></a>
      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <ul class="navbar-nav"> </ul>
      </div>
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item"><a class="nav-link" href="../../<?php echo COUNTRY_CODE; ?>"> <?php echo burengo_portada; ?> </a></li>
        <li class="nav-item"><a class="nav-link" href="../acceder.php"> <?php echo burengo_login; ?> </a></li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-white">
    <!-- Main content -->
    <div class="content">
      <div class=" ">
        <div class="row pt-2">
          <div class="col-lg-3">
		  <input id="oldSelected" value="0" type="hidden" />
		  <input id="tpm2" value="<?php echo $tp; ?>"  type="hidden" />		  
		  <input id="tipocarro" type="hidden" value="0" />
		  <input   id="string"  type="hidden" />
		  <input id="getCat"  type="hidden" value="<?php echo $tp; ?>" />
		  	<div class="card">
              <div class="card-body p-1 opFilters">
                  <div class="pt-2">
			    <div class="btn-group col-lg-12 p-0 viewFilter">
				  <button id="btn1" class="btn btn-lg btn-default"><i class="fas fa-home"></i> <?php echo burengo_buy; ?> </button>
				  <button id="btn2" class="btn btn-lg btn-default"><i class="fas fa-home"></i> <?php echo burengo_rent; ?></button>
               </div>                  
			</div>
		<div class="pt-2">
			<select id="place" class="form-control"> 
				<option value="0"> <?php echo burengo_place; ?> </option> 
			</select>
		</div> 
		
		<div class="card-header">
            <h3 class="card-title"> <?php echo burengo_ptype; ?> </h3>
            <div class="card-tools">
              <a id="ctpBtn" href="#" class="btn-tool" optp="show" ></a>
            </div>
          </div>
			 
				<div id="ctp"  class="row pt-0 Hideme">
				<div class="col-sm-4 border-right border-top carTypeTxt ch14" cttlabel="14">
                    <div class="description-block">
                      <h5 class="description-header"><img class="" style="width:50px;" src="../media/icons/urbano.png" alt="User Image"> </h5>
                      <span class="description-text"> <small> <?php echo burengo_apartment; ?> </small> </span>
                    </div>             
                  </div>				
				  
				  <div class="col-sm-4 border-right border-top carTypeTxt ch13" cttlabel="13">
                    <div class="description-block">
                      <h5 class="description-header"><img class="" style="width:50px;" src="../media/icons/casas.png" alt="User Image"> </h5>
                      <span class="description-text"> <small> <?php echo burengo_homes; ?> </small></span>
                    </div>         
                  </div>				  
				  
				  <div class="col-sm-4 border-top carTypeTxt ch20" cttlabel="20">
                    <div class="description-block ">
                      <h5 class="description-header"><img class="" style="width:50px;" src="../media/icons/condominio.png" alt="User Image"> </h5>
                      <span class="description-text"> <small> <?php echo burengo_edf; ?> </small> </span>
                    </div>
                  </div>				  
				  <!------ Row 2-------->
		  <div class="col-sm-4 border-right border-top carTypeTxt ch17" cttlabel="17">
                    <div class="description-block">
                      <h5 class="description-header"><img style="width:50px;" src="../media/icons/bosque.png" alt="User Image"> </h5>
                      <span class="description-text"> <small> <?php echo burengo_finca; ?></small></span>
                    </div>
                  </div>				  
				  
				  <div class="col-sm-4 border-right border-top carTypeTxt ch22" cttlabel="22">
                    <div class="description-block">
                      <h5 class="description-header"><img style="width:50px;" src="../media/icons/grow-shop.png" alt="User Image"> </h5>
                      <span class="description-text"> <small> <?php echo burengo_comercial; ?> </small></span>
                    </div>
                  </div>				  
				  
				  <div class="col-sm-4 border-top carTypeTxt ch18" cttlabel="18">
                    <div class="description-block">
                      <h5 class="description-header"><img style="width:50px;" src="../media/icons/rama.png" alt="User Image"> </h5>
                      <span class="description-text"> <small> <?php echo burengo_naves; ?> </small> </span>
                    </div>
                  </div>
				  	  <!------ Row 3 -------->
				  <div class="col-sm-4 border-right border-top carTypeTxt ch19" cttlabel="19">
                    <div class="description-block">
                      <h5 class="description-header"><img style="width:50px;" src="../media/icons/escritorio.png" alt="User Image"> </h5>
                      <span class="description-text"> <small> <?php echo burengo_oficinas; ?> </small></span>
                    </div>
                  </div>				  
				  
				  <div class="col-sm-4 border-right border-top carTypeTxt ch21" cttlabel="21">
                    <div class="description-block">
                      <h5 class="description-header"><img style="width:50px;" src="../media/icons/atico.png" alt="User Image"> </h5>
                      <span class="description-text"> <small> <?php echo burengo_penthouse; ?> </small></span>
                    </div>
                  </div>				  
				  
				  <div class="col-sm-4 border-top carTypeTxt ch23" cttlabel="23">
                    <div class="description-block">
                      <h5 class="description-header"><img style="width:50px;" src="../media/icons/event-room.png" alt="User Image"> </h5>
                      <span class="description-text"> <small> <?php echo burengo_events; ?> </small></span>
                    </div>
                  </div>
				  
				  <!------ Row 4-------->
				  <div class="col-sm-4 border-right border-top border-bottom carTypeTxt ch16" cttlabel="16">
                    <div class="description-block">
                      <h5 class="description-header"><img class=" " style="width:50px;" src="../media/icons/anteproyecto.png" alt="User Image"> </h5>
                      <span class="description-text"> <small> <?php echo burengo_solares; ?> </small> </span>
                    </div>
                  </div>				  
				  
				  <div class="col-sm-4 border-right border-top border-bottom carTypeTxt ch15" cttlabel="15" >
                    <div class="description-block ">
                      <h5 class="description-header "><img style="width:50px;" src="../media/icons/choza.png" alt="User Image"> </h5>
                      <span class="description-text"> <small> <?php echo burengo_villas; ?> </small> </span>
                    </div>
                  </div>				  
				  
				  <div class="col-sm-4 border-top border-bottom carTypeTxt ch24" cttlabel="24">
                    <div class="description-block">
                      <h5 class="description-header"><img style="width:50px;" src="../media/icons/other.png" alt="User Image"> </h5>
                      <span class="description-text"> <small> <?php echo burengo_otros; ?> </small> </span>
                    </div>
                  </div>
			 
          
                 
                  </div>
				<div class="row pt-2">
                 
                  <div class="col-6">
                    <select id="pricefrom" class="form-control">
						<option value="0"> <?php echo burengo_precioMin; ?>  </option>
					</select>
                  </div>
                  <div class="col-6">
					<select id="priceto" class="form-control">
						<option value="9000000"> <?php echo burengo_precioMax; ?>  </option>
					</select>
                  </div>
                </div>				

               <div class="pt-2">
					<select id="pisos" class="form-control"> 
						<option value="0"> <?php echo burengo_levels; ?>  </option>
						<option value="1"> 1 </option>
						<option value="2"> 2 </option>
						<option value="3"> 3 </option>						
						<option value="4"> 4 </option>						
						<option value="5"> 5 </option>											
					</select>
				</div> 
				
               <div class="pt-2">
					<select id="park" class="form-control"> 
						<option value="0"> <?php echo burengo_parks; ?>  </option>
						<option value="1"> 1 </option>
						<option value="2"> 2 </option>
						<option value="3"> 3 </option>						
						<option value="4"> 4 </option>						
						<option value="5"> 5 </option>							
					</select>
				</div> 
               
			   <div class="pt-2">
			   <select id="rooms" class="form-control"> 
					<option value="0"> <?php echo burengo_rooms; ?> </option>
                    <option value="1"> 1 </option>
                    <option value="2"> 2 </option>
                    <option value="3"> 3 </option>
					<option value="4"> 4 </option>
                    <option value="5"> 5 </option>
					</select>
				</div> 
            
 			   <div class="pt-2">
			   <select id="banos" class="form-control"> 
					<option value="0"> <?php echo burengo_baths; ?> </option>
                    <option value="1"> 1 </option>
                    <option value="2"> 2 </option>
                    <option value="3"> 3 </option>
					</select>
				</div>             	

              </div>
            </div> 
		</div>
 
<div class="col-lg-9">
<div class="p-0">
 <div class="card-body p-0">
	<div class="row plist">
 	</div>
   </div>
  </div>  
</div>
        </div>
      </div> 
    </div>
  </div>
  <footer class="main-footer"> Burengo &copy; 2020 - <?php echo burengo_copyright; ?> </footer>
</div>

<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script src="../../dist/js/demo.js"></script>
<script src="../../plugins/bootstrap-slider/bootstrap-slider.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$('#place').load('../ajax/burengo_select_places.php');
$('#pricefrom').load('../ajax/burengo_select_pricefrom.php');
$('#priceto').load('../ajax/burengo_select_priceto.php');


$('#pisos').change(function(){SendData(1);});
$('#park').change(function(){SendData(1);});
$('#banos').change(function(){SendData(1);});
$('#rooms').change(function(){SendData(1);});
$('#place').change(function(){SendData(1);});
$('#pricefrom').change(function(){SendData(1);});
$('#priceto').change(function(){SendData(1);});
 	
SendData(1);

$("#ctp").hide();
document.getElementById('ctpBtn').innerHTML='<i class="fas fa-plus"></i>';
$('.plist').load("../ajax/burengo_select_conditionals2.php?t0="+$('#getCat').val()+"&t1="+$('#string').val()+"&pageno=1");

switch($('#tpm2').val()){
 case '1': $('#btn1').addClass("bg-default"); $('#btn1').addClass("bg-warning"); break;
 case '2': $('#btn2').addClass("bg-default"); $('#btn2').addClass("bg-warning"); break;
}
});


$('#btn1').click(function(){ $('#btn2').removeClass("bg-warning"); $('#btn1').addClass("bg-warning"); location.href="?cat=1";  });
$('#btn2').click(function(){ $('#btn1').removeClass("bg-warning"); $('#btn2').addClass("bg-warning"); location.href="?cat=2"; });



$('.plist').on("click", "div.itemSelection", function(){ 
	var id = $(this).attr('itemId');
//	location.href="itemview.php?dtcd="+id; 
}); 


$('#ctp').on("click","div.carTypeTxt", function(){
	var myVal = $(this).attr("cttlabel");
	var old = $('#oldSelected').val();
	if(old==0){ /* Do Nothing */ }else{  $('.ch'+old).removeClass('bg-warning'); }
	$(this).addClass('bg-warning');	
	$('#oldSelected').val(myVal); 
	$('#tipocarro').val(myVal);	
	SendData(1);
});

$("#ctpBtn").click(function(){
  var op = $(this).attr('optp');
  
switch(op){
	case 'show': 
		$("#ctp").show();
		document.getElementById('ctpBtn').innerHTML='<i class="fas fa-minus"></i>';
		$("#ctpBtn").attr('optp','hide');
	break;
	case 'hide': 
	   $("#ctp").hide();
	   document.getElementById('ctpBtn').innerHTML='<i class="fas fa-plus"></i>';
	   $("#ctpBtn").attr('optp','show');	
	 break;
} 
});
 
function SendData($pageno){

var room = $('#rooms').val();
var banos = $('#banos').val(); 
var park = $('#park').val();
var tipocarro = $('#tipocarro').val();
var pisos = $('#pisos').val();
var place = $('#place').val();

var Mydats = [['rooms',room],
			  ['bath', banos],
			  ['parqueos',park],
			  ['vtype',tipocarro],
			  ['niveles',pisos],
			  ['lugar',place]];	

$("#string").val(JSON.stringify(Mydats));
$('.plist').load("../ajax/burengo_select_conditionals2.php?t0="+$('#getCat').val()+"&t1="+$('#string').val()+"&pageno="+$pageno+"");
}
 


$('.plist').on("click", "div.itemSelection", function(){ 
	var id = $(this).attr('itemId');
	var cat = $(this).attr('itemCat');
	
	switch(cat){
		case '1': location.href="../vehiculos.php?dtcd="+id; break;
		case '2': location.href="../inmuebles.php?dtcd="+id; break;
	} 
}); 

$('.plist').on("click","li.page-item",function(){
SendData($(this).attr('pg'));	 	
});

</script>
</body>
</html>
