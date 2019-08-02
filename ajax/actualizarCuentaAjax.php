<?php
	$peticionAjax=true;
	require_once "../core/configGeneral.php";
	
	if(isset($_POST['individual']))
	{
		require_once "../controladores/cuentaControlador.php";
		$instancia = new cuentaControlador();
		if (isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['nit-facturacion']) && isset($_POST['nombre-facturacion']) && isset($_POST['direccion-facturacion']) && isset($_POST['nombre-entrega']) && isset($_POST['apellidos-entrega']) && isset($_POST['correo-entrega']) && isset($_POST['telefono-entrega']) && isset($_POST['direccion-entrega']) && isset($_POST['departamento-entrega']) && isset($_POST['municipio-entrega']) && isset($_POST['postal-entrega']))
		{
			echo $instancia->actualizar_cuenta_personal();
		}
	}
	elseif(isset($_POST['empresarial']))
	{
		require_once "../controladores/cuentaControlador.php";
		$instancia = new cuentaControlador();
		if (isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['dpi-empresa']) && isset($_POST['institucion-empresa']) && isset($_POST['nit-empresa']) && isset($_POST['direccion-empresa']) && isset($_POST['departamento-empresa']) && isset($_POST['ciudad-empresa']) && isset($_POST['telefono-empresa']) && isset($_POST['nombre-entrega']) && isset($_POST['apellidos-entrega']) && isset($_POST['correo-entrega']) && isset($_POST['telefono-entrega']) && isset($_POST['direccion-entrega']) && isset($_POST['departamento-entrega']) && isset($_POST['municipio-entrega']) && isset($_POST['postal-entrega']) && isset($_POST['id']))
		{
			echo $instancia->actualizar_cuenta_empresarial();
		}
	}
	else {
		echo "¡Ha ocurrido un error!";
	}

	












