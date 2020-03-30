<?php
class Conexion{
	public function conectar(){
		$link = new PDO("mysql:host=localhost;dbname=dcdvoqzc_mpro","dcdvoqzc_admin","Dcdvoqzc@sytem88");
		$link->exec("set names utf8");
		return $link;
	}
}
?>

