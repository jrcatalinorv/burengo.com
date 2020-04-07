<?php 
session_start();
date_default_timezone_set("America/Santo_Domingo");
require_once "../../modelos/conexion.php";

$tp = $_REQUEST['cat'];


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
  <link rel="stylesheet" href="../../../plugins/bootstrap-slider/css/bootstrap-slider.min.css">
  <link rel="stylesheet" href="../../../dist/css/adminlte.css">
<style>
.burengo-img-grid{
	width: 250px; 
	height:180px;
}
</style>  
 
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
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
          <i class="fas fa-bars fa-lg"></i> </a>
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
          <a href="../mensajes-recibidos.php" class="dropdown-item">
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
  <div class="content-wrapper bg-white">
    <!-- Main content -->
    <div class="content ">
      <div class=" ">
        <div class="row pt-2 ">
		
          <div class="col-lg-3 ">
		  <input id="tipocarro"  type="hidden" value="0" />
		  <input id="string"     type="hidden" />
		  <input id="getCat"       type="hidden" value="<?php echo $tp; ?>" />
		  	<div class="card">
              <div class="card-body p-1 opFilters">
			       <div class="pt-2">
                        <select id="tpm2" class="form-control opSelector" variable="condition">
                          <option <?php if($tp==1){ echo "selected"; } ?> value="1"> Comprar </option>
                          <option <?php if($tp==2){ echo "selected"; } ?> value="2"> Rentar / Alquilar  </option>
                        </select>                    
					</div>
			  
			  
                  <div class="pt-2">
                        <select id="condition" class="form-control opSelector" variable="condition">
                          <option value="0"> Condicion del vehiculo </option>
                          <option value="0"> Todas </option>
                          <option value="Nuevo"> Nuevo </option>
                          <option value="Usado"> Usado </option>
                        </select>                    
					</div>
				  <div class="pt-2">
						<select id="brands" class="form-control opSelector" variable="marca"> 
						<option value="0"> Marcas </option> </select>
						</select> 
				</div> 
                <div class="pt-2"><select id="models" class="form-control"> 
					<option value="0"> Modelos </option> </select></div> 
             	
				<div class="card-header">
            <h3 class="card-title"> Tipos de Vehiculos</h3>

            <div class="card-tools">
              <a id="ctpBtn" href="#" class="btn-tool" optp="show" ></a>
            </div>
          </div>
			 
				<div id="ctp"  class="row pt-0 Hideme">
		
				<div class="col-sm-4 border-right border-top carTypeTxt" cttlabel="1">
                    <div class="description-block">
                      <h5 class="description-header"><img class="img-circle" style="width:50px;" src="../../media/icons/sedan.png" alt="User Image"> </h5>
                      <span class="description-text">Sedan</span>
                    </div>             
                  </div>				
				  
				  <div class="col-sm-4 border-right border-top carTypeTxt" cttlabel="2">
                    <div class="description-block">
                      <h5 class="description-header"><img class="" style="width:50px;" src="../../media/icons/todoterreno.png" alt="User Image"> </h5>
                      <span class="description-text">Jeepeta</span>
                    </div>         
                  </div>				  
				  
				  <div class="col-sm-4 border-top carTypeTxt" cttlabel="3">
                    <div class="description-block ">
                      <h5 class="description-header"><img class="" style="width:50px;" src="../../media/icons/camioneta.png" alt="User Image"> </h5>
                      <span class="description-text">Camioneta</span>
                    </div>
                  </div>				  
				  <!------ Row 2-------->
				  <div class="col-sm-4 border-right border-top carTypeTxt" cttlabel="4">
                    <div class="description-block">
                      <h5 class="description-header"><img style="width:50px;" src="../../media/icons/limusina.png" alt="User Image"> </h5>
                      <span class="description-text">Limosinas</span>
                    </div>
                  </div>				  
				  
				  <div class="col-sm-4 border-right border-top carTypeTxt" cttlabel="5">
                    <div class="description-block">
                      <h5 class="description-header"><img style="width:50px;" src="../../media/icons/sport-car.png" alt="User Image"> </h5>
                      <span class="description-text">Coupe/Sport</span>
                    </div>
                  </div>				  
				  
				  <div class="col-sm-4 border-top carTypeTxt" cttlabel="6">
                    <div class="description-block">
                      <h5 class="description-header"><img style="width:50px;" src="../../media/icons/motocicleta.png" alt="User Image"> </h5>
                      <span class="description-text">  Motores </span>
                    </div>
                  </div>
				  	  <!------ Row 3 -------->
				  <div class="col-sm-4 border-right border-top carTypeTxt" cttlabel="7">
                    <div class="description-block">
                      <h5 class="description-header"><img style="width:50px;" src="../../media/icons/bus-electrico.png" alt="User Image"> </h5>
                      <span class="description-text">Autobuses</span>
                    </div>
                  </div>				  
				  
				  <div class="col-sm-4 border-right border-top carTypeTxt" cttlabel="8">
                    <div class="description-block">
                      <h5 class="description-header"><img style="width:50px;" src="../../media/icons/barco.png" alt="User Image"> </h5>
                      <span class="description-text"> Barcos </span>
                    </div>
                  </div>				  
				  
				  <div class="col-sm-4 border-top carTypeTxt" cttlabel="9">
                    <div class="description-block">
                      <h5 class="description-header"><img style="width:50px;" src="../../media/icons/moto-acuatica.png" alt="User Image"> </h5>
                      <span class="description-text"> Jet Ski </span>
                    </div>
                  </div>
				  
				  <!------ Row 4-------->
				  <div class="col-sm-4 border-right border-top border-bottom carTypeTxt" cttlabel="10">
                    <div class="description-block">
                      <h5 class="description-header"><img class="img-circle" style="width:50px;" src="../../media/icons/camion.png" alt="User Image"> </h5>
                      <span class="description-text">Caminoes</span>
                    </div>
                  </div>				  
				  
				  <div class="col-sm-4 border-right border-top border-bottom carTypeTxt" cttlabel="11">
                    <div class="description-block">
                      <h5 class="description-header"><img style="width:50px;" src="../../media/icons/mezclador.png" alt="User Image"> </h5>
                      <span class="description-text">V. Pesados </span>
                    </div>
                  </div>				  
				  
				  <div class="col-sm-4 border-top border-bottom carTypeTxt" cttlabel="12">
                    <div class="description-block">
                      <h5 class="description-header"><img style="width:50px;" src="../../media/icons/generador.png" alt="User Image"> </h5>
                      <span class="description-text"> Otros </span>
                    </div>
                  </div>
			 
          
                 
                  </div>
				<div class="row pt-2">
                 
                  <div class="col-6">
                    <select id="pricefrom" class="form-control">
						<option value="0"> Precio Min.  </option>
						<option value="25000"> $25,000  </option>
						<option value="50000"> $50,000  </option>
						<option value="75000"> $75,000  </option>
						<option value="100000"> $100,000  </option>
						<option value="150000"> $150,000  </option>
						<option value="200000"> $200,000  </option>
						<option value="250000"> $250,000  </option>
						<option value="300000"> $300,000  </option>
						<option value="350000"> $350,000  </option>
						<option value="400000"> $400,000  </option>
						<option value="450000"> $450,000  </option>
						<option value="500000"> $500,000  </option>
						<option value="550000"> $550,000  </option>
						<option value="600000"> $600,000  </option>
						<option value="650000"> $650,000  </option>
						<option value="700000"> $700,000  </option>
						<option value="750000"> $750,000  </option>
						<option value="800000"> $800,000  </option>
						<option value="850000"> $850,000  </option>
						<option value="900000"> $900,000  </option>
						<option value="950000"> $950,000  </option>
						<option value="1000000"> $1,000,000  </option>
						<option value="1500000"> $1,500,000  </option>
						<option value="2000000"> $2,000,000  </option>
						<option value="2500000"> $2,500,000  </option>
					</select>
                  </div>
                  <div class="col-6">
					<select id="priceto" class="form-control">
						<option value="9000000"> Precio Max.  </option>
						<option value="50000"> $50,000  </option>
						<option value="75000"> $75,000  </option>
						<option value="100000"> $100,000  </option>
						<option value="150000"> $150,000  </option>
						<option value="200000"> $200,000  </option>
						<option value="250000"> $250,000  </option>
						<option value="300000"> $300,000  </option>
						<option value="350000"> $350,000  </option>
						<option value="400000"> $400,000  </option>
						<option value="450000"> $450,000  </option>
						<option value="500000"> $500,000  </option>
						<option value="550000"> $550,000  </option>
						<option value="600000"> $600,000  </option>
						<option value="650000"> $650,000  </option>
						<option value="700000"> $700,000  </option>
						<option value="750000"> $750,000  </option>
						<option value="800000"> $800,000  </option>
						<option value="850000"> $850,000  </option>
						<option value="900000"> $900,000  </option>
						<option value="950000"> $950,000  </option>
						<option value="1000000"> $1,000,000  </option>
						<option value="1500000"> $1,500,000  </option>
						<option value="2000000"> $2,000,000  </option>
						<option value="2500000"> $2,500,000  </option>
					</select>
                  </div>
                </div>				
				
				<div class="row pt-2">
                  <div class="col-6">
                    <select id="yearfrom" class="form-control">
						 <option value="0"> Año Desde </option>
                    </select>
                  </div>
                  <div class="col-6">
                       <select id="yearto" class="form-control">
						 <option value="0"> Año Hasta </option>
                    </select>
                  </div>
                </div>
				 
               <div class="pt-2">
					<select id="fuel" class="form-control"> 
						<option value="0"> Combustible </option>
						<option value="1"> Gasolina </option>
						<option value="2"> Gas/GLP </option>
						<option value="3"> Gasoil/Diesel </option>						
					</select>
				</div> 
				
               <div class="pt-2">
					<select id="color" class="form-control"> 
							<option value="0"> Color </option> 
					</select>
				</div> 
               
			   <div class="pt-2">
			   <select id="transmision" class="form-control"> 
					<option value="0"> Transmision </option>
                    <option value="1"> Automatica </option>
                    <option value="2"> Manual </option>
                    <option value="3"> Triptonica </option>
					</select>
				</div> 
               <div class="pt-2">
					<select id="place" class="form-control"> 
							<option value="0"> Lugar </option> 
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

<script src="../../../plugins/jquery/jquery.min.js"></script>
<script src="../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../../dist/js/adminlte.min.js"></script>
<script src="../../../dist/js/demo.js"></script>
<script src="../../../plugins/bootstrap-slider/bootstrap-slider.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$('#brands').load('../../ajax/bgo_select_car_brands.php');	
$('#yearfrom').load('../../ajax/bgo_select_active_years2.php');	
$('#yearto').load('../../ajax/bgo_select_active_years3.php');
$('#color').load('../../ajax/burengo_select_color.php');
$('#place').load('../../ajax/burengo_select_places.php');	
SendData();
$("#ctp").hide();
document.getElementById('ctpBtn').innerHTML='<i class="fas fa-plus"></i>';
$('.plist').load("../ajax/burengo_select_conditionals_acc.php?t0="+$('#getCat').val()+"&t1="+$('#string').val()+"&t2="
					+$('#pricefrom').val()+"&t3="+$('#priceto').val()+"&t4="
					+$('#yearfrom').val()+"&t5="+$('#yearto').val()+"");

});


$('#tpm2').change(function(){
	var url = $('#tpm2').val();
	location.href="?cat="+url;
});


$('#condition').change(function(){SendData();});
$('#brands').change(function(){SendData();});
$('#brands').change(function(){SendData();});
$('#models').change(function(){SendData();});
$('#fuel').change(function(){SendData();});
$('#color').change(function(){SendData();});
$('#transmision').change(function(){SendData();});
$('#place').change(function(){SendData();});
$('#yearfrom').change(function(){SendData();});
$('#yearto').change(function(){SendData();});
$('#pricefrom').change(function(){SendData();});
$('#priceto').change(function(){SendData();});
 
$('#brands').change(function(){$('#models').load('../../ajax/bgo_select_car_models.php?id='+$('#brands').val()); });
 
 
 
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
var condition = $('#condition').val();
var brand = $('#brands').val();
var brand = $('#brands').val();
var model = $('#models').val();
var tipocarro = $('#tipocarro').val();
var fuel = $('#fuel').val();
var color = $('#color').val();
var transmision = $('#transmision').val();
var place = $('#place').val();
	
var Mydats = [['condicion',condition],
			  ['marca',brand],
			  ['modelo',model],
			  ['vtype',tipocarro],
			  ['fuel',fuel],
			  ['color',color],
			  ['transmision',transmision],
			  ['lugar',place]];		

$("#string").val(JSON.stringify(Mydats)); 
$('.plist').load("../../ajax/burengo_select_conditionals_acc.php?t0="+$('#getCat').val()+"&t1="+$('#string').val()+"&t2="+$('#pricefrom').val()+"&t3="+$('#priceto').val()+"&t4="+$('#yearfrom').val()+"&t5="+$('#yearto').val()+"");
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
