<?php 

$rolControlador = new MenuPrincipalControlador();
$rolControlador->registrarMenuControlador();

?>

<div class="col-3"></div>
<div class="col-6 mt-5 mb-5">
	<div class="row">
		<div class="col">
			<h3>REGISTRAR OPCIONES DE MENU PRINCIPAL</h3>

		</div>
	</div>

	<form class="form" method="post">
		<div class="row">
			<div class="col">
				<label for="" class="form-label">Nombres Menu Principal</label>
				<input type="text" name="nombreMenu" class="form-control">

			</div>
		</div>
		<div class="row">
			<div class="col">
				<button type="submit" name="btnRegMenu" class="btn btn-primary mt-5">Registrar</button>
			</div>
		</div>			
	</form>
	<div class="row">
		<div class="col">
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
	</div>
	<div class="row">
		<div class="col">
			<a href="frmConMenu">Consultar Opciones Menu Principal</a>
		</div>
	</div>
</div>
<div class="col-3"></div>
