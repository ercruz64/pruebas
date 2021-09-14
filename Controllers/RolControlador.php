<?php 

class RolControlador {
	
	function __construct() {
		$this->rolModelo = new RolModelo();
	}


	public function registrarRolControlador(){
		if (isset($_POST['regRol'])) {
			$respuesta = $this->rolModelo->registrarRolModelo($_POST['nombrePerfil']);
			if($respuesta){
				header('location:index.php?action=ok7');
			}
			else{
				header('location:index.php?action=fa7');
			}
		}
	}


	public function consultarRolControlador(){
		if (isset($_POST['btnBuscarRol'])) {
			if (isset($_POST['datoBusqueda'])) {
				$rolBuscado = $_POST['datoBusqueda'];
			}
		}
		else{
			$rolBuscado = '';
		}

		$datosRol = $this->rolModelo->consultarRolModelo($rolBuscado);
		return $datosRol;
	}


	public function consultarRolIdControlador(){
		if (isset($_GET['id'])) {
			$datosRol = $this->rolModelo->consultarRolIdModelo($_GET['id']);
			return $datosRol;
		}
	}


	public function actualizarRolControlador(){
		if(isset($_POST['updRol'])){
			$datosRol = array('nombrePerfil' => $_POST['nombrePerfil'], 
				'id' => $_GET['id']);
			$respuesta = $this->rolModelo->actualizarRolModelo($datosRol);
			if ($respuesta) {
				header('location:index.php?action=ok8&id='.$_GET['id']);
			}
			else{
				header('location:index.php?action=fa8&id='.$_GET['id']);
			}
		}
	}


	public function eliminarRolControlador(){
		if (isset($_GET['id'])) {
			$respuesta = $this->rolModelo->eliminarRolModelo($_GET['id']);
			if($respuesta){
				header('location:index.php?action=ok9');
			}
			else{
				header('location:index.php?action=fa9');
			}
		}
	}
}