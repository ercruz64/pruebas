<?php 

class OpcionMenuControlador {
	
	function __construct() {
		$this->opcionMenuModelo = new OpcionMenuModelo();
		$this->menuPrincipalControlador = new MenuPrincipalControlador();
	}

	public function registrarOpcionMenuControlador(){
		if (isset($_POST['btnRegOpcMenu'])) {
			$datoOpcionMenu = array('opcionMenuNombre' => $_POST['opcionMenuNombre'], 
				'opcionMenuEnlace' => $_POST['opcionMenuEnlace'],
				'idMenu' => $_POST['idMenu']);
			$respuesta = $this->opcionMenuModelo->registrarOpcionMenuModelo($datoOpcionMenu);
			if ($respuesta){
				header('location:index.php?action=ok15');
			}
			else{
				header('location:index.php?action=fa15');
			}
		}
	}

	public function consultarOpcionMenuIdControlador($idMenu){
		$datosOpcionMenu = $this->opcionMenuModelo->consultarOpcionMenuIdModelo($idMenu);
		return $datosOpcionMenu;
	}
}