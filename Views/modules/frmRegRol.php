<?php 

$rolControlador = new RolControlador();
$rolControlador->registrarRolControlador();

?>

<div class="row">
	<div class="col-3"></div>
	<div class="col-6 mt-5 mb-5">
		<form class="form" method="post">
			<label for="" class="form-label">Nombres del Perfil</label>
			<input type="text" name="nombrePerfil" class="form-control">
			
			<button type="submit" name="regRol" class="btn btn-primary mt-5">Registrar</button>
		</form>
		<?php 
		if (isset($_GET['action'])) {
			if($_GET['action'] == 'ok7'){
				print "Perfil Registrado Correctamente";
			}
			elseif($_GET['action'] == 'fa7'){
				print "Ocurrio un Error. Intentelo Nuevamente";
			}
		}

		?>
		<a href="frmConRol">Consultar Perfiles</a>
	</div>
	<div class="col-3"></div>
</div>
