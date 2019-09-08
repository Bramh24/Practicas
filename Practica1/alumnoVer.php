<?php

	$file = fopen("archivoAlu.txt", "r");
	while(!feof($file)) {

	$linea = fgets($file);
	echo $linea . "<br />";

	}

	fclose($file);

	echo "<input type='button' value='Menu' onClick='history.go(-1);'>";

?>