	<?php 
		require_once "./controladores/homeControlador.php";
		$instaciaHome = new homeControlador();

		$datosHome = $instaciaHome->cargar_datos_home_controlador();
	?>
	<main class="full-width">
		<div class="value-proposal-box">
			<div class="third-box boxed-width">
				<div class="value-proposal">
					<div class="item">
						<div class="contain">
							<i class="fas fa-box"></i><p><span>Entrega </span>grátis*</p>
						</div>
					</div>
					<div class="item">
						<div class="contain">
							<i class="fas fa-medal"></i><p><span>El mejor </span>precio</p>
						</div>
					</div>
					<div class="item">
						<div class="contain">
							<i class="fas fa-money-bill-wave"></i><p><span>Transacciones </span>segúras</p>
						</div>
					</div>
					<div class="item">
						<div class="contain">
							<i class="fas fa-comments"></i><p><span>Asesoría </span>profesional</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="banner boxed-width" style="margin-bottom: 20px;">
			<div class="ban">
				<a href="<?php echo $datosHome[10]["banner1"][0]; ?>">
					<?php echo $instaciaHome->cargar_info_medio_controlador($datosHome[10]["banner1"][1]); ?>
				</a>
			</div>
		</div>
		<div id="slides" class="slider">
			<?php
				if ($datosHome[0]["slide1"][0]!="" && $datosHome[0]["slide1"][1]>0)
				{
					echo '<a href="'.$datosHome[0]["slide1"][0].'">
							'.$instaciaHome->cargar_info_medio_controlador($datosHome[0]["slide1"][1]).'
						</a>';
				}
			?>
			<?php
				if ($datosHome[1]["slide2"][0]!="" && $datosHome[1]["slide2"][1]>0)
				{
					echo '<a href="'.$datosHome[1]["slide2"][0].'">
							'.$instaciaHome->cargar_info_medio_controlador($datosHome[1]["slide2"][1]).'
						</a>';
				}
			?>
			<?php
				if ($datosHome[2]["slide3"][0]!="" && $datosHome[2]["slide3"][1]>0)
				{
					echo '<a href="'.$datosHome[2]["slide3"][0].'">
							'.$instaciaHome->cargar_info_medio_controlador($datosHome[2]["slide3"][1]).'
						</a>';
				}
			?>
			<?php
				if ($datosHome[3]["slide4"][0]!="" && $datosHome[3]["slide4"][1]>0)
				{
					echo '<a href="'.$datosHome[3]["slide4"][0].'">
							'.$instaciaHome->cargar_info_medio_controlador($datosHome[3]["slide4"][1]).'
						</a>';
				}
			?>
			<?php
				if ($datosHome[4]["slide5"][0]!="" && $datosHome[4]["slide5"][1]>0)
				{
					echo '<a href="'.$datosHome[4]["slide5"][0].'">
							'.$instaciaHome->cargar_info_medio_controlador($datosHome[4]["slide5"][1]).'
						</a>';
				}
			?>
			<?php
				if ($datosHome[5]["slide6"][0]!="" && $datosHome[5]["slide6"][1]>0)
				{
					echo '<a href="'.$datosHome[5]["slide6"][0].'">
							'.$instaciaHome->cargar_info_medio_controlador($datosHome[5]["slide6"][1]).'
						</a>';
				}
			?>
			<?php
				if ($datosHome[6]["slide7"][0]!="" && $datosHome[6]["slide7"][1]>0)
				{
					echo '<a href="'.$datosHome[6]["slide7"][0].'">
							'.$instaciaHome->cargar_info_medio_controlador($datosHome[6]["slide7"][1]).'
						</a>';
				}
			?>
			<?php
				if ($datosHome[7]["slide8"][0]!="" && $datosHome[7]["slide8"][1]>0)
				{
					echo '<a href="'.$datosHome[7]["slide8"][0].'">
							'.$instaciaHome->cargar_info_medio_controlador($datosHome[7]["slide8"][1]).'
						</a>';
				}
			?>
			<?php
				if ($datosHome[8]["slide9"][0]!="" && $datosHome[8]["slide9"][1]>0)
				{
					echo '<a href="'.$datosHome[8]["slide9"][0].'">
							'.$instaciaHome->cargar_info_medio_controlador($datosHome[8]["slide9"][1]).'
						</a>';
				}
			?>
			<?php
				if ($datosHome[9]["slide10"][0]!="" && $datosHome[9]["slide10"][1]>0)
				{
					echo '<a href="'.$datosHome[9]["slide10"][0].'">
							'.$instaciaHome->cargar_info_medio_controlador($datosHome[9]["slide10"][1]).'
						</a>';
				}
			?>
			<a href="#" class="slidesjs-previous slidesjs-navigation"><i class="fas fa-chevron-left"></i></a>
			<a href="#" class="slidesjs-next slidesjs-navigation"><i class="fas fa-chevron-right"></i></a>
		</div>
		<div class="home-element-1 boxed-width">
			<div class="categories">
				<div class="title">
					<i class="fas fa-bars"><span>Categorías</span></i>
				</div>
				<div class="menu">
					<ul>
						<?php echo $instaciaHome->cargar_categorias_controlador(); ?>
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
				<a href="<?php echo $datosHome[11]["banner2"][0]; ?>">
					<?php echo $instaciaHome->cargar_info_medio_controlador($datosHome[11]["banner2"][1]); ?>
				</a>
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