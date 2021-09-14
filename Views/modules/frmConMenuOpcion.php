<?php 
$opcionMenuControlador = new OpcionMenuControlador();
$datosMenuPrincipal = $opcionMenuControlador->menuPrincipalControlador->consultarMenuPrincipalControlador();
?>

<div class="col-3"></div>
<div class="col-6">
	<div class="row">
		<div class="col">
			<h1>Consultar SubMenu</h1>
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

	<!--<div class="row">
		<div class="col">
			<table class="table table-striped">
				<thead>
					<th>Nombre del Menu Principal</th>
					<th colspan="2">Opciones</th>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</div>-->
	<?php
	foreach ($datosMenuPrincipal as $keyMenuPrincipal => $valueMenuPrincipal) {
		print '<div class="row">';
		print '<div class="col">';
		print '<table class="table table-striped">';
		print '<thead>';
		print '<th>Nombre del Menu Principal</th>';
		print '<th>'.$valueMenuPrincipal['menuNombre'].'</th>';
		print '<th colspan="2">Opciones</th>';
		print '</thead>';							
							
		$datosOpcionMenu = $opcionMenuControlador->consultarOpcionMenuIdControlador($valueMenuPrincipal['idMenu']);
		if ($datosOpcionMenu != NULL) {
			foreach ($datosOpcionMenu as $keyOpcionMenu => $valueOpcionMenu) {
				print '<tbody>';
				print '<tr>';
				print '<td colspan="2">'.$valueOpcionMenu['opcionMenuNombre'].'</td>';
				print '<td><a href="index.php?action=frmEditMenu&id='.$valueOpcionMenu['idMenu'].'" data-toggle="confirmation">Editar</a></td>';
				print '<td><a href="index.php?action=frmDelMenu&id='.$valueOpcionMenu['idMenu'].'" data-toggle="confirmation">Eliminar</a></td>';
				print '</tr>';

			}
		}
		print '</table>';
		print '</div>';
		print '</div>';
	}
	?>
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