<?php 
date_default_timezone_set("America/Santo_Domingo");
require_once "../modelos/conexion.php";
$today = date('Y-m-d');
$stmt = Conexion::conectar()->prepare("SELECT * FROM bgo_posts WHERE bgo_duedate = '".$today."'");
$stmt -> execute();
WHILE($rest= $stmt-> fetch()){
$id= $rest['bgo_code'];
$ccode = $rest['bgo_country_code'];
$src ='../../'.$ccode.'/media/images/'.$id.'/';
$th  = '../../'.$ccode.'/media/thumbnails/'.$rest['bgo_thumbnail'];
$stmt = Conexion::conectar()->prepare("DELETE FROM bgo_posts WHERE bgo_code = '".$id."'");
if($stmt->execute()){  
unlink($th);
$dir = opendir($src);
while(false !== ( $file = readdir($dir)) ) {
        if (( $file != '.' ) && ( $file != '..' )) {
            $full = $src . '/' . $file;
            if ( is_dir($full) ) {
                rrmdir($full);
            }
            else {
                unlink($full);
            }
        }
    }
    closedir($dir);
 rmdir($src);
}
} 
?>