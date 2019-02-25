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
		<div class="category-element-1 full-width" style="background-image: url('<?php echo $urlBGcabecera; ?>');background-size: cover;background-position: center;">
			<div class="content boxed-width">
				<h1><?php echo $infoCat['nombre']; ?></h1>
				<h3><?php echo $infoCat['descripcion']; ?></h3>
			</div>
		</div>

		<div class="category-element-2 boxed-width">
			<div class="categories">
				<div class="title">
					<i class="fas fa-bars"><span>DEPARTAMENTOS</span></i>
				</div>
				<div class="menu">
					<ul>
						<li><a href="#" class="fas"><i class="fas fa-desktop"><span>Categorías</span></i></a></li>
						<li><a href="#" class="fas"><i class="fas fa-desktop"><span>Categorías</span></i></a></li>
						<li><a href="#" class="fas"><i class="fas fa-desktop"><span>Categorías</span></i></a></li>
						<li><a href="#" class="fas"><i class="fas fa-desktop"><span>Categorías</span></i></a></li>
						<li><a href="#" class="fas"><i class="fas fa-desktop"><span>Categorías</span></i></a></li>
						<li><a href="#" class="fas"><i class="fas fa-desktop"><span>Categorías</span></i></a></li>
						<li><a href="#" class="fas"><i class="fas fa-desktop"><span>Categorías</span></i></a></li>
						<li><a href="#" class="fas"><i class="fas fa-desktop"><span>Categorías</span></i></a></li>
						<li><a href="#" class="fas"><i class="fas fa-desktop"><span>Categorías</span></i></a></li>
						<li><a href="#" class="fas"><i class="fas fa-desktop"><span>Categorías</span></i></a></li>
						<li><a href="#" class="fas"><i class="fas fa-desktop"><span>Categorías</span></i></a></li>
						<li><a href="#" class="fas"><i class="fas fa-desktop"><span>Categorías</span></i></a></li>
						<li><a href="#" class="fas"><i class="fas fa-desktop"><span>Categorías</span></i></a></li>
						<li><a href="#" class="fas"><i class="fas fa-desktop"><span>Categorías</span></i></a></li>
						<li><a href="#" class="fas"><i class="fas fa-desktop"><span>Categorías</span></i></a></li>
						<li><a href="#" class="fas"><i class="fas fa-desktop"><span>Categorías</span></i></a></li>
						<li><a href="#" class="fas"><i class="fas fa-desktop"><span>Categorías</span></i></a></li>
						<li><a href="#" class="fas"><i class="fas fa-desktop"><span>Categorías</span></i></a></li>
					</ul>
				</div>
			</div>
			<div class="news">
				<div class="title">
					<p>Últimas novedades</p>
				</div>
				<div class="news-items">
					<div class="news-slideshow">
						<div class="news-item">
							<div class="product">
								<div class="product-image">
									<a href="#"><img src="<?php echo SERVERURL; ?>vistas/assets/img/pc.jpg"></a>
								</div>
								<div class="product-description">
									<div class="title"><a href="#"><h3>Notebook HP HP x360 11-ab042la</h3></a></div>
									<div class="rated">
										<i class="fas fa-star yellow"></i>
										<i class="fas fa-star yellow"></i>
										<i class="fas fa-star yellow"></i>
										<i class="fas fa-star yellow"></i>
										<i class="fas fa-star gray"></i>
									</div>
									<div class="price">
										<p class="currency">Q.</p>
										<p class="units">2,345.</p>
										<p class="decimals">98</p>
									</div>
									<div class="legend">
										<p>Precio de contado</p>
									</div>
								</div>
							</div>
						</div>
						<div class="news-item">
							<div class="product">
								<div class="product-image">
									<a href="#"><img src="<?php echo SERVERURL; ?>vistas/assets/img/pc.jpg"></a>
								</div>
								<div class="product-description">
									<div class="title"><a href="#"><h3>Notebook HP HP x360 11-ab042la</h3></a></div>
									<div class="rated">
										<i class="fas fa-star yellow"></i>
										<i class="fas fa-star yellow"></i>
										<i class="fas fa-star yellow"></i>
										<i class="fas fa-star yellow"></i>
										<i class="fas fa-star gray"></i>
									</div>
									<div class="price">
										<p class="currency">Q.</p>
										<p class="units">2,345.</p>
										<p class="decimals">98</p>
									</div>
									<div class="legend">
										<p>Precio de contado</p>
									</div>
								</div>
							</div>
						</div>
						<div class="news-item">
							<div class="product">
								<div class="product-image">
									<a href="#"><img src="<?php echo SERVERURL; ?>vistas/assets/img/pc.jpg"></a>
								</div>
								<div class="product-description">
									<div class="title"><a href="#"><h3>Notebook HP HP x360 11-ab042la</h3></a></div>
									<div class="rated">
										<i class="fas fa-star yellow"></i>
										<i class="fas fa-star yellow"></i>
										<i class="fas fa-star yellow"></i>
										<i class="fas fa-star yellow"></i>
										<i class="fas fa-star gray"></i>
									</div>
									<div class="price">
										<p class="currency">Q.</p>
										<p class="units">2,345.</p>
										<p class="decimals">98</p>
									</div>
									<div class="legend">
										<p>Precio de contado</p>
									</div>
								</div>
							</div>
						</div>
						<div class="news-item">
							<div class="product">
								<div class="product-image">
									<a href="#"><img src="<?php echo SERVERURL; ?>vistas/assets/img/pc.jpg"></a>
								</div>
								<div class="product-description">
									<div class="title"><a href="#"><h3>Notebook HP HP x360 11-ab042la</h3></a></div>
									<div class="rated">
										<i class="fas fa-star yellow"></i>
										<i class="fas fa-star yellow"></i>
										<i class="fas fa-star yellow"></i>
										<i class="fas fa-star yellow"></i>
										<i class="fas fa-star gray"></i>
									</div>
									<div class="price">
										<p class="currency">Q.</p>
										<p class="units">2,345.</p>
										<p class="decimals">98</p>
									</div>
									<div class="legend">
										<p>Precio de contado</p>
									</div>
								</div>
							</div>
						</div>
						<div class="news-item">
							<div class="product">
								<div class="product-image">
									<a href="#"><img src="<?php echo SERVERURL; ?>vistas/assets/img/pc.jpg"></a>
								</div>
								<div class="product-description">
									<div class="title"><a href="#"><h3>Notebook HP HP x360 11-ab042la</h3></a></div>
									<div class="rated">
										<i class="fas fa-star yellow"></i>
										<i class="fas fa-star yellow"></i>
										<i class="fas fa-star yellow"></i>
										<i class="fas fa-star yellow"></i>
										<i class="fas fa-star gray"></i>
									</div>
									<div class="price">
										<p class="currency">Q.</p>
										<p class="units">2,345.</p>
										<p class="decimals">98</p>
									</div>
									<div class="legend">
										<p>Precio de contado</p>
									</div>
								</div>
							</div>
						</div>
						<div class="news-item">
							<div class="product">
								<div class="product-image">
									<a href="#"><img src="<?php echo SERVERURL; ?>vistas/assets/img/pc.jpg"></a>
								</div>
								<div class="product-description">
									<div class="title"><a href="#"><h3>Notebook HP HP x360 11-ab042la</h3></a></div>
									<div class="rated">
										<i class="fas fa-star yellow"></i>
										<i class="fas fa-star yellow"></i>
										<i class="fas fa-star yellow"></i>
										<i class="fas fa-star yellow"></i>
										<i class="fas fa-star gray"></i>
									</div>
									<div class="price">
										<p class="currency">Q.</p>
										<p class="units">2,345.</p>
										<p class="decimals">98</p>
									</div>
									<div class="legend">
										<p>Precio de contado</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="banner boxed-width">
			<div class="ban">
				<img src="<?php echo SERVERURL; ?>vistas/assets/img/banner.jpg" alt="Banner">
			</div>
		</div>
    </main>