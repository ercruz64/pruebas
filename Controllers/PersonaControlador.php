<?php 

class PersonaControlador {
	
	public function registrarPersonaControlador() {
		if(isset($_POST['regPersona'])){
			$datosPersona = array('nombre' => $_POST['nombre'], 
				'apellido'=>$_POST['apellido'],
				'documento' => $_POST['documento'],
				'genero' => $_POST['genero']);

			$personaModelo = new PersonaModelo();
			$respuesta = $personaModelo->registrarPersonaModelo($datosPersona);
			if($respuesta){
				header('location:index.php?action=ok1');
			}else{
				header('location:index.php?action=fa1');
			}
		}
	}


	public function consultarPersonaControlador(){
		if (isset($_POST['btnBuscarPersona'])) {
			if (isset($_POST['datoBusqueda'])) {
				$datoBusqueda = $_POST['datoBusqueda'];
			}
		}
		else{
			$datoBusqueda = '';
		}

		$personaModelo = new PersonaModelo();
		$datosPersona = $personaModelo->consultarPersonaModelo($datoBusqueda);
		return $datosPersona;
	}


	public function consultarPersonaIdControlador(){
		if (isset($_GET['id'])) {
			$personaModelo = new PersonaModelo();
			$datosPersona = $personaModelo->consultarPersonaIdModelo($_GET['id']);
			return $datosPersona;
		}
	}

	///////////////////////////

	public function listarPersonasControlador(){
		$personaModelo = new PersonaModelo();
			$datosPersona = $personaModelo->listarPersonasModelo();
			return $datosPersona;
	}


	public function actualizarPersonaControlador(){
		if (isset($_POST['updPersona'])) {
			$datosPersona = array('nombre'=>$_POST['nombre'],
				'apellido'=>$_POST['apellido'],
				'documento'=>$_POST['documento'],
				'genero'=>$_POST['genero'],
				'id'=>$_GET['id']);

			$personaModelo = new PersonaModelo();
			$respuesta = $personaModelo->actualizarPersonaModelo($datosPersona);
			if ($respuesta) {
				header("location:index.php?action=ok2&id=".$_GET['id']);
			}
			else{
				header("location:index.php?action=fa2");
			}
		}
	}

	public function eliminarPersonaControlador() {
		if (isset($_GET['id'])) {
			$personaModelo = new PersonaModelo();
			$respuesta = $personaModelo->eliminarPersonaModelo($_GET['id']);
			if ($respuesta) {
				header('location:index.php?action=ok3');
			}
			else{
				header('location:index.php?action=fa3');
			}
		}
	}
}