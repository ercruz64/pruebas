<?php 

$personaControlador = new PersonaControlador();
$personaControlador->actualizarPersonaControlador();
$datosPersona = $personaControlador->consultarPersonaIdControlador();

$estadoMasculino = '';
$estadoFemenino = '';

if ($datosPersona[0]['personaGenero'] == 'Masculino') {
	$estadoMasculino = "checked";
}
else{
	$estadoFemenino = "checked";
}

?>

<div class="row">
	<div class="col-3"></div>
	<div class="col-6 mt-5 mb-5">
		<form class="form" method="post">
			<label for="" class="form-label">Nombres de la Persona</label>
			<input type="text" name="nombre" value="<?php print $datosPersona[0]['personaNombres'] ?>" class="form-control">
			<label for="" class="form-label">Apellidos de la Persona</label>
			<input type="text" name="apellido" value="<?php print $datosPersona[0]['personaApellidos'] ?>" class="form-control">

			<label for="" class="form-label">Documento de Identidad</label>
			<input type="number" name="documento"  value="<?php print $datosPersona[0]['personaDocumento'] ?>" class="form-control">

			<label for="" class="form-label">Genero</label>
			<input type="radio" name="genero" value="Femenino" <?php print $estadoFemenino ?>>
			<label for="" class="label-form">Femenino</label>
			<input type="radio" name="genero" value="Masculino" <?php print $estadoMasculino ?>>
			<label for="" class="label-form">Masculino</label>
			<br>
			<button type="submit" name="updPersona" class="btn btn-primary mt-5">Actualizar</button>
		</form>
		<?php 
		if (isset($_GET['action'])) {
			if($_GET['action'] == 'ok2'){
				print "Persona Actualizada Correctamente";
			}
			elseif($_GET['action'] == 'fa2'){
				print "Ocurrio un Error. Intentelo Nuevamente";
			}
		}

		?>
		<a href="frmConPersona">Consultar Personas</a>
	</div>
	<div class="col-3"></div>
</div>
