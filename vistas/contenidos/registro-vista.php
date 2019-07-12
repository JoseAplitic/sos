	<?php		
		if ($loginUsuario)
		{
			echo '<script> window.location="'.SERVERURL.'" </script>';
		}
	?>
	
	<main class="full-width">

		<style type="text/css">

			main{
				background-color: #f5f5f5;
			}

			.sombra-inferior{
				-webkit-box-shadow: 0px 2px 4px 0px #e5e5e5;
				-moz-box-shadow: 0px 2px 4px 0px #e5e5e5;
				box-shadow: 0px 2px 4px 0px #e5e5e5;
				position:relative;
				z-index: 1;
			}

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

			.registro-contenedor{background-color:#fff;}
			.registro-contenedor .registro-contenido{display: flex;flex-flow:row wrap;padding: 30px 20px;}
			.registro-contenedor .registro-contenido .registro-contenido-row{width: 50%;padding: 20px;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .title{padding:10px;border-bottom:1px solid #9e9d9d;margin-bottom:20px;padding-bottom:15px;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .title h4{color: #1a1818;font-size:24pt;font-weight:bold;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .title a{color:#0d6bb7;font-size:12pt;text-decoration:none;font-weight:bold;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .title a:hover{text-decoration:underline;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content{padding:10px;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content > p:nth-child(1), .registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content form label{color: #000;font-size:14pt;font-weight:bold;margin-bottom:5px;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content > p:nth-child(2){color:#a19fa0;margin-bottom: 30px;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content form label{display: block;width: 100%;margin-bottom:5px;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content form input{display: block;width: 100%;border: 1px solid #c9c9c9;outline:0px !important;border-radius:4px;padding:10px;font-size:12pt;margin-bottom:20px;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content form input:focus{border-color:#ec110b;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content form .requisitos-password{color:#636363;font-size:11pt;line-height:1.2;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content form .requisitos-password ul{padding-left: 15px;margin-bottom: 15px;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content form .advertencia{margin-top:10px;padding:25px;background-color:#f0f0f0;color:#100f0f;text-align:justify;margin-bottom:20px;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content form .advertencia a{color:#100f0f;text-decoration:none;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content form .advertencia a:hover{color:#ec110b;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content form p > input{display:inline;width:max-content;margin-right:10px;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content form p > label{display:inline;width:max-content;color:#0d6bb7;font-size: 12pt;font-weight:normal;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content form p > input:hover, .registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content form p > label:hover{cursor:pointer;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content form input[type="submit"]{
				background-color: #0d6bb7;border-width: 0px !important;border-radius:0px;display:flex;margin:10px auto;width:max-content;color:#fff;padding:15px 150px;font-weight:bold;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content form input[type="submit"]:hover{cursor:pointer;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content form .regresar-registro{text-align:center;margin-top: 15px;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content form .regresar-registro a{color:#777575;text-decoration:none;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content form .regresar-registro a:hover{text-decoration:underline;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-1 .content form .RespuestaAjax{padding: 20px 0px;}
			
			.registro-contenedor .registro-contenido .registro-contenido-row.row-2{background-color:#ec110b;color:#fff;padding: 120px 20px 120px 20px;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-2 > .logo{text-align:center;border-bottom:1px solid #fff;padding-bottom: 50px;margin-bottom:50px;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-2 > .logo > img{width:220px;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-2 > .beneficios > p{padding:0px 50px;text-align:center;font-weight:bold;font-size:14pt;margin-bottom:50px;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-2 > .beneficios .lista-beneficios{padding:0px 100px 0px 120px;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-2 > .beneficios .lista-beneficios .beneficio{display:flex;flex-flow:row nowrap;align-items:center;margin-bottom:30px;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-2 > .beneficios .lista-beneficios .beneficio .icono{width:60px;flex: 0 0 auto;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-2 > .beneficios .lista-beneficios .beneficio .icono img{width:100%;display: block;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-2 > .beneficios .lista-beneficios .beneficio .texto{flex: 1 1 auto;padding-left:20px;}
			.registro-contenedor .registro-contenido .registro-contenido-row.row-2 > .beneficios .lista-beneficios .beneficio .texto p{font-size: 16pt;width: 100%;}
		</style>

		<div class="value-proposal-box sombra-inferior">
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

		<div class="registro-contenedor boxed-width">
			<div class="registro-contenido">
				<div class="registro-contenido-row row-1">
					<div class="title">
						<h4>Crea una cuenta</h4>
						<p><a href="<?php echo SERVERURL; ?>registro-empresarial/">¿Comprando para tu negocio? Crea una cuenta empresarial.</a></p>
					</div>
					<div class="content">
						<p>Ingresa la siguiente información</p>
						<p>*Campos requeridos</p>
						<form action="<?php echo SERVERURL; ?>ajax/registroAjax.php" method="POST" data-form="update" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">

							<input type="hidden" name="tipo_registro" value="personal">

							<label for="nombre">Nombre *</label>
							<input id="nombre" type="text" name="nombre" class="FormularioAjaxCampo" required="">
							
							<label for="apellidos">Apellidos *</label>
							<input id="apellidos" type="text" name="apellidos" class="FormularioAjaxCampo" required="">
							
							<label for="correo">Correo electrónico*</label>
							<input id="correo" type="email" name="correo" class="FormularioAjaxCampo" required="">
							
							<label for="password">Contraseña *</label>
							<input id="password" type="password" name="password" class="FormularioAjaxCampo" required="">
							
							<label for="passwordConf">Confirmar contraseña *</label>
							<input id="passwordConf" type="password" name="passwordConf" class="FormularioAjaxCampo" required="">

							<div class="requisitos-password">
								<p>Por motivos de seguridad su contraseña debe de incluir:</p>
								<ul>
									<li>De 8 a 20 caracteres.</li>
								</ul>
								<p>Y dos de los siguientes:</p>
								<ul>
									<li>Letra minúscula.</li>
									<li>Letra mayúscula.</li>
									<li>1 número.</li>
									<li>1 carácter especial excepto &lt; &gt;.</li>
								</ul>
							</div>

							<div class="advertencia">
								<p>Al crear una cuenta, aceptas los términos y condiciones de Smart Office Solutions y la política de privacidad de Smart Office Solutions, incluida la recepción de ofertas y promociones exclusivas por correo electrónico de Smart Office Solutions. Para administrar tus opciones de marketing, accede a la sección <a href="#">Políticas de privacidad de Smart Office Solutions</a> o llama al número de atención al cliente.</p>
							</div>

							<p><input id="condiciones" type="checkbox" name="terminos"><label for="condiciones">Acepto los Términos y Condiciones y Aviso de Privacidad.</label></p>
							
							<input type="submit" value="Crear Cuenta">

							<div class="regresar-registro">
								<a href="<?php echo SERVERURL; ?>">Regresar</a>
							</div>

							<div class="RespuestaAjax"></div>
						</form>
					</div>
				</div>
				<div class="registro-contenido-row row-2">
					<div class="logo">
						<img src="<?php echo SERVERURL; ?>vistas/assets/img/logo.png" alt="Smart Office Solutions">
					</div>
					<div class="beneficios">
						<p>Crea una cuenta en gosmartoffice.com para conseguir estos beneficios y muchos más:</p>
						<div class="lista-beneficios">
							<div class="beneficio">
								<div class="icono"><img src="<?php echo SERVERURL; ?>vistas/assets/img/garantia.png"></div>
								<div class="texto"><p>Acceso a planes de protección extendida.</p></div>
							</div>
							<div class="beneficio">
								<div class="icono"><img src="<?php echo SERVERURL; ?>vistas/assets/img/soporte.png"></div>
								<div class="texto"><p>Asesoría personalizada en todas tus compras.</p></div>
							</div>
							<div class="beneficio">
								<div class="icono"><img src="<?php echo SERVERURL; ?>vistas/assets/img/website.png"></div>
								<div class="texto"><p>Información en línea de productos mejorada.</p></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		

    </main>