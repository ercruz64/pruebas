<?php 
	$usuarioControlador = new UsuarioControlador();
	$datosusuario = $usuarioControlador->consultarUsuarioControlador();

?>


<div class="row">
	<div class="col">
		<h1>Consultar Usuarios</h1>
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
			<input type="submit" name="btnBuscarusuario" value="🔍" class="btn btn-primary">
			</div>
			</div>
		</form>
	</div>	
</div>

<div class="row">
	<div class="col">
		<table class="table table-striped">
			<thead>
				<th>Nombre de usuario</th>
				<th>Estado de la usuario</th>
				<th colspan="2">Opciones</th>
			</thead>
			<tbody>
				<?php 
				///var_dump($datosusuario);
					foreach ($datosusuario as $keyusuario => $valueusuario) {
						print '<tr>';
						print '<td>'.$valueusuario['usuarioLogin'].'</td>';
						print '<td>'.$valueusuario['usuarioEstado'].'</td>';

						print '<td><a href="index.php?action=frmEditUsuario&id='.$valueusuario['idUsuario'].'">Editar</a></td>';
						print '<td><a href="index.php?action=frmDeleteusuario&id='.$valueusuario['idUsuario'].'">Eliminar</a></td>';
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
			if($_GET['action'] == 'ok6'){
				print "<p>Usuario Eliminado Correctamente</p>";
			}
			elseif ($_GET['action'] == 'fa6') {
				print "<p>Ocurrio un Error Intentelo mas Tarde</p>";
			}
		}
		?>
	</div>
</div>