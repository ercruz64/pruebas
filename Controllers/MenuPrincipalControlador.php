<?php 

class MenuPrincipalControlador {
	
	function __construct(){
		$this->menuPrincipalModelo = new MenuPrincipalModelo();
	}

	public function registrarMenuControlador(){
		if (isset($_POST['btnRegMenu'])) {
			$respuesta = $this->menuPrincipalModelo->registrarMenuModelo($_POST['nombreMenu']);
			if ($respuesta){
				header('location:index.php?action=ok12');
			}
			else{
				header('location:index.php?action=fa12');
			}
		}
	}

	public function consultarMenuPrincipalControlador(){
		if (isset($_POST['btnBuscar'])) {
			if (isset($_POST['datoBusqueda'])) {
				$menuBuscado = $_POST['datoBusqueda'];
			}
		}
		else{
			$menuBuscado = '';
		}
		$datosMenu = $this->menuPrincipalModelo->consultarMenuPrincipalModelo($menuBuscado);
		return $datosMenu;
	}


	public function consultarMenuPrincipalIdControlador(){
		if (isset($_GET['id'])) {
			$datosMenu = $this->menuPrincipalModelo->consultarMenuPrincipalIdModelo($_GET['id']);
			return $datosMenu;
		}
	}


	public function actualizarMenuPrincipalControlador(){
		if(isset($_POST['btnUpdMenu'])){
			$datosMenu = array('nombreMenu' => $_POST['nombreMenu'], 
				'id' => $_GET['id']);
			$respuesta = $this->menuPrincipalModelo->actualizarMenuPrincipalModelo($datosMenu);
			if ($respuesta) {
				header('location:index.php?action=ok13&id='.$_GET['id']);
			}
			else{
				header('location:index.php?action=fa13&id='.$_GET['id']);
			}
		}
	}


	public function eliminarMenuPrincipalControlador(){
		if (isset($_GET['id'])) {
			$respuesta = $this->menuPrincipalModelo->eliminarMenuPrincipalModelo($_GET['id']);
			if ($respuesta) {
				header('location:index.php?action=ok14');
			}
			else{
				header('location:index.php?action=fa14');
			}
		}
	}
}