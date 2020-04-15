<?php
class Conexion{
	public function conectar(){
		$link = new PDO("mysql:host=localhost;dbname=bgo_database_site","burengo","bgoAdmin7869");
		//$link = new PDO("mysql:host=localhost;dbname=jrcatali_burengo","jrcatali_bgoAdm","bgoAdmin7869");
		//$link = new PDO("mysql:host=localhost;dbname=dcdvoqzc_mpro","dcdvoqzc_admin","Dcdvoqzc@sytem88");	
		$link->exec("set names utf8");
		return $link;
	}
}
?>

