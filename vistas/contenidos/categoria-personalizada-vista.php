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

	<div class="custom-view-element-1 categoria full-width" style="background-image: url('<?php echo $urlBGcabecera; ?>');background-size: cover;background-position: center;">
		<div class="content boxed-width">
			<h2><?php echo $infoCat['nombre']; ?></h2>
			<h3><?php echo $infoCat['descripcion']; ?></h3>
		</div>
	</div>

	<div class="custom-view-element-2 boxed-width">
		<div class="categories-menu-icon">
			<div class="title">
				<div class="content-icon">
					<div class="icon-title">
						<?php
							$iconTitleAlt = "";
							$iconTitleUrl = "";
							$imagen =  $instanciaMedios->obtener_info_medio_controlador($infoCat['icono2']);
							if ($imagen->rowCount()>0) {
								$infoIconTitle=$imagen->fetch();
								$iconTitleAlt = $infoIconTitle['titulo'];
								$iconTitleUrl = $infoIconTitle['url'];
							}
						?>
						<img src="<?php echo $iconTitleUrl; ?>" alt="<?php echo $iconTitleAlt; ?>">
					</div>
				</div>
				<div class="content-text">
					<p>DEPARTAMENTOS</p>
				</div>
			</div>
			<div class="menu-departamentos">
				<ul>
					<?php 
						$subcategorias = $instanciaCategorias->obtener_subcategorias_controlador($infoCat['id']);
						if ($subcategorias->rowCount()>0) {
							$lista = "";
							foreach($subcategorias as $subcategoria)
							{
								$iconTitleAlt = "";
								$iconTitleUrl = "";
								$medio=mediosControlador::obtener_info_medio_controlador($subcategoria['icono']);
								if ($medio->rowCount()>0) {
									$infoIconTitle=$medio->fetch();
									$iconTitleAlt = $infoIconTitle['titulo'];
									$iconTitleUrl = $infoIconTitle['url'];
								}
								$lista .= '
									<li>
										<a href="'.SERVERURL.'categorias/'.$subcategoria['slug'].'/">
											<div class="menu-departamentos-item">
												<div class="img-content">
													<div class="img">
														<img src="'.$iconTitleUrl.'" alt="'.$iconTitleAlt.'">
													</div>
												</div>
												<div class="texto">
													<p>'.$subcategoria['nombre'].'<i class="fas fa-chevron-right"></i></p>
												</div>
											</div>
										</a>
									</li>
								';
							}
							echo $lista;
						}
						else {
							echo '
								<li>
									<div class="texto">
										<p><i class="fas fa-times" style="margin-right: 5px;"></i>No se han encontrado departamentos para esta categoría</p>
									</div>
								</li>
							';
						}
					?>
				</ul>
			</div>
		</div>
		<div class="custom-view-slide">
			<div id="slides-custom-view" class="slider-custom-view">
				<?php 
					$slides = json_decode($infoVista['slides'], true);
					foreach ($slides as $slide)
					{
						$medioAlt = "";
						$medioUrl = "";
						$medio=mediosControlador::obtener_info_medio_controlador($slide['img']);
						if ($medio->rowCount()>0) {
							$infoMedio=$medio->fetch();
							$medioAlt = $infoMedio['titulo'];
							$medioUrl = $infoMedio['url'];
						}
						echo '<div class="slide-custom-view"><a href="'.$slide['url'].'"><img src="'.$medioUrl.'" alt="'.$medioAlt.'"></a></div>';
					}
				?>
				<a href="#" class="slidesjs-previous slidesjs-navigation"><i class="fas fa-chevron-left"></i></a>
				<a href="#" class="slidesjs-next slidesjs-navigation"><i class="fas fa-chevron-right"></i></a>
			</div>
		</div>
	</div>
	
	<div class="custom-view-element-3 modulos boxed-width">
		<?php 
			$modulos = json_decode($infoVista['columnas'], true);
			foreach ($modulos as $modulo)
			{
				$medioAlt = "";
				$medioUrl = "";
				$medio=mediosControlador::obtener_info_medio_controlador($modulo['img']);
				if ($medio->rowCount()>0) {
					$infoMedio=$medio->fetch();
					$medioAlt = $infoMedio['titulo'];
					$medioUrl = $infoMedio['url'];
				}
				echo '<div class="modulo"><a href="'.$modulo['url'].'"><img src="'.$medioUrl.'" alt="'.$medioAlt.'"></a></div>';
			}
		?>
	</div>
	
	<div class="custom-view-element-4 custom-view-brands-slide boxed-width">
		<div class="brands">
			<div class="title"><h4>Las mejores marcas</h4></div>
			<div class="customview-brands-slideshow">
				<?php 
					$marcas = json_decode($infoVista['marcas'], true);
					foreach ($marcas as $marca)
					{
						$infoMarca = marcasControlador::obtener_info_marca_id_controlador($marca);
						if ($infoMarca->rowCount()>0)
						{
							$infoMarca=$infoMarca->fetch();
							$medioAlt = "";
							$medioUrl = "";
							$medio=mediosControlador::obtener_info_medio_controlador($infoMarca['icono']);
							if ($medio->rowCount()>0) {
								$infoMedio=$medio->fetch();
								$medioAlt = $infoMedio['titulo'];
								$medioUrl = $infoMedio['url'];
							}
							echo '
							<div class="brands-item">
								<div class="brand">
									<a href="'.SERVERURL.'marcas/'.$infoMarca['slug'].'/"><img src="'.$medioUrl.'" alt="'.$medioAlt.'"></a>
									<a href="'.SERVERURL.'marcas/'.$infoMarca['slug'].'/"><h3>'.$infoMarca['nombre'].'</h3></a>
								</div>
							</div>
							';
						}

					}
				?>
			</div>
		</div>
	</div>

	<div class="custom-view-element-5 banner boxed-width">
		<div class="ban">
			<?php 
				$banner = json_decode($infoVista['banner'], true);
				foreach ($banner as $ban)
				{
					$medioAlt = "";
					$medioUrl = "";
					$medio=mediosControlador::obtener_info_medio_controlador($ban['img']);
					if ($medio->rowCount()>0) {
						$infoMedio=$medio->fetch();
						$medioAlt = $infoMedio['titulo'];
						$medioUrl = $infoMedio['url'];
					}
					echo '<a href="'.$ban['url'].'"><img src="'.$medioUrl.'" alt="'.$medioAlt.'">';
				}
			?>
			
		</div>
	</div>

</main>