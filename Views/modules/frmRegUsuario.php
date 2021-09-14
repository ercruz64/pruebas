<?php 
$usuarioControlador = new UsuarioControlador();
$registrarUsuario = $usuarioControlador->registrarUsuarioControlador();

$listarPersonasControlador = new PersonaControlador();
$listarPersona = $listarPersonasControlador->listarPersonasControlador();
	#var_dump($listarPersona);
?>
<div class="row">
	<div class="col-4">
		
	</div>
	<div class="col-4 mt-5">
		<h1>Registrar Usuarios</h1>
		<form method="post" class="form">
			<label>Nombre Usuario</label>
			<input type="text" class="form-control" name="usuario" placeholder="Nombre Usuario">
			<br>
			<label>Password</label>
			<input type="password" class="form-control" name="password" placeholder="Contraseña">
			<br>
			<label>Persona</label>
			<select name="idPersonas" class="form-control">
				<option value="">Persona</option>
				<?php 
				foreach ($listarPersona as $key => $value) {
					print '
					<option value="'.$value['idPersona'].'">'.$value['personaNombres'].' '.$value['personaDocumento'].'</option>';
				}
				?>
			</select>
			
			<button type="submit" name="regUsuario" class="btn btn-primary mt-3">Registrar Usuario</button>	 
		</form>		
				<?php 
		if (isset($_GET['action'])) {
			if($_GET['action'] == 'ok5'){
				print "Usuario Registrada Correctamente";
			}
			elseif($_GET['action'] == 'fa5'){
				print "Ocurrio un Error. Intentelo Nuevamente";
			}
		}

		?>

		<a href="frmConUsuarios">Consultar Usuarios</a>
	</div>
</div>
