<?php
	$peticionAjax=true;
	require_once "../core/configGeneral.php";
	if(isset($_POST['accion']))
	{
		if ($_POST['accion'] == 'agregar')
		{
			require_once "../controladores/carritoControlador.php";
			$instancia = new carritoControlador();
			echo $instancia->agregar_al_carrito();
		}
		elseif ($_POST['accion'] == 'actualizar')
		{
			require_once "../controladores/accionesCarritoControlador.php";
			$instancia = new accionesCarritoControlador();
			echo $instancia->actualizar_carrito();
		}
		elseif ($_POST['accion'] == 'borrar')
		{
			require_once "../controladores/accionesCarritoControlador.php";
			$instancia = new accionesCarritoControlador();
			echo $instancia->borrar_carrito();
		}
		else
		{
			echo "<script>alert('¡Ha ocurrido un error!');</script>";
		}
	}
	else {
		echo "<script>alert('¡Ha ocurrido un error!');</script>";
	}