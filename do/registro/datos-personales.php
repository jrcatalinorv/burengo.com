<?php 
require_once "../modelos/data.php";
date_default_timezone_set("America/Santo_Domingo");
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
    <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
 <nav class="main-header navbar navbar-expand-md navbar-dark bg-navy"> 
    <div class="container">
      <a href="../../<?php echo COUNTRY_CODE; ?>" class="navbar-brand">
          <img src="../../dist/img/burengo.png" alt="Burengo Logo" class="brand-image   elevation-0" style="opacity: .8">  
      </a>
      <div class="collapse navbar-collapse order-3" id="navbarCollapse"><ul class="navbar-nav"> </ul></div>
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item"><a class="nav-link" href="../../<?php echo COUNTRY_CODE; ?>"> Portada </a></li>
        <li class="nav-item"><a class="nav-link" href="../contacto.php"> Contacto  </a></li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
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
 <div class="login-box">
  <div class="login-logo"></div>
  <div class="card">
    <div class="card-body login-card-body">
      <p><h4>Nuevo Usuario </h4></p>
      <div action="#"><br/>
        <div class="input-group mb-3">
          <input id="fullname" type="text" class="form-control" placeholder="Nombre Completo">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="far fa-id-badge">    </span>
            </div>
          </div>
        </div>        
		
		<div class="input-group mb-3">
          <input  id="username" type="text" class="form-control" placeholder="Nombre de Usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>		
		
		<div class="input-group mb-3">
          <input  id="email" type="email" class="form-control" placeholder="Correo electronico">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
		
        <div class="input-group mb-3">
          <input  id="password1" type="password" class="form-control" placeholder="Escribir Contrasena">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>        
		
		<div class="input-group mb-3">
          <input  id="password2" type="password" class="form-control" placeholder="Confirmar Contrasena">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
		
		<div class="input-group mb-3">
          <input  id="identification" type="text" class="form-control" placeholder="Cedula (Dominicana)"  
		  data-inputmask='"mask": "999-9999999-9"' data-mask > <!-- 094-0021875-7 -->
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="far fa-address-card"></span>  
            </div>
          </div>
        </div>

		<div class="input-group mb-3">
          <input  id="telefono" type="text" class="form-control" placeholder="Telefono" data-inputmask='"mask": "(999) 999-9999"' data-mask  >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>  
            </div>
          </div>
        </div>			
		
		<div class="input-group mb-3">
          <select id="place" class="form-control">
				<option value="0"> Provincia </option>
		  </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-globe-americas"></span>  
            </div>
          </div>
        </div>		
		
		<div class="input-group mb-3">
          <input  id="address" type="text" class="form-control" placeholder="Dirreccion">  
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-map-marked-alt"></span>
            </div>
          </div>
        </div>
		
        <div class="row">         
          <div class="col-12">
            <button id="btnNewAccount" type="button" class="btn btn-success btn-block"> Crear Cuenta </button>
          </div>
        </div>
      </div>

      <div class="social-auth-links text-center mb-3"> <a href="../acceder.php" class="btn btn-block btn-info"> Tengo una Cuenta </a> 
	 
	  </div>
    </div>
	 
	<a href="#" class="text-center text-mute" data-toggle="modal" data-target="#modal-sample"><small> Terminos & Condiciones </small></a>  
	<a href="#" class=" text-center text-mute" data-toggle="modal" data-target="#modal-sample2"> <small>Política de Devoluciones, Reembolsos y Cancelaciones</small></a>
	 <br/>
  </div>
</div>
	<br/>
	<br/>
	<br/>
	 </center>
	 </div> 
    </div>
  </div>

<div id="triggerContract" data-toggle="modal" data-target="#modal-lg"></div>
<div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"> Terminos & Condiciones</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			<div class="row" style="height:300px;   overflow-y: auto; overflow-x: hidden;">
              <p><b>Politica de Privacidad</b>  <br/><br/>El presente Política de Privacidad establece los términos en que Burengo usa y protege la información que es proporcionada por sus usuarios al momento de utilizar su sitio web. Esta compañía está comprometida con la seguridad de los datos de sus usuarios. Cuando le pedimos llenar los campos de información personal con la cual usted pueda ser identificado, lo hacemos asegurando que sólo se empleará de acuerdo con los términos de este documento. Sin embargo, esta Política de Privacidad puede cambiar con el tiempo o ser actualizada por lo que le recomendamos y enfatizamos revisar continuamente esta página para asegurarse que está de acuerdo con dichos cambios. <br/><br/>  Información que es recogida <br/><br/> Nuestro sitio web podrá recoger información personal por ejemplo: Nombre, información de contacto como  su dirección de correo electrónica e información demográfica. Así mismo cuando sea necesario podrá ser requerida información específica para procesar algún pedido o realizar una entrega o facturación. Uso de la información recogida. <br/><br/> Nuestro sitio web emplea la información con el fin de proporcionar el mejor servicio posible, particularmente para mantener un registro de usuarios, de pedidos en caso que aplique, y mejorar nuestros servicios.  Es posible que sean enviados correos electrónicos periódicamente a través de nuestro sitio con ofertas especiales, y otra información publicitaria que consideremos relevante para usted o que pueda brindarle algún beneficio, estos correos electrónicos serán enviados a la dirección que usted proporcione y podrán ser cancelados en cualquier momento. <br/><br/> Burengo está altamente comprometido para cumplir con el compromiso de mantener su información segura. Usamos los sistemas más avanzados y los actualizamos constantemente para asegurarnos que no exista ningún acceso no autorizado. <br><br/>   <b>Cookies</b> <br/> Una cookie se refiere a un fichero que es enviado con la finalidad de solicitar permiso para almacenarse en su ordenador, al aceptar dicho fichero se crea y la cookie sirve entonces para tener información respecto al tráfico web, y también facilita las futuras visitas a una web recurrente. Otra función que tienen las cookies es que con ellas las webs pueden reconocerte individualmente y por tanto brindarte el mejor servicio personalizado de su web.<br><br> Nuestro sitio web emplea las cookies para poder identificar las páginas que son visitadas y su frecuencia. Esta información es empleada únicamente para análisis estadístico y después la información se elimina de forma permanente. Usted puede eliminar las cookies en cualquier momento desde su ordenador. Sin embargo las cookies ayudan a proporcionar un mejor servicio de los sitios web, estás no dan acceso a información de su ordenador ni de usted, a menos de que usted así lo quiera y la proporcione directamente, visitas a una web . Usted puede aceptar o negar el uso de cookies, sin embargo la mayoría de navegadores aceptan cookies automáticamente pues sirve para tener un mejor servicio web. También usted puede cambiar la configuración de su ordenador para declinar las cookies. Si se declinan es posible que no pueda utilizar algunos de nuestros servicios.<br/><br/> <b>Enlaces a Terceros</b> <br/><br/> Este sitio web pudiera contener en laces a otros sitios que pudieran ser de su interés. Una vez que usted de clic en estos enlaces y abandone nuestra página, ya no tenemos control sobre al sitio al que es redirigido y por lo tanto no somos responsables de los términos o privacidad ni de la protección de sus datos en esos otros sitios terceros. Dichos sitios están sujetos a sus propias políticas de privacidad por lo cual es recomendable que los consulte para confirmar que usted está de acuerdo con estas. <br/><br/> <b>Control de su información personal </b><br>En cualquier momento usted puede restringir la recopilación o el uso de la información personal que es proporcionada a nuestro sitio web.  Cada vez que se le solicite rellenar un formulario, como el de alta de usuario, puede marcar o desmarcar la opción de recibir información por correo electrónico.  En caso de que haya marcado la opción de recibir nuestro boletín o publicidad usted puede cancelarla en cualquier momento.<br><br>Esta compañía no venderá, cederá ni distribuirá la información personal que es recopilada sin su consentimiento, salvo que sea requerido por un juez con un orden judicial. <br><br> Burengo Se reserva el derecho de cambiar los términos de la presente Política de Privacidad en cualquier momento.	</p>
		</div>
<p>
<hr/>
<div class="form-group">
   <div class="form-check">
    <input id="terms-conditions" class="form-check-input" type="checkbox">
     <label class="form-check-label labelCheck">Acepto los Terminos y Condiciones </label>
    </div>
</div>
</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal"> Cancelar </button>
              <button id="saveNewUsr" type="button" class="btn btn-success"> Aceptar </button>
            
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
<div class="modal fade" id="modal-sample">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"> Terminos & Condiciones</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			<div class="row" style="height:300px;   overflow-y: auto; overflow-x: hidden;">
              <p class="justify-content-between"><b>Politica de Privacidad</b>  <br/><br/>El presente Política de Privacidad establece los términos en que Burengo usa y protege la información que es proporcionada por sus usuarios al momento de utilizar su sitio web. Esta compañía está comprometida con la seguridad de los datos de sus usuarios. Cuando le pedimos llenar los campos de información personal con la cual usted pueda ser identificado, lo hacemos asegurando que sólo se empleará de acuerdo con los términos de este documento. Sin embargo, esta Política de Privacidad puede cambiar con el tiempo o ser actualizada por lo que le recomendamos y enfatizamos revisar continuamente esta página para asegurarse que está de acuerdo con dichos cambios. <br/><br/>  Información que es recogida <br/><br/> Nuestro sitio web podrá recoger información personal por ejemplo: Nombre, información de contacto como  su dirección de correo electrónica e información demográfica. Así mismo cuando sea necesario podrá ser requerida información específica para procesar algún pedido o realizar una entrega o facturación. Uso de la información recogida. <br/><br/> Nuestro sitio web emplea la información con el fin de proporcionar el mejor servicio posible, particularmente para mantener un registro de usuarios, de pedidos en caso que aplique, y mejorar nuestros servicios.  Es posible que sean enviados correos electrónicos periódicamente a través de nuestro sitio con ofertas especiales, y otra información publicitaria que consideremos relevante para usted o que pueda brindarle algún beneficio, estos correos electrónicos serán enviados a la dirección que usted proporcione y podrán ser cancelados en cualquier momento. <br/><br/> Burengo está altamente comprometido para cumplir con el compromiso de mantener su información segura. Usamos los sistemas más avanzados y los actualizamos constantemente para asegurarnos que no exista ningún acceso no autorizado. <br><br/>   <b>Cookies</b> <br/> Una cookie se refiere a un fichero que es enviado con la finalidad de solicitar permiso para almacenarse en su ordenador, al aceptar dicho fichero se crea y la cookie sirve entonces para tener información respecto al tráfico web, y también facilita las futuras visitas a una web recurrente. Otra función que tienen las cookies es que con ellas las webs pueden reconocerte individualmente y por tanto brindarte el mejor servicio personalizado de su web.<br><br> Nuestro sitio web emplea las cookies para poder identificar las páginas que son visitadas y su frecuencia. Esta información es empleada únicamente para análisis estadístico y después la información se elimina de forma permanente. Usted puede eliminar las cookies en cualquier momento desde su ordenador. Sin embargo las cookies ayudan a proporcionar un mejor servicio de los sitios web, estás no dan acceso a información de su ordenador ni de usted, a menos de que usted así lo quiera y la proporcione directamente, visitas a una web . Usted puede aceptar o negar el uso de cookies, sin embargo la mayoría de navegadores aceptan cookies automáticamente pues sirve para tener un mejor servicio web. También usted puede cambiar la configuración de su ordenador para declinar las cookies. Si se declinan es posible que no pueda utilizar algunos de nuestros servicios.<br/><br/> <b>Enlaces a Terceros</b> <br/><br/> Este sitio web pudiera contener en laces a otros sitios que pudieran ser de su interés. Una vez que usted de clic en estos enlaces y abandone nuestra página, ya no tenemos control sobre al sitio al que es redirigido y por lo tanto no somos responsables de los términos o privacidad ni de la protección de sus datos en esos otros sitios terceros. Dichos sitios están sujetos a sus propias políticas de privacidad por lo cual es recomendable que los consulte para confirmar que usted está de acuerdo con estas. <br/><br/> <b>Control de su información personal </b><br>En cualquier momento usted puede restringir la recopilación o el uso de la información personal que es proporcionada a nuestro sitio web.  Cada vez que se le solicite rellenar un formulario, como el de alta de usuario, puede marcar o desmarcar la opción de recibir información por correo electrónico.  En caso de que haya marcado la opción de recibir nuestro boletín o publicidad usted puede cancelarla en cualquier momento.<br><br>Esta compañía no venderá, cederá ni distribuirá la información personal que es recopilada sin su consentimiento, salvo que sea requerido por un juez con un orden judicial. <br><br> Burengo Se reserva el derecho de cambiar los términos de la presente Política de Privacidad en cualquier momento.
 

			  
</p>


 
</div>
 
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default float-right" data-dismiss="modal"> Cerrar </button>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
<div class="modal fade" id="modal-sample2">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title"> Política de Devoluciones, Reembolsos y Cancelaciones para Publicaciones. </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			<div class="row" style="height:300px;   overflow-y: auto; overflow-x: hidden;">
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
 
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default float-right" data-dismiss="modal"> Cerrar </button>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
<footer class="main-footer"> Burengo &copy; 2020 - Todos los derechos reservados. </footer>
</div>
<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script src="../../plugins/toastr/toastr.min.js"></script>
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<script type="text/javascript">
$('#place').load('../ajax/burengo_select_places.php');
$('#saveNewUsr').prop('disabled', true);
$('[data-mask]').inputmask();
  
/* Check Values */
$('#btnNewAccount').click(function(){
/* Preguntar por todos los campos si estan llenos  */
if( !isEmpty($('#fullname').val())){ 
if( !isEmpty($('#username').val())){ 
if( !isEmpty($('#email').val())){
if( !isEmpty($('#password1').val())){
	var pa =  $('#password1').val();
	var pb =  $('#password2').val();
	var pr = pa.localeCompare(pb);
if(pr==0){
if( !isEmpty($('#identification').val())){ 
if( !isEmpty($('#telefono').val())){ 
if( parseInt($('#place').val()) > 0){ 
 if( !isEmpty($('#address').val())){
	$('#triggerContract').click();
}else{ $('#address').focus(); toastr.error('Debe completar todos los campos');}	
}else{ toastr.error('Debe completar todos los campos - Seleccione la provincia');}				 
}else{ $('#telefono').focus(); toastr.error('Debe completar todos los campos');}				 
}else{ $('#identification').focus(); toastr.error('Debe completar todos los campos');}	
}else{ $('#password1').focus(); toastr.error('Las Claves no coinciden'); }
}else{ $('#password1').focus(); toastr.error('Debe completar todos los campos');}
}else{ $('#email').focus(); toastr.error('Debe completar todos los campos'); }
}else{ $('#username').focus(); toastr.error('Debe completar todos los campos');} 
}else{ $('#fullname').focus(); toastr.error('Debe completar todos los campos');}
});



$('#terms-conditions').click(function(){
  if($('#terms-conditions').prop("checked") == true){
       $('#saveNewUsr').prop('disabled', false);
   }
    else if($('#terms-conditions').prop("checked") == false){
        $('#saveNewUsr').prop('disabled', true);
    }
});


function isEmpty(str) {
    return (!str || 0 === str.length);
}

function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

/* Guardar un nuevo record */
$('#saveNewUsr').click(function(){
	$.getJSON('../ajax/burengo_insert_newAccount.php',{
		 nombre: $('#fullname').val(),
		 user: $('#username').val(),
		 email: $('#email').val(),
		 pass: 	$('#password1').val(),
		 ced: $('#identification').val(),
		 tel: $('#telefono').val(),
		 provincia: $('#place').val(),
		 address: $('#address').val(),
	},function(data){
		switch(data['ok']){
			case 0: toastr.error('ERROR! No se pudo almacenar los datos: '+ data['err']); break;
			case 1: 
				var code = <?php echo $code; ?>;
				location.href="../access/planes.php?code="+code+"&acc="+data['code']+"";
			break;
		}
	});	
});		
</script>
</body>
</html>
