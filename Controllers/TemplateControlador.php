<?php 


class TemplateControlador {
	////CARGAR EL TEMPLATE EN EL INDEX /////
	function cargarTemplate() {
		include("Views/template.php");
	}

	////CARGAR LAS PAGINAS AL TEMPLATE////
	public function cargarPaginaAlTemplate(){
		if (isset($_GET['action'])) {
			$archivo = $_GET['action'];
		}
		else{
			$archivo = 'inicio';
		}
		$templateModelo = new TemplateModelo();
		$enlace = $templateModelo->validarEnlacesModelo($archivo);
		return $enlace;
	}

}