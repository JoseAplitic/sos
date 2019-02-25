<?php
	require_once "./controladores/categoriasControlador.php";
	$instanciaCategorias = new categoriasControlador();

	require_once "./controladores/mediosControlador.php";
	$instanciaMedios = new mediosControlador();

	$url = explode("/", $_GET['views']);
	if (isset($url[1]) && $url[1]!="") {
		$categoria = $instanciaCategorias->obtener_info_categoria_controlador($url[1]);
		if($categoria->rowCount()>0)
		{
			$infoCat=$categoria->fetch();
			$vistaPersonalizada = $instanciaCategorias->obtener_info_vista_controlador($infoCat['id']);
			if($vistaPersonalizada->rowCount()>0){
				$infoVista=$vistaPersonalizada->fetch();
				include "./vistas/contenidos/categoria-personalizada-vista.php";
			}
			else {
				include "./vistas/contenidos/categoria-general-vista.php";
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