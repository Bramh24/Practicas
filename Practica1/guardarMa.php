<?php 

	$txt = fopen("archivoMa.txt", "a")
	or die("Problemas al crear archivo.txt");

	// Creamos el archivo mediante la funcion fopen y dandole la instruccion "a", que sirve para crear el archivo si no existe y en caso de existir simplemente escribe en el archivo utilizado.
	fwrite($txt, "\n");
	fwrite($txt, $_POST['noEmp']);
	fwrite($txt, " | ");
	fwrite($txt, $_POST['nombre']);
	fwrite($txt, " | ");
	fwrite($txt, $_POST['carrera']);
	fwrite($txt, " | ");
	fwrite($txt, $_POST['tel']);

	// Con la funcion fwrite podemos escribir en nuestro archivo llamado $txt y diciendo que vamos a poner en cada linea... \n es un salto de linea y con la funcion _POST traemos lo mandado del formulario anterior.


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Guardar Maestro</title>
	<link rel="stylesheet" href="./css/foundation.css" />
    <script src="./js/vendor/modernizr.js"></script>
</head>
<body>
	<?php require_once('header.php'); ?>

		<center><h3>Guardado con Exito</h3></center>


		<!-- Este es nuestro pequeño menu donde iran todos los botones para irnos a nuestros formularios o mostrar los ya registrados. -->

	<?php require_once('footer.php'); ?>
</body>
</html>