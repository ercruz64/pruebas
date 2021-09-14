<?php 


class RolUsuarioModelo extends Conexion {
	
	function __construct() {
		$this->conn = new Conexion();
		$this->tabla = "usuariosroles";
		$this->vista = "viewusuarioroles";
	}


	public function registrarRolUsuarioModelo($idRoles, $idUsuario){

		$sql = "INSERT INTO $this->tabla (idUsuario, idRol) VALUES ";
		$valores = '';
		for ($i=0; $i < count($idRoles); $i++) { 
			$valores .= "(?,?),";
		}
		$valores = substr($valores, 0, -1);
		$sql .= $valores;

		print $sql;

		try {
			$stmt = $this->conn->conectar()->prepare($sql);
			$posicionParam = 1;
			for ($i=0; $i < count($idRoles); $i++) { 
				$stmt->bindParam($posicionParam, $idUsuario, PDO::PARAM_INT);
				$posicionParam++;
				$stmt->bindParam($posicionParam, $idRoles[$i], PDO::PARAM_INT);
				$posicionParam++;
			}
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


	public function consultarRolUsuarioModelo($datosUsuario){
		
		$datosUsuario = '%'.$datosUsuario.'%';

		$sql = "SELECT * FROM usuarios WHERE EXISTS (SELECT * from usuariosroles WHERE usuarios.idUsuario = usuariosroles.idUsuario) AND usuarios.usuarioLogin LIKE ?";
		try {
			$conn = new Conexion();
			$stmt = $conn->conectar()->prepare($sql);
			$stmt->bindParam(1, $datosUsuario, PDO::PARAM_STR);
			if ($stmt->execute()) {
				return $stmt->fetchAll();
			} else {
				return [];
			}
			$stmt->close();
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}

	public function actualizarRolUsuarioModelo($idRoles, $idUsuario){
		$estado = 'false';
		$datosIn = '';
		$idRolesSize = count($idRoles);
		
		for ($i = 0; $i < $idRolesSize; $i++) { 
			$datosIn .= '?,'; 
		}

		$datosIn = substr($datosIn, 0, -1);

		$sql0 = "UPDATE $this->tabla SET usuarioRolEstado = ? WHERE idUsuario = ?";
		$sql1 = "UPDATE $this->tabla SET usuarioRolEstado = ? WHERE idUsuario = ? AND idRol in (".$datosIn.")";
		try {
			$stmt = $this->conectar()->prepare($sql0);
			$stmt->bindParam(1, $estado, PDO::PARAM_STR);
			$stmt->bindParam(2, $idUsuario, PDO::PARAM_INT);
			if ($stmt->execute()) {
				if ($idRolesSize > 0) {
					$estado = 'true';
					$stmt2 = $this->conectar()->prepare($sql1);
					$stmt2->bindParam(1, $estado, PDO::PARAM_STR);
					$stmt2->bindParam(2, $idUsuario, PDO::PARAM_INT);

					for ($i = 0; $i < $idRolesSize; $i++) { 
						$stmt2->bindParam($i+3, $idRoles[$i], PDO::PARAM_INT);
					}

					if ($stmt2->execute()) {
						return true;
					}
					else{
						return false;
					}
					$stmt2->close();
				}
				else{
					return true;
				}
				$stmt->close();
			}
			else{
				return false;
			}

		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}

	public function consultarRolUsuarioRegistradoModelo($id){
		$sql = "SELECT * FROM $this->vista WHERE idUsuario = ?";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $id, PDO::PARAM_INT);
			if ($stmt->execute()) {
				return $stmt->fetchAll();
			} else {
				return [];
			}
			$stmt->close();
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}		
	}

	public function actualizarEstadoRolUsuarioModelo($idUsuario, $idRol, $estado){
		$sql = "UPDATE $this->tabla SET usuarioRolEstado=? WHERE idUsuario=? AND idRol=?";
		try {
			$stmt = $this->conectar()->prepare($sql);
			$stmt->bindParam(1, $estado, PDO::PARAM_STR);
			$stmt->bindParam(2, $idUsuario, PDO::PARAM_INT);
			$stmt->bindParam(3, $idRol, PDO::PARAM_INT);
			if ($stmt->execute()) {
				return $stmt->rowCount();
			} else {
				return 0;
			}
			$stmt->close();
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}
}