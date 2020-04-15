<?php 
session_start();
date_default_timezone_set("America/Santo_Domingo");
$code = $_REQUEST["ccdt"];
require_once "../../../../modelos/conexion.php";
require_once "../../../../modelos/data.php";

$stmt = Conexion::conectar()->prepare("SELECT p.*, t.*, cr.*, l.* FROM bgo_posts p
INNER JOIN bgo_innercategoires t ON p.bgo_tipolocal = t.inncat 
INNER JOIN bgo_places l ON p.bgo_lugar = l.pcid 
INNER JOIN bgo_currency cr ON p.bgo_currency = cr.cur_id  AND p.bgo_code = '".$code."'");

$stmt -> execute();
if($results = $stmt -> fetch()){
	$user = $results['bgo_usercode'];
	$desc = $results['bgo_title'];
	$precio =  $results['bgo_price'];
	$tipo = $results['inncat_name'];
	if(intval($results['bgo_cat'])==1){
		$mod = "Venta";
	}else{
		$mod = "Renta";
	}
	
	$addr = $results['bgo_addr']; 
	 
	$thumpnail = "../../../../media/thumbnails/".$results['bgo_thumbnail'];
		$totalPhotos = intval($results['bgo_comp_img']);
	$subcat = intval($results['bgo_cat']);
	$tcp = $results['bgo_uom'];
	$currency =  $results['cur_str']." (".$results['cur_code'].")"; /* Tipo de moneda */  
	$img = array($thumpnail,'0000.jpg','0000.jpg','0000.jpg','0000.jpg');
	$addr = $results['bgo_addr']; 
	$place = $results['pcstr']; 
	$terreno = $results['bgo_terreno'];
	$construccion = $results['bgo_construccion'];
	$niveles = $results['bgo_niveles'];
	$rooms = $results['bgo_rooms'];
	$baths = $results['bgo_bath'];
	$garage = $results['bgo_parqueos'];
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="icon" type="image/png" href="../../../../../favicon.ico"/>
  <title>Burengo</title>
  <link rel="stylesheet" href="../../../../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../../../../plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="../../../../../dist/css/adminlte.css">
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
      <a href="" class="navbar-brand"><span class="brand-text"><span class="text-danger">Burengo</span></span></a>
      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <ul class="navbar-nav"> </ul>
      </div>
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
         <li class="nav-item"><a class="nav-link" href="">
			 <img alt="Avatar"  class="user-image" src="../../../../media/users/<?php echo $_SESSION['bgo_userImg']; ?>">
			 <?php echo $_SESSION['bgo_user']; ?></a>
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
			<div class="bgo-message bgo-message-1"> <?php echo burengo_gral; ?> <div>
			<div class="bgo-message bgo-message-2"> <?php echo burengo_upImg; ?>  <div>
			<div class="bgo-message bgo-message-3"> <?php echo burengo_confirmData; ?>  <div>
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
                <div class="product-image-thumb active"><img src="<?php echo  $thumpnail; ?>" alt="Product Image"></div>
       <?php 
				  for($i=0; $i < $totalPhotos; $i++){
					 echo '<div class="product-image-thumb" ><img src="../../../../media/images/'.$code.'/'.$code.'-'.$i.'.jpg" alt="Product Image"></div>';
				  }
				?>
              </div>
			  
			 
			  
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3"> <?php echo $desc; ?> </h3>
              <p>  </p>

              
              
	 <div class="p-0">
			 
					<table class="table table-sm">
                         <tbody>
							<tr>
                                <td><label> <?php echo burengo_property; ?>:</label></td>
                                <td> <?php echo $tipo; ?></td> 
								<td><label>  <?php echo burengo_modalidad; ?>: </label></td>
                                <td><?php echo $mod; ?></td> 											
                            </tr>
							<tr>
                               <td><label><?php echo burengo_place; ?>:</label></td>
                               <td><?php echo $place; ?></td>   
                               <td><label><?php echo burengo_addr; ?>:</label></td>
                               <td><?php echo $addr; ?></td>                                
                            </tr>							
							<tr>
                                <td><label> <?php echo burengo_construccion; ?>:</label></td>
                                <td> <?php echo $construccion; ?></td> 
								<td><label> <?php echo burengo_terreno; ?>:</label></td>
                                <td><?php echo $terreno; ?></td> 											
                            </tr>							
							<tr>
                                <td><label> <?php echo burengo_levels; ?>:</label></td>
                                <td> <?php if(intval($niveles)>0){ echo $niveles; }else{ echo "No especificado"; } ?></td> 
								<td><label> <?php echo burengo_rooms; ?>:</label></td>
                                <td><?php if(intval($rooms)>0){ echo $rooms; }else{ echo "No especificado"; } ?></td> 											
                            </tr>							
							<tr>
                                <td><label> <?php echo burengo_baths; ?>:</label></td>
                                <td> <?php if(intval($baths)>0){ echo $baths; }else{ echo "No especificado"; } ?></td> 
								<td><label> <?php echo burengo_parks; ?>:</label></td>
                                <td><?php if(intval($baths)>0){ echo $garage; }else{ echo "No especificado"; } ?></td> 											
                            </tr>							
						    <tr>
                               <td><label><?php echo burengo_currency; ?>:</label></td>
                              <td><?php echo $currency; ?></td>   
							  <td><label><?php echo burengo_price; ?>:</label></td>
                              <td><?php echo number_format($precio,2).' '.convert($tcp);  ?></td>   
                            </tr>
						 </tbody>
					</table>
			</div>
			<div class="mt-4 product-share"></div>

            </div>
          </div>
       </div>
        
			
			<div class="card-footer clearfix">
                <button id="cancel" type="button" class="btn btn-danger"> <i class="fas fa-times-circle"></i> <?php echo burengo_cancel; ?> </button>
              	<div class="float-right" >
					<button id="btnEdit" type="button" class="btn btn-warning">  <i class="fas fa-edit"></i> <?php echo burengo_edit; ?>  </button>
					<button id="btnSave" type="button" class="btn btn-success">   <?php echo burengo_finish; ?> <i class="fas fa-check-circle"></i> </button>
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
  <footer class="main-footer">  Burengo &copy; 2020 - <?php echo burengo_copyright; ?> </footer>
</div>
<!-- ./wrapper -->

<script src="../../../../../plugins/jquery/jquery.min.js"></script>
<script src="../../../../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../../../../plugins/toastr/toastr.min.js"></script>
<script src="../../../../../dist/js/adminlte.min.js"></script>
<script src="../../../../../dist/js/demo.js"></script>
<script type="text/javascript">

$('#btnEdit').click(function(){
	
	location.href="edit-datos.php?ccdt="+$('#getCode').val()+"&pth=1";
	
});
 
 

$('#cancel').click(function(){
	//cancelar aqui implica borrar la data y eliminar la imagen / imagenes 
});


$('#btnSave').click(function(){
 $.getJSON('../../../../ajax/burengo_update_vehicle_status.php',{
	code: $('#getCode').val()	
  },function(data){
		switch(data['ok']){
			case 0: toastr.error('ERROR! No se pudo almacenar los datos: '+ data['err']); break;
			case 1: location.href="../../../publicaciones.php";   break;
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