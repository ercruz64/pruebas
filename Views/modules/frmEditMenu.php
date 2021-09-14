<?php 

$menuControlador = new MenuPrincipalControlador();
$menuControlador->actualizarMenuPrincipalControlador();
$datosMenu = $menuControlador->consultarMenuPrincipalIdControlador();
var_dump($datosMenu);
?>

<div class="row">
	<div class="col-3"></div>
	<div class="col-6 mt-5 mb-5">
		<form class="form" method="post">
			<label for="" class="form-label">Nombres del Perfil</label>
			<input type="text" name="nombreMenu" class="form-control" value="<?php print $datosMenu[0]['menuNombre'] ?>">
			
			<button type="submit" name="btnUpdMenu" class="btn btn-primary mt-5">Actualizar</button>
		</form>
		<?php 
		if (isset($_GET['action'])) {
			if($_GET['action'] == 'ok13'){
				print "Perfil Actualizado Correctamente";
			}
			elseif($_GET['action'] == 'fa13'){
				print "Ocurrio un Error. Intentelo Nuevamente";
			}
		}

		?>
		<a href="frmConMenu">Consultar Opciones Menu Principal</a>
	</div>
	<div class="col-3"></div>
</div>
