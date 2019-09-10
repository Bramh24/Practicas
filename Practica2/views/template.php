<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MVC</title>

	<style>

		header{
			position:relative;
			margin:auto;
			text-align:center;
			padding:5px;	
		}
		
		nav{
			position:relative;
			margin:auto;
			width:100%;
			height:auto;
			background:black;
		}

		nav ul{
			position:relative;
			margin:auto;
			width:50%;
			text-align: center;
		}

		nav ul li{
			display:inline-block;
			width:24%;
			line-height: 50px;
			list-style: none;
		}

		nav ul li a{
			color:white;
			text-decoration: none;
		}

		section{
			position:relative;
			padding:20px;
		}
	
	</style>
</head>
<body>

<header>
		<h1>Bienvenidos...</h1>
</header>

<?php
	include "modules/navegacion.php";
?>

<!-- Nos trae el menu que se encuentra en navegacion.php -->

<section>
	<?php
		$mvc = new MvcController();
		$mvc -> enlacesPaginasController();
	?>

<!-- Utilizamos la funcion enlacesPaginasController para saber que menu eligio. -->
</section>






</body>
</html>