<?php

class MvcController{

	#LLAMADA A LA PLANTILLA
	#-------------------------------------

	public function pagina(){	
		
		include "views/modules/ingresar.php";
	
	}

	public function pagina2(){	
		
		include "views/template.php";
	
	}

	#ENLACES
	#-------------------------------------

	public function enlacesPaginasController(){

		if(isset( $_GET['action'])){
			
			$enlaces = $_GET['action'];
		
		}

		else{

			$enlaces = "index";
		}

		$respuesta = Paginas::enlacesPaginasModel($enlaces);

		include $respuesta;

	}


	
	public function visualizarAlumnos(){


		if(isset($_POST["usuarioIngreso"])){



			 $padre=$_POST["usuarioIngreso"];

			$respuesta = Datos::visAlu("alumnos");

		}
		}
	#REGISTRO DE USUARIOS
	#------------------------------------
	public function registroUsuarioController(){

		if(isset($_POST["usuarioRegistro"])){

			$datosController = array( 
				"usuario"=>$_POST["usuarioRegistro"],

				"password"=>$_POST["passwordRegistro"],

				"email"=>$_POST["emailRegistro"],

				"nombre"=>$_POST["nombreRegistro"],

				"paterno"=>$_POST["paternoRegistro"],

				"materno"=>$_POST["maternoRegistro"],

				"no_perfil"=>$_POST["no_perfilRegistro"]);

			$respuesta = Datos::registroUsuarioModel($datosController, "usuarios");

			if($respuesta == "success"){

				header("location:template.php?action=usuarios");
				ob_end_flush();

			}

			

		}

	}

	#Nombre DE USUARIO

	

	#INGRESO DE USUARIOS
	#------------------------------------
	public function ingresoUsuarioController(){

		if(isset($_POST["usuarioIngreso"])){

			$datosController = array( 
				"usuario"=>$_POST["usuarioIngreso"], 
								      
				"password"=>$_POST["passwordIngreso"]);

			$respuesta = Datos::ingresoUsuarioModel($datosController, "usuarios");

			if($respuesta["usuario"] == $_POST["usuarioIngreso"] && $respuesta["password"] == $_POST["passwordIngreso"]){
				
				
				session_start();

				$_SESSION["validar"] = true;
				$_SESSION['user_id'] = $respuesta["no_usu"];
				$_SESSION['nombre'] = $respuesta["nombre"];
				$_SESSION['no_perfil'] = $respuesta["no_perfil"];

				if ($respuesta["no_perfil"] == 1) {
					header("location:views/template.php?action=inicio");
					ob_end_flush();
				}else{
					header("location:views/templateApoyo.php?action=inicio");
					ob_end_flush();
				}

			}

			else{

				header("location:index.php?action=fallo");
				ob_end_flush();

			}

		}	

	}

	#VISTA DE USUARIOS
	#------------------------------------

	public function vistaUsuariosController(){

		$respuesta = Datos::vistaUsuariosModel("usuarios","perfil");


		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["ape_paterno"].'</td>
				<td>'.$item["ape_materno"].'</td>
				<td>'.$item["usuario"].'</td>
				<td>'.$item["password"].'</td>
				<td>'.$item["descripcion"].'</td>
				<td>'.$item["email"].'</td>
				<td><a href="template.php?action=editar&no_usu='.$item["no_usu"].'" class="btn btn-sm btn-custom"><i class="fa fa-edit"></i></a></td>
				<td><a href="template.php?action=usuarios&no_usuBorrar='.$item["no_usu"].'"class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
			</tr>';

		}

	}

	#EDITAR USUARIO
	#------------------------------------

	public function editarUsuarioController(){

		$datosController = $_GET["no_usu"];
		$respuesta = Datos::editarUsuarioModel($datosController, "usuarios");

		echo'<input type="hidden" value="'.$respuesta["no_usu"].'" name="no_usuEditar">
		<div class="form-group">
		<label>Nombre</label>
		<div>
			 <input text="text" class="form-control" value="'.$respuesta["nombre"].'" name="nombreEditar" required>
			 </div>
			 </div>

			 <div class="form-group">
			 <label>Apellido Paterno</label>
			 <div>
			 <input text="text" class="form-control" value="'.$respuesta["ape_paterno"].'" name="paternoEditar" required>
			 </div>
			 </div>

			 <div class="form-group">
			 <label>Apellido Materno</label>
			 <div>
			 <input text="text" class="form-control" value="'.$respuesta["ape_materno"].'" name="maternoEditar" required>
			 </div>
			 </div>

			 <div class="form-group">
			 <label>Usuario</label>
			 <div>
			 <input type="text" class="form-control" value="'.$respuesta["usuario"].'" name="usuarioEditar" required>
			 </div>
			 </div>

			 <div class="form-group">
			 <label>Contraseña</label>
			 <div>
			 <input type="text" class="form-control" value="'.$respuesta["password"].'" name="passwordEditar" required>
			 </div>
			 </div>

			 <div class="form-group">
			 <label>Correo</label>
			 <div>
			 <input type="email"  class="form-control" value="'.$respuesta["email"].'" name="emailEditar" required>
			 </div>
			 </div>
			 
			 <div class="form-group">
			 <label>Selecciona Perfil</label>
			 <div>  
			 <select name="perfil" class="form-control">';
				   $vistaPerfil = Datos::ObtenerPerfil("perfil");
				    foreach ($vistaPerfil as $a): 
						 echo'  <option value="'. $a['no_perfil'] .'">'. $a['descripcion'] .' </option> ';
						 endforeach; 
			  
			 echo'  </select>												
				  
			 </div>
		  </div>
		 
	 

		   
			 <div class="form-group">
			 <div>
				 <button type="submit" value="Actualizar" class="btn btn-block btn-custom waves-effect waves-light">
					 Actualizar
				 </button>
			 
			 </div>
		 </div>
			 ';

	}

	#ACTUALIZAR USUARIO
	#------------------------------------
	public function actualizarUsuarioController(){

		if(isset($_POST["usuarioEditar"])){

			$datosController = array( 
				"no_usu"=>$_POST["no_usuEditar"],

			"usuario"=>$_POST["usuarioEditar"],

			"password"=>$_POST["passwordEditar"],

			"email"=>$_POST["emailEditar"],

			"nombre"=>$_POST["nombreEditar"],

			"paterno"=>$_POST["paternoEditar"],

			"materno"=>$_POST["maternoEditar"],
			
			"perfil"=>$_POST["perfil"]);
			
			$respuesta = Datos::actualizarUsuarioModel($datosController, "usuarios");

			if($respuesta == "success"){

				header("location:template.php?action=usuarios");
				ob_end_flush();

			}

			else{

				echo "error";

			}

		}
	
	}

	#BORRAR USUARIO
	#------------------------------------
	public function borrarUsuarioController(){

		if(isset($_GET["no_usuBorrar"])){

			$datosController = $_GET["no_usuBorrar"];
			
			$respuesta = Datos::borrarUsuarioModel($datosController, "usuarios");

			if($respuesta == "success"){

				header("location:template.php?action=usuarios");
				ob_end_flush();
			
			}

		}

	}

















#---------------------------------------------------------------#












		#REGISTRO DE GRUPOS
	#------------------------------------
	public function registroGrupoController(){

		if(isset($_POST["nombreRegistro"])){

			$datosController = array( 
				"nombre"=>$_POST["nombreRegistro"],

				"des"=>$_POST["desRegistro"],

				"maestro"=>$_POST["maestro"]
			
			);

			$respuesta = Datos::registroGrupoModel($datosController, "grupos");

			if($respuesta == "success"){

				header("location:template.php?action=grupos");
				ob_end_flush();

			}

		

		}

	}

// #VISTA DE GRUPOS
	// #------------------------------------

	public function vistaGruposController(){

		$respuesta = Datos::vistaGruposModel("grupos", "maestros");


		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["nombre_grupo"].'</td>
				<td>'.$item["descripcion"].'</td>
				<td>'.$item["nombre"].' '.$item["ape_paterno"].' '.$item["ape_materno"].'</td>
				<td><a href="template.php?action=grupoEditar&no_grupo='.$item["no_grupo"].'"class="btn btn-sm btn-custom"><i class="fa fa-edit"></i></a></td>
				<td><a href="template.php?action=grupos&no_grupoBorrar='.$item["no_grupo"].'"class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
			</tr>';

		}

	}

	
	#EDITAR USUARIO
	#------------------------------------

	public function editarGrupoController(){

		$datosController = $_GET["no_grupo"];
		$respuesta = Datos::editarGrupoModel($datosController, "grupos");

		echo'<input type="hidden" value="'.$respuesta["no_grupo"].'" name="no_grupoEditar">
		<div class="form-group">
		<label>Nombre</label>
		<div>
			 <input text="text" class="form-control" value="'.$respuesta["nombre_grupo"].'" name="nombreEditar" required>
			 </div>
			 </div>

			 <div class="form-group">
			 <label>Descripcion</label>
			 <div>
			 <input text="text" class="form-control" value="'.$respuesta["descripcion"].'" name="desEditar" required>
			 </div>
			 </div>

			 <div class="form-group">
			 <label>Selecciona Profesor</label>
			 <div>  
			 <select name="maestro" class="form-control">';
				  
					   $maestros = Datos::ObtenerMaestros("maestros");
				   
					   foreach ($maestros as $a): 
						 echo ' <option value="'. $a['no_maestro'].'">'. $a['nombre'].' '.$a['ape_paterno'].' '.$a['ape_materno'].'  </option>';
				 endforeach; 
			  
			echo'   </select>												
				  
			 </div>
		  </div>
		   
			 <div class="form-group">
			 <div>
				 <button type="submit" value="Actualizar" class="btn btn-block btn-custom waves-effect waves-light">
					 Actualizar
				 </button>
			 
			 </div>
		 </div>';

	}

	#ACTUALIZAR USUARIO
	#------------------------------------
	public function actualizarGrupoController(){

		if(isset($_POST["nombreEditar"])){

			$datosController = array( 
				"no_grupo"=>$_POST["no_grupoEditar"],

			"nombre"=>$_POST["nombreEditar"],

			"descripcion"=>$_POST["desEditar"],
			"maestro"=>$_POST["maestro"]);
			
			$respuesta = Datos::actualizarGrupoModel($datosController, "grupos");

			if($respuesta == "success"){

				header("location:template.php?action=grupos");
				ob_end_flush();

			}

			else{

				echo "error";

			}

		}
	
	}

	// #BORRAR GRUPO
	// #------------------------------------
	public function borrarGrupoController(){

		if(isset($_GET["no_grupoBorrar"])){

			$datosController = $_GET["no_grupoBorrar"];
		   
			$respuesta = Datos::borrarGrupoModel($datosController, "grupos");

			if($respuesta == "success"){

				header("location:template.php?action=grupos");
				ob_end_flush();
		   
			}

		}

	}


		#REGISTRO DE Maestros
	#------------------------------------
	public function registroMaestroController(){

		if(isset($_POST["nombreRegistro"])){

			$datosController = array( 
				"nombre"=>$_POST["nombreRegistro"],

				"paterno"=>$_POST["paternoRegistro"],

				"materno"=>$_POST["maternoRegistro"]);

			$respuesta = Datos::registroMaestroModel($datosController, "maestros");

			if($respuesta == "success"){

				header("location:template.php?action=maestros");
				ob_end_flush();

			}

			else{

				header("location:template.php");
				ob_end_flush();
			}

		}

	}


	// #VISTA DE Maestro
	// #------------------------------------

	 public function vistaMaestroController(){

	 	$respuesta = Datos::vistaMaestrosModel("maestros");


	 	foreach($respuesta as $row => $item){
	 	echo'<tr>
	 			<td>'.$item["nombre"].'</td>
	 			<td>'.$item["ape_paterno"].'</td>
	 			<td>'.$item["ape_materno"].'</td>
	 			<td><a href="template.php?action=maestroEditar&no_maestro='.$item["no_maestro"].'"class="btn btn-sm btn-custom"><i class="fa fa-edit"></i></a></td>
	 			<td><a href="template.php?action=maestros&no_maestroBorrar='.$item["no_maestro"].'"class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
	 		</tr>';

	 	}

	 }

	// #EDITAR Maestro
	// #------------------------------------

	 public function editarMaestroController(){

	 	$datosController = $_GET["no_maestro"];
	 	$respuesta = Datos::editarMaestroModel($datosController, "maestros");

		 echo'<input type="hidden" value="'.$respuesta["no_maestro"].'" name="no_maestroEditar">
		 <div class="form-group">
		 <label>Nombre</label>
		 <div>
		 <input text="text" class="form-control" value="'.$respuesta["nombre"].'" name="nombreEditar" required>
		 </div>
		 </div>
	

		 <div class="form-group">
		 <label>Apellido Paterno</label>
		 <div>
		 <input text="text"  class="form-control"value="'.$respuesta["ape_paterno"].'" name="paternoEditar" required>
		 </div>
		 </div>
	

		 <div class="form-group">
		 <label>Apellido Materno</label>
		 <div>
		 <input text="text" class="form-control" value="'.$respuesta["ape_materno"].'" name="maternoEditar" required>
		 </div>
		 </div>
	
		 <div class="form-group">
			 <div>
			 <button type="submit" value="Actualizar"   class="btn btn-block  btn-custom waves-effect waves-light">
			 Actulaizar
		 </button>
			
			 </div>
			 </div>
		';

	 }

	// #ACTUALIZAR Maestra
	// #------------------------------------
	 public function actualizarMaestroController(){

	 	if(isset($_POST["nombreEditar"])){

	 		$datosController = array( 
	 			"no_maestro"=>$_POST["no_maestroEditar"],

	 		"nombre"=>$_POST["nombreEditar"],

	 		"paterno"=>$_POST["paternoEditar"],

	 		"materno"=>$_POST["maternoEditar"]);
			
	 		$respuesta = Datos::actualizarMaestroModel($datosController, "maestros");

	 		if($respuesta == "success"){

	 			header("location:template.php?action=maestros");
				 ob_end_flush();
	 		}

	 		else{

	 			echo "error";

	 		}

	 	}
	
	 }

	// #BORRAR Maestra
	// #------------------------------------
	 public function borrarMaestroController(){

	 	if(isset($_GET["no_maestroBorrar"])){

	 		$datosController = $_GET["no_maestroBorrar"];
			
	 		$respuesta = Datos::borrarMaestroModel($datosController, "maestros");

	 		if($respuesta == "success"){

				 header("location:template.php?action=maestros");
				 ob_end_flush();
			
	 		}

	 	}

	 }









#--------------------------------------------------------------#













	#REGISTRO DE Alumnos
	#------------------------------------
	public function registroAlumnoController(){

		if(isset($_POST["nombreRegistro"])){

			$datosController = array( 
				"nombre"=>$_POST["nombreRegistro"],

				"paterno"=>$_POST["paternoRegistro"],

				"materno"=>$_POST["maternoRegistro"],

				"edad" =>$_POST["edadRegistro"],

				"no_padre" =>$_POST["no_padreRegistro"]);

			$respuesta = Datos::registroAlumnoModel($datosController, "alumnos");

			if($respuesta == "success"){

				header("location:template.php?action=alumnos");
				
				ob_end_flush();
			}

			else{

				header("location:template.php");
				ob_end_flush();
			}

		}

	}


	// #VISTA DE ALUMNOS
	// #------------------------------------

	 public function vistaAlumnoController(){

	 	$respuesta = Datos::vistaAlumnosModel("alumnos","padres");


	 	foreach($respuesta as $row => $item){
	 	echo'<tr>
	 			<td>'.$item["nombre"].'</td>
	 			<td>'.$item["ape_paterno"].'</td>
	 			<td>'.$item["ape_materno"].'</td>
				 <td>'.$item["edad"].'</td>
				 <td>'.$item["nombre_padre"].' '.$item["ape_paterno_padre"].' '.$item["ape_materno_padre"].'</td>
	 			<td><a href="template.php?action=alumnoEditar&no_alu='.$item["no_alu"].'" class="btn btn-sm btn-custom"><i class="fa fa-edit"></i></a></td>
	 			<td><a href="template.php?action=alumnos&no_aluBorrar='.$item["no_alu"].'" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
	 		</tr>';

	 	}

	 }

	// #EDITAR Alumno
	// #------------------------------------

	 public function editarAlumnoController(){

	 	$datosController = $_GET["no_alu"];
	 	$respuesta = Datos::editarAlumnoModel($datosController, "alumnos");


		echo' <input type="hidden" value="'.$respuesta["no_alu"].'" name="no_aluEditar">
		<div class="form-group">
				<label>Nombre</label>
				<div>
					<input text="text" class="form-control" value="'.$respuesta["nombre"].'" name="nombreEditar" required>
				</div>
			</div>
		
		<div class="form-group">
				<label>Apellido Paterno</label>
				<div>
					<input text="text" class="form-control" value="'.$respuesta["ape_paterno"].'" name="paternoEditar" required>
				</div>
			</div>
		<div class="form-group">
				<label>Apellido Materno</label>
				<div>
					<input text="text" class="form-control" value="'.$respuesta["ape_materno"]	.'" name="maternoEditar" required>
				</div>
			</div>

		<div class="form-group">
					<label>Edad</label>
					<div>
						<input type="text" class="form-control" value="'.$respuesta["edad"]	.'" name="edadEditar" required>
					</div>
		</div>';
				

	echo'	<div class="form-group">
		<label>Selecciona Padre</label>
		<div>  
		<select name="padre" class="form-control">';


			 $vistaPadre = Datos::ObtenerPadres("padres");
			  foreach ($vistaPadre as $a): 
	echo'<option value="'. $a['no_padre'].'">'. $a['nombre_padre'].' '.$a['ape_paterno_padre'].' '.$a['ape_materno_padre'] .'</option> ';
					 endforeach; 
		 
	 echo' </select>												
			 
		</div>
	 </div>
	

		<div class="form-group">
		<div>
			<button type="submit" value="Actualizar" class="btn btn-block  btn-custom waves-effect waves-light">
				Actualizar
			</button>
				
		</div>
		</div>';
			

	 }



	 
	// #ACTUALIZAR Alumno
	// #------------------------------------
	 public function actualizarAlumnoController(){

	 	if(isset($_POST["nombreEditar"])){

	 		$datosController = array( 
	 			"no_alu"=>$_POST["no_aluEditar"],

	 		"nombre"=>$_POST["nombreEditar"],

	 		"paterno"=>$_POST["paternoEditar"],

	 		"materno"=>$_POST["maternoEditar"],

			 "edad"=>$_POST["edadEditar"],
			 "padre"=>$_POST["padre"]);
			
	 		$respuesta = Datos::actualizarAlumnoModel($datosController, "alumnos");

	 		if($respuesta == "success"){

	 			header("location:template.php?action=alumnos");
				 ob_end_flush();
	 		}

	 		else{

	 			echo "Error";

	 		}

	 	}
	
	 }

	// #BORRAR Alumno
	// #------------------------------------
	 public function borrarAlumnoController(){

	 	if(isset($_GET["no_aluBorrar"])){

	 		$datosController = $_GET["no_aluBorrar"];
			
	 		$respuesta = Datos::borrarAlumnoModel($datosController, "alumnos");

	 		if($respuesta == "success"){

				 header("location:template.php?action=alumnos");
				 ob_end_flush();
			
	 		}

	 	}

	 }













#-----------------------------------------------------------#













	#REGISTRO DE PADRES
	#------------------------------------
	public function registroPadreController(){

		if(isset($_POST["nombreRegistro"])){

			$datosController = array( 
				"nombre"=>$_POST["nombreRegistro"],

				"paterno"=>$_POST["paternoRegistro"],

				"materno"=>$_POST["maternoRegistro"],

				"telefono" =>$_POST["telRegistro"],

				"email"=>$_POST["emailRegistro"]);

			$respuesta = Datos::registroPadreModel($datosController, "padres");

			if($respuesta == "success"){

				ob_end_flush();

				header("location:template.php");
				ob_end_flush();
			}

		}

	}


	// #VISTA DE PADRE
	// #------------------------------------

	 public function vistaPadreController(){

	 	$respuesta = Datos::vistaPadresModel("padres");


	 	foreach($respuesta as $row => $item){
	 	echo'<tr>
	 			<td>'.$item["nombre_padre"].'</td>
	 			<td>'.$item["ape_paterno_padre"].'</td>
	 			<td>'.$item["ape_materno_padre"].'</td>
	 			<td>'.$item["telefono"].'</td>
	 			<td>'.$item["email"].'</td>
	 			<td><a href="template.php?action=padresEditar&no_padre='.$item["no_padre"].'"class="btn btn-sm btn-custom"><i class="fa fa-edit"></i></a></td>
	 			<td><a href="template.php?action=padres&no_padreBorrar='.$item["no_padre"].'"class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
	 		</tr>';

	 	}

	 }

	// #EDITAR PADRE
	// #------------------------------------

	 public function editarPadreController(){

	 	$datosController = $_GET["no_padre"];
	 	$respuesta = Datos::editarPadreModel($datosController, "padres");

	 	echo'<input type="hidden" value="'.$respuesta["no_padre"].'" name="no_padreEditar">
		 <div class="form-group">
		 <label>Nombre</label>
		 <div>
			  <input text="text"class="form-control" value="'.$respuesta["nombre_padre"].'" name="nombreEditar" required>
			  </div>
			  </div>
			  <div class="form-group">
			  <label>Apellido Paterno</label>
			  <div>
			  <input text="text" class="form-control" value="'.$respuesta["ape_paterno_padre"].'" name="paternoEditar" required>
			  </div>
			  </div>

			  <div class="form-group">
			  <label>Apellido Materno</label>
			  <div>
			  <input text="text"class="form-control" value="'.$respuesta["ape_materno_padre"].'" name="maternoEditar" required>
			  </div>
			  </div>

			  <div class="form-group">
			  <label>Telelfono</label>
			  <div>
			  <input type="text" class="form-control" value="'.$respuesta["telefono"].'" name="telEditar" required>
			  <span class="font-14 text-muted">(999) 999-9999</span>
				   
			  </div>
				</div>
			  <div class="form-group">
			  <label>Correo</label>
			  <div>
	 		 <input type="text" class="form-control" value="'.$respuesta["email"].'" name="emailEditar" required>
			  </div>
			  </div>

			  <div class="form-group">
			  <div>
				  <button type="submit" alue="Actualizar" class="btn btn-block  btn-custom waves-effect waves-light">
					 Actualizar
				  </button>
			  
			  </div>
		  </div>
	 		 ';

	 }

	// #ACTUALIZAR PADRE
	// #------------------------------------
	 public function actualizarPadreController(){

	 	if(isset($_POST["nombreEditar"])){

	 		$datosController = array( 
	 			"no_padre"=>$_POST["no_padreEditar"],

	 		"nombre"=>$_POST["nombreEditar"],

	 		"paterno"=>$_POST["paternoEditar"],

	 		"materno"=>$_POST["maternoEditar"],

	 		"telefono"=>$_POST["telEditar"],

	 		"email"=>$_POST["emailEditar"]);
			
	 		$respuesta = Datos::actualizarPadreModel($datosController, "padres");

	 		if($respuesta == "success"){

				 header("location:template.php?action=padres");
				 ob_end_flush();

	 		}

	 		else{

	 			echo "error";
				 ob_end_flush();
	 		}

	 	}
	
	 }

	// #BORRAR PADRE
	// #------------------------------------
	 public function borrarPadreController(){

	 	if(isset($_GET["no_padreBorrar"])){

	 		$datosController = $_GET["no_padreBorrar"];
			
	 		$respuesta = Datos::borrarPadreModel($datosController, "padres");

	 		if($respuesta == "success"){

				 header("location:template.php?action=padres");
				 ob_end_flush();
			
	 		}

	 	}

	 }












#-------------------------------------------------------------#









	#REGISTRO DE PAGOS
	#------------------------------------
	public function registroPagoController(){

		if(isset($_POST["padre"])){

			$datosController = array( 
				"no_padre"=>$_POST["padre"],

				"no_alu"=>$_POST["alumno"],

				"no_usu"=>$_SESSION['user_id'],

				"descripcion"=>$_POST["descripcionRegistro"],

				"monto" =>$_POST["montoRegistro"]);

			$respuesta = Datos::registroPagoModel($datosController, "pagos");

			if($respuesta == "success"){

				header("location:template.php?action=pagos");
				ob_end_flush();
			}

			else{

				header("location:template.php");
				ob_end_flush();
			}

		}

	}


	// #VISTA DE PAGOS
	// #------------------------------------

	 public function vistaPagoController(){

	 	$respuesta = Datos::vistaPagoModel("pagos");


	 	foreach($respuesta as $row => $item){
	 	echo'<tr>
	 			<td>'.$item["no_padre"].'</td>
	 			<td>'.$item["no_usu"].'</td>
	 			<td>'.$item["no_alu"].'</td>
	 			<td>'.$item["descripcion"].'</td>
	 			<td>'.$item["monto"].'</td>
	 			<td><a href="template.php?action=pagosEditar&no_pago='.$item["no_pago"].'"class="btn btn-sm btn-custom"><i class="fa fa-edit"></i></a></td>
	 			<td><a href="template.php?action=pagos&no_pagoBorrar='.$item["no_pago"].'"class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
	 		</tr>';

	 	}

	 }

	 // #Vista pagos Apoyo


	 public function vistaPagoApoyoController(){

	 	$respuesta = Datos::vistaPagoModel("pagos");


	 	foreach($respuesta as $row => $item){
	 	echo'<tr>
	 			<td>'.$item["no_padre"].'</td>
	 			<td>'.$item["no_usu"].'</td>
	 			<td>'.$item["no_alu"].'</td>
	 			<td>'.$item["descripcion"].'</td>
	 			<td>'.$item["monto"].'</td>
	 		</tr>';

	 	}

	 }

	// #EDITAR PAGO
	// #------------------------------------

	 public function editarPagoController(){

	 	$datosController = $_GET["no_pago"];
	 	$respuesta = Datos::editarPagoModel($datosController, "pagos");
	 	

	 	echo'<input type="hidden" value="'.$respuesta["no_pago"].'" name="no_pagoEditar">';

	 	echo'	<div class="form-group">
		<label>Selecciona Padre</label>
		<div>  
		<select name="no_padreEditar" class="form-control">';


			 $vistaPadre = Datos::ObtenerPadres("padres");
			  foreach ($vistaPadre as $a): 
		echo'<option value="'. $a['no_padre'].'">'. $a['nombre_padre'].' '.$a['ape_paterno_padre'].' '.$a['ape_materno_padre'] .'</option> ';
					 endforeach; 
		 
	 	echo' </select>												
			 
			</div>
	 	</div>';

	 	echo '<label for="no_usuEditar"> No. Usuario</label> <input text="text" value="'.$respuesta["no_usu"].'" name="no_usuEditar" id="no_usuEditar" required>';

	 	echo'	<div class="form-group">
				<label>Selecciona Alumno</label>
				<div>  
				<select name="no_aluEditar" class="form-control">';


			 $vistaAlumno = Datos::ObtenerAlumnos("alumnos");
			  foreach ($vistaAlumno as $a): 
		echo'<option value="'. $a['no_alu'].'">'. $a['nombre'].' '.$a['ape_paterno'].' '.$a['ape_materno'] .'</option> ';
					 endforeach; 
		 
	 	echo' </select>												
			 
			</div>
	 	</div>';

	 	echo '<label for="descripcionEditar"> Descripcion</label> <input text="text" value="'.$respuesta["descripcion"].'" name="descripcionEditar" id="descripcionEditar" required>
			
			<br>

	 		<label for="montoEditar"> Monto</label> <input type="number" value="'.$respuesta["monto"].'" name="montoEditar" id="montoEditar" required>
			
			<br>

	 		 <input type="submit" value="Actualizar">';

	 }

	// #ACTUALIZAR PAGO
	// #------------------------------------
	 public function actualizarPagoController(){

	 	if(isset($_POST["no_padreEditar"])){

	 		$datosController = array( 
	 		"no_pago"=>$_POST["no_pagoEditar"],

	 		"no_padre"=>$_POST["no_padreEditar"],

	 		"no_usu"=>$_POST["no_usuEditar"],

	 		"no_alu"=>$_POST["no_aluEditar"],

	 		"descripcion"=>$_POST["descripcionEditar"],

	 		"monto"=>$_POST["montoEditar"]);
			
	 		$respuesta = Datos::actualizarPagoModel($datosController, "pagos");

	 		if($respuesta == "success"){

				 header("location:template.php?action=pagos");
				 ob_end_flush();

			}

			else{

				echo "Error";
			}

	 	}
	
	 }

	// #BORRAR PAGO
	// #------------------------------------
	 public function borrarPagoController(){

	 	if(isset($_GET["no_pagoBorrar"])){

	 		$datosController = $_GET["no_pagoBorrar"];
			
	 		$respuesta = Datos::borrarPagoModel($datosController, "pagos");

	 		if($respuesta == "success"){

				 header("location:template.php?action=pagos");
				 ob_end_flush();
			
	 		}

	 	}

	 }


}

?>