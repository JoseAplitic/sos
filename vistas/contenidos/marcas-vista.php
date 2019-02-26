<?php

	require_once "./controladores/marcasControlador.php";
	$instanciaMarcas = new marcasControlador();

	require_once "./controladores/mediosControlador.php";
	$instanciaMedios = new mediosControlador();

	$url = explode("/", $_GET['views']);
	if (isset($url[1]) && $url[1]!="") {
		$marca = $instanciaMarcas->obtener_info_marca_controlador($url[1]);
		if($marca->rowCount()>0)
		{
			$infoMarca=$marca->fetch();
			$vistaPersonalizada = $instanciaMarcas->obtener_info_vista_controlador($infoMarca['id']);
			if($vistaPersonalizada->rowCount()>0){
				$infoVista=$vistaPersonalizada->fetch();
				include "./vistas/contenidos/marca-personalizada-vista.php";
			}
			else {
				include "./vistas/contenidos/marca-general-vista.php";
			}
		}
		else {
			$url = SERVERURL;
			echo '<script>location.href="'.$url.'404/"</script>';
		}
	}
	else {
		$url = SERVERURL;
    	echo '<script>location.href="'.$url.'404/"</script>';
	}

?>