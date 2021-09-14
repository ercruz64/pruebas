<?php 


class RolUsuarioControlador {
	
	function __construct() {
		$this->rolUsuarioModelo = new RolUsuarioModelo();
		$this->rolControlador = new RolControlador();
		$this->usuarioControlador = new UsuarioControlador();
	}

	public function registrarRolUsuarioControlador() {
		if (isset($_POST['regRolUsuario'])) {
			if (isset($_POST['idRoles'])) {
				$cont = 0;
				for ($i = 0; $i < count($_POST['idRoles']); $i++) { 
					
					$respuestaRolUsuario = $this->rolUsuarioModelo->actualizarEstadoRolUsuarioModelo($_POST['idUsuario'],$_POST['idRoles'][$i], 'true');
					if($respuestaRolUsuario > 0){
						$cont++;
					}
					else{
						$idRolesInsertar[] = $_POST['idRoles'][$i];
					}
				}

				if (isset($idRolesInsertar)) {
					$respuesta = $this->rolUsuarioModelo->registrarRolUsuarioModelo($idRolesInsertar,$_POST['idUsuario']);
				}
				
				if ($respuesta == true || $cont > 0) {
					header('location:index.php?action=ok10');
				}
				else{
					header('location:index.php?action=fa10');
				}
			}
		}
	}



	public function actualizarRolUsuarioControlador(){
		if (isset($_POST['updRolUsuario'])) {
			if (isset($_POST['idRoles'])) {
				$idRoles = $_POST['idRoles'];		
			}
			else{
				$idRoles = [];
			}
			$respuesta = $this->rolUsuarioModelo->actualizarRolUsuarioModelo($idRoles,$_GET['id']);

			if ($respuesta) {
				print "la respuesta es ".$respuesta;
				header('location:index.php?action=ok11&id='.$_GET['id']);
			}		
			else{
				print "Fallo";
				header('location:index.php?action=fa11&id='.$_GET['id']);
			}
		}
	}


	public function consultarRolUsuarioRegistradoControlador(){
		if (isset($_POST['idUsuario']) || isset($_GET['id'])) {
			if (isset($_POST['idUsuario'])){
				$id = $_POST['idUsuario'];
			}
			else{
				$id = $_GET['id'];
			}
			$respuesta = $this->rolUsuarioModelo->consultarRolUsuarioRegistradoModelo($id);
			return $respuesta;
		}
	}


	public function consultarRolUsuarioControlador(){
		if (isset($_POST['btnBuscarRolUsuario'])) {
			$datosUsuario =  $_POST['datoBusqueda'];
		} else {
			$datosUsuario = "";
		}

		$usuarioModelo = new RolUsuarioModelo();
		$respuesta = $usuarioModelo->consultarRolUsuarioModelo($datosUsuario);
		return $respuesta;

	}
}