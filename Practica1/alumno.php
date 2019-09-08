<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
	<title>Document</title>
</head>
<body>
	<?php require_once('header.php'); ?>
	<div class="contenedor">
		<form action="guardarAlu.php" method="POST">
			<div>
				<label for="matricula">Matricula:</label>
				<input type="text" id="matricula" name="matricula" placeholder="Escribe tu matricula">
			</div>

			<div>
				<label for="nombre">Nombre:</label>
				<input type="text" id="nombre" name="nombre" placeholder="Escribe tu nombre">
			</div>

			<div>
				<label for="carrera">Carrera:</label>
				<input type="text" id="carrera" name="carrera" placeholder="Escribe tu carrera">
			</div>

			<div>
				<label for="email">Correo:</label>
				<input type="email" id="email" name="email" placeholder="Escribe tu email">
			</div>

			<div>
				<label for="tel">Telefono:</label>
				<input type="number" id="tel" name="tel" placeholder="Escribe tu telefono">
			</div>

			<div>
				<input type="submit" name="enviar" id="enviar" value="Enviar">
			</div>
		</form>

		<!-- Aqui solamente es el formulario donde vamos a recibir los datos del alumno para poder mandarlos al archivo guardar.php y ahi escribir sus datos en un txt. -->
		
	</div>
	<?php require_once('footer.php'); ?>
</body>
</html>