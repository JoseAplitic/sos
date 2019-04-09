<main class="full-width" style="padding-top: 0px;">

	<div class="breadcumb full-width">
		<div class="content boxed-width">
			<ol class="breadcrumb">
				<li><a href="<?php echo SERVERURL; ?>">Home</a></li>
				<li class="active">Marcas</li>
				<li class="active"><?php echo $infoMarca['nombre']; ?></li>
			</ol>
			<?php
				$poweredAlt = "";
				$poweredUrl = "";
				$imagen =  $instanciaMedios->obtener_info_medio_controlador($infoMarca['icono']);
				if ($imagen->rowCount()>0) {
					$infopowered=$imagen->fetch();
					$poweredAlt = $infopowered['titulo'];
					$poweredUrl = $infopowered['url'];
				}
			?>
			<div class="powered-by"><p>Powered by:</p><img src="<?php echo $poweredUrl; ?>" alt="<?php echo $poweredAlt; ?>"></div>
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

	<div class="custom-view-element-1 marca full-width" style="background-image: url('<?php echo $urlBGcabecera; ?>');background-size: cover;background-position: center;">
		<div class="content boxed-width">
			<h2><?php echo $infoMarca['nombre']; ?></h2>
			<h3><?php echo $infoMarca['descripcion']; ?></h3>
		</div>
	</div>

	<div class="custom-view-element-2 boxed-width">
		<div class="categories-menu-icon">
			<div class="title" style="background-color: #<?php echo $infoMarca['color']; ?> !important">
				<div class="content-icon">
					<div class="icon-title">
						<?php
							$iconTitleAlt = "";
							$iconTitleUrl = "";
							$imagen =  $instanciaMedios->obtener_info_medio_controlador($infoMarca['icono2']);
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
						// $subcategorias = $instanciaCategorias->obtener_subcategorias_controlador($infoMarca['id']);
						// if ($subcategorias->rowCount()>0) {
						// 	$lista = "";
						// 	foreach($subcategorias as $subcategoria)
						// 	{
						// 		$iconTitleAlt = "";
						// 		$iconTitleUrl = "";
						// 		$medio=mediosControlador::obtener_info_medio_controlador($subcategoria['icono']);
						// 		if ($medio->rowCount()>0) {
						// 			$infoIconTitle=$medio->fetch();
						// 			$iconTitleAlt = $infoIconTitle['titulo'];
						// 			$iconTitleUrl = $infoIconTitle['url'];
						// 		}
						// 		$lista .= '
						// 			<li>
						// 				<div class="img-content">
						// 					<div class="img">
						// 						<a href="'.SERVERURL.'categorias/'.$subcategoria['slug'].'/"><img src="'.$iconTitleUrl.'" alt="'.$iconTitleAlt.'"></a>
						// 					</div>
						// 				</div>
						// 				<div class="title">
						// 					<p class="fas"><a href="'.SERVERURL.'categorias/'.$subcategoria['slug'].'/">'.$subcategoria['nombre'].'</a></p>
						// 				</div>
						// 			</li>
						// 		';
						// 	}
						// 	echo $lista;
						// }
						// else {
						// 	echo '
						// 		<li>
						// 			<div class="title">
						// 				<p>No hay departamentos para esta categoria</p>
						// 			</div>
						// 		</li>
						// 	';
						// }
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