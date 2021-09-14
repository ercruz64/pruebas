<?php 

$usuarioControlador = new usuarioControlador();
$usuarioControlador->actualizarUsuarioControlador();
$datosUsuario = $usuarioControlador->consultarUsuarioIdControlador();
//var_dump($datosUsuario);
$estadoActivo = '';
$estadoInactivo = '';

if ($datosUsuario[0]['usuarioEstado'] == 'Activo') {
	$estadoActivo = "checked";
}
else{
	$estadoInactivo = "checked";
}

?>

<div class="row">
	<div class="col-3"></div>
	<div class="col-6 mt-5 mb-5">
		<form class="form" method="post">
			<label for="" class="form-label">Login</label>
			<input type="text" name="login" value="<?php print $datosUsuario[0]['usuarioLogin'] ?>" class="form-control">
			<br>
			<input type="text" name="password" value="<?php print $datosUsuario[0]['usuarioPassword'] ?>" class="form-control">
			<label for="" class="form-label">Estado</label>
			<input type="radio" name="estado" value="Inactivo" <?php print $estadoInactivo ?>>
			<label for="" class="label-form">Inactivo</label>
			<input type="radio" name="estado" value="Activo" <?php print $estadoActivo ?>>
			<label for="" class="label-form">Activo</label>
			<br>
			<button type="submit" name="updusuario" class="btn btn-primary mt-5">Actualizar</button>
		</form>
		<?php 
		if (isset($_GET['action'])) {
			if($_GET['action'] == 'ok4'){
				print "usuario Actualizada Correctamente";
			}
			elseif($_GET['action'] == 'fa4'){
				print "Ocurrio un Error. Intentelo Nuevamente";
			}
		}

		?>
		<a href="frmConUsuarios">Consultar usuarios</a>
	</div>
	<div class="col-3"></div>
</div>
