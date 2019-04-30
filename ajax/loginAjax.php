<?php
	$peticionAjax=true;

	if(isset($_POST['correo']) && isset($_POST['password']))
	{
		require_once "../core/configGeneral.php";
		require_once "../controladores/loginControlador.php";
		$instancia = new loginControlador();
		echo $instancia->iniciar_sesion_controlador();
	}
	else {
		echo "¡Ha ocurrido un error!";
	}
