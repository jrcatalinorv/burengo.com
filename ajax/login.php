<?php 
session_start();
require_once "../modelos/conexion.php";

 
$usr  = strtolower ($_REQUEST["usr"]);
$pass = crypt($_REQUEST["pass"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

$stmt2 = Conexion::conectar()->prepare("SELECT * FROM bgo_users where user ='".$usr."' and pass = '".$pass."'");
$stmt2 -> execute();
$results = $stmt2 -> fetch();
										
if($results['user']==$usr && $results['pass']==$pass){

	switch($results['profile']){
		case 1:  $addr="inicio.php"; break;  /* Free user */
		case 50: $addr="dashboard.php"; break; /* Admin */
		case 10: $addr="inicio.php"; break; /* VIP */ 
		default: $addr="salir.php"; break; 
	}
	
	$_SESSION['bgo_userId'] = $results['uid'];
	$_SESSION['bgo_name'] = $results['name'];
	$_SESSION['bgo_user'] = $results['user'];
	$_SESSION['bgo_userImg'] = $results['img'];
	$_SESSION['bgo_perfil'] = $results['profile'];
	$_SESSION["bgoSesion"] = 'ok';
	$_SESSION['bgo_year'] = date('Y');
	$_SESSION['bgo_version'] = '1.1.0.1';
 
	$out['url'] = $addr;
	$out['ok'] = 1;
	$out['status'] = 1; 
}else{
	$out['ok'] = 0;
}
echo json_encode($out); 
?>