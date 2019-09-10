
<?php

    class MvcController{
    // Nombre de la clase...

        // Funciones a llamar...
        public function plantilla(){

            include "views/template.php";
        }


        // Mandar a traer el menu que eligio el usuario.
        public function enlacesPaginasController(){

            if(isset($_GET["menu"])){

                $enlacesController = $_GET["menu"];
            }else{

                $enlacesController = "index";

            }

            // El menu elegido es mandado al Model para ser
            // elegido...
            $respuesta = EnlacesPaginas::enlacesPaginasModel($enlacesController);

            include $respuesta;
        }

    }

?>