<?php 


class Conexion {
	
	public function conectar()	{
		$pdo = new PDO("mysql:dbname=rolesusuarios;host=localhost:3306", 'root', '');
		return $pdo;
	}
}
