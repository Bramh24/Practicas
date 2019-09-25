

<div class="row">
   
   <div class="col-lg-8 float-center " >
  
	   <div class="card-box ">
		   <h4 class="header-title m-t-0">Editar Usuario</h4>
	   
		   <form method="POST">
	
	<?php

	$editarUsuario = new MvcController();
	$editarUsuario -> editarUsuarioController();
	$editarUsuario -> actualizarUsuarioController();

	?>

</form>
	   </div>
   </div>

</div>


