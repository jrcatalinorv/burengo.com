<?php 
date_default_timezone_set("America/Santo_Domingo");
require_once "../modelos/conexion.php";

$tp = $_REQUEST['cat'];


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
    <link rel="stylesheet" href="../../plugins/bootstrap-slider/css/bootstrap-slider.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
 
 
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
 <nav class="main-header navbar navbar-expand-md navbar-dark bg-navy"> 
    <div class="container">
      <a href="../../do" class="navbar-brand">
          <img src="../../dist/img/burengo.png" alt="Burengo Logo" class="brand-image   elevation-0" style="opacity: .8">  
      </a>
      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <ul class="navbar-nav"> </ul>
      </div>

      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item"><a class="nav-link" href="../../do"> Portada </a></li>
        <li class="nav-item"><a class="nav-link" href="../acceder.php"> Iniciar Session </a></li>
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
		  <input id="tipocarro" type="hidden" value="0" />
		  <input   id="string"  type="hidden" />
		  <input id="getCat"  type="hidden" value="<?php echo $tp; ?>" />
		  	<div class="card">
              <div class="card-body p-1 opFilters">
                  <div class="pt-2">
                        <select id="condition" class="form-control opSelector" variable="condition">
                          <option <?php if($tp==1){ echo "selected"; } ?> value="1"> Comprar </option>
                          <option <?php if($tp==2){ echo "selected"; } ?> value="2"> Rentar / Alquilar  </option>
                        </select>                    
					</div>
			 
			    <div class="pt-2">
					<select id="place" class="form-control"> 
							<option value="0"> Lugar </option> 
					</select>
			   </div> 
			 
              
             	
				<div class="card-header">
            <h3 class="card-title"> Tipos de Propiedad </h3>

            <div class="card-tools">
              <a id="ctpBtn" href="#" class="btn-tool" optp="show" ></a>
            </div>
          </div>
			 
				<div id="ctp"  class="row pt-0 Hideme">
		
				<div class="col-sm-4 border-right border-top carTypeTxt" cttlabel="14">
                    <div class="description-block">
                      <h5 class="description-header"><img class="" style="width:50px;" src="../media/icons/urbano.png" alt="User Image"> </h5>
                      <span class="description-text"> <small> Apartamentos </small> </span>
                    </div>             
                  </div>				
				  
				  <div class="col-sm-4 border-right border-top carTypeTxt" cttlabel="13">
                    <div class="description-block">
                      <h5 class="description-header"><img class="" style="width:50px;" src="../media/icons/casas.png" alt="User Image"> </h5>
                      <span class="description-text"> <small>Casas </small></span>
                    </div>         
                  </div>				  
				  
				  <div class="col-sm-4 border-top carTypeTxt" cttlabel="20">
                    <div class="description-block ">
                      <h5 class="description-header"><img class="" style="width:50px;" src="../media/icons/condominio.png" alt="User Image"> </h5>
                      <span class="description-text"> <small>Edificios </small> </span>
                    </div>
                  </div>				  
				  <!------ Row 2-------->
		  <div class="col-sm-4 border-right border-top carTypeTxt" cttlabel="17">
                    <div class="description-block">
                      <h5 class="description-header"><img style="width:50px;" src="../media/icons/bosque.png" alt="User Image"> </h5>
                      <span class="description-text"> <small>Fincas </small></span>
                    </div>
                  </div>				  
				  
				  <div class="col-sm-4 border-right border-top carTypeTxt" cttlabel="22">
                    <div class="description-block">
                      <h5 class="description-header"><img style="width:50px;" src="../media/icons/grow-shop.png" alt="User Image"> </h5>
                      <span class="description-text"> <small>Local Comercial </small></span>
                    </div>
                  </div>				  
				  
				  <div class="col-sm-4 border-top carTypeTxt" cttlabel="18">
                    <div class="description-block">
                      <h5 class="description-header"><img style="width:50px;" src="../media/icons/rama.png" alt="User Image"> </h5>
                      <span class="description-text"> <small> Naves Industriales </small> </span>
                    </div>
                  </div>
				  	  <!------ Row 3 -------->
				  <div class="col-sm-4 border-right border-top carTypeTxt" cttlabel="19">
                    <div class="description-block">
                      <h5 class="description-header"><img style="width:50px;" src="../media/icons/escritorio.png" alt="User Image"> </h5>
                      <span class="description-text"> <small>Oficinas </small></span>
                    </div>
                  </div>				  
				  
				  <div class="col-sm-4 border-right border-top carTypeTxt" cttlabel="21">
                    <div class="description-block">
                      <h5 class="description-header"><img style="width:50px;" src="../media/icons/atico.png" alt="User Image"> </h5>
                      <span class="description-text"> <small>Penthouse </small></span>
                    </div>
                  </div>				  
				  
				  <div class="col-sm-4 border-top carTypeTxt" cttlabel="23">
                    <div class="description-block">
                      <h5 class="description-header"><img style="width:50px;" src="../media/icons/event-room.png" alt="User Image"> </h5>
                      <span class="description-text"> <small>Salon Eventos </small></span>
                    </div>
                  </div>
				  
				  <!------ Row 4-------->
				  <div class="col-sm-4 border-right border-top border-bottom carTypeTxt" cttlabel="16">
                    <div class="description-block">
                      <h5 class="description-header"><img class=" " style="width:50px;" src="../media/icons/anteproyecto.png" alt="User Image"> </h5>
                      <span class="description-text"> <small>Solares </small> </span>
                    </div>
                  </div>				  
				  
				  <div class="col-sm-4 border-right border-top border-bottom carTypeTxt bg-warning" cttlabel="15" >
                    <div class="description-block ">
                      <h5 class="description-header "><img style="width:50px;" src="../media/icons/choza.png" alt="User Image"> </h5>
                      <span class="description-text"> <small>Villas </small> </span>
                    </div>
                  </div>				  
				  
				  <div class="col-sm-4 border-top border-bottom carTypeTxt" cttlabel="24">
                    <div class="description-block">
                      <h5 class="description-header"><img style="width:50px;" src="../media/icons/other.png" alt="User Image"> </h5>
                      <span class="description-text"> <small> Otros </small> </span>
                    </div>
                  </div>
			 
          
                 
                  </div>
				<div class="row pt-2">
                 
                  <div class="col-6">
                    <select id="pricefrom" class="form-control">
						<option value="0"> Precio Min.  </option>
						<option value="500000"> $500,000  </option>
						<option value="600000"> $600,000  </option>
						<option value="700000"> $700,000  </option>
						<option value="800000"> $800,000  </option>
						<option value="900000"> $900,000  </option>
						<option value="1000000"> $1,000,000  </option>
						<option value="1500000"> $1,500,000  </option>
						<option value="2000000"> $2,000,000  </option>
						<option value="2500000"> $2,500,000  </option>
						<option value="3000000"> $3,000,000  </option>
						<option value="4000000"> $4,000,000  </option>
						<option value="5000000"> $5,000,000  </option>
						<option value="7000000"> $7,000,000  </option>
						<option value="10000000"> $10,000,000  </option>
						<option value="15000000"> $15,000,000  </option>
						<option value="25000000"> $25,000,000  </option>
						<option value="50000000"> $50,000,000  </option>
					</select>
                  </div>
                  <div class="col-6">
					<select id="priceto" class="form-control">
						<option value="9000000"> Precio Max.  </option>
						<option value="500000"> $500,000  </option>
						<option value="600000"> $600,000  </option>
						<option value="700000"> $700,000  </option>
						<option value="800000"> $800,000  </option>
						<option value="900000"> $900,000  </option>
						<option value="1000000"> $1,000,000  </option>
						<option value="1500000"> $1,500,000  </option>
						<option value="2000000"> $2,000,000  </option>
						<option value="2500000"> $2,500,000  </option>
						<option value="3000000"> $3,000,000  </option>
						<option value="4000000"> $4,000,000  </option>
						<option value="5000000"> $5,000,000  </option>
						<option value="7000000"> $7,000,000  </option>
						<option value="10000000"> $10,000,000  </option>
						<option value="15000000"> $15,000,000  </option>
						<option value="25000000"> $25,000,000  </option>
						<option value="50000000"> $50,000,000  </option>
						<option value="1500000000"> $50,000,000+  </option>
					</select>
                  </div>
                </div>				
				
		
				 
               <div class="pt-2">
					<select id="pisos" class="form-control"> 
						<option value="0"> Niveles / Pisos  </option>
						<option value="1"> 1 </option>
						<option value="2"> 2 </option>
						<option value="3"> 3 </option>						
						<option value="4"> 4 </option>						
						<option value="5"> 5 </option>											
					</select>
				</div> 
				
               <div class="pt-2">
					<select id="park" class="form-control"> 
						<option value="0"> Parqueos / Marquesinas  </option>
						<option value="1"> 1 </option>
						<option value="2"> 2 </option>
						<option value="3"> 3 </option>						
						<option value="4"> 4 </option>						
						<option value="5"> 5 </option>							
					</select>
				</div> 
               
			   <div class="pt-2">
			   <select id="rooms" class="form-control"> 
					<option value="0"> Habitaciones / Oficinas </option>
                    <option value="1"> 1 </option>
                    <option value="2"> 2 </option>
                    <option value="3"> 3 </option>
					</select>
				</div> 
            
 			   <div class="pt-2">
			   <select id="banos" class="form-control"> 
					<option value="0"> Banos </option>
                    <option value="1"> 1 </option>
                    <option value="2"> 2 </option>
                    <option value="3"> 3 </option>
					</select>
				</div>             	
			 
						

               
              </div>
            </div> 
			
		 
		  
	  
         
			 

          </div>
          <!-- /.col-md-6 -->
<div class="col-lg-9">
<div class="p-0">
 <div class="card-body p-0">
	<div class="row plist">
 	</div>
   </div>
  </div>  
</div>
          <!-- /.col-md-6 -->
  
        </div>
        <!-- /.row -->
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

<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script src="../../dist/js/demo.js"></script>
<script src="../../plugins/bootstrap-slider/bootstrap-slider.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$('#place').load('../ajax/burengo_select_places.php');	
SendData();
$("#ctp").hide();
document.getElementById('ctpBtn').innerHTML='<i class="fas fa-plus"></i>';

 $('.plist').load("../ajax/burengo_select_conditionals2.php?t0="+$('#getCat').val()+"&t1="+$('#string').val());

});


$('#condition').change(function(){
	var url = $('#condition').val();
	location.href="?cat="+url;
});


$('#pisos').change(function(){SendData();});
$('#park').change(function(){SendData();});
$('#banos').change(function(){SendData();});
$('#rooms').change(function(){SendData();});
$('#place').change(function(){SendData();});
$('#pricefrom').change(function(){SendData();});
$('#priceto').change(function(){SendData();});
 

$('.plist').on("click", "div.itemSelection", function(){ 
	var id = $(this).attr('itemId');
//	location.href="itemview.php?dtcd="+id; 
}); 


$('#ctp').on("click","div.carTypeTxt", function(){
	var myVal = $(this).attr("cttlabel");
	$('#tipocarro').val(myVal);
	 SendData();
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
 
function SendData(){

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
$('.plist').load("../ajax/burengo_select_conditionals2.php?t0="+$('#getCat').val()+"&t1="+$('#string').val());
 
//$('.plist').load("../ajax/burengo_select_conditionals.php?t0="+$('#getCat').val()+"&t1="+$('#string').val()+"&t2="+$('#pricefrom').val()+"&t3="+$('#priceto').val()+"&t4="+$('#yearfrom').val()+"&t5="+$('#yearto').val()+"");
}
 


$('.plist').on("click", "div.itemSelection", function(){ 
	var id = $(this).attr('itemId');
	var cat = $(this).attr('itemCat');
	
	switch(cat){
		case '1': location.href="../vehiculos.php?dtcd="+id; break;
		case '2': location.href="../inmuebles.php?dtcd="+id; break;
	} 
}); 

</script>
</body>
</html>
