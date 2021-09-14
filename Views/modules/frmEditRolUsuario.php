<?php 

$rolUsuarioControlador = new RolUsuarioControlador();

$datosUsuario = $rolUsuarioControlador->usuarioControlador->consultarUsuarioIdControlador();
$rolUsuarioControlador->actualizarRolUsuarioControlador();
$datosRol = $rolUsuarioControlador->rolControlador->consultarRolControlador();
$datosRolUsuario = $rolUsuarioControlador->consultarRolUsuarioRegistradoControlador();

?>

<div class="row">
	<div class="col-3"></div>
	<div class="col-6 mt-5 mb-5">
		<form class="form" method="post">
			<div class="row">
				<div class="col">
						<div>
							<h3>ACTUALIZAR PERFILES DE USUARIO</h3>
						</div>
					<label for="" class="form-label">Nombres del Perfil</label>
					<input type="text" name="usuarioNombre" class="form-control" value="<?php print $datosUsuario[0]['usuarioLogin'] ?>" disabled>

					<div class="btn-group mt-5" role="group" aria-label="Basic checkbox toggle button group">

						<?php 

						foreach ($datosRolUsuario as $keyRolUsuario => $valueRolUsuario) {
							if ($valueRolUsuario['usuarioRolEstado'] == 'true') {
								$checked = 'checked';
							}
							else{
								$checked = '';
							}
							print '<input name="idRoles[]" value="'.$valueRolUsuario['idRol'].'" type="checkbox" class="btn-check" id="btncheck'.$valueRolUsuario['idRol'].'" autocomplete="off" '.$checked.'>';
							print '<label class="btn btn-outline-primary" for="btncheck'.$valueRolUsuario['idRol'].'">'.$valueRolUsuario['rolNombre'].'</label>';
						}

						?>
					</div>									
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="btn-group">
						<button type="submit" name="updRolUsuario" class="btn btn-primary mt-5">Actualizar</button>
					</div>				
				</div>
			</div>			
		</form>
		<div class="row">
			<div class="col">
				<?php 
				if (isset($_GET['action'])) {
					if($_GET['action'] == 'ok11'){
						print "Perfiles de Usuario Actualizados Correctamente";
					}
					elseif($_GET['action'] == 'fa11'){
						print "Ocurrio un Error. Intentelo Nuevamente";
					}
				}
				?>				
			</div>
		</div>
		<div class="row">
			<div class="col">
				<a href="frmConRolUsuario">Consultar Perfiles de Usuario</a>
			</div>
		</div>
	</div>
	<div class="col-3"></div>
</div>
