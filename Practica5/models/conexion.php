<?php

class Conexion{

	public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=simple_stock","root","");
		return $link;

	}

}

?>