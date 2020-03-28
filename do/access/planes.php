<?php 
session_start();
date_default_timezone_set("America/Santo_Domingo");
require_once "../modelos/conexion.php";
 
$stmt6 = Conexion::conectar()->prepare("SELECT * FROM bgo_user_plan WHERE up_uid = '".$_SESSION['bgo_userId']."'"); 
$stmt6 -> execute();
$rest6 = $stmt6 -> fetch(); 
$myPlan = $rest6["up_planid"];

 
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
  <link rel="stylesheet" href="../../dist/css/adminlte.css">
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
	<div class="content">
 <input id="getCode" type="hidden" value="<?php echo $_SESSION['bgo_userId']; ?>">
 <input id="getPlan" type="hidden" value="0">
	  <div class="row pt-2">
	        <div class="col-md-12">
            <div class="card card-primary">
        <div class="card-body pb-0 ">
				<div class="row panList">
<?php 
 
$stmt = Conexion::conectar()->prepare("SELECT * FROM bgo_planes WHERE planstatus = 1 AND plantypo = 1");
$stmt -> execute();

 
while($results = $stmt -> fetch())
{ 
if($myPlan == $results["planid"]){
 echo '
 <div class="col-md-3">
            <div class="card card-success card-outline">
              <div class="card-body box-profile">
               
				<h3 class="profile-username text-center"> '.$results["planname"].' </h3>
				
				<br/>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Precio </b> <a class="float-right">$'.number_format($results["planprice"],2).' '.$results["plancurrency"].' </a>
                  </li>
                  <li class="list-group-item">
                    <b>Duracion</b> <a class="float-right">'.$results["planduration"].' Dias</a>
                  </li>
                  <li class="list-group-item">
                    <b>Publicacions </b> <a class="float-right"> ';
						if($results["planmaxp"]==0){
							echo "Ilimitadas";
						}else{
						  echo $results["planmaxp"];	 	
						}
						echo ' </a>
                  </li>                  
				  <li class="list-group-item">
                    <b>Fotos </b> <a class="float-right"> '.$results["planmaxf"].' </a>
                  </li>
                </ul>

                <a href="#" class="btn btn-success btn-block"  ><b> Plan Actual  </b></a>
              </div>
            </div>      
          </div>
 ';	
}else{
 echo '
 <div class="col-md-3">
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
               
				<h3 class="profile-username text-center"> '.$results["planname"].' </h3>
				
				<br/>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Precio </b> <a class="float-right">$'.number_format($results["planprice"],2).' '.$results["plancurrency"].' </a>
                  </li>
                  <li class="list-group-item">
                    <b>Duracion</b> <a class="float-right">'.$results["planduration"].' Dias</a>
                  </li>
                  <li class="list-group-item">
                    <b>Publicacions </b> <a class="float-right"> ';
						if($results["planmaxp"]==0){
							echo "Ilimitadas";
						}else{
						  echo $results["planmaxp"];	 	
						}
						echo ' </a>
                  </li>                  
				  <li class="list-group-item">
                    <b>Fotos </b> <a class="float-right"> '.$results["planmaxf"].' </a>
                  </li>
                </ul>

                <a href="#" class="btn btn-primary btn-block planselection" idPlan="'.$results["planid"].'" pricePlan="'.$results["planprice"].'"  ><b> Seleccionar </b></a>
              </div>
            </div>      
          </div>
 ';		
	
}


}  
  
?>      

		
		
				</div>
		</div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
  
 
	 </div>	  
	  
	  
    </div>
  </div>
  
   <div id="triggerPM" data-toggle="modal" data-target="#modal-pm"></div>
<div class="modal fade" id="modal-pm">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Metodo de Pago </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
				<div class="row tf"> <button id="transfer" type="button" class="btn btn-block bg-gradient-info btn-lg"> Trasnferencia Bancaria / Deposito  </button></div>
				<br/>
				<div class="row pp"></div>
            </div>
          
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
  
  
<footer class="main-footer"> Burengo &copy; 2020 - Todos los derechos reservados. </footer>

<script src="https://www.paypal.com/sdk/js?client-id=sb"></script>
<script>paypal.Buttons().render('div.pp');</script>


</div>
<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script src="../../plugins/toastr/toastr.min.js"></script>
<script type="text/javascript">

$('.panList').on("click", "a.planselection", function(){
	var idPlan = $(this).attr('idPlan');
	var code = $('#getCode').val();
    var price  =  parseInt($(this).attr('pricePlan'));
	if(price == 0 ){
		 $('#getPlan').val(idPlan);
		 location.href="confirmation.php?p="+idPlan+"&acc="+code;
	}else{
		$('#getPlan').val(idPlan);
		$('#triggerPM').click();
	}
});

$('#transfer').click(function(){
	var code = $('#getCode').val();
	var plan = $('#getPlan').val();
	location.href="confirmation.php?p="+plan+"&acc="+code;
});
</script>
</body>
</html>
