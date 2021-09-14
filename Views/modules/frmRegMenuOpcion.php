<?php 

$opcionMenuControlador = new OpcionMenuControlador();
$opcionMenuControlador->registrarOpcionMenuControlador();
$idMenuPrincipal = $opcionMenuControlador->menuPrincipalControlador->consultarMenuPrincipalControlador();

?>

<div class="col-3"></div>
<div class="col-6 mt-5 mb-5">
	<div class="row">
		<div class="col">
			<h3>REGISTRAR OPCIONES DE SUBMENU</h3>
		</div>
	</div>

	<form class="form" method="post">
		<div class="button-group">
			<label for="" class="form-label">Menu Principal</label>
			<select name="idMenu" class="form-control">
				<option value="0">Seleccione un Menu Principal</option>
				<?php 
				foreach ($idMenuPrincipal as $keyMenuPrincipal => $valueMenuPrincipal) {
					print '<option value="'.$valueMenuPrincipal['idMenu'].'">'.$valueMenuPrincipal['menuNombre'].'</option>';
				}
				?>
			</select>
		</div>
		<div class="button-group">
			<label for="" class="form-label">Nombre de Submenu</label>
			<input type="text" name="opcionMenuNombre" class="form-control">			
		</div>
		<div class="button-group">
			<label for="" class="form-label">Enlace Pagina</label>
			<input type="text" name="opcionMenuEnlace" class="form-control">			
		</div>
		<div class="button-group">
			<button type="submit" name="btnRegOpcMenu" class="btn btn-primary mt-5">Registrar</button>
		</div>			
	</form>
	<div class="button-group">
		
		<?php 
		if (isset($_GET['action'])) {
			if($_GET['action'] == 'ok12'){
				print "Menu Registrado Correctamente";
			}
			elseif($_GET['action'] == 'fa12'){
				print "Ocurrio un Error. Intentelo Nuevamente";
			}
		}
		?>

	</div>
	<div class="button-group">		
		<a href="frmConMenuOpcion">Consultar Opciones de Submenu</a>		
	</div>
</div>
<div class="col-3"></div>
