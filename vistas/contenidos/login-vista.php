<?php 
		require_once "./controladores/homeControlador.php";
		$instaciaHome = new homeControlador();
	?>
	<main class="full-width">

		
		<style type="text/css">

			main{
				background-color: #f5f5f5;
			}

			.breadcumb{background-color: #fff;color:#404040;font-size: 12pt;font-weight: bold;}
			.breadcumb > div{display: flex;flex-flow: row wrap;justify-content: space-between;align-items: center;padding: 20px 20px;}
			.breadcumb a{text-decoration: none;color: #404040;}
			.breadcumb a:hover{color: #ff110b;}.breadcumb ol li{display: inline-block;margin-right: 5px;font-weight:normal;}
			.breadcumb ol li:after{content: ":";display: inline-block;margin-left:5px;}
			.breadcumb ol li:last-child:after{display: none;}

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

			.registro-contenedor .registro-contenido .registro-contenido-row.row-2{background-color:#ec110b;color:#fff;}

		</style>

		<div class="registro-contenedor boxed-width">

			<div class="breadcumb">
				<div class="content">
					<ol class="breadcrumb">
						<li><a href="<?php echo SERVERURL; ?>">Home</a></li>
						<li>Login</li>
						<li class="active">Ingreso</li>
					</ol>
				</div>
			</div>
			
			<div class="registro-contenido">
				<div class="registro-contenido-row row-1">
					<div class="title">
						<h4>Inicia tu sesión</h4>
					</div>
					<div class="content">
						<form action="<?php echo SERVERURL; ?>ajax/loginAjax.php" method="POST" data-form="update" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
							
							<label for="correo">Correo electrónico*</label>
							<input id="correo" type="text" name="correo" class="FormularioAjaxCampo" required="">
							
							<label for="password">Contraseña *</label>
							<input id="password" type="text" name="password" class="FormularioAjaxCampo" required="">

							<div class="advertencia">
								<p>Al continuar, aceptas nuestros Términos y condiciones, y nuestra Política de privacidad.</p>
							</div>

							<div class="olvido-password">
								<a href="#">¿Olvidaste tu contraseña?</a>
							</div>
							
							<input class="boton-registro" type="submit" value="Ingresar">

						</form>

						<div class="visitar-registro">
							<a href="<?php echo SERVERURL; ?>registro/">¿No tienes una cuenta? Crea una.</a>
						</div>
					</div>
				</div>
				<div class="registro-contenido-row row-2">
					<div class="logo">
						<img src="3" alt="Smart Office Solutions">
					</div>
					<div class="beneficios">
						<p>Crea una cuenta en gosmartoffice.com para conseguir estos beneficios y muchos más:</p>
						<div class="lista-beneficios">
							<div class="beneficio">
								<div class="icono"><img src="a" alt="a"></div>
								<div class="texto"><p>Acceso a planes de protección extendida.</p></div>
							</div>
							<div class="beneficio">
								<div class="icono"><img src="a" alt="a"></div>
								<div class="texto"><p>Asesoría personalizada en todas tus compras.</p></div>
							</div>
							<div class="beneficio">
								<div class="icono"><img src="a" alt="a"></div>
								<div class="texto"><p>información en línea de productos mejorada.</p></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		

    </main>