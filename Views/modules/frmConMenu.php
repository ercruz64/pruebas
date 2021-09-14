<?php 
$menuPrincipalControlador = new MenuPrincipalControlador();
$datosMenu = $menuPrincipalControlador->consultarMenuPrincipalControlador();
	///var_dump($datosRoles);
?>

<div class="col-3"></div>
<div class="col-6">
	<div class="row">
		<div class="col">
			<h1>Consultar Menu Principal</h1>
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
						<input type="submit" name="btnBuscar" value="🔍" class="btn btn-primary">
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
					foreach ($datosMenu as $keyMenu => $valueRol) {
						print '<tr>';
						print '<td>'.$valueRol['menuNombre'].'</td>';
						print '<td><a href="index.php?action=frmEditMenu&id='.$valueRol['idMenu'].'" data-toggle="confirmation">Editar</a></td>';
						print '<td><a href="index.php?action=frmDelMenu&id='.$valueRol['idMenu'].'" data-toggle="confirmation">Eliminar</a></td>';
						print "</tr>";
					}
					?>				
				</tbody>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<?php
			if(isset($_GET['action'])){
				if ($_GET['action'] == 'ok14') {
					print "Registro Eliminado Correctamente";
				}
				elseif ($_GET['action'] == 'fa14') {
					print "Ocurrio un Error al Eliminar";
				}
			}
			?>
		</div>
	</div>
</div>
<div class="col-3"></div>