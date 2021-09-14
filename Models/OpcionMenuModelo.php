<?php 

class OpcionMenuModelo extends Conexion {
	
	function __construct() {
		$this->tabla = 'opcionesmenu';
		$this->vista = 'viewsopcionesmenu';
	}

	public function registrarOpcionMenuModelo($datoOpcionMenu){
		$sql = "INSERT INTO $this->tabla (opcionMenuNombre, opcionMenuEnlace, idMenu) VALUES (?,?,?)";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $datoOpcionMenu['opcionMenuNombre'], PDO::PARAM_STR);
			$stmt->bindParam(2, $datoOpcionMenu['opcionMenuEnlace'], PDO::PARAM_STR);
			$stmt->bindParam(3, $datoOpcionMenu['idMenu'], PDO::PARAM_INT);
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

	public function consultarOpcionMenuIdModelo($idMenu){
		$sql = "SELECT * FROM $this->tabla WHERE idMenu = ? ORDER BY opcionMenuNombre";
		try {
			$stmt = $this->conectar()->prepare($sql);	
			$stmt->bindParam(1, $idMenu, PDO::PARAM_INT);
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
}