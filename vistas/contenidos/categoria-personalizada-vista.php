<main class="full-width" style="padding-top: 0px;">

	<style>
		/*Vistas personalizadas*/
		.breadcumb{background-color: #f5f5f5;color:#404040;font-size: 12pt;font-weight: bold;}
		.breadcumb > div{display: flex;flex-flow: row wrap;justify-content: space-between;align-items: center;padding: 10px 20px;}
		.breadcumb a{text-decoration: none;color: #404040;}
		.breadcumb a:hover{color: #ff110b;}
		.breadcumb ol li{display: inline-block;margin-right: 5px;font-weight:normal;}
		.breadcumb ol li:after{content: ":";display: inline-block;margin-left:5px;}
		.breadcumb ol li:last-child:after{display: none;}
		.breadcumb .powered-by{display: flex;flex-flow: row wrap;justify-content: flex-end;align-items: center;}
		.breadcumb .powered-by img{width: 30px;margin-left: 10px;}
		.custom-view-element-1{padding-top: 100px;padding-bottom: 150px;}
		.custom-view-element-1.categoria{color: #ffffff;}
		.custom-view-element-1 .content{padding: 0px 20px;}
		.custom-view-element-1 .content h2{font-size: 24pt;font-weight: bold;margin-bottom:5px;}
		.custom-view-element-1 .content h3{font-size: 12pt;font-weight: normal;}
		.custom-view-element-2{margin-top: -50px;background-color: #fff;padding: 20px;display: flex;flex-flow: row wrap;justify-content: space-between;}
		.custom-view-element-2 .categories-menu-icon{width: calc(25% - 10px);border: 1px solid #d2d2d2;}
		.custom-view-element-2 .categories-menu-icon > .title{background-color: #ff110b;padding: 15px;border-bottom: 1px solid #d2d2d2;color: #fff;display: flex;flex-flow: row wrap;align-items: center;}
		.custom-view-element-2 .categories-menu-icon > .title .content-icon{display: flex;flex: 0;}
		.custom-view-element-2 .categories-menu-icon > .title .content-icon .icon-title{width: 30px;}
		.custom-view-element-2 .categories-menu-icon > .title .content-icon img{display: block;width: 100%;}
		.custom-view-element-2 .categories-menu-icon > .title .content-text{display: flex;flex: 1;padding-left: 20px;font-size: 14pt;}
		.custom-view-element-2 .categories-menu-icon .menu-departamentos{max-height: 340px;overflow-y: auto;}
		.custom-view-element-2 .categories-menu-icon .menu-departamentos::-webkit-scrollbar-track{background-color: #b1b1b1;}
		.custom-view-element-2 .categories-menu-icon .menu-departamentos::-webkit-scrollbar{width: 3px;background-color: #b1b1b1;}
		.custom-view-element-2 .categories-menu-icon .menu-departamentos::-webkit-scrollbar-thumb{background-color: #ff110b;border-radius: 1px;}
		.custom-view-element-2 .categories-menu-icon .menu-departamentos ul{list-style: none;}
		.custom-view-element-2 .categories-menu-icon .menu-departamentos ul li{border-bottom: 1px solid #d2d2d2;display: block;}
		.custom-view-element-2 .categories-menu-icon .menu-departamentos ul li:last-child{border-bottom-width: 0px;}
		.custom-view-element-2 .categories-menu-icon .menu-departamentos ul li a{color:#4d4d4d;text-decoration: none;width: 100%;}
		.custom-view-element-2 .categories-menu-icon .menu-departamentos ul li a:hover{color:#ff110b;}
		.custom-view-element-2 .categories-menu-icon .menu-departamentos ul li .menu-departamentos-item{display: flex;flex-flow: row wrap;align-items: center;padding: 15px;}
		.custom-view-element-2 .categories-menu-icon .menu-departamentos ul li .menu-departamentos-item .img-content{display: flex;flex: 0;}
		.custom-view-element-2 .categories-menu-icon .menu-departamentos ul li .menu-departamentos-item .img-content .img{width: 40px;}
		.custom-view-element-2 .categories-menu-icon .menu-departamentos ul li .menu-departamentos-item .img-content .img img{width: 100%;display: block;}
		.custom-view-element-2 .categories-menu-icon .menu-departamentos ul li .menu-departamentos-item .texto{display: flex;flex: 1;}
		.custom-view-element-2 .categories-menu-icon .menu-departamentos ul li .menu-departamentos-item .texto p{padding: 0px 25px 0px 20px;font-size: 18px;font-weight: normal;position: relative;width: 100%;}
		.custom-view-element-2 .categories-menu-icon .menu-departamentos ul li .menu-departamentos-item .texto p i{color: #ff110b;font-size: 18px;position: absolute;top: calc(50% - 9px);right: 10px;}
		.custom-view-element-2 .custom-view-slide{width: calc(75% - 10px);border: 1px solid #d2d2d2;}
		.slider-custom-view{position: relative;}
		.slider-custom-view .slidesjs-navigation{position: absolute;top: calc(50% - 32px);z-index: 9;}
		.slider-custom-view .slidesjs-navigation i{
			font-size: 64px;
			color: #fe100d;
			text-shadow: 0px 0px 40px rgba(0, 0, 0, 0.6);
			-webkit-transition: color 0.3s;
			transition: color 0.3s;
		}
		.slider-custom-view .slidesjs-navigation i:hover{color: #cf110f;-webkit-transition: color 0.3s;transition: color 0.3s;}
		.slider-custom-view .slidesjs-next{right: 10px;}
		.slider-custom-view .slidesjs-previous{left: 10px;}
		.slider-custom-view .slidesjs-container{z-index: 8;}
		.slider-custom-view .slide-custom-view a img{display: block;width: 100%;}.custom-view-element-3{padding: 0px 20px 20px 20px;display: flex;flex-flow: row wrap;}
		.custom-view-element-3{padding: 0px 10px 10px 10px;}
		.custom-view-element-3 .modulo{width: 25%;padding: 10px;}
		.custom-view-element-3 .modulo.size-1{width: 100%;}
		.custom-view-element-3 .modulo.size-2{width: 50%}
		.custom-view-element-3 .modulo.size-3,
		.custom-view-element-3 .modulo.size-5,
		.custom-view-element-3 .modulo.size-6{width: calc(100% / 3);}
		.custom-view-element-3 .modulo img{width: 100%;}
		.custom-view-element-4{padding: 0px 20px;margin-bottom: 20px;}
		.custom-view-element-4 .brands{border: 1px solid #d2d2d2;}
		.custom-view-element-4 .brands .title{border-bottom: 1px solid #d2d2d2;background-color: #d7100b;padding: 15px;}
		.custom-view-element-4 .brands .title h4{font-size: 18px;text-transform: uppercase;color:#fff;text-align: center;}
		.custom-view-element-4 .brands .customview-brands-slideshow{background-color: #ffffff;}
		.custom-view-element-4 .brands .customview-brands-slideshow .brands-item{padding: 10px 5px 10px 5px;}
		.custom-view-element-4 .brands .customview-brands-slideshow .brands-item:first-child{padding-left: 10px;}
		.custom-view-element-4 .brands .customview-brands-slideshow .brands-item:last-child{padding-right: 10px;}
		.custom-view-element-4 .brands .customview-brands-slideshow .brands-item .brand{background-color: #e3e1e2;padding: 30px 20px;}
		.custom-view-element-4 .brands .customview-brands-slideshow .brands-item .brand a{text-decoration: none;color: #202020;}
		.custom-view-element-4 .brands .customview-brands-slideshow .brands-item .brand a:hover{text-decoration: none;color: #d7100b;}
		.custom-view-element-4 .brands .customview-brands-slideshow .brands-item .brand img{display: block;width: 100%;margin-bottom: 30px;}
		.custom-view-element-4 .brands .customview-brands-slideshow .brands-item .brand h3{text-transform: uppercase;text-align: center;}
		.custom-view-element-4 .brands .customview-brands-slideshow .slick-arrow{position: absolute;top: calc(0% - 42px);font-size: 32px;}
		.custom-view-element-4 .brands .customview-brands-slideshow .slick-arrow#prev{right: 50px;}
		.custom-view-element-4 .brands .customview-brands-slideshow .slick-arrow#next{right: 20px;}
		.custom-view-element-4 .brands .customview-brands-slideshow > a{position: absolute;top: calc(50% - 24px);color: #ffffff;font-size: 48px;-webkit-transition: color 0.3s;transition: color 0.3s;}
		.custom-view-element-4 .brands .customview-brands-slideshow > a:hover{color: #d2d2d2;-webkit-transition: color 0.3s;transition: color 0.3s;}
		.custom-view-element-5.banner{padding: 0px 20px 20px 20px;}
		.custom-view-element-5.banner .ban img{width: 100%;display: block;}
	</style>

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
										<p style="padding: 20px;"><i class="fas fa-times" style="margin-right: 5px;"></i>No se han encontrado departamentos para esta categoría</p>
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
			$size = count($modulos);
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
				echo '<div class="modulo size-'.$size.'"><a href="'.$modulo['url'].'"><img src="'.$medioUrl.'" alt="'.$medioAlt.'"></a></div>';
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