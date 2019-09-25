<?php

class Conexion{

	public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=prac_php","root","");
		return $link;

	}

}

?>