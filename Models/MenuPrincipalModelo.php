<?php 

class MenuPrincipalModelo extends Conexion {
	
	function __construct() {
		$this->tabla = 'menus';
	}

	public function registrarMenuModelo($nombreMenu){
		$sql = "INSERT INTO $this->tabla(menuNombre) VALUES (?)";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $nombreMenu, PDO::PARAM_STR);
			if ($stmt->execute()) {
				return true;
			}
			else{
				return false;
			}
			$stmt->close();
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}


	public function consultarMenuPrincipalModelo($menuBuscado){
		$menuBuscado = "%".$menuBuscado."%";
		$sql = "SELECT * FROM $this->tabla WHERE menuNombre LIKE ? ORDER BY menuNombre";
		try {
			$stmt = $this->conectar()->prepare($sql);	
			$stmt->bindParam(1, $menuBuscado, PDO::PARAM_STR);		
			if ($stmt->execute()) {
				return $stmt->fetchAll();
			}
			else{
				return [];
			}
			$stmt->close();
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}		
	}


	public function consultarMenuPrincipalIdModelo($id){
		$sql = "SELECT * FROM $this->tabla WHERE idMenu = ?";
		try {
			$stmt = $this->conectar()->prepare($sql);	
			$stmt->bindParam(1, $id, PDO::PARAM_INT);		
			if ($stmt->execute()) {
				return $stmt->fetchAll();
			}
			else{
				return [];
			}
			$stmt->close();
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}

	}


	public function actualizarMenuPrincipalModelo($datosMenu){
		$sql = "UPDATE $this->tabla SET menuNombre=? WHERE idMenu=?";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $datosMenu['nombreMenu'], PDO::PARAM_STR);
			$stmt->bindParam(2, $datosMenu['id'], PDO::PARAM_INT);
			if ($stmt->execute()) {
				return true;
			}
			else{
				return false;
			}
			$stmt->close();
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}


	public function eliminarMenuPrincipalModelo($id){
		$sql = "DELETE FROM $this->tabla WHERE idMenu = ?";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $id, PDO::PARAM_INT);
			if ($stmt->execute()) {
				return true;
			}
			else{
				return false;
			}
			$stmt->close();
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}
}