<?php 
session_start();
require_once "../modelos/conexion.php";
require_once "../modelos/data.php";

$name = $_REQUEST["nombre"];
$user = $_REQUEST["user"];
$pass = crypt($_REQUEST["pass"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$'); 
$profile = 0; 
$img= 'user.png';
$lastlogin= date('Y-m-d'); 
$addr =  $_REQUEST["address"];
$provinvia =  $_REQUEST["provincia"];
$ced =  $_REQUEST["ced"];
$phone =  $_REQUEST["tel"];
$email =  $_REQUEST["email"];
$bgo_whatsapp =  $_REQUEST["whatsapp"];
$status = 0;
$uid = "U".date('YmdHis').rand(1000,9999);
$ct = COUNTRY_CODE; 


$stmt = Conexion::conectar()->prepare("INSERT INTO bgo_users(uid,name,user,pass,profile,img,lastlogin,addr,provinvia,ced,phone,email,bgo_whatsapp,bgo_country,status)
VALUES(:uid,:name,:user,:pass,:profile,:img,:lastlogin,:addr,:provinvia,:ced,:phone,:email,:bgo_whatsapp,:bgo_country,:status)");
	 
$stmt->bindParam(":uid",$uid, PDO::PARAM_STR);
$stmt->bindParam(":name",$name, PDO::PARAM_STR);
$stmt->bindParam(":user",$user, PDO::PARAM_STR);
$stmt->bindParam(":pass",$pass, PDO::PARAM_STR);
$stmt->bindParam(":profile",$profile, PDO::PARAM_INT);
$stmt->bindParam(":img",$img, PDO::PARAM_STR);
$stmt->bindParam(":lastlogin",$lastlogin, PDO::PARAM_STR);
$stmt->bindParam(":addr",$addr, PDO::PARAM_STR);
$stmt->bindParam(":provinvia",$provinvia, PDO::PARAM_INT);
$stmt->bindParam(":ced",$ced, PDO::PARAM_STR);
$stmt->bindParam(":phone",$phone, PDO::PARAM_STR);
$stmt->bindParam(":email",$email, PDO::PARAM_STR);
$stmt->bindParam(":bgo_whatsapp",$bgo_whatsapp, PDO::PARAM_STR);
$stmt->bindParam(":bgo_country",$ct, PDO::PARAM_STR);
$stmt->bindParam(":status",$status, PDO::PARAM_INT);
 
if($stmt->execute()){
   $out['ok'] = 1;
   $out['code'] = $uid;
   $_SESSION['bgo_userId'] = $uid; 
}else{
  $out['ok']  = 0;
  $out['err'] = $stmt->errorInfo();
}
echo json_encode($out); 
?>