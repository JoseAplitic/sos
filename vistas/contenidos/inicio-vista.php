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
    <style type="text/css">
    	.value-proposal-box .value-proposal{
			display: flex;
			flex-flow: row wrap;
			justify-content: space-around;
			align-items: center;
			padding: 20px 0px;
		}
		.value-proposal-box .value-proposal .item{
			width: 25%;
			border-right: 1px dashed #646162;
			display: flex;
			flex-flow: row wrap;
			justify-content: center;
			align-items: center;
		}
		.value-proposal-box .value-proposal .item .contain{
			display: flex;
			flex-flow: row wrap;
			justify-content: center;
			align-items: center;
			width: 80%;
		}
		.value-proposal-box .value-proposal .item:last-child{
			border-right-width: 0px;
		}
		.value-proposal-box .value-proposal .item i{color: #a91410;margin-right: 10px;font-size: 24px;}
		.value-proposal-box .value-proposal .item p{font-size: 18px;font-weight: lighter;}
		.value-proposal-box .value-proposal .item p span{font-weight: bold;}
		.slider{position: relative;}
		.slider .slidesjs-navigation{position: absolute;top: calc(50% - 32px);z-index: 9;}
		.slider .slidesjs-navigation i{
			font-size: 64px;
			color: #fff;
			text-shadow: 0px 0px 40px rgba(0, 0, 0, 0.6);
			-webkit-transition: color 0.3s;
			transition: color 0.3s;
		}
		.slider .slidesjs-navigation i:hover{color: #ececec;-webkit-transition: color 0.3s;transition: color 0.3s;}
		.slider .slidesjs-next{right: 15%;}
		.slider .slidesjs-previous{left: 15%;}
		.slider .slidesjs-container{z-index: 8;}
		main{padding-top: 20px;}
		main .banner{margin-bottom: 20px;}
		main .banner .ban img{width: 100%;display: block;}
		main .home-element-1{display: flex;flex-flow: row wrap;justify-content: space-between;margin-bottom: 20px;}
		main .home-element-1 .categories{width: calc(25% - 10px);border: 1px solid #d2d2d2;}
		main .home-element-1 .categories .title{background-color: #ff110b;padding: 15px;border-bottom: 1px solid #d2d2d2;color: #fff;}
		main .home-element-1 .categories .title i span{text-transform: uppercase;font-size: 18px;font-weight: normal;}
		main .home-element-1 .categories .title i{display: flex;flex-flow: row wrap;align-items: center;}
		main .home-element-1 .categories .title i:before{margin-right: 20px; font-size: 24px;}
		main .home-element-1 .categories .menu{max-height: 489px;overflow-y: auto;}
		main .home-element-1 .categories .menu::-webkit-scrollbar-track{background-color: #b1b1b1;}
		main .home-element-1 .categories .menu::-webkit-scrollbar{width: 3px;background-color: #b1b1b1;}
		main .home-element-1 .categories .menu::-webkit-scrollbar-thumb{background-color: #ff110b;border-radius: 1px;}
		main .home-element-1 .categories .menu ul{list-style: none;}
		main .home-element-1 .categories .menu ul li{border-bottom: 1px solid #d2d2d2;display: block;}
		main .home-element-1 .categories .menu ul li a:after{content: "\f054";color: #ff110b;font-size: 18px;position: absolute;top: calc(50% - 9px);right: 15px;}
		main .home-element-1 .categories .menu ul li:last-child{border-bottom-width: 0px;}
		main .home-element-1 .categories .menu > ul > li:last-child > a:after{content: "\f078";}
		main .home-element-1 .categories .menu > ul > li.icon-open > a:after{content: "\f077";}
		main .home-element-1 .categories .menu ul li i span{font-size: 18px;font-weight: normal;}
		main .home-element-1 .categories .menu ul li i:before{color: #000;margin-right: 20px;}
		main .home-element-1 .categories .menu ul li a{color: #4d4d4d;position: relative;display: block;padding: 15px 27px 15px 15px;}
		main .home-element-1 .categories .menu ul li:hover > a, main .home-element-1 .categories .menu ul li:hover > i:before{color: #ff110b;}
		main .home-element-1 .categories .menu .home-element-1-more-cats ul li:first-child{border-top: 1px solid #d2d2d2;}
		main .home-element-1 .categories .menu .close{display: none;}
		main .home-element-1 .categories .menu .open{display: block;}
		main .home-element-1 .news{width: calc(75% - 10px);border: 1px solid #d2d2d2;display: flex;flex-flow: column nowrap;}
		main .home-element-1 .news > .title{background-color: #ffeae9;padding: 17px 15px;border-bottom: 1px solid #d2d2d2;color: #000;flex: 0 0;}
		main .home-element-1 .news > .title p{font-size: 18px;text-transform: uppercase;font-weight: bold;}
		main .home-element-1 .news .news-items{flex: 1 0;display: flex;flex-flow: column nowrap;justify-content: center;}
		main .home-element-1 .news .news-items .news-slideshow{padding: 0px 50px;position: relative;}
		main .home-element-1 .news .news-items .news-slideshow > a{position: absolute;top: calc(50% - 24px);color: #ff110b;font-size: 48px;-webkit-transition: color 0.3s;transition: color 0.3s;}
		main .home-element-1 .news .news-items .news-slideshow > a:hover{color: #d00d08;-webkit-transition: color 0.3s;transition: color 0.3s;}
		main .home-element-1 .news .news-items .news-slideshow > #prev{left: 10px;}
		main .home-element-1 .news .news-items .news-slideshow > #next{right: 10px;}
		main .home-element-1 .news .news-items .news-slideshow .news-item .product{padding: 10px;}
		main .home-element-1 .news .news-items .news-slideshow .news-item .product .product-image{margin-bottom: 20px;}
		main .home-element-1 .news .news-items .news-slideshow .news-item .product .product-image img{width: 100%;display: block;}
		main .home-element-1 .news .news-items .news-slideshow .news-item .product .product-description{color: #000;}
		main .home-element-1 .news .news-items .news-slideshow .news-item .product .product-description .title{margin-bottom: 10px;}
		main .home-element-1 .news .news-items .news-slideshow .news-item .product .product-description .rated{margin-bottom: 10px;display: flex;flex-flow: row wrap;}
		main .home-element-1 .news .news-items .news-slideshow .news-item .product .product-description .rated i{margin-right: 5px;}
		main .home-element-1 .news .news-items .news-slideshow .news-item .product .product-description .rated i:last-child{margin-right: 0px;}
		main .home-element-1 .news .news-items .news-slideshow .news-item .product .product-description .title a{color: #000;text-decoration: none;}
		main .home-element-1 .news .news-items .news-slideshow .news-item .product .product-description .title a:hover{color: #ec110b;}
		main .home-element-1 .news .news-items .news-slideshow .news-item .product .product-description .price{display: flex;flex-flow: row wrap;align-items:flex-start;font-weight: bold;}
		main .home-element-1 .news .news-items .news-slideshow .news-item .product .product-description .price .currency,
		main .home-element-1 .news .news-items .news-slideshow .news-item .product .product-description .price .units{font-size: 32px;}
		main .home-element-1 .news .news-items .news-slideshow .news-item .product .product-description .price .decimals{font-size: 16px;line-height: 1.55;}
		main .home-element-1 .news .news-items .news-slideshow .news-item .product .product-description .legend{font-size: 14px;font-weight: bold;}
		main .home-element-2{margin-bottom: 20px;}
		main .home-element-2 .categories{border: 1px solid #d2d2d2;}
		main .home-element-2 .categories .title{border-bottom: 1px solid #d2d2d2;background-color: #ffeae9;padding: 15px;}
		main .home-element-2 .categories .title h4{font-size: 18px;text-transform: uppercase;}
		main .home-element-2 .categories .categories-slideshow{background-color: #ec110b;}
		main .home-element-2 .categories .categories-slideshow .categories-item{padding: 10px 5px 10px 5px;}
		main .home-element-2 .categories .categories-slideshow .categories-item:first-child{padding-left: 10px;}
		main .home-element-2 .categories .categories-slideshow .categories-item:last-child{padding-right: 10px;}
		main .home-element-2 .categories .categories-slideshow .categories-item .categorie{background-color: #d7100b;padding: 30px 20px;}
		main .home-element-2 .categories .categories-slideshow .categories-item .categorie img{display: block;width: 100%;margin-bottom: 10px;}
		main .home-element-2 .categories .categories-slideshow .categories-item .categorie h3{color: #fff;text-transform: uppercase;text-align: center;}
		main .home-element-2 .categories .categories-slideshow .slick-arrow{position: absolute;top: calc(0% - 42px);font-size: 32px;}
		main .home-element-2 .categories .categories-slideshow .slick-arrow#prev{right: 50px;}
		main .home-element-2 .categories .categories-slideshow .slick-arrow#next{right: 20px;}
		main .home-element-2 .categories .categories-slideshow > a{position: absolute;top: calc(50% - 24px);color: #ff110b;font-size: 48px;-webkit-transition: color 0.3s;transition: color 0.3s;}
		main .home-element-2 .categories .categories-slideshow > a:hover{color: #d00d08;-webkit-transition: color 0.3s;transition: color 0.3s;}
    </style>