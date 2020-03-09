<?php 
session_start();
date_default_timezone_set("America/Santo_Domingo");
$code = $_REQUEST["ccdt"];
require_once "../../modelos/conexion.php";


$stmt = Conexion::conectar()->prepare("SELECT p.*, c.*, i.*, m.*,n.*, l.*, cr.* FROM bgo_posts p 
INNER JOIN bgo_colores c ON p.bgo_color = c.clrs_id
INNER JOIN bgo_colores_int i ON p.bgo_color_interior = i.clrs_int_id
INNER JOIN bgo_marcas_vehiculos m ON p.bgo_marca = m.mv_id   
INNER JOIN bgo_modelos_vehiculos n ON p.bgo_modelo = n.mvd_id      
INNER JOIN bgo_places l ON p.bgo_lugar = l.pcid      
INNER JOIN bgo_currency cr ON p.bgo_currency = cr.cur_id      
AND p.bgo_code = '".$code."'");
$stmt -> execute();

if($results = $stmt -> fetch()){
	$user = $results['bgo_usercode'];
	$desc = $results['bgo_title'];
	$precio =  $results['bgo_price'];
	$year = $results['bgo_year']; 
	$modelo = $results['mvd_modelo'];
	$fullbrand = $results['mv_marca'] ; 
	$motor = 'N/A';
	$color =$results['clrs_name'];
	$color2 =$results['clrs_int_name'];
	$tipo = $results['bgo_vtype'];
	$fuel = $results['bgo_fuel'];
	$transmission = $results['bgo_transmision']; 
	$tracsion = $results['bgo_traccion'];
	$condition = $results['bgo_condicion'];
	$passengers = $results['bgo_pasajeros_cantidad'];
	$doors = $results['bgo_puertas_cantidad']; 
	$addr = $results['bgo_addr']; 
	$place = $results['pcstr']; 
	$thumpnail = "../../media/thumbnails/".$results['bgo_thumbnail'];
	$subcat = intval($results['bgo_cat']);
	$tcp = $results['bgo_uom'];
	$currency = $results['cur_code']; 
	$img = array($thumpnail,'0000.jpg','0000.jpg','0000.jpg','0000.jpg');
  }
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
  background: #0C84D9;
  color: #fff;
}
.bgo-progress-bar { position: absolute;  height: 10px;  width: 25%;  top: 20px;  left: 10%;  background: #bbb;}

.bgo-progress-bar.bgo-first {
    background: #0C84D9;  
}
.bgo-progress-bar.bgo-second {
  left: 35%;
  background: #0C84D9;
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
		  
		  <a href="../../access/inicio.php" class="dropdown-item">
            <i class="fas fa-th mr-2"></i> Portada  
          </a>
          <div class="dropdown-divider"></div>		  
          <a href="../../access/publicaciones.php" class="dropdown-item">
            <i class="far fa-list-alt mr-2"></i> Mis publicaciones 
          </a>
          <div class="dropdown-divider"></div>
          <a href="../../access/profile.php" class="dropdown-item">
            <i class="far fa-id-badge mr-2"></i> Cuenta    
          </a>
          <div class="dropdown-divider"></div>
          <a href="../../access/mensajes-recibidos.php" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> Mensajes
          </a>
          <div class="dropdown-divider"></div>
          <a href="../../access/salir.php" class="dropdown-item"> <i class="fas fa-sign-out-alt text-danger mr-2"></i> Cerrar Session </a>
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
	<!------------------------------> 
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
				
				  </h3>
              </div>
  <div class="card-body">
          <div class="row"> 	
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none"> <input id="getCode" type="hidden" value="<?php echo $code; ?>" /> </h3>
              <div class="col-12">
                <img src="<?php echo $thumpnail ?>" class="product-image" alt="Product Image">
              </div>
              <div class="col-12 product-image-thumbs">
                <div class="product-image-thumb active"><img src="<?php echo $img[0]; ?>" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="../../media/vehiculos/<?php echo $img[2]; ?>" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="../../media/vehiculos/<?php echo $img[3]; ?>" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="../../media/vehiculos/<?php echo $img[4]; ?>" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="../../media/vehiculos/<?php echo $img[4]; ?>" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="../../media/vehiculos/<?php echo $img[4]; ?>" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="../../media/vehiculos/<?php echo $img[4]; ?>" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="../../media/vehiculos/<?php echo $img[4]; ?>" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="../../media/vehiculos/<?php echo $img[4]; ?>" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="../../media/vehiculos/<?php echo $img[4]; ?>" alt="Product Image"></div>
              </div>
			  
			 
			  
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3"> <?php echo $desc; ?> </h3>
              <p>  </p>

              <hr>
              
				<div class="p-0">
					<table class="table table-sm">
                         <tbody>
							<tr>
                                <td><label> Marca:</label></td>
                                <td> <?php echo $fullbrand; ?></td> 
								<td><label> Modelo:</label></td>
                                <td><?php echo $modelo; ?></td> 											
                            </tr>							
							<tr>
                                <td><label> Condicion:</label></td>
                                <td> <?php echo $condition; ?></td> 
								<td><label> Año:</label></td>
                                <td><?php echo $year; ?></td> 											
                            </tr>
                                        <tr>
                                            <td><label>Color:</label></td>
                                            <td><?php echo $color; ?></td> 
                                            <td><label>Tipo:</label></td>
                                            <td><?php echo $tipo; ?></td> 
                                        </tr>
                                        <tr>
                                            <td><label>Interior:</label></td>
                                            <td><?php echo $color2; ?></td> 
                                            <td><label>Combustible: </label></td>
                                            <td><?php echo $fuel; ?></td>
                                        </tr>
                                      
                                        <tr>
                                            <td><label>Transmisión:</label></td>
                                            <td><?php echo $transmission; ?></td> 

                                            <td><label>Puertas:</label></td>
                                            <td><?php echo $doors; ?></td>
                                        </tr>
                                        <tr>
                                            <td><label>Tracción:</label></td>
                                            <td><?php echo $tracsion; ?></td>   
                                            <td><label>Pasajeros:</label></td>
                                            <td><?php echo $passengers; ?></td>                                
                                        </tr>                                        
										<tr>
                                            <td><label>Lugar:</label></td>
                                            <td><?php echo $place; ?></td>   
                                            <td><label>Direccion:</label></td>
                                            <td><?php echo $addr; ?></td>                                
                                        </tr>										
										<tr>
                                            <td><label>Precio:</label></td>
                                            <td><?php echo number_format($precio,2).' '.convert($tcp);  ?></td>   
                                            <td><label>Moneda:</label></td>
                                            <td><?php echo $currency; ?></td>                                
                                        </tr>
										
									 
										
                                    </tbody></table>

                            </div>

             
            
             
			<div class="mt-4 product-share"></div>

            </div>
          </div>
       </div>
        
			
			<div class="card-footer clearfix">
                <button id="cancel" type="button" class="btn btn-danger"> <i class="fas fa-times-circle"></i> Cancelar </button>
              	<div class="float-right" >
					<button type="button" class="btn btn-warning">  <i class="fas fa-edit"></i> Editar Datos  </button>
					<button id="btnSave" type="button" class="btn btn-success">  Finalizar <i class="fas fa-check-circle"></i> </button>
                </div>
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
<script src="../../plugins/toastr/toastr.min.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script src="../../dist/js/demo.js"></script>
<script type="text/javascript">
 
 

$('#cancel').click(function(){
	//cancelar aqui implica borrar la data y eliminar la imagen / imagenes 
});

$('#btnSave').click(function(){
 $.getJSON('../../ajax/burengo_update_vehicle_status.php',{
	code: $('#getCode').val()	
  },function(data){
		switch(data['ok']){
			case 0: toastr.error('ERROR! No se pudo almacenar los datos: '+ data['err']); break;
			case 1: location.href="../../access/publicaciones.php";   break;
		}
	});	
	
});

           

</script>
</body>
</html>
<?php 
function convert($id){
	switch($id){
		case 0: return ""; break;
		case 1: return " x dia "; break;
		case 2: return " x Noche "; break;
		case 3: return " x Hora"; break;
		case 4: return " - Semanal"; break;
		case 5: return " - Mensual"; break;
		default: return ""; break;
	}
  
}

?>