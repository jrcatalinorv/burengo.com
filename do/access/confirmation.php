<?php 
session_start();
date_default_timezone_set("America/Santo_Domingo");
require_once "../modelos/conexion.php";
 $date = date('Y-m-d'); 
 $plan = $_REQUEST["p"];
 $uid = $_REQUEST["acc"];
 
/* Colocar datos del plan */
$stmt2 = Conexion::conectar()->prepare("SELECT * FROM bgo_planes WHERE planid = ".$plan."");
$stmt2 -> execute();
if($results = $stmt2 -> fetch()){
$nombre_plan   = $results['planname'];
$precio_plan   = number_format($results['planprice'],2).' '.$results['plancurrency'];
$duracion_plan = $results['planduration'];
$max_fotos = $results['planmaxf'];
$max_post = $results['planmaxp'];

$_SESSION['bgo_maxP'] = $max_post;
$_SESSION['bgo_planName'] = $nombre_plan;
$_SESSION['bgo_perfil'] = $plan;


$up_expdate =  date('Y-m-d', strtotime($date. ' + 30 days'));

/* verificar si ya se ha completado la transacción */

/* Actualizar los datos */
$stmt0 = Conexion::conectar()->prepare("UPDATE bgo_user_plan SET up_planid = ".$plan." , up_maxp =".$max_post." , up_maxf =".$max_fotos." , up_expdate = '".$up_expdate."' WHERE up_uid = '".$uid."'");
$stmt0 -> execute();

/* Insertar datos en la tabla factura */ 
$stmt = Conexion::conectar()->prepare(" UPDATE bgo_users SET profile = ".$plan.", status = 1 WHERE uid = '".$uid."'");
$stmt -> execute();

}else{
	print_r($stmt2->errorInfo());
	print_r($stmt0->errorInfo());
	print_r($stmt->errorInfo());
} 
 

  


 	


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="icon" type="image/png" href="favicon.ico"/>
  <title>Burengo</title>
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
 <nav class="main-header navbar navbar-expand-md navbar-dark bg-navy"> 
    <div class="container">
      <a href="index.php" class="navbar-brand"> <img src="../../dist/img/burengo.png" alt="Burengo Logo" class="brand-image   elevation-0" style="opacity: .8"> </a>
      <div class="collapse navbar-collapse order-3" id="navbarCollapse"><ul class="navbar-nav"> </ul></div>
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto"> </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <div class="content-wrapper">
 <section class="content pt-3">
      <div class="container-fluid">
        <div class="row">
		<input id="getUserCode" type="hidden" value="<?php echo $uid; ?>"/>
          <div class="col-12">
<?php 		  
if(intval($results['planprice'])){
		  
echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> El pago fue realizado con exito!</h5>
                  
                </div>'; 
}	?> 
			
<div class="card">
        <div class="card-header">
          <h3 class="card-title">Detalle del Plan: <?php echo $nombre_plan; ?> </h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <div class="col-12 col-sm-3">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted"> Precio </span>
                      <span class="info-box-number text-center text-muted mb-0"> <?php echo $precio_plan; ?> </span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-3">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Duracion </span>
                      <span class="info-box-number text-center text-muted mb-0"> <?php echo $duracion_plan; ?> Dias </span>
                    </div>
                  </div>
                </div>                
				
				<div class="col-12 col-sm-3">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted"> Publicaciones Permitidas </span>
                      <span class="info-box-number text-center text-muted mb-0"> <?php if($max_post==0){ echo "Ilimitadas"; } else{ echo $max_post;  }; ?> </span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-3">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Total de fotos por Publicacion </span>
                      <span class="info-box-number text-center text-muted mb-0"> <?php echo $max_fotos; ?> <span>
                    </span></span></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <h5>Política de Devoluciones, Reembolsos y Cancelaciones para Publicaciones.</h5>
                    <div class="">
                      <div class=" " style="height:200px;   overflow-y: auto; overflow-x: hidden;">
                      <!-- /.user-block -->
<p>FRACA CI S.R.L. es titular del sitio web burengo.com, cuyo domicilio social se encuentra en Santiago de los Caballeros, República Domicana. El teléfono de contacto es el (829) 268-0964.
<br/>
 Esta entidad se encuentra inscrita en el Registro Mercantil de República Dominicana, con el RNC 131663656.
 </p>	
<p><b> Reembolsos/Devoluciones </b></p>
<p>
Al hacer la publicación de un anuncio en nuestro portal, verifique de forma precisa que todos los datos de su anuncio están correctos. Burengo no efectuará bajo ninguna circunstancia un reembolso o devolución para publicaciones donde los datos de contacto, datos del anuncio o fotografías presenten errores, por esto existe la opción de modificar la publicación.
<br/>
Una vez una publicación/anuncio aparece en el sitio web, esta publicación no aplicará para reembolso o devolución.
<br/>
Aplicará el reembolso sí y sólo sí el plan suscrito no se esté aplicando en el sitio web, como el cliente lo contrató, para esto el cliente debe contactarnos demostrando lo antes dicho. En este caso se reparará la publicación y el reembolso será del 100% del capital invertido.
</p>
<p><b> Cancelaciones </b></p>
<p>
El Cliente podrá cancelar su anunció en el momento en el que desee. La cancelación de un anuncio no implica la devolución o reembolso del costo total o parcial del anuncio.
Bajo ninguna circunstancia Burengo será responsable de inconvenientes del cliente con terceros, de cualquier índole.

Los anuncios publicados en el portal serán visibles durante el periodo de días indicado al momento de seleccionar el tipo de plan de publicación. Burengo no reembolsará completa ni parcialmente los días de publicación no utilizados. Los días restantes a la publicación pagada tampoco podrán ser utilizados para publicar un anuncio que pertenezca a un vehículo o bien diferente a la que fue descrita inicialmente.
</p>

<p> <b>Pasos a Seguir</b>
<br/>
<br/>
En caso que desee proceder con una solicitud de reembolso, deberá tener a mano las pruebas ya se fotos o videos, de que el anuncio no está en el sitio con las características que se contrató, el link del mismo y sus datos personales (nombre, teléfono y dirección de email).
<br/>
Deberá tener también a mano el comprobante de la transacción. En caso que lo haya extraviado, verifique su cuenta de email ya que nuestro sistema le envía a su dirección una copia del comprobante de la transacción.
Acceda a la página de contacto y remítanos la información requerida de su publicación. Si prefiere, puede también contactarnos vía telefónica en los números de teléfono en nuestra página de contacto.
</p>
</div>
<div class="text-center mt-5 mb-3">
 <a href="inicio.php" class="btn btn-sm btn-primary"> <i class="fas fa-list-alt"></i> Pagina Principal </a>
 <a href="profile.php" type="button"  class="btn btn-sm btn-success"> <i class="fas fa-user"></i> Mi cuenta </a>
 </div>
</div>
 </div>
              </div>
            </div>
   
          </div>
        </div>
        <!-- /.card-body -->
      </div>

           
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
  
 
  
<footer class="main-footer"> Burengo &copy; 2020 - Todos los derechos reservados. </footer>

 

</div>
<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script src="../../plugins/toastr/toastr.min.js"></script>
<script type="text/javascript">
 

</script>
</body>
</html>
