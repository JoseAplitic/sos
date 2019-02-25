<main class="full-width" style="padding-top: 0px;">
		<div class="breadcumb full-width">
			<div class="content boxed-width">
				<ol class="breadcrumb">
					<li><a href="<?php echo SERVERURL; ?>">Home</a></li>
					<li class="active"><?php echo $infoCat['nombre']; ?></li>
				</ol>
			</div>
		</div>
		<?php
			$urlBGcabecera;
			$cabecera = json_decode($infoVista['cabecera'], true);
			$cabeceraUrl = $instanciaMedios->obtener_url_medio_controlador($cabecera[0]['img']);
			if ($cabeceraUrl->rowCount()>0){				
				$infoCabeceraUrl=$cabeceraUrl->fetch();
				$urlBGcabecera = $infoCabeceraUrl['url'];
			}
			else {
				$urlBGcabecera = SERVERURL . "vistas/assets/img/banner.jpg";
			}
		?>
		<div class="category-element-1 full-width" style="background-image: url('<?php echo $urlBGcabecera; ?>');">
			<div class="content boxed-width">
				<h1><?php echo $infoCat['nombre']; ?></h1>
				<h3><?php echo $infoCat['descripcion']; ?></h3>
			</div>
		</div>
		<div class="banner boxed-width">
			<div class="ban">
				<img src="<?php echo SERVERURL; ?>vistas/assets/img/banner.jpg" alt="Banner">
			</div>
		</div>
		<div class="home-element-2 boxed-width">
			<div class="categories">
				<div class="title"><h4>Categorías</h4></div>
				<div class="categories-slideshow">
					<div class="categories-item">
						<div class="categorie">
							<img src="<?php echo SERVERURL; ?>vistas/assets/img/pc.png" alt="Categoria">
							<h3>Categoría</h3>
						</div>
					</div>
					<div class="categories-item">
						<div class="categorie">
							<img src="<?php echo SERVERURL; ?>vistas/assets/img/pc.png" alt="Categoria">
							<h3>Categoría</h3>
						</div>
					</div>
					<div class="categories-item">
						<div class="categorie">
							<img src="<?php echo SERVERURL; ?>vistas/assets/img/pc.png" alt="Categoria">
							<h3>Categoría</h3>
						</div>
					</div>
					<div class="categories-item">
						<div class="categorie">
							<img src="<?php echo SERVERURL; ?>vistas/assets/img/pc.png" alt="Categoria">
							<h3>Categoría</h3>
						</div>
					</div>
					<div class="categories-item">
						<div class="categorie">
							<img src="<?php echo SERVERURL; ?>vistas/assets/img/pc.png" alt="Categoria">
							<h3>Categoría</h3>
						</div>
					</div>
					<div class="categories-item">
						<div class="categorie">
							<img src="<?php echo SERVERURL; ?>vistas/assets/img/pc.png" alt="Categoria">
							<h3>Categoría</h3>
						</div>
					</div>
					<div class="categories-item">
						<div class="categorie">
							<img src="<?php echo SERVERURL; ?>vistas/assets/img/pc.png" alt="Categoria">
							<h3>Categoría</h3>
						</div>
					</div>
					<div class="categories-item">
						<div class="categorie">
							<img src="<?php echo SERVERURL; ?>vistas/assets/img/pc.png" alt="Categoria">
							<h3>Categoría</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
    </main>