<?php
	$peticionAjax=true;
	require_once "../core/configGeneral.php";

	//AJAX PARA USUARIOS
	if(isset($_POST['usuario-nombre-nuevo']) && isset($_POST['usuario-apellido-nuevo']) && isset($_POST['usuario-usuario-nuevo']) && isset($_POST['usuario-correo-nuevo']) && isset($_POST['usuario-contra1-nuevo']) && isset($_POST['usuario-contra2-nuevo']))
	{
		require_once "../controladores/administradorControlador.php";
		$insAdmin = new administradorControlador();
		echo $insAdmin->agregar_administrador_controlador();
	}
	elseif(isset($_POST['usuario-id-editar']) && isset($_POST['usuario-nombre-editar']) && isset($_POST['usuario-apellido-editar']) && isset($_POST['usuario-usuario-editar']) && isset($_POST['usuario-correo-editar']) && isset($_POST['usuario-contra1-editar']) && isset($_POST['usuario-contra2-editar']))
	{
		require_once "../controladores/administradorControlador.php";
		$insAdmin = new administradorControlador();
		echo $insAdmin->editar_administrador_controlador();
	}
	elseif(isset($_POST['usuario-id-editar-perfil']) && isset($_POST['usuario-nombre-editar-perfil']) && isset($_POST['usuario-apellido-editar-perfil']) && isset($_POST['usuario-usuario-editar-perfil']) && isset($_POST['usuario-correo-editar-perfil']) && isset($_POST['usuario-contra1-editar-perfil']) && isset($_POST['usuario-contra2-editar-perfil']))
	{
		require_once "../controladores/administradorControlador.php";
		$insAdmin = new administradorControlador();
		echo $insAdmin->editar_perfil_controlador();
	}
	elseif(isset($_POST['usuario-id-eliminar']))
	{
		require_once "../controladores/administradorControlador.php";
		$insAdmin = new administradorControlador();
		echo $insAdmin->eliminar_administrador_controlador();
	}
	//AJAX PARA CATEGORIAS
	elseif(isset($_POST['categoria-nombre-nueva']) && isset($_POST['categoria-slug-nueva']) && isset($_POST['categoria-descripcion-nueva']) && isset($_POST['categoria-padre-nueva']) && isset($_POST['categoria-icono-nueva']) && isset($_POST['categoria-visitantes-nueva']) && isset($_POST['categoria-usuarios-nueva']) && isset($_POST['categoria-empresas-nueva']))
	{
		require_once "../controladores/administradorControlador.php";
		$insAdmin = new administradorControlador();
		echo $insAdmin->agregar_categoria_controlador();
	}
	elseif(isset($_POST['categoria-id-eliminar']))
	{
		require_once "../controladores/administradorControlador.php";
		$insAdmin = new administradorControlador();
		echo $insAdmin->eliminar_categoria_controlador();
	}
	elseif(isset($_POST['categoria-id-editar']) && isset($_POST['categoria-nombre-editar']) && isset($_POST['categoria-slug-editar']) && isset($_POST['categoria-descripcion-editar']) && isset($_POST['categoria-padre-editar']) && isset($_POST['categoria-icono-editar']) && isset($_POST['categoria-visitantes-editar']) && isset($_POST['categoria-usuarios-editar']) && isset($_POST['categoria-empresas-editar']))
	{
		require_once "../controladores/administradorControlador.php";
		$insAdmin = new administradorControlador();
		echo $insAdmin->editar_categoria_controlador();
	}
	//AJAX PARA ETIQUETAS
	elseif(isset($_POST['etiqueta-nombre-nueva']) && isset($_POST['etiqueta-slug-nueva']) && isset($_POST['etiqueta-descripcion-nueva']))
	{
		require_once "../controladores/administradorControlador.php";
		$insAdmin = new administradorControlador();
		echo $insAdmin->agregar_etiqueta_controlador();
	}
	elseif(isset($_POST['etiqueta-id-eliminar']))
	{
		require_once "../controladores/administradorControlador.php";
		$insAdmin = new administradorControlador();
		echo $insAdmin->eliminar_etiqueta_controlador();
	}
	elseif(isset($_POST['etiqueta-id-editar']) && isset($_POST['etiqueta-nombre-editar']) && isset($_POST['etiqueta-slug-editar']) && isset($_POST['etiqueta-descripcion-editar']))
	{
		require_once "../controladores/administradorControlador.php";
		$insAdmin = new administradorControlador();
		echo $insAdmin->editar_etiqueta_controlador();
	}
	//AJAX PARA ATRIBUTOS
	elseif(isset($_POST['atributo-nombre-nueva']) && isset($_POST['atributo-slug-nueva']) && isset($_POST['atributo-descripcion-nueva']))
	{
		require_once "../controladores/administradorControlador.php";
		$insAdmin = new administradorControlador();
		echo $insAdmin->agregar_atributo_controlador();
	}
	elseif(isset($_POST['atributo-id-eliminar']))
	{
		require_once "../controladores/administradorControlador.php";
		$insAdmin = new administradorControlador();
		echo $insAdmin->eliminar_atributo_controlador();
	}
	elseif(isset($_POST['atributo-id-editar']) && isset($_POST['atributo-nombre-editar']) && isset($_POST['atributo-slug-editar']) && isset($_POST['atributo-descripcion-editar']))
	{
		require_once "../controladores/administradorControlador.php";
		$insAdmin = new administradorControlador();
		echo $insAdmin->editar_atributo_controlador();
	}
	//AJAX PARA TÉRMINOS
	elseif(isset($_POST['termino-nombre-nueva']) && isset($_POST['termino-slug-nueva']) && isset($_POST['termino-descripcion-nueva']) && isset($_POST['termino-padre-nueva']))
	{
		require_once "../controladores/administradorControlador.php";
		$insAdmin = new administradorControlador();
		echo $insAdmin->agregar_termino_controlador();
	}
	elseif(isset($_POST['termino-id-eliminar']))
	{
		require_once "../controladores/administradorControlador.php";
		$insAdmin = new administradorControlador();
		echo $insAdmin->eliminar_termino_controlador();
	}
	elseif(isset($_POST['termino-id-editar']) && isset($_POST['termino-nombre-editar']) && isset($_POST['termino-slug-editar']) && isset($_POST['termino-descripcion-editar']) && isset($_POST['termino-padre-editar']))
	{
		require_once "../controladores/administradorControlador.php";
		$insAdmin = new administradorControlador();
		echo $insAdmin->editar_termino_controlador();
	}
	//AJAX PARA MEDIOS
	elseif(isset($_POST['medio-titulo-nuevo']) && isset($_FILES['medio-imagen-nuevo']))
	{
		require_once "../controladores/administradorControlador.php";
		$insAdmin = new administradorControlador();
		echo $insAdmin->agregar_medio_controlador();
	}
	elseif(isset($_POST['medio-id-eliminar']))
	{
		require_once "../controladores/administradorControlador.php";
		$insAdmin = new administradorControlador();
		echo $insAdmin->eliminar_medio_controlador();
	}
	elseif(isset($_POST['medio-id-editar']) && isset($_POST['medio-titulo-editar']))
	{
		require_once "../controladores/administradorControlador.php";
		$insAdmin = new administradorControlador();
		echo $insAdmin->editar_medio_controlador();
	}
	//AJAX PARA PRODUCTOS
	elseif(isset($_POST['producto-sku-nuevo']) && isset($_POST['producto-nombre-nuevo']) && isset($_POST['producto-slug-nuevo']) && isset($_POST['producto-precio-nuevo']))
	{
		require_once "../controladores/administradorControlador.php";
		$insAdmin = new administradorControlador();
		echo $insAdmin->agregar_producto_controlador();
	}
	elseif(isset($_POST['producto-sku-editar']) && isset($_POST['producto-nombre-editar']) && isset($_POST['producto-slug-editar']) && isset($_POST['producto-precio-editar']))
	{
		require_once "../controladores/administradorControlador.php";
		$insAdmin = new administradorControlador();
		echo $insAdmin->editar_producto_controlador();
	}
	elseif(isset($_POST['producto-sku-eliminar']))
	{
		require_once "../controladores/administradorControlador.php";
		$insAdmin = new administradorControlador();
		echo $insAdmin->eliminar_producto_controlador();
	}
	//AJAX PARA DESCUENTOS
	elseif(isset($_POST['descuento-nombre-nuevo']) && isset($_POST['descuento-descripcion-nuevo']) && isset($_POST['descuento-tipo-nuevo']) && isset($_POST['descuento-visitantes-nuevo']) && isset($_POST['descuento-usuarios-nuevo']) && isset($_POST['descuento-empresas-nuevo']) && isset($_POST['descuento-inicio-nuevo']) && isset($_POST['descuento-vencimiento-nuevo']))
	{
		require_once "../controladores/administradorControlador.php";
		$insAdmin = new administradorControlador();
		echo $insAdmin->agregar_descuento_controlador();
	}
	elseif(isset($_POST['descuento-id-eliminar']))
	{
		require_once "../controladores/administradorControlador.php";
		$insAdmin = new administradorControlador();
		echo $insAdmin->eliminar_descuento_controlador();
	}
	elseif(isset($_POST['descuento-id-editar']) && isset($_POST['descuento-nombre-editar']) && isset($_POST['descuento-descripcion-editar']) && isset($_POST['descuento-tipo-editar']) && isset($_POST['descuento-visitantes-editar']) && isset($_POST['descuento-usuarios-editar']) && isset($_POST['descuento-empresas-editar']) && isset($_POST['descuento-inicio-editar']) && isset($_POST['descuento-vencimiento-editar']))
	{
		require_once "../controladores/administradorControlador.php";
		$insAdmin = new administradorControlador();
		echo $insAdmin->editar_descuento_controlador();
	}
	else
	{
		session_start(['name'=>'adminsoswebstore']);
		session_destroy();
		echo '<script> window.location.href="'.SERVERURL.'login/" </script>';
	}