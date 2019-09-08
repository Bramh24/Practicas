<?php 

	$txt = fopen("archivoMa.txt", "a")
	or die("Problemas al crear archivo.txt");

	// Creamos el archivo mediante la funcion fopen y dandole la instruccion "a", que sirve para crear el archivo si no existe y en caso de existir simplemente escribe en el archivo utilizado.

	fwrite($txt, "Datos:");
	fwrite($txt, "\n");
	fwrite($txt, $_POST['noEmp']);
	fwrite($txt, "\n");
	fwrite($txt, $_POST['nombre']);
	fwrite($txt, "\n");
	fwrite($txt, $_POST['carrera']);
	fwrite($txt, "\n");
	fwrite($txt, $_POST['tel']);
	fwrite($txt, "\n");
	fwrite($txt, "----------------------------------------------------------------");
	fwrite($txt, "\n");

	// Con la funcion fwrite podemos escribir en nuestro archivo llamado $txt y diciendo que vamos a poner en cada linea... \n es un salto de linea y con la funcion _POST traemos lo mandado del formulario anterior.

	echo "Guardado con exito.";
	echo "<br>";
	echo "<input type='button' value='Menu' onClick='history.go(-2);'>";

	// Con el echo simplemente imprimimos en pantalla ya sea escritura o html.

?>