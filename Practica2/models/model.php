<?php

    class EnlacesPaginas{

        // Aqui se mando el menu elegido y si es igual
        //  A algun menu existente te manda a la pagina.
        // En caso de que no haya sido encontrado te manda a inicio...
        public function enlacesPaginasModel($enlaceMenu){

            if($enlaceMenu == "nosotros" || $enlaceMenu == "servicios" || $enlaceMenu == "contactenos" ){

                $module = "views/modules/" . $enlaceMenu . ".php";
            }
            else if($enlaceMenu == "index"){

                $module = "views/modules/inicio.php";
            }else{

                $module = "views/modules/inicio.php";
            }

            return $module;
        }

    }

?>