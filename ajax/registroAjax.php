<?php
	$peticionAjax=true;
	require_once "../core/configGeneral.php";
	
	if(isset($_POST['tipo_registro']))
	{
		require_once "../controladores/registroControlador.php";
		$instancia = new registroControlador();
		if ($_POST['tipo_registro'] == 'personal')
		{
			echo $instancia->registro_personal();
		}
		elseif ($_POST['tipo_registro'] == 'empresarial')
		{
			echo $instancia->registro_empresarial();
		}
		else
		{
			echo "¡Ha ocurrido un error!";
		}
	}
	else {
		echo "¡Ha ocurrido un error!";
	}