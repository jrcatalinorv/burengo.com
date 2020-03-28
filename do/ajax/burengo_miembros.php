<?php 
require_once "../modelos/conexion.php";
require_once "../modelos/functions.php";

 
$stmt = Conexion::conectar()->prepare("SELECT * FROM bgo_users");
$stmt -> execute();

 
while($results = $stmt -> fetch())
{ 
 echo '
 <div class="col-md-3">
            <div class="card usrProfile" uid="'.$results['uid'].'">
              <div class="card-body box-profile">
               <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="../../media/users/'.$results["img"].'" alt="User profile picture">
                </div>
				<h3 class="profile-username text-center"> '.$results["name"].' </h3>
				<p class="text-muted text-center"> '.$results["user"].'</p>
              </div>
            </div>      
          </div>
 ';
}
?>

 