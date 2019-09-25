<?php

class Conexion{

	public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=practica4mvc","root","");
		return $link;

	}

}

?>