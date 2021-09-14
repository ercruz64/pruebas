<?php 
	$personaControlador = new PersonaControlador();
	$datosPersona = $personaControlador->consultarPersonaControlador();
?>


<div class="row">
	<div class="col">
		<h1>Consultar Personas</h1>
	</div>	
</div>

<div class="row">
	<div class="col">
		<form method="post" class="form">
			<div class="row">
			<div class="col-2">
			<input type="text" name="datoBusqueda" class="form-control" style="width: auto;">
			</div>
			<div class="col-6">
			<input type="submit" name="btnBuscarPersona" value="🔍" class="btn btn-primary">
			</div>
			</div>
		</form>
	</div>	
</div>

<div class="row">
	<div class="col">
		<table class="table table-striped">
			<thead>
				<th>Nombre de la Persona</th>
				<th>Apellidos de la Persona</th>
				<th>Genero</th>
				<th>Documento</th>
				<th colspan="2">Opciones</th>
			</thead>
			<tbody>
				<?php 
					foreach ($datosPersona as $keyPersona => $valuePersona) {
						print '<tr>';
						print '<td>'.$valuePersona['personaNombres'].'</td>';
						print '<td>'.$valuePersona['personaApellidos'].'</td>';
						print '<td>'.$valuePersona['personaGenero'].'</td>';
						print '<td>'.$valuePersona['personaDocumento'].'</td>';

						print '<td><a href="index.php?action=frmEditPersona&id='.$valuePersona['idPersona'].'">Editar</a></td>';
						print '<td><a href="index.php?action=frmDelPersona&id='.$valuePersona['idPersona'].'">Eliminar</a></td>';
						print "</tr>";
					}
				?>				
			</tbody>
		</table>
	</div>
</div>