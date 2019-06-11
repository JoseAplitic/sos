<!DOCTYPE html>
<html>
<head>
	<?php
		$paginaTitle = "";
		if (isset($_GET['views']))
		{
			$url = explode("/", $_GET['views']);
			if (isset($url[0]))
			{
				 $paginaTitle = ucfirst(str_replace("-"," ",$url[0]));
			}
		}
		else
		{
			$paginaTitle = "Inicio";
		}
	?>
	<title>Smart Oficce Solutions - <?php echo $paginaTitle; ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Descripcion del sitio">
	<link rel="stylesheet" type="text/css" href="<?php echo SERVERURL; ?>vistas/css/styles.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo SERVERURL; ?>vistas/css/faall.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo SERVERURL; ?>vistas/css/normalize.css"/>
	<script type="text/javascript" src="<?php echo SERVERURL; ?>vistas/js/jquery-3.1.1.min.js"></script>
	<style>@font-face{font-family:"Font Awesome 5 Brands";font-style:normal;font-weight:normal;src:url(<?php echo SERVERURL; ?>vistas/fonts/fa-brands-400.eot);src:url(<?php echo SERVERURL; ?>vistas/fonts/fa-brands-400.eot?#iefix) format("embedded-opentype"),url(<?php echo SERVERURL; ?>vistas/fonts/fa-brands-400.woff2) format("woff2"),url(<?php echo SERVERURL; ?>vistas/fonts/fa-brands-400.woff) format("woff"),url(<?php echo SERVERURL; ?>vistas/fonts/fa-brands-400.ttf) format("truetype"),url(<?php echo SERVERURL; ?>vistas/fonts/fa-brands-400.svg#fontawesome) format("svg")}.fab{font-family:"Font Awesome 5 Brands"}@font-face{font-family:"Font Awesome 5 Free";font-style:normal;font-weight:400;src:url(<?php echo SERVERURL; ?>vistas/fonts/fa-regular-400.eot);src:url(<?php echo SERVERURL; ?>vistas/fonts/fa-regular-400.eot?#iefix) format("embedded-opentype"),url(<?php echo SERVERURL; ?>vistas/fonts/fa-regular-400.woff2) format("woff2"),url(<?php echo SERVERURL; ?>vistas/fonts/fa-regular-400.woff) format("woff"),url(<?php echo SERVERURL; ?>vistas/fonts/fa-regular-400.ttf) format("truetype"),url(<?php echo SERVERURL; ?>vistas/fonts/fa-regular-400.svg#fontawesome) format("svg")}.far{font-weight:400}@font-face{font-family:"Font Awesome 5 Free";font-style:normal;font-weight:900;src:url(<?php echo SERVERURL; ?>vistas/fonts/fa-solid-900.eot);src:url(<?php echo SERVERURL; ?>vistas/fonts/fa-solid-900.eot?#iefix) format("embedded-opentype"),url(<?php echo SERVERURL; ?>vistas/fonts/fa-solid-900.woff2) format("woff2"),url(<?php echo SERVERURL; ?>vistas/fonts/fa-solid-900.woff) format("woff"),url(<?php echo SERVERURL; ?>vistas/fonts/fa-solid-900.ttf) format("truetype"),url(<?php echo SERVERURL; ?>vistas/fonts/fa-solid-900.svg#fontawesome) format("svg")}.fa,.far,.fas{font-family:"Font Awesome 5 Free"}.fa,.fas{font-weight:900}</style>
</head>
<body>
	<?php 
		require_once "./controladores/headerControlador.php";
		$instaciaHeader= new headerControlador();

		$loginUsuario = false;

		require_once "./controladores/loginControlador.php";
		$instaciaLogin = new loginControlador();

		if (isset($_COOKIE['user_correo']) && isset($_COOKIE['user_clave']) && isset($_COOKIE['user_tipo']))
		{				
			if ($instaciaLogin->verificar_sesion_controlador($_COOKIE['user_correo'],$_COOKIE['user_clave'],$_COOKIE['user_tipo']))
			{
				$loginUsuario = true;
			}
		}
	?>
	<header>
		<div class="top-bar">
			<div class="item">
				<img src="<?php echo SERVERURL; ?>vistas/assets/img/tableta.png" alt="¡Compra tus electrónicos con total confianza, y recíbelos en la puerta de tu casa!"><p class="mayusculas">¡Compra tus electrónicos con total confianza, y recíbelos en la puerta de tu casa!</p>
			</div>
		</div>
		<div class="first-box full-width">
			<nav class="boxed-width">
				<ul>
					<?php if ($loginUsuario == true): ?>
						<li><a href="<?php echo SERVERURL; ?>corporativo/">Corporativo</a></li>
						<li><a href="<?php echo SERVERURL; ?>pedidos/">Pedidos</a></li>
						<li><a href="<?php echo SERVERURL; ?>ayuda/">Ayuda</a></li>
						<li><a href="<?php echo SERVERURL; ?>cuenta/">Mi Cuenta</a></li>
					<?php else: ?>
						<li><a href="<?php echo SERVERURL; ?>login/">Iniciar sesión</a></li>
						<li><a href="<?php echo SERVERURL; ?>registro/">Registrarse</a></li>
					<?php endif; ?>
				</ul>
			</nav>
		</div>
		<div class="second-box full-width">
			<div class="boxed-width contain">
				<div class="logo">
					<a href="<?php echo SERVERURL; ?>"><img src="<?php echo SERVERURL; ?>vistas/assets/img/logo.png" alt="Smart Oficce Solutions"></a>
				</div>
				<div class="navigation-elements">
					<nav>
						<ul>
							<li class="menu-sub"><a href="#">Categorías <i class="fas fa-angle-down"></i></a>
								<div class="menu-sub-item full-width">
									<div class="contain boxed-width categorias">
										<div class="vertical-menu">
											<h4>Destacadas</h4>
											<ul>
												<?php echo $instaciaHeader->cargar_categorias_destacadas_controlador(); ?>
											</ul>
										</div>
										<div class="details-menu">
											<div class="detail-title">
												<h4>Categorías</h4>
											</div>
											<div class="detail-contain">
												<?php echo $instaciaHeader->cargar_categorias_controlador(); ?>
											</div>
										</div>
									</div>
								</div>
							</li>
							<li class="menu-sub"><a href="#">Marcas</a>
								<div class="menu-sub-item full-width brand2">
									<div class="contain boxed-width brands">
										<div class="brands-slideshow">
											<?php echo $instaciaHeader->cargar_marcas_controlador(); ?>
										</div>
									</div>
								</div>
							</li>
							<li><a href="#">Ofertas</a></li>
							<li><a href="#">Servicios</a></li>
						</ul>
					</nav>
					<div class="searcher">
						<form id="searcher" name="searcher" method="get" action="">
							<input id="search" name="search" type="search" placeholder="Buscar..." autofocus>
							<button type="submit" class="btn btn-success">
							    <i class="fas fa-search"></i>
							</button>
						</form>
					</div>
					<div class="shopping-cart">
						<a href="<?php echo SERVERURL; ?>carrito/"><img src="<?php echo SERVERURL; ?>vistas/assets/img/carrito.png" alt=""></a>
					</div>
				</div>
			</div>
		</div>
	</header>