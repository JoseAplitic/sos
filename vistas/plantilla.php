<?php

$peticionAjax=false;  

require_once "./vistas/modulos/header.php";

require_once "./controladores/vistasControlador.php";

$vt = new vistasControlador();
$vistasR=$vt->obtener_vistas_controlador();

if($vistasR=="inicio"){
	require_once "./vistas/contenidos/inicio-vista.php";
}
elseif ($vistasR=="404"){
	require_once "./vistas/contenidos/404-vista.php";
}
else{
	//include "./vistas/modulos/sidebar.php";
	require_once $vistasR;
}

include "./vistas/modulos/footer.php"; ?>