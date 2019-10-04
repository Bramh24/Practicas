<?php

class MvcController{

	#LLAMADA A LA PLANTILLA
	#-------------------------------------
	
	public function pagina(){	
		
		include "views/modules/ingresar.php";
	
	}

	#ENLACES
	#-------------------------------------

	public function enlacesPaginasController(){

		if(isset( $_GET['action'])){
			
			$enlaces = $_GET['action'];
		
		}

		else{

			$enlaces = "template";
		}

		$respuesta = Paginas::enlacesPaginasModel($enlaces);

		include $respuesta;

	}
	
	#REGISTRO DE USUARIOS
	#------------------------------------
	public function registroUsuarioController(){

		if(isset($_POST["usuarioRegistro"])){

			$datosController = array(
				"firstname"=>$_POST["nombreRegistro"], 

				"lastname"=>$_POST["apellidosRegistro"], 

				"user_name"=>$_POST["usuarioRegistro"], 
								      
				"user_password_hash"=>$_POST["passwordRegistro"],
								      
				"user_email"=>$_POST["emailRegistro"]);

			$respuesta = Datos::registroUsuarioModel($datosController, "users");

			if($respuesta == "success"){

				header("location:template.php?action=usuarios");

			}

			else{

				header("location:index.php");
			}

		}

	}

	#INGRESO DE USUARIOS
	#------------------------------------
	public function ingresoUsuarioController(){

		if(isset($_POST["usuarioIngreso"])){

			$datosController = array( 
				"user_name"=>$_POST["usuarioIngreso"], 
								      
				"user_password_hash"=>$_POST["passwordIngreso"]);

			$respuesta = Datos::ingresoUsuarioModel($datosController, "users");

			if($respuesta["user_name"] == $_POST["usuarioIngreso"] && password_verify($_POST['passwordIngreso'], $respuesta['user_password_hash'])){

				session_start();

				$_SESSION["validar"] = true;
				$_SESSION['user_id'] = $respuesta["user_id"];
				$_SESSION['user_name'] = $respuesta["user_name"];
				$_SESSION['nombre'] = $respuesta["firstname"] . " " . $respuesta["lastname"];
				$_SESSION['nombre1'] = $respuesta["firstname"];


				header("location:views/template.php?action=inicio");

			}

			else{

				header("location:index.php?action=fallo");

			}

		}	

	}

	#VISTA DE USUARIOS
	#------------------------------------

	public function vistaUsuariosController(){

		$respuesta = Datos::vistaUsuariosModel("users");


		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["user_id"].'</td>
				<td>'.$item["firstname"]. " " . 
				$item["lastname"] .'</td>
				<td>'.$item["user_name"].'</td>
				<td>'.$item["user_email"].'</td>
				<td>'.$item["date_added"].'</td>
				<td><a href="template.php?action=editar&user_id='.$item["user_id"].'"class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a></td>
				<td><a href="template.php?action=usuarios&idBorrar='.$item["user_id"].'"class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
			</tr>';

		}

	}

	#EDITAR USUARIO
	#------------------------------------

	public function editarUsuarioController(){

		$datosController = $_GET["user_id"];
		$respuesta = Datos::editarUsuarioModel($datosController, "users");

		echo'<div class="box-body">
				<input type="hidden" value="'.$respuesta["user_id"].'" name="user_idEditar">
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" class="form-control" value="'.$respuesta["firstname"].'" name="nombreEditar" required>
				</div>

				<div class="form-group">
					<label for="apllidos">Apellidos</label>
					<input type="text" class="form-control" value="'.$respuesta["lastname"].'" name="apellidosEditar" required>
		
				</div>
				
				<div class="form-group">
					<label for="correo">Ususario</label>
					<input type="text"class="form-control"  value="'.$respuesta["user_name"].'" name="usuarioEditar" required>				
				</div>
				
				<div class="form-group">
				<label for="correo">correo</label>
				<input type="text" class="form-control" value="'.$respuesta["user_email"].'" name="emailEditar" required>

				</div>
				<button type="submit" value="Actualizar" class="btn btn-flat btn-success">Actualizar</button>
		 </div>
	 </div> ';

	}

	#ACTUALIZAR USUARIO
	#------------------------------------
	public function actualizarUsuarioController(){

		if(isset($_POST["usuarioEditar"])){

			$datosController = array( 
				"user_id"=>$_POST["user_idEditar"],

				"firstname"=>$_POST["nombreEditar"],

				"lastname"=>$_POST["apellidosEditar"],
							          
				"user_name"=>$_POST["usuarioEditar"],
				                      
				"user_email"=>$_POST["emailEditar"]);
			
			$respuesta = Datos::actualizarUsuarioModel($datosController, "users");

			if($respuesta == "success"){

				header("location:template.php?action=usuarios");

			}

			else{

				echo "error";

			}

		}
	
	}

	#BORRAR USUARIO
	#------------------------------------
	public function borrarUsuarioController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrarUsuarioModel($datosController, "users");

			if($respuesta == "success"){

				header("location:template.php?action=usuarios");
			
			}

		}

	}


	#REGISTRO DE CATEGORIAS
	#------------------------------------
	public function registroCategoriaController(){
		
		if(isset($_POST["nombreRegistro"])){

			$datosController = array(
				"nombre"=>$_POST["nombreRegistro"], 

				"descripcion"=>$_POST["desRegistro"]);

			$respuesta = Datos::registroCategoriaModel($datosController, "categorias");

			if($respuesta == "success"){

				header("location:template.php?action=categorias");

			}

			else{

				header("location:index.php");
			}

		}

	}



	#VISTA DE USUARIOS
	#------------------------------------

	public function vistaCategoriasController(){

		$respuesta = Datos::vistaCategoriasModel("categorias");


		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id_categoria"].'</td>
				<td>'.$item["nombre_categoria"].'</td>
				<td>'.$item["descripcion_categoria"].'</td>
				<td><a href="template.php?action=editar_categoria&id_categoria='.$item["id_categoria"].'"class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a></td>
				<td><a href="template.php?action=categorias&idBorrar='.$item["id_categoria"].'"class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
			</tr>';

		}
	}

	
	#EDITAR USUARIO
	#------------------------------------

	public function editarCategoriaController(){

		$datosController = $_GET["id_categoria"];
		$respuesta = Datos::editarCategoriaModel($datosController, "categorias");

		echo'
			<div class="box-body">
					<input type="hidden" value="'.$respuesta["id_categoria"].'" name="id_categoriaEditar">
					<div class="form-group">
						<label for="nombre">Nombre</label>
						<input type="text" class="form-control" value="'.$respuesta["nombre_categoria"].'" name="nombreEditar" required>
					</div>
					<div class="form-group">
						<label for="descripcion">Descripcion</label>
						<input type="text" class="form-control"  value="'.$respuesta["descripcion_categoria"].'" name="desEditar" required>
					</div>

					<button type="submit"  value="Actualizar" class="btn btn-flat btn-success">Actualizar</button>
					</div>
			 </div>';

	}

	#ACTUALIZAR USUARIO
	#------------------------------------
	public function actualizarCategoriaController(){

		if(isset($_POST["nombreEditar"])){

			$datosController = array( 
				"id_categoria"=>$_POST["id_categoriaEditar"],

				"nombre"=>$_POST["nombreEditar"],

				"descripcion"=>$_POST["desEditar"]);
			
			$respuesta = Datos::actualizarCategoriaModel($datosController, "categorias");

			if($respuesta == "success"){

				header("location:template.php?action=categorias");

			}

			else{

				echo "error";

			}

		}
	
	}


	#BORRAR CATEGORIA
	#------------------------------------
	public function borrarCategoriaController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];

			$contar = Datos::contarCategoriaProductosModel($datosController, "categorias", "products");

			if ($contar["COUNT(*)"] == 0) {
				$respuesta = Datos::borrarCategoriaModel($datosController, "categorias");

				if($respuesta == "success"){

					header("location:template.php?action=categorias");
			
				}

			}else if ($contar > 0) {
				
				echo '
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4><i class="icon fa fa-ban"></i> Alerta!</h4>
              Categoria asociada con 1 o mas productos!.
            </div>
          ';
			}
			
			
		}

	}








#---------------------------------------------------



#Registro de producto

	public function registroProductoController(){
		date_default_timezone_set("America/Mexico_City");
		$fecha_actual = date("Y-m-d H:i:s");
		if(isset($_POST["codigoRegistro"])){

			$datosController = array(
				"codigo_producto"=>$_POST["codigoRegistro"], 

				"nombre_producto"=>$_POST["nombreProductoRegistro"], 

				"date_added"=>$fecha_actual,

				"id_categoria"=>$_POST["categoriaRegistro"],

				"precio_producto"=>$_POST["precioRegistro"],

				"stock"=>$_POST["stockRegistro"]);

			$respuesta = Datos::registroProductoModel($datosController, "products");

			if($respuesta == "success"){

				header("location:template.php?action=productos");

			}

			else{

				header("location:index.php");
			}

		}

	}




#------------------------------------------

#Vista Producto


	public function vistaProductosController(){

		$respuesta = Datos::vistaProductosModel("products");


		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["codigo_producto"].'</td>
				<td>'.$item["nombre_producto"].'</td>
				<td>'.$item["date_added"].'</td>
				<td>'.'$ '.$item["precio_producto"].'</td>
				<td>'.$item["stock"].'</td>
				<td><a href="template.php?action=stock&id_producto='.$item["id_producto"].'"class="btn btn-sm btn-success"><i class="fa fa-plus"></i></a></td>
				<td><a href="template.php?action=editar_producto&id_producto='.$item["id_producto"].'"class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a></td>
				<td><a href="template.php?action=productos&idBorrar='.$item["id_producto"].'"class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
			</tr>';

		}
	}



#----------------------------------------------------



	#EDITAR PRODUCTO
	#------------------------------------

	public function editarProductoController(){

		$datosController = $_GET["id_producto"];
		$respuesta = Datos::editarProductoModel($datosController, "products");

		echo'
			<div class="box-body">
					<input type="hidden" value="'.$respuesta["id_producto"].'" name="id_productoEditar">

					<div class="form-group">
						<label for="codigoEditar">Codigo del Producto</label>
						<input type="number" class="form-control" value="'.$respuesta["codigo_producto"].'" name="codigoEditar" required>
					</div>

					<div class="form-group">
						<label for="nombreProductoEditar">Nombre del Producto</label>
						<input type="text" class="form-control"  value="'.$respuesta["nombre_producto"].'" name="nombreProductoEditar" required>
					</div>

					<div class="form-group">
						<label for="precioEditar">Precio</label>
						<input type="number" class="form-control"  value="'.$respuesta["precio_producto"].'" name="precioEditar" required>
					</div>


					<button type="submit"  value="Actualizar" class="btn btn-flat btn-success">Actualizar</button>
					</div>
			 </div>';

	}

	#ACTUALIZAR USUARIO
	#------------------------------------
	public function actualizarProductoController(){

		if(isset($_POST["codigoEditar"])){

			$datosController = array( 
				"id_producto"=>$_POST["id_productoEditar"],

				"codigo_producto"=>$_POST["codigoEditar"],

				"nombre_producto"=>$_POST["nombreProductoEditar"],

				"precio_producto"=>$_POST["precioEditar"],

				"user_id"=>$_SESSION['user_id'],

				"user_name"=>$_SESSION['user_name']);
			
			$respuesta = Datos::actualizarProductoModel($datosController, "products");

			if($respuesta == "success"){

				header("location:template.php?action=inventario");

			}

			else{

				echo "error";

			}

		}
	
	}


	#BORRAR Producto
	#------------------------------------
	public function borrarProductoController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrarProductoModel($datosController, "products");

			if($respuesta == "success"){

				header("location:template.php?action=inventario");
			
			}

		}

	}



	#------------------------------------------------

	#VISTA HISTORIAL
	public function vistaHistorialController(){

		$datosController = $_GET["id_producto"];
		$respuesta = Datos::vistaHistorialModel($datosController, "historial");


		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["fecha"].'</td>
				<td>'.$item["nota"].'</td>
				<td>'.$item["referencia"].'</td>
				<td>'.$item["cantidad"].'</td>
			</tr>';

		}
	}


	public function vistaHistorialAllController(){

		$respuesta = Datos::vistaHistorialAllModel("historial");

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["fecha"].'</td>
				<td>'.$item["nota"].'</td>
				<td>'.$item["referencia"].'</td>
				<td>'.$item["cantidad"].'</td>
			</tr>';

		}
	}



	#-------------------------------------------------

	#AGREGAR STOCK
	public function obtenerStockController(){
		date_default_timezone_set("America/Mexico_City");
		$fecha_actual = date("Y-m-d H:i:s");
		$datosController = $_GET["id_producto"];
		$obtener = Datos::valorStockModel($datosController, "products");

		$actual=$obtener["stock"];

		 echo'
				<div class="form-group">
					<label for="stockEditar">Valor actual</label>
					<input type="number" disabled class="form-control"  value="'.$actual.'" name="actual" required>
				</div>';
				
				if(isset($_POST["cantidad"])){
					$nuevo=intval($_POST["cantidad"]);

					if($_POST["Radio"]=="+"){
						$stock=$actual+$nuevo;
						$nota=$_SESSION['nombre1'] . " " .
						"agrego " . $nuevo . " producto(S) al inventario.";
					}else {
						$stock=$actual-$nuevo;
						$nota=$_SESSION['nombre1'] . " " .
						"elimino " . $nuevo . " producto(S) al inventario.";
					}
					

					$datosController2 = array(
						"id_producto"=>$datosController,
						"cantidad"=>$stock);
		
					$datosController3 = array(
						"id_producto"=>$datosController,
						"user_id"=>$_SESSION['user_id'],
						"fecha"=>$fecha_actual,
						"nota"=>$nota,
						"referencia"=>$_POST["referencia"],
						"cantidad"=>$nuevo
						);
						
					$respuesta = Datos:: editarStockModel($datosController2, "products");
					$respuesta2 = Datos::insertarHistorialModel($datosController3, "historial");	
					if($respuesta == "success" && $respuesta2 == "success"){
		
						header("location:template.php?action=productos");
		
					}
		
					else{
		
						header("location:index.php");
					}
		
				}
	}


	
	#AGREGAR STOCK
	public function carritoController(){
		
				if(isset($_POST["cantidad"])){

					$datosController = $_POST["producto"];
					$obtener = Datos::precioModel($datosController, "products");
			
					$precio=$obtener["precio_producto"];
					$cantidad=intval($_POST["cantidad"]);
					$importe=$precio*$cantidad;

					$datosController2 = array(
						"id_producto"=>$datosController,
						"cantidad"=>$cantidad,
						"importe"=>$importe);

						//$obtener2 = Datos::ExitenciaIDModel("temporal", $datosController);
						
							
							$obtener3 = Datos::cantidadModel($datosController, "temporal");
							$cantidadtemporal=$obtener3["cantidad"];


							$nuevacantidad= $cantidadtemporal+$cantidad;

							$actulizar = Datos::actualizarCarritoModel($nuevacantidad, "temporal");
				
							if($actulizar == "success" ){
				
								header("location:template.php?action=ventas");
				
							}
				
							else{
				
								header("location:index.php");
							}
				
			
						
			
							$respuesta = Datos::agregarCarritoModel($datosController2, "temporal");
						
							if($respuesta == "success" ){
				
								header("location:template.php?action=ventas");
				
							}
				
							else{
				
								header("location:index.php");
							}
				
						
			
						
				
				}
	}


	public function vistaCarritoController(){

		$respuesta = Datos::vistaCarritoModel("products","temporal");
		$total=0;
		foreach($respuesta as $row => $item){
		
		echo'<tr>
				<td>'.$item["nombre_producto"].'</td>
				<td>'.$item["precio_producto"].'</td>
				<td>'.$item["cantidad"].'</td>
				<td>'.$item["importe"].'</td>
				<td><a href="template.php?action=ventas&idBorrar='.$item["id_producto"].'"class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
			</tr>';
			$total=$total+$item["importe"];
		}	
		
		echo'</tbody>

			</table>
		</div>
		
		
		
		<!-- /.box-body -->
		</div>
		<div class="box box-success  d-flex">
		<div class="box-header with-border">
						<h3 class="box-title">Total a pagar</h3>
					</div>
		<form method="post">    
			<div class="box-body">
				<div class="input-group">
					
					<span class="input-group-addon">$</span>
					<input type="number" disabled class="form-control"  value="'.$total.'" name="Total" required>	
				</div>
				
				<div class="form-group">
				
				<button type="submit"  value="Enviar"class="btn btn-flat btn-success">Terminar Compra</button>
			
				</div>
			</div>
		</div>
	</form>
	</div>
	
	</div>
';



		
	}

	#BORRAR Producto
	#------------------------------------
	public function borrarProductoCarritoController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$respuesta = Datos::borrarProductoModel($datosController, "temporal");

			if($respuesta == "success"){

				header("location:template.php?action=ventas");
			
			}

		}

	}

}



?>