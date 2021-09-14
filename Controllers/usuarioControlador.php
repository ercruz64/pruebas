<?php 

class UsuarioControlador{
	function registrarUsuarioControlador(){
		if (isset($_POST['regUsuario'])) {
			$datosUsuario = array('usuario' => $_POST['usuario'],
				'password' => $_POST['password'],
				'estado' => 'Activo',
				'idPersona' => $_POST['idPersonas']);
			$usuarioModelo = new UsuarioModelo();
			$respuesta = $usuarioModelo->registrarUsuarioModelo($datosUsuario);
			print "la respuesta es ".$respuesta;
			if($respuesta){
				header('location:index.php?action=ok5');
			}
			else{
				header('location:index.php?action=fa5');
			}
		}
	}

	public function consultarUsuarioControlador(){
		if (isset($_POST['btnBuscarusuario'])) {
			$datosUsuario =  $_POST['datoBusqueda'];
		} else {
			$datosUsuario = "";
		}

		$usuarioModelo = new UsuarioModelo();
		$respuesta = $usuarioModelo->consultarUsuarioModelo($datosUsuario);
		return $respuesta;

	}

	function consultarUsuarioIdControlador(){
		if (isset($_GET['id'])) {
			$usuarioModelo = new UsuarioModelo();
			$datosUsuario = $usuarioModelo->consultarUsuarioIdModelo($_GET['id']);
			return $datosUsuario;
		}
	}

	public function actualizarUsuarioControlador(){
		if(isset($_POST['updusuario'])){
			$datosUsuario = array('login'=>$_POST['login'],
				'password'=>$_POST['password'],
				'estado'=>$_POST['estado'],
				'id'=>$_GET['id']);
			$usuarioModelo = new UsuarioModelo();
			$respuesta = $usuarioModelo->actualizarUsuarioModelo($datosUsuario);
			if($respuesta){
				print "ok";
			}
			else{
				print "fallo";
			}
		}
	}


	public function eliminarUsuarioControlador(){
		if (isset($_GET['id'])) {
			
			$usuarioModelo = new UsuarioModelo();
			$respuesta = $usuarioModelo->eliminarUsuarioModelo($_GET['id']);

			if ($respuesta) {
				header("location:index.php?action=ok6");
			}
			else{
				header("location:index.php?action=fa6");
			}
		}

	}
}