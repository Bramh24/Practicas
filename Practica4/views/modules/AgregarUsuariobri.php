
<div class="row ">
   
   <div class="col-lg-6  " >
   
	   <div class="card-box  ">
		   <h4 class="header-title m-t-0">Registro de Usuarios</h4>
	   
		   <form class="" action="POST">
		   <div class="form-group">
				   <label>No.</label>
				   <div>
					   <input data-parsley-type="number" type="text"
							   class="form-control" required name="num"
							   placeholder="Numero de empelado"/>
				   </div>
			   </div>
			   <div class="form-group">
				   <label>Nombre</label>
				   <div>
					   <input data-parsley-type="alphanum" type="text"
							   class="form-control" required
							   placeholder="Nombre"/>
				   </div>
			   </div>

			   <div class="form-group">
				   <label>Contraseña</label>
				   <div>
					   <input type="password" id="pass2" name="pass" class="form-control" required
							   placeholder="Password"/>
				   </div>
				   <label>Confirmar Contraseña</label>
				   <div class="mt-2">
					   <input type="password" class="form-control" name="confpass" required
							   data-parsley-equalto="#pass2"
							   placeholder="Re-Type Password"/>
				   </div>
			   </div>

			   <div class="form-group">
				   <label>Correo</label>
				   <div>
					   <input type="email" class="form-control" required
							   parsley-type="email" placeholder="Enter a valid e-mail"/>
				   </div>
			   </div>
			   
		   
		   
			   
			   <div class="form-group">
				   <div>
					   <button type="submit" class="btn btn-block  btn-custom waves-effect waves-light">
						   Agregar
					   </button>
				   
				   </div>
			   </div>
		   </form>
	   </div>
   </div>

</div>

<?php

$registro = new MvcController();
$registro -> registroUsuarioController();

if(isset($_GET["action"])){

	if($_GET["action"] == "ok"){

		echo "Registro Exitoso";
	
	}

}

?>
