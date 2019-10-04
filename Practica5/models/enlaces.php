<?php 

class Paginas{
	
	public function enlacesPaginasModel($enlaces){


		if($enlaces == "ingresar" || $enlaces == "inicio" || $enlaces == "registro"|| $enlaces == "usuarios" || $enlaces == "editar"|| $enlaces == "registro_categoria"|| $enlaces == "categorias" || $enlaces == "editar_categoria" || $enlaces == "salir" || $enlaces == "registro_producto" || $enlaces == "productos" || $enlaces == "editar_producto"|| $enlaces == "ventas"|| $enlaces == "historial_venta" || $enlaces == "stock" ){

			$module =  "../views/modules/".$enlaces.".php";
		
		}

		else if($enlaces == "okProducto"){
			$module =  "views/modules/registro_producto.php";
		}

		elseif ($enlaces == "cambioProducto") {
			$module =  "views/modules/inventario.php";
		}
		

		else{

			$module =  "../views/modules/ingresar.php";

		}
		
		return $module;

	}

}

?>