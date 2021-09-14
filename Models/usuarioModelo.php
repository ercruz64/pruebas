<?php 

class UsuarioModelo extends Conexion{
	private $tabla = 'usuarios';
	function registrarUsuarioModelo($datosUsuario){
		$sql = "INSERT INTO $this->tabla(usuarioLogin, usuarioPassword, usuarioEstado, idPersona) VALUES (?,?,?,?)";
		try {
			$conn = new Conexion();
			$stmt = $conn ->conectar()->prepare($sql);
			$stmt->bindParam(1, $datosUsuario['usuario'], PDO::PARAM_STR);
			$stmt->bindParam(2, $datosUsuario['password'], PDO::PARAM_STR);
			$stmt->bindParam(3, $datosUsuario['estado'], PDO::PARAM_STR);
			$stmt->bindParam(4, $datosUsuario['idPersona'], PDO::PARAM_INT);
			if ($stmt->execute()) {
				return true;
			}else{
				return false;
			}
			$stmt->close();

		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}

	public function consultarUsuarioModelo($datosUsuario) {

		$datosUsuario = '%'.$datosUsuario.'%';


		$sql = "SELECT * FROM $this->tabla WHERE usuarioLogin LIKE ?";
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

	public function consultarUsuarioIdModelo($id){
		$sql = "SELECT * FROM $this->tabla WHERE idUsuario = ?";
		try {
			$conn = new Conexion();
			$stmt = $conn->conectar()->prepare($sql);
			$stmt->bindParam(1, $id, PDO::PARAM_INT);
			if ($stmt->execute()) {
				return $stmt->fetchAll();
			}
			else{
				[];
			}
		} catch (PDOException $e) {
			print_r($e->getMessage());
		}
	}

	public function actualizarUsuarioModelo($datosUsuario){
		print "entro al modelo";
		$sql = "UPDATE $this->tabla SET usuarioLogin=?, usuarioPassword=?, usuarioEstado=? WHERE idUsuario = ?";
		var_dump($datosUsuario);
		try {
			$conn = new Conexion();
			$stmt = $conn->conectar()->prepare($sql);
			$stmt->bindParam(1,$datosUsuario['login'],PDO::PARAM_STR);
			$stmt->bindParam(2,$datosUsuario['password'],PDO::PARAM_STR);
			$stmt->bindParam(3,$datosUsuario['estado'],PDO::PARAM_STR);
			$stmt->bindParam(4,$datosUsuario['id'],PDO::PARAM_INT);
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

	public function eliminarUsuarioModelo($id){

		$sql= "DELETE FROM $this->tabla WHERE idUsuario = ?";

		try {
			$conn = new conexion();
			$stmt = $conn->conectar()->prepare($sql);
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