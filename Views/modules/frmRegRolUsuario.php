<?php 

$rolUsuarioControlador = new RolUsuarioControlador();
$datosUsuario = $rolUsuarioControlador->usuarioControlador->consultarUsuarioControlador();
$datosRol = $rolUsuarioControlador->rolControlador->consultarRolControlador();
$datosRolUsuario = $rolUsuarioControlador->consultarRolUsuarioRegistradoControlador();
$rolUsuarioControlador->registrarRolUsuarioControlador();

?>

<div class="col-3"></div>
<div class="col-6 mt-5 mb-5">
	<form class="form" method="post">
		<div class="row">
			<div class="col">
				<div><h3>REGISTRAR PERFILES DE USUARIO</h3></div>
				<label for="" class="form-label">Nombres del Perfil</label>
				<select name="idUsuario" id="" class="form-select" required="" onchange="this.form.submit()">
					<option value="">Seleccione un Usuario</option>
					<?php 
					foreach ($datosUsuario as $keyUsuario => $valueUsuario) {
						if (isset($_POST['idUsuario']) && $valueUsuario['idUsuario'] == $_POST['idUsuario']) {
							print '<option value="'.$valueUsuario['idUsuario'].'" selected>'.$valueUsuario['usuarioLogin'].'</option>';
						}
						else{
							print '<option value="'.$valueUsuario['idUsuario'].'">'.$valueUsuario['usuarioLogin'].'</option>';
						}
					}
					?>
				</select>
				
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="btn-group mt-5" role="group" aria-label="Basic checkbox toggle button group">

					<?php 
					foreach ($datosRol as $keyRol => $valueRol) {

						if (isset($datosRolUsuario)) {
							foreach ($datosRolUsuario as $keyRolUsuario => $valueRolUsuario) {
								if ($valueRol['idRol'] == $valueRolUsuario['idRol'] &&
									$valueRolUsuario['usuarioRolEstado'] == 'true') {
									$checked = ' checked';
									$disabled = ' disabled';
									$idRol = '';
									break;
								}
								else{
									$checked = '';
									$disabled = '';
									$idRol = $valueRol['idRol'];
								}
							}
						}
						else{
							$checked = '';
							$disabled = '';
							$idRol = $valueRol['idRol'];
						}

					print '<input name="idRoles[]" value="'.$valueRol['idRol'].'" type="checkbox" class="btn-check" id="btncheck'.$valueRol['idRol'].'" autocomplete="off"'.$checked. $disabled.'>';
					print '<label class="btn btn-outline-primary" for="btncheck'.$valueRol['idRol'].'"'.$checked.$disabled.'>'.$valueRol['rolNombre'].'</label>';
				}

					?>

				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<button type="submit" name="regRolUsuario" class="btn btn-primary mt-5">Registrar</button>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<?php 
				if (isset($_GET['action'])) {
					if($_GET['action'] == 'ok10'){
						print "Perfiles de Usuario Registrados Correctamente";
					}
					elseif($_GET['action'] == 'fa10'){
						print "Ocurrio un Error. Intentelo Nuevamente";
					}
				}

				?>
			</div>
		</div>
	</form>
	<div class="ro">
		<div class="col">
			<a href="frmConRolUsuario">Consultar Perfiles de Usuario</a>
		</div>
	</div>
</div>
<div class="col-3"></div>
