<?php 
	$rolControlador = new RolControlador();
	$datosRoles = $rolControlador->consultarRolControlador();
	///var_dump($datosRoles);
?>

<div class="col-3"></div>
<div class="col-6">
<div class="row">
	<div class="col">
		<h1>Consultar Perfiles</h1>
	</div>	
</div>

<div class="row">
	<div class="col">
		<form method="post" class="form">
			<div class="row">
			<div class="col-4">
			<input type="text" name="datoBusqueda" class="form-control" style="width: auto;">
			</div>
			<div class="col">
			<input type="submit" name="btnBuscarRol" value="🔍" class="btn btn-primary">
			</div>
			</div>
		</form>
	</div>	
</div>

<div class="row">
	<div class="col">
		<table class="table table-striped">
			<thead>
				<th>Nombre del Perfil</th>
				<th colspan="2">Opciones</th>
			</thead>
			<tbody>
				<?php 
					foreach ($datosRoles as $keyRol => $valueRol) {
						print '<tr>';
						print '<td>'.$valueRol['rolNombre'].'</td>';
						print '<td><a href="index.php?action=frmEditRol&id='.$valueRol['idRol'].'">Editar</a></td>';
						print '<td><a href="index.php?action=frmDelRol&id='.$valueRol['idRol'].'">Eliminar</a></td>';
						print "</tr>";
					}
				?>				
			</tbody>
		</table>
	</div>
</div>
</div>
<div class="col-3"></div>