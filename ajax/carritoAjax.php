<?php
	$peticionAjax=true;
	require_once "../core/configGeneral.php";
	
	if(isset($_POST['accion']))
	{
		require_once "../controladores/carritoControlador.php";
		$instancia = new carritoControlador();
		if ($_POST['accion'] == 'agregar')
		{
			echo $instancia->agregar_al_carrito();
		}
		else
		{
			echo "<script>alert('¡Ha ocurrido un error!');</script>";
		}
	}
	else {
		echo "<script>alert('¡Ha ocurrido un error!');</script>";
	}