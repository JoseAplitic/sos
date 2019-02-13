<?php

$peticionAjax=false;  

require_once "./vistas/modulos/header.php";

require_once "./controladores/vistasControlador.php";

$vt = new vistasControlador();
$vistasR=$vt->obtener_vistas_controlador();

if($vistasR=="login"):
require_once "./vistas/contenidos/login-vista.php";
elseif ($vistasR=="404"):
require_once "./vistas/contenidos/404-vista.php";
else:
?>

	<!-- Left Panel -->
	<?php include "./vistas/modulos/sidebar.php"; ?>
	<!-- /#left-panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">

		<!-- Header-->
		<!-- /#header -->
		
		<!-- Content page -->
		<?php require_once $vistasR; ?>

	</div>
	<?php
	endif; 
	?>
	
	<?php include "./vistas/modulos/footer.php"; ?>