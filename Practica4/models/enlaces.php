<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		if($enlaces == "registroAlu" ||$enlaces == "registro"||$enlaces == "ingresar" ||$enlaces == "alumnos" || $enlaces == "inicio" || $enlaces == "usuarios" || $enlaces == "editar" ||  $enlaces == "registroAlu" || $enlaces == "registroMaestro"|| $enlaces == "maestroEditar" || $enlaces == "maestros" || $enlaces == "alumnos" ||$enlaces == "alumnoEditar" || $enlaces == "registroPadre" || $enlaces == "padres" || $enlaces == "padresEditar" || $enlaces == "registroPago" || $enlaces == "pagos" || $enlaces == "pagosApoyo" || $enlaces == "pagosEditar"|| $enlaces == "registroGrupo" || $enlaces == "grupos" || $enlaces == "grupoEditar" || $enlaces == "pagosEditar"){

			$module =  "../views/modules/".$enlaces.".php";
		
		}

		else if($enlaces == "index"){

			$module =  "../views/modules/registro.php";
		
		}

		else if($enlaces == "okUsuario"){

			$module =  "views/modules/registro.php";
		
		}

		else if ($enlaces == "okAlumno") {
			$module = "views/modules/registroAlu.php";
		}

		else if ($enlaces == "okMaestro") {
			$module = "views/modules/registroMaestro.php";
		}

		else if ($enlaces == "okPadre") {
			$module = "views/modules/registroPadre.php";
		}

		else if ($enlaces == "okPago") {
			$module = "views/modules/registroPago.php";
		}
		else if ($enlaces == "okGrupo") {
			$module = "views/modules/registroGrupo.php";
		}
		else if($enlaces == "fallo"){

			$module =  "../views/modules/ingresar.php";
		
		}

		else if($enlaces == "cambio"){

			$module =  "views/modules/usuarios.php";
		
		}

		else if($enlaces == "cambioAlumno"){

			$module =  "views/modules/alumnos.php";
		
		}

		else if($enlaces == "cambioMaestro"){

			$module =  "views/modules/maestros.php";
		
		}

		else if($enlaces == "cambioPadres"){

			$module =  "views/modules/padres.php";
		
		}

		else if($enlaces == "cambioPagos"){

			$module =  "views/modules/pagos.php";
		
		}

		else if($enlaces == "cambioGrupos"){

			$module =  "views/modules/grupos.php";
		
		}
		else if($enlaces == "salir"){

			$module =  "views/modules/salir.php";
		
		}

		else{

			$module =  "../views/modules/ingresar.php";

		}
		
		return $module;

	}

}

?>