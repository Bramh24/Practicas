
   <div class="col-lg-6  " >
   
   <div class="card-box  ">
	   <h3 class="header-title m-t-0">Editar Padre</h3>
   
	   <form method="POST" >
	<?php

	$editarPadre = new MvcController();
	$editarPadre -> editarPadreController();
	$editarPadre -> actualizarPadreController();

	?>

</form>
	   </div>
   </div>

</div>