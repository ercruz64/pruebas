<?php 
///////CONTROLADORES /////////////////////
require_once("Controllers/TemplateControlador.php");
require_once("Controllers/PersonaControlador.php");
require_once("Controllers/usuarioControlador.php");
require_once("Controllers/rolControlador.php");
require_once("Controllers/rolUsuarioControlador.php");
require_once("Controllers/MenuPrincipalControlador.php");
require_once("Controllers/OpcionMenuControlador.php");


///////////MODELOS ///////////////////////
require_once("Models/TemplateModelo.php");
require_once("Models/PersonaModelo.php");
require_once("Models/usuarioModelo.php");
require_once("Models/RolModelo.php");
require_once("Models/RolUsuarioModelo.php");
require_once("Models/MenuPrincipalModelo.php");
require_once("Models/OpcionMenuModelo.php");

$templateControlador = new templateControlador();
$templateControlador->cargarTemplate();

?>