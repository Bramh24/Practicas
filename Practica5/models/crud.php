<?php

require_once "conexion.php";




class Datos extends Conexion{


#-------------------------------------------------------
	#CONTAR FILAS DE LAS TABLAS

	public function ContRowsModel( $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT count(*) FROM $tabla ");


		$stmt->execute();

		return $stmt->fetch(PDO::FETCH_NUM);

		$stmt->close();

	}


#-------------------------------------------------------
	#REGRESAR VALOR DEL STOCK

	public function valorStockModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT stock FROM $tabla WHERE id_producto = :id_producto");
		
		$stmt->bindParam(":id_producto", $datosModel, PDO::PARAM_INT);


		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}


	#-------------------------------------------------------
	#REGRESAR PRECIO PORDUCTO

	public function precioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT precio_producto FROM $tabla WHERE id_producto = :id_producto");
		
		$stmt->bindParam(":id_producto", $datosModel, PDO::PARAM_INT);


		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}


	
	#-------------------------------------------------------
	#REGRESAR CANTIDAD PORDUCTO

	public function cantidadModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT cantidad FROM $tabla WHERE id_producto = :id_producto");
		
		$stmt->bindParam(":id_producto", $datosModel, PDO::PARAM_INT);


		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}

	#REGISTRO DE USUARIOS
	#-------------------------------------
	public function editarStockModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  stock = :cantidad WHERE id_producto = :id_producto");	
				
		$stmt->bindParam(":cantidad", $datosModel["cantidad"], PDO::PARAM_INT);
		$stmt->bindParam(":id_producto", $datosModel["id_producto"], PDO::PARAM_INT);


		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#INGRESO USUARIO
	#-------------------------------------
	public function ingresoUsuarioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT user_id, firstname, lastname, user_name, user_password_hash FROM $tabla WHERE user_name = :user_name");	
		$stmt->bindParam(":user_name", $datosModel["user_name"], PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch();

		$stmt->close();

	}

	#VISTA USUARIOS
	#-------------------------------------

	public function vistaUsuariosModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT user_id, firstname, lastname, user_name, user_email, date_added FROM $tabla");	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}

	#EDITAR USUARIO
	#-------------------------------------

	public function editarUsuarioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT user_id, firstname, lastname, user_name, user_email FROM $tabla WHERE user_id = :user_id");

		$stmt->bindParam(":user_id", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}

	#ACTUALIZAR USUARIO
	#-------------------------------------

	public function actualizarUsuarioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET user_id = :user_id, firstname = :firstname, lastname = :lastname, user_name = :user_name, user_email = :user_email WHERE user_id = :user_id");

		$stmt->bindParam(":firstname", $datosModel["firstname"], PDO::PARAM_STR);
		$stmt->bindParam(":lastname", $datosModel["lastname"], PDO::PARAM_STR);
		$stmt->bindParam(":user_name", $datosModel["user_name"], PDO::PARAM_STR);
		$stmt->bindParam(":user_email", $datosModel["user_email"], PDO::PARAM_STR);
		$stmt->bindParam(":user_id", $datosModel["user_id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}


	#BORRAR USUARIO
	#------------------------------------
	public function borrarUsuarioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE user_id = :idBorrar");
		$stmt->bindParam(":idBorrar", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}
	
	
	#REGISTRO DE USUARIOS
	#-------------------------------------
	public function registroCategoriaModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre_categoria, descripcion_categoria) VALUES (:nombre,:descripcion)");	
		
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datosModel["descripcion"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	
	#VISTA CATEGORIAS
	#-------------------------------------

	public function vistaCategoriasModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}

	
	#EDITAR USUARIO
	#-------------------------------------

	public function editarCategoriaModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id_categoria, nombre_categoria, descripcion_categoria FROM $tabla WHERE id_categoria = :id_categoria");

		$stmt->bindParam(":id_categoria", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}

	#ACTUALIZAR USUARIO
	#-------------------------------------

	public function actualizarCategoriaModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_categoria = :id_categoria, nombre_categoria = :nombre_categoria, descripcion_categoria = :descripcion_categoria WHERE id_categoria = :id_categoria");

		$stmt->bindParam(":nombre_categoria", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion_categoria", $datosModel["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":id_categoria", $datosModel["id_categoria"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}



	#BORRAR CATEGORIAS
	#------------------------------------
	public function borrarCategoriaModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_categoria = :idBorrar");
		$stmt->bindParam(":idBorrar", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}




	#CONTAR SI HAY PRODUCTOS

	public function contarCategoriaProductosModel($datosModel, $tabla, $tabla1){

		$stmt = Conexion::conectar()->prepare("SELECT COUNT(*) FROM $tabla INNER JOIN $tabla1 ON $tabla.id_categoria = $tabla1.id_categoria WHERE $tabla.id_categoria = :idBorrar");

		$stmt->bindParam(":idBorrar", $datosModel, PDO::PARAM_INT);

		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();
	}






#------------------------------------------------





	public function ObtenerCategorias($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT id_categoria, nombre_categoria, descripcion_categoria FROM $tabla");	

		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}



	public function ObtenerProductos($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT id_producto, nombre_producto,precio_producto FROM $tabla");	

		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}





	public function registroProductoModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (codigo_producto, nombre_producto, date_added, precio_producto, stock, id_categoria) VALUES (:codigo_producto,:nombre_producto, :date_added, :precio_producto, :stock, :id_categoria)");	
		
		$stmt->bindParam(":codigo_producto", $datosModel["codigo_producto"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre_producto", $datosModel["nombre_producto"], PDO::PARAM_STR);
		$stmt->bindParam(":date_added", $datosModel["date_added"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_producto", $datosModel["precio_producto"], PDO::PARAM_STR);
		$stmt->bindParam(":stock", $datosModel["stock"], PDO::PARAM_STR);
		$stmt->bindParam(":id_categoria", $datosModel["id_categoria"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}






#---------------------------------------------------


	# Vista Productos


	public function vistaProductosModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}


#------------------------------------------------------


	#EDITAR PRODUCTO
	#-------------------------------------

	public function editarProductoModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id_producto, codigo_producto, nombre_producto, precio_producto, stock FROM $tabla WHERE id_producto = :id_producto");

		$stmt->bindParam(":id_producto", $datosModel, PDO::PARAM_INT);	
		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

	}

	#ACTUALIZAR PRODUCTO
	#-------------------------------------

	public function actualizarProductoModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_producto = :id_producto, codigo_producto = :codigo_producto, nombre_producto = :nombre_producto, precio_producto = :precio_producto WHERE id_producto = :id_producto");

		$stmt->bindParam(":codigo_producto", $datosModel["codigo_producto"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre_producto", $datosModel["nombre_producto"], PDO::PARAM_STR);
		$stmt->bindParam(":precio_producto", $datosModel["precio_producto"], PDO::PARAM_STR);
		$stmt->bindParam(":id_producto", $datosModel["id_producto"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";
		}

		else{
			return "error";
		}

		$stmt->close();

	}



	#BORRAR PRODUCTO
	#------------------------------------
	public function borrarProductoModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_producto = :idBorrar");
		$stmt->bindParam(":idBorrar", $datosModel, PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}




#----------------------------------------------------

	#VISTA HISTORIAL

	public function vistaHistorialModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id_producto = :id_producto");	

		$stmt->bindParam (":id_producto", $datosModel, PDO::PARAM_INT);
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}


	public function vistaHistorialAllModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");	

		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}



	#INSERTAR HISTORIAL
	public function insertarHistorialModel($datosModel, $tabla){

	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (id_producto, user_id, fecha, nota, referencia, cantidad) VALUES (:id_producto, :user_id, :fecha, :nota, :referencia, :cantidad)");	
		
	$stmt->bindParam(":id_producto", $datosModel["id_producto"], PDO::PARAM_INT);
	$stmt->bindParam(":user_id", $datosModel["user_id"], PDO::PARAM_INT);
		
	$stmt->bindParam(":fecha", $datosModel["fecha"], PDO::PARAM_STR);
	$stmt->bindParam(":nota", $datosModel["nota"], PDO::PARAM_STR);
	$stmt->bindParam(":referencia", $datosModel["referencia"], PDO::PARAM_STR);
	$stmt->bindParam(":cantidad", $datosModel["cantidad"], PDO::PARAM_INT);

	if($stmt->execute()){

		return "success";

	}

	else{

		return "error";

	}

	$stmt->close();

	}

	public function ExitenciaIDModel( $tabla, $datosModel){

		$stmt = Conexion::conectar()->prepare("SELECT id_producto FROM $tabla  WHERE id_producto = :id_producto");
		
		$stmt->bindParam(":id_producto", $datosModel, PDO::PARAM_INT);

	
		if ($stmt-> rowCount() == 0){
			return "error";
			

		}

		else{

			
			return "success";
		}

		$stmt->close();

	}

	public function agregarCarritoModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (cantidad, importe, id_producto) VALUES (:cantidad,:importe,:id_producto )");	
		
		
		$stmt->bindParam(":id_producto", $datosModel["id_producto"], PDO::PARAM_INT);
		$stmt->bindParam(":cantidad", $datosModel["cantidad"], PDO::PARAM_INT);
		$stmt->bindParam(":importe", $datosModel["importe"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}
	public function actualizarCarritoModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  cantidad = :cantidad WHERE id_producto = :id_producto");

	
		$stmt->bindParam(":id_categoria", $datosModel["id_categoria"], PDO::PARAM_INT);

		$stmt->bindParam(":cantidad", $datosModel["cantidad"], PDO::PARAM_INT);
		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}


	#VISTA HISTORIAL

	public function vistaCarritoModel($tabla, $tabla1){

		$stmt = Conexion::conectar()->prepare("SELECT  A.id_producto,A.nombre_producto, A.precio_producto, B.cantidad,B.importe  FROM $tabla A INNER JOIN $tabla1 AS B ON A.id_producto=B.id_producto
		");	

	
		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

	}
}

?>