<?php 

$rolControlador = new RolControlador();
$rolControlador->actualizarRolControlador();
$datosRol = $rolControlador->consultarRolIdControlador();

?>

<div class="row">
	<div class="col-3"></div>
	<div class="col-6 mt-5 mb-5">
		<form class="form" method="post">
			<label for="" class="form-label">Nombres del Perfil</label>
			<input type="text" name="nombrePerfil" class="form-control" value="<?php print $datosRol[0]['rolNombre'] ?>">
			
			<button type="submit" name="updRol" class="btn btn-primary mt-5">Actualizar</button>
		</form>
		<?php 
		if (isset($_GET['action'])) {
			if($_GET['action'] == 'ok8'){
				print "Perfil Actualizado Correctamente";
			}
			elseif($_GET['action'] == 'fa8'){
				print "Ocurrio un Error. Intentelo Nuevamente";
			}
		}

		?>
		<a href="frmConRol">Consultar Perfiles</a>
	</div>
	<div class="col-3"></div>
</div>
