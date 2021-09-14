<?php 

$personaControlador = new PersonaControlador();
$personaControlador->registrarPersonaControlador();

?>

<div class="row">
	<div class="col-3"></div>
	<div class="col-6 mt-5 mb-5">
		<form class="form" method="post">
			<label for="" class="form-label">Nombres de la Persona</label>
			<input type="text" name="nombre" class="form-control">
			<label for="" class="form-label">Apellidos de la Persona</label>
			<input type="text" name="apellido" class="form-control">

			<label for="" class="form-label">Documento de Identidad</label>
			<input type="number" name="documento" class="form-control">

			<label for="" class="form-label">Genero</label>
			<input type="radio" name="genero" value="Femenino">
			<label for="" class="label-form">Femenino</label>
			<input type="radio" name="genero" value="Masculino">
			<label for="" class="label-form">Masculino</label>
			<br>
			<button type="submit" name="regPersona" class="btn btn-primary mt-5">Registrar</button>
		</form>
		<?php 
		if (isset($_GET['action'])) {
			if($_GET['action'] == 'ok1'){
				print "Persona Registrada Correctamente";
			}
			elseif($_GET['action'] == 'fa1'){
				print "Ocurrio un Error. Intentelo Nuevamente";
			}
		}

		?>
		<a href="frmConPersona">Consultar Personas</a>
	</div>
	<div class="col-3"></div>
</div>
